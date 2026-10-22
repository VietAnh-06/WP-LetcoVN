# LETCO WordPress

This repository is designed to run on both Windows and Linux. It contains
WordPress core and the custom `letco-rebuild` theme. Runtime configuration,
uploaded media, caches, logs, and backups are intentionally not committed.

## Run locally on Linux with Docker

Install Docker Engine with the Compose plugin, plus Python 3 (used once to
generate local passwords). PHP, Apache, MariaDB, and WP-CLI run in containers.
From this directory:

```sh
bash scripts/local.sh start
```

Open **http://localhost:8081**. The admin area is
**http://localhost:8081/wp-admin/**. An existing imported database keeps its
WordPress usernames and passwords. On a new database, complete the browser
installer; the default theme is **LETCO Rebuild**.

```sh
bash scripts/local.sh stop     # Stop this project's services; keep the database
bash scripts/local.sh start    # Start again
bash scripts/local.sh status   # Show health and ports
bash scripts/local.sh logs     # Follow logs; Ctrl+C exits
bash scripts/local.sh wp theme list
```

The launcher generates an ignored `.env` with random secrets. `.env.example`
documents its settings. Change `WP_PORT` in `.env` if port 8081 is occupied, then
run `start` again. It also runs PHP and WP-CLI with your Linux user ID so files
created through WordPress remain editable by you. Use the launcher as your
normal user, with Docker access.

The containers serve the files in this checkout, including the existing uploads,
so theme edits appear immediately. `dev/wp-config.php` is mounted as the container's
configuration; the host's Laragon `wp-config.php` is preserved. A Docker-managed
volume stores the Linux database, including when this checkout is on NTFS.
Only the website's port is published, on the local machine. Do not run
`docker compose down -v` unless you intend to delete the Linux database.

Docker installed through Snap needs access to external drives:

```sh
sudo snap connect docker:removable-media
```

See the [official WordPress image documentation](https://hub.docker.com/_/wordpress)
and [Docker Snap documentation](https://github.com/canonical/docker-snap#usage).

### Import an existing WordPress database

Import a SQL export into an empty Linux database. An import can replace existing
tables, so export any Linux changes first. SQL files in `dev/backups/` are ignored
by Git and blocked from web access.

```sh
mkdir -p dev/backups
# Place your SQL export at dev/backups/wordpress.sql.
bash scripts/local.sh wp db import /var/www/html/dev/backups/wordpress.sql
bash scripts/local.sh wp search-replace 'http://localhost/wordpress' \
  'http://localhost:8081' --all-tables-with-prefix --skip-columns=guid --precise
bash scripts/local.sh wp rewrite flush
```

Use the original site's URL and your chosen Linux port in the search/replace
command. The operation handles serialized WordPress values. Copy uploads into
`wp-content/uploads/` if they are not already present. Back up Linux content with:

```sh
mkdir -p dev/backups
bash scripts/local.sh wp db export /var/www/html/dev/backups/linux-wordpress.sql
```

`dev/laragon-recovery.yaml` is a separate, one-time recovery tool specifically
for Laragon **MySQL 8.0.30** raw data. It copies a read-only Windows data directory
into its own Docker volume and runs the matching MySQL server without networking.
Prefer a normal SQL export when one is available. Do not attach the Windows data
directory directly to the MariaDB service. To start the recovery copy:

```sh
export LARAGON_MYSQL_DATA='/absolute/path/to/laragon/data/mysql-8'
docker compose -f dev/laragon-recovery.yaml up -d --wait
mkdir -p dev/backups
docker compose -f dev/laragon-recovery.yaml exec -T mysql \
  mysqldump --socket=/tmp/mysql.sock -uroot --single-transaction \
  --no-tablespaces --set-gtid-purged=OFF wordpress > dev/backups/wordpress.sql
docker compose -f dev/laragon-recovery.yaml down
```

The recovery volume is retained after `down`; reuse reads that same snapshot.
Then use the import commands above. The normal `start` command does not run
this recovery server.

## Publish a preview on Cloudflare Pages

Public preview: **https://letco-rebuild.pages.dev/**

Cloudflare Pages serves a **static export** of this WordPress site. Continue
editing content at `http://localhost:8081/wp-admin/`, then export and deploy again
when you want to publish changes. The public preview works even when your
computer is off.

```sh
bash scripts/local.sh start
python3 scripts/export-pages.py
```

The exporter fetches anonymous, published pages/posts and their linked images,
styles, scripts, and fonts. It writes `dist/cloudflare/` plus an uploadable archive
at `dist/letco-cloudflare-pages.zip`. Local links become relative to the public
site, and a `404.html` page provides proper missing-page behavior on Pages.
No PHP source, WordPress login, database, local credentials, or backups are
included. The local WordPress installation is not changed.

Consultation forms stay active: they post to `/api/lead`, handled by
[`scripts/cloudflare/_worker.js`](scripts/cloudflare/_worker.js), which the exporter
copies into the export. It applies the same checks as the theme (name, Vietnamese
phone number, hidden spam field) and appends each sign-up to a Google Sheet through
a Google Apps Script web app. The result messages are exported from WordPress
(`?lead=success`, `error`, `phone`) and served from `/_lead/`. If the sheet cannot be
reached, visitors see a page with the hotline and Zalo link. WordPress
administration, comments, and search are not available on the static copy.
See Cloudflare's
[static WordPress guide](https://developers.cloudflare.com/pages/how-to/deploy-a-wordpress-site/).

Sign in once with the official Wrangler CLI (Node.js and npm required):

```sh
npx --yes wrangler@4.148.0 login --device --scopes account:read user:read pages:write
npx --yes wrangler@4.148.0 pages project create letco-rebuild --production-branch=main --force
```

The `--force` option keeps initial project creation on Pages when this Wrangler
version would otherwise delegate to Workers. Use your actual Pages project name
if it differs. After the first creation,
publish/update with:

```sh
python3 scripts/export-pages.py
npx --yes wrangler@4.148.0 pages deploy dist/cloudflare \
  --project-name=letco-rebuild --branch=main --commit-dirty=true
```

Wrangler prints the public URL after deployment. Deploy with Wrangler so the
sign-up worker is included; dashboard drag-and-drop upload of
`dist/letco-cloudflare-pages.zip` publishes only static files. Upload only the
export folder or ZIP, never the WordPress checkout. Both outputs are ignored by Git.

### Export a single page as a landing page

`--page` exports only that page, served at `/`, with the assets it uses. Links to
other pages of the site become `#`; in-page anchors, phone, Zalo, and the sign-up
forms keep working. Output goes to `dist/cloudflare-<slug>/` and
`dist/<slug>-cloudflare-pages.zip`, separate from the full-site export.

```sh
python3 scripts/export-pages.py --page /du-hoc/du-hoc-han-quoc/dai-hoc-daeduk/ \
  --public https://daeduk-landing.pages.dev
npx --yes wrangler@4.148.0 pages project create daeduk-landing --production-branch=main --force
npx --yes wrangler@4.148.0 pages deploy dist/cloudflare-dai-hoc-daeduk \
  --project-name=daeduk-landing --branch=main --commit-dirty=true
```

Set `--public` to the landing page's real domain (used in share tags). A new Pages
project needs its own `SHEET_WEBHOOK_URL` and `SHEET_WEBHOOK_SECRET` secrets (below).

### Connect the sign-up forms to Google Sheets

1. Create a Google Sheet, open **Extensions > Apps Script**, and replace the code
   with [`scripts/cloudflare/google-sheets-lead.gs`](scripts/cloudflare/google-sheets-lead.gs).
2. Generate a secret, for example with `openssl rand -hex 32`. In Apps Script,
   open **Project Settings > Script properties** and add `LEAD_SECRET` with it.
3. **Deploy > New deployment > Web app**: execute as *Me*, access *Anyone*.
   Authorize it and copy the web app URL ending in `/exec`.
4. Store both values on the Pages project, then deploy again:

```sh
npx --yes wrangler@4.148.0 pages secret put SHEET_WEBHOOK_URL --project-name=letco-rebuild
npx --yes wrangler@4.148.0 pages secret put SHEET_WEBHOOK_SECRET --project-name=letco-rebuild
```

Sign-ups appear in the sheet's **Leads** tab, which the script creates with a
header row. After editing the Apps Script code, use **Deploy > Manage deployments >
Edit > New version** so the URL stays the same. Sign-ups on the static site are
not stored in WordPress.

## Requirements

- PHP 7.4 or newer
- MySQL 5.5.5 or newer, or a compatible MariaDB release
- Apache with `mod_rewrite`, or Nginx with an equivalent front-controller rule
- PHP extensions normally required by WordPress, including MySQLi, cURL,
  DOM/XML, Fileinfo, JSON, Mbstring, and OpenSSL

## Initial setup

1. Clone the repository into the web server's document root or a subdirectory.
2. Create an empty database and a database user.
3. Copy `wp-config-sample.php` to `wp-config.php` and enter the database values.
   Never commit `wp-config.php`; it is ignored because it contains secrets.
4. Open the site URL and complete the WordPress installer, or import the site's
   database if one is supplied separately.
5. In WordPress, activate the **LETCO Rebuild** theme and save
   **Settings > Permalinks** once.

PowerShell:

```powershell
Copy-Item wp-config-sample.php wp-config.php
```

Linux/macOS shell:

```sh
cp wp-config-sample.php wp-config.php
```

## Environment-specific URLs

WordPress stores its site URL in the database. Do not commit a Windows URL such
as `http://localhost/wordpress` into shared configuration. Set the URL per
environment in the database, or optionally add this to the local `wp-config.php`:

```php
$letco_home = getenv( 'WP_HOME' );
if ( false !== $letco_home && '' !== $letco_home ) {
	define( 'WP_HOME', rtrim( $letco_home, '/' ) );
	define( 'WP_SITEURL', rtrim( getenv( 'WP_SITEURL' ) ?: $letco_home, '/' ) );
}
```

Examples:

- Windows/Laragon: `WP_HOME=http://localhost/wordpress`
- Linux production: `WP_HOME=https://example.com`

When moving an existing database, use a WordPress-aware search/replace tool so
serialized values are updated safely. With WP-CLI:

```sh
wp search-replace 'http://localhost/wordpress' 'https://example.com' --skip-columns=guid
```

## Web server notes

The committed `.htaccess` uses a relative `index.php` rewrite, so Apache can
serve the project either at the domain root or in a subdirectory. WordPress may
regenerate that block when permalinks are saved; review the resulting path
before committing it.

For Nginx, use the equivalent rule inside the site's `location /` block:

```nginx
try_files $uri $uri/ /index.php?$args;
```

If WordPress is installed in a subdirectory, prefix `/index.php` with that URL
path. Nginx must also pass PHP requests to the installed PHP-FPM socket.

## Linux permissions

A typical baseline is `755` for directories and `644` for files. The web-server
user needs write access only where WordPress must create uploads, cache files,
or perform managed updates. Do not make the whole project world-writable.

```sh
find . -type d -exec chmod 755 {} +
find . -type f -exec chmod 644 {} +
```

The database and `wp-content/uploads` are deployment data and must be migrated
or backed up separately from this Git repository.
