<?php
/** Local Linux/Docker configuration; mounted over wp-config.php in containers. */

function letco_local_env( $name ) {
	$value = getenv( $name );
	if ( false === $value || '' === $value ) {
		throw new RuntimeException( 'Missing local configuration: ' . $name );
	}
	return $value;
}

define( 'DB_NAME', letco_local_env( 'WORDPRESS_DB_NAME' ) );
define( 'DB_USER', letco_local_env( 'WORDPRESS_DB_USER' ) );
define( 'DB_PASSWORD', letco_local_env( 'WORDPRESS_DB_PASSWORD' ) );
define( 'DB_HOST', letco_local_env( 'WORDPRESS_DB_HOST' ) );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

foreach ( array( 'AUTH_KEY', 'SECURE_AUTH_KEY', 'LOGGED_IN_KEY', 'NONCE_KEY', 'AUTH_SALT', 'SECURE_AUTH_SALT', 'LOGGED_IN_SALT', 'NONCE_SALT' ) as $key ) {
	define( $key, hash_hmac( 'sha256', $key, letco_local_env( 'WORDPRESS_AUTH_SECRET' ) ) );
}

$table_prefix = 'wp_';
define( 'WP_HOME', rtrim( letco_local_env( 'WP_HOME' ), '/' ) );
define( 'WP_SITEURL', WP_HOME );
define( 'WP_ENVIRONMENT_TYPE', 'local' );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEFAULT_THEME', 'letco-rebuild' );
define( 'FS_METHOD', 'direct' );
define( 'AUTOMATIC_UPDATER_DISABLED', true );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
