<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo letco_asset( 'favicon-32.png' ); ?>" type="image/png" sizes="32x32">
	<link rel="icon" href="<?php echo letco_asset( 'favicon-192.png' ); ?>" type="image/png" sizes="192x192">
	<link rel="icon" href="<?php echo esc_url( home_url( '/favicon.ico' ) ); ?>" sizes="any">
	<link rel="apple-touch-icon" href="<?php echo letco_asset( 'favicon-180.png' ); ?>" sizes="180x180">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content">Chuyển đến nội dung</a>

<?php if ( ! letco_is_landing() ) : ?>
<header class="lp-header lp-site-header" data-site-header>
	<div class="container lp-header-inner">
		<a class="lp-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="LETCO – HaUI, trang chủ"><img src="<?php echo letco_asset( 'logo.png' ); ?>" alt="LETCO" width="132" height="40"></a>
		<button class="lp-menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" data-menu-toggle>
			<span class="lp-menu-icon" aria-hidden="true"></span>
			<span class="screen-reader-text">Mở menu</span>
		</button>
		<div class="lp-site-nav" id="primary-navigation" data-menu-panel>
			<nav aria-label="Menu chính">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'lp-site-menu',
						'depth'          => 2,
						'fallback_cb'    => 'letco_primary_menu_fallback',
					)
				);
				?>
			</nav>
			<a class="lp-header-phone" href="tel:0989086386">0989.086.386</a>
			<a class="lp-button lp-button--small" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>">Đăng ký tư vấn</a>
		</div>
	</div>
</header>
<?php endif; ?>

<main id="main-content"<?php echo letco_is_landing() ? '' : ' class="jd-page"'; ?>>
