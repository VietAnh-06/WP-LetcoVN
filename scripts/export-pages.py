#!/usr/bin/env python3
"""Export public WordPress pages and their assets for Cloudflare Pages.

Only anonymous HTTP responses are exported. Never copy the WordPress directory,
configuration, database, or PHP source into the deployment.
"""

import argparse
import json
import re
import shutil
import tempfile
import zipfile
from collections import deque
from html import escape
from html.parser import HTMLParser
from pathlib import Path
from urllib.parse import unquote, urljoin, urlsplit, urlunsplit
from urllib.request import Request, urlopen


ROOT = Path(__file__).resolve().parent.parent
ASSETS = {'.css', '.js', '.mjs', '.png', '.jpg', '.jpeg', '.gif', '.webp',
          '.avif', '.svg', '.ico', '.woff', '.woff2', '.ttf', '.otf', '.eot',
          '.mp4', '.webm', '.pdf'}
PRIVATE = {'wp-admin', 'wp-json', 'dev', 'scripts', 'node_modules'}
CSS_URL = re.compile(r'url\(\s*([\'"]?)(.*?)\1\s*\)', re.I)
# Sign-ups go to the Pages worker; WordPress-only hidden fields are left out.
LEAD_ENDPOINT = '/api/lead'
WORDPRESS_FIELDS = {'action', 'letco_lead_nonce', '_wp_http_referer'}
# Result pages shown after a sign-up, served by the worker from /_lead/<status>/<page>.
LEAD_STATUSES = ('success', 'error', 'phone')
WORKER = ROOT / 'scripts' / 'cloudflare' / '_worker.js'
VOID = {'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link',
        'meta', 'param', 'source', 'track', 'wbr'}


class Exporter:
    def __init__(self, source, output, public='', landing=None):
        self.source = source.rstrip('/')
        # Landing export: this page becomes /, its subpages keep their path below it,
        # and links to any other page become #.
        self.landing = landing
        self.public = public.rstrip('/')
        self.origin = urlsplit(self.source).netloc
        self.output = output
        self.pending = deque()
        self.seen = set()
        self.pages = 0
        self.assets = 0
        self.forms = 0

    def local(self, value, base):
        url = urlsplit(urljoin(base, value))
        if url.scheme not in ('http', 'https') or url.netloc != self.origin:
            return None
        path = unquote(url.path or '/')
        parts = Path(path).parts[1:]
        if (any(part.startswith('.') for part in parts)
                or (parts and parts[0] in PRIVATE)
                or path.rstrip('/').endswith('/feed')):
            return None
        suffix = Path(path).suffix.lower()
        if suffix and suffix not in ASSETS and suffix != '.html':
            return None
        if not suffix and parts and parts[0] in {'wp-content', 'wp-includes'}:
            return None
        if url.query and suffix not in ASSETS:
            return None
        return urlunsplit((url.scheme, url.netloc, url.path or '/', '', ''))

    def url(self, value, base):
        if not value or value.startswith(('#', 'data:', 'mailto:', 'tel:', 'javascript:')):
            return value
        full = urlsplit(urljoin(base, value))
        if full.netloc != self.origin:
            return value
        local = self.local(value, base)
        if local is None:
            return '#'
        fragment = ('#' + full.fragment) if full.fragment else ''
        if self.landing and Path(urlsplit(local).path).suffix.lower() not in ASSETS and not self.inside(local):
            return '#'
        if local not in self.seen:
            self.pending.append(local)
        return self.published(local) + fragment

    def inside(self, url):
        return urlsplit(url).path.startswith(urlsplit(self.landing).path)

    def published(self, url):
        path = urlsplit(url).path or '/'
        if self.landing and self.inside(url):
            return '/' + path[len(urlsplit(self.landing).path):]
        return path

    def text(self, value, base):
        # JSON used by WordPress's emoji loader also contains asset URLs.
        for match in re.finditer(re.escape(self.source) + r'[^\s"\'<>\\)]+', value):
            self.url(match.group(), base)
        return value.replace(self.source, '').replace(self.source.replace('/', '\\/'), '')

    def css(self, value, base):
        return CSS_URL.sub(lambda m: 'url("' + self.url(m.group(2), base) + '")', value)

    def fetch(self, url):
        request = Request(url, headers={'User-Agent': 'LETCO-Static-Export/1.0'})
        with urlopen(request, timeout=30) as response:
            if urlsplit(response.url).netloc != self.origin:
                raise RuntimeError('Unexpected external redirect: ' + url)
            return response.read(), response.headers.get_content_type(), response.url

    def seed(self):
        if self.landing:
            self.pending.append(self.landing)
            return
        self.pending.append(self.source + '/')
        # Include published pages/posts even if not linked from the main menu.
        for kind in ('pages', 'posts'):
            page = 1
            while True:
                url = f'{self.source}/wp-json/wp/v2/{kind}?per_page=100&page={page}&_fields=link'
                data, _, _ = self.fetch(url)
                entries = json.loads(data)
                for entry in entries:
                    self.url(entry['link'], self.source + '/')
                if len(entries) < 100:
                    break
                page += 1

    def run(self):
        self.seed()
        while self.pending:
            url = self.pending.popleft()
            if url in self.seen:
                continue
            if len(self.seen) >= 20000:
                raise RuntimeError('Export exceeds Cloudflare Pages file limit.')
            self.seen.add(url)
            data, mime, final_url = self.fetch(url)
            path = unquote(urlsplit(self.published(url)).path).lstrip('/')
            if mime == 'text/html':
                if not path.endswith('.html'):
                    path = path.rstrip('/') + '/index.html'
                path = path.lstrip('/')
                data, forms = self.page(data, final_url)
                if forms:
                    self.forms += forms
                    for status in LEAD_STATUSES:
                        variant, _, variant_url = self.fetch(url + '?lead=' + status)
                        self.write(f'_lead/{status}/{path}', self.page(variant, variant_url)[0])
                self.pages += 1
            else:
                if Path(path).suffix.lower() not in ASSETS:
                    raise RuntimeError('Unsupported public asset: ' + url)
                if mime == 'text/css' or path.endswith('.css'):
                    data = self.css(data.decode('utf-8'), final_url).encode('utf-8')
                self.assets += 1
            self.write(path, data)

    def page(self, data, base):
        parser = StaticHTML(self, base)
        parser.feed(data.decode('utf-8'))
        parser.close()
        return ''.join(parser.output).encode('utf-8'), parser.forms

    def write(self, path, data):
        if len(data) > 25 * 1024 * 1024:
            raise RuntimeError('Asset exceeds Cloudflare Pages 25 MiB limit: ' + path)
        target = self.output / path
        target.parent.mkdir(parents=True, exist_ok=True)
        target.write_bytes(data)
        print('Exported', '/' + path)


class StaticHTML(HTMLParser):
    def __init__(self, exporter, base):
        super().__init__(convert_charrefs=False)
        self.exporter = exporter
        self.base = base
        self.output = []
        self.form = False
        self.forms = 0
        self.style = False

    def handle_starttag(self, tag, attributes):
        attrs = dict(attributes)
        if tag == 'link':
            if attrs.get('rel', '').lower() in {'canonical', 'shortlink', 'edituri', 'https://api.w.org/'}:
                return
            href = attrs.get('href', '')
            if urlsplit(urljoin(self.base, href)).netloc == self.exporter.origin and not self.exporter.local(href, self.base):
                return
        if tag == 'form':
            self.form = True
            self.forms += 1
            attrs['action'] = LEAD_ENDPOINT
            attrs['method'] = 'post'
        if self.form and tag == 'input' and attrs.get('type') == 'hidden':
            if attrs.get('name') in WORDPRESS_FIELDS:
                return
            if attrs.get('name') == 'redirect_to':
                attrs['value'] = self.exporter.published(self.base)
        for key in ('href', 'src', 'poster'):
            if key in attrs:
                attrs[key] = self.exporter.url(attrs[key], self.base)
        if 'srcset' in attrs and 'data:' not in attrs['srcset']:
            candidates = []
            for candidate in attrs['srcset'].split(','):
                fields = candidate.strip().split()
                if fields:
                    fields[0] = self.exporter.url(fields[0], self.base)
                    candidates.append(' '.join(fields))
            attrs['srcset'] = ', '.join(candidates)
        if 'style' in attrs:
            attrs['style'] = self.exporter.css(attrs['style'], self.base)
        # Share tags need absolute URLs: export the asset, then point the tag at the public site.
        if tag == 'meta' and attrs.get('content', '').startswith(self.exporter.source):
            local = self.exporter.url(attrs['content'], self.base)
            attrs['content'] = self.exporter.public + (local if local.startswith('/') else '/' + local)
        encoded = ''.join(' ' + key + ('' if value is None else '="' + escape(value, quote=True) + '"')
                          for key, value in attrs.items())
        self.output.append('<' + tag + encoded + '>')
        if tag == 'style':
            self.style = True

    def handle_startendtag(self, tag, attrs):
        self.handle_starttag(tag, attrs)
        if tag not in VOID:
            self.handle_endtag(tag)

    def handle_endtag(self, tag):
        if tag == 'form':
            self.form = False
        if tag == 'style':
            self.style = False
        self.output.append('</' + tag + '>')

    def handle_data(self, data):
        data = self.exporter.text(data, self.base)
        self.output.append(self.exporter.css(data, self.base) if self.style else data)

    def handle_entityref(self, name):
        self.output.append('&' + name + ';')

    def handle_charref(self, name):
        self.output.append('&#' + name + ';')

    def handle_decl(self, decl):
        self.output.append('<!' + decl + '>')

    def handle_comment(self, data):
        self.output.append('<!--' + self.exporter.text(data, self.base) + '-->')


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument('--source', default='http://localhost:8081')
    parser.add_argument('--public', default='https://letco-rebuild.pages.dev',
                        help='public site origin used in social-share tags')
    parser.add_argument('--page',
                        help='export only this page and its subpages as a landing site at /, '
                             'e.g. /du-hoc/du-hoc-han-quoc/dai-hoc-daeduk/')
    args = parser.parse_args()
    source = urlsplit(args.source)
    if source.scheme not in ('http', 'https') or source.path not in ('', '/') or source.query:
        parser.error('--source must be a site origin, e.g. http://localhost:8081')
    dist = ROOT / 'dist'
    dist.mkdir(exist_ok=True)
    destination = dist / 'cloudflare'
    archive = dist / 'letco-cloudflare-pages.zip'
    landing = None
    if args.page:
        if not args.page.startswith('/'):
            parser.error('--page must be a path on the site, e.g. /du-hoc/du-hoc-han-quoc/dai-hoc-daeduk/')
        landing = Exporter(args.source, None).local(args.page, args.source + '/')
        slug = Path(urlsplit(landing or '').path).name if landing else ''
        if not slug or Path(slug).suffix.lower() in ASSETS:
            parser.error('--page must be a public WordPress page path')
        destination = dist / ('cloudflare-' + slug)
        archive = dist / (slug + '-cloudflare-pages.zip')
    with tempfile.TemporaryDirectory(prefix='pages-export-', dir=dist) as temporary:
        output = Path(temporary)
        exporter = Exporter(args.source, output, args.public, landing)
        exporter.run()
        (output / '404.html').write_text(
            '<!doctype html><html lang="vi"><meta charset="utf-8">'
            '<meta name="viewport" content="width=device-width, initial-scale=1">'
            '<title>Không tìm thấy trang</title><h1>Không tìm thấy trang</h1>'
            # A single-page export may be someone's own landing page, so it names no site.
            '<p><a href="/">Về trang chủ' + ('' if landing else ' LETCO') + '</a></p></html>',
            encoding='utf-8')
        # The worker receives sign-ups and sets the security headers on every response.
        shutil.copyfile(WORKER, output / '_worker.js')
        for file in output.rglob('*'):
            if file.is_file() and file.suffix in {'.html', '.css', '.js'}:
                contents = file.read_text(encoding='utf-8')
                if re.search(r'https?:(?:/|\\/){2}(?:localhost|127\.0\.0\.1)', contents):
                    raise RuntimeError('Local URL remains in export: ' + str(file))
        # Replace only this script's generated output, after a successful export.
        if destination.exists():
            shutil.rmtree(destination)
        shutil.copytree(output, destination)
    with zipfile.ZipFile(archive, 'w', zipfile.ZIP_DEFLATED) as bundle:
        for file in sorted(destination.rglob('*')):
            if file.is_file():
                bundle.write(file, file.relative_to(destination))
    print(f'Complete: {exporter.pages} pages, {exporter.assets} assets, '
          f'{exporter.forms} sign-up forms sent to {LEAD_ENDPOINT}.')
    print('Pages directory:', destination)
    print('Upload archive:', archive)


if __name__ == '__main__':
    main()
