// Cloudflare Pages worker for the static LETCO export.
// POST /api/lead checks a consultation sign-up the same way the theme's PHP handler does and
// forwards it to the Google Apps Script web app that appends it to the leads sheet.
// GET ?lead=<status> serves the copy of the page WordPress rendered for that status.
// Settings (Pages secrets): SHEET_WEBHOOK_URL, SHEET_WEBHOOK_SECRET. A project whose page is not
// LETCO's sets CONTACT_PHONE (and optionally CONTACT_EMAIL) for the sign-up failure page.

const STATUSES = new Set(['success', 'error', 'phone']);
const VARIANTS = '/_lead/';
const FIELDS = { full_name: 120, phone: 40, email: 120, program: 160, message: 2000, birth_year: 4,
  major: 160, gpa: 4, korean_level: 60, study_status: 120, school_name: 120 };
const SECURITY_HEADERS = {
  'X-Content-Type-Options': 'nosniff',
  'Referrer-Policy': 'strict-origin-when-cross-origin',
};

export default {
  async fetch(request, env) {
    const url = new URL(request.url);
    if (url.pathname === '/api/lead') {
      if (request.method !== 'POST') {
        return new Response('Method Not Allowed', { status: 405, headers: { Allow: 'POST' } });
      }
      return withHeaders(await submitLead(request, env, url));
    }
    if (url.pathname.startsWith(VARIANTS)) {
      return withHeaders(await notFound(env, url));
    }
    const status = url.searchParams.get('lead');
    if (STATUSES.has(status) && (request.method === 'GET' || request.method === 'HEAD')) {
      const variant = await env.ASSETS.fetch(new Request(new URL(VARIANTS + status + url.pathname, url), request));
      if (variant.ok) {
        return withHeaders(variant);
      }
    }
    return withHeaders(await env.ASSETS.fetch(request));
  },
};

async function submitLead(request, env, url) {
  let form;
  try {
    form = await request.formData();
  } catch {
    return new Response('Bad Request', { status: 400 });
  }
  const back = (status) => Response.redirect(new URL(pagePath(form.get('redirect_to')) + '?lead=' + status + '#form-dang-ky', url), 303);

  // Bots fill the hidden company field; tell them it worked and store nothing.
  if (text(form.get('company'), 120)) {
    return back('success');
  }
  const lead = {};
  for (const [field, limit] of Object.entries(FIELDS)) {
    lead[field] = text(form.get(field), limit);
  }
  if (!lead.full_name || !lead.phone) {
    return back('error');
  }
  lead.phone = normalizePhone(lead.phone);
  if (!lead.phone) {
    return back('phone');
  }
  if (lead.email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(lead.email)) {
    lead.email = '';
  }
  lead.source_url = new URL(pagePath(form.get('redirect_to')), url).href;

  if (!env.SHEET_WEBHOOK_URL || !env.SHEET_WEBHOOK_SECRET) {
    console.error('Lead not saved: SHEET_WEBHOOK_URL or SHEET_WEBHOOK_SECRET is not set.');
    return failed(env);
  }
  try {
    const response = await fetch(env.SHEET_WEBHOOK_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ secret: env.SHEET_WEBHOOK_SECRET, lead }),
    });
    const result = await response.json();
    if (!response.ok || !result.ok) {
      throw new Error(result.error || 'HTTP ' + response.status);
    }
  } catch (error) {
    console.error('Lead not saved:', error.message);
    return failed(env);
  }
  return back('success');
}

// Same rules as letco_normalize_phone(): Vietnamese mobile number, returned as 0xxxxxxxxx.
function normalizePhone(raw) {
  const match = raw.replace(/[\s.\-()]/g, '').match(/^(?:\+?84|0)([35789]\d{8})$/);
  return match ? '0' + match[1] : '';
}

function text(value, limit) {
  return typeof value === 'string' ? value.replace(/[\u0000-\u0008\u000b-\u001f\u007f]/g, '').trim().slice(0, limit) : '';
}

// Only same-site page paths are accepted as the place to return to.
function pagePath(value) {
  return typeof value === 'string' && /^\/(?![\/\\])[^?#]*$/.test(value) ? value : '/';
}

function failed(env) {
  // Without CONTACT_PHONE the page offers the LETCO hotline and Zalo, as the company pages do.
  const phone = text(env.CONTACT_PHONE, 20);
  const email = text(env.CONTACT_EMAIL, 120);
  const reach = phone
    ? `gọi <a href="tel:${phone}">${phone}</a>` + (email ? ` hoặc gửi email tới <a href="mailto:${email}">${email}</a>` : '')
    : 'gọi <a href="tel:0989086386">0989.086.386</a> hoặc <a href="https://zalo.me/0989086386" rel="noopener">nhắn Zalo</a>';
  return new Response(
    '<!doctype html><html lang="vi"><meta charset="utf-8">'
    + '<meta name="viewport" content="width=device-width, initial-scale=1">'
    + '<title>Chưa gửi được đăng ký</title><h1>Chưa gửi được đăng ký</h1>'
    + `<p>Hệ thống đang gặp sự cố. Vui lòng ${reach} để được tư vấn ngay.</p>`
    + '<p><a href="javascript:history.back()">Quay lại trang trước</a></p></html>',
    { status: 502, headers: { 'Content-Type': 'text/html; charset=utf-8', 'Cache-Control': 'no-store' } },
  );
}

async function notFound(env, url) {
  const page = await env.ASSETS.fetch(new URL('/404', url));
  return new Response(page.body, { status: 404, headers: page.headers });
}

function withHeaders(response) {
  const copy = new Response(response.body, response);
  for (const [name, value] of Object.entries(SECURITY_HEADERS)) {
    copy.headers.set(name, value);
  }
  return copy;
}
