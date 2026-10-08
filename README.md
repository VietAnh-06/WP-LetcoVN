# LETCO WordPress

This repository is designed to run on both Windows and Linux. It contains
WordPress core and the custom `letco-rebuild` theme. Runtime configuration,
uploaded media, caches, logs, and backups are intentionally not committed.

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
