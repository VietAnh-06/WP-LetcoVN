<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo letco_asset( 'favicon.svg' ); ?>" type="image/svg+xml">
	<link rel="alternate icon" href="<?php echo esc_url( home_url( '/favicon.ico' ) ); ?>" type="image/x-icon" sizes="32x32">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content">Chuyển đến nội dung</a>

<header class="site-header" data-site-header>
	<div class="topbar">
		<div class="container topbar-inner">
			<p>Đơn vị trực thuộc Đại học Công nghiệp Hà Nội</p>
			<div class="topbar-links">
				<a href="tel:02437638154">Hotline: 024 3763 8154</a>
				<span aria-hidden="true">•</span>
				<a href="mailto:haui@letco.vn">haui@letco.vn</a>
			</div>
		</div>
	</div>

	<div class="brandbar">
		<div class="container brandbar-inner">
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="LETCO - Trang chủ">
				<img src="<?php echo letco_asset( 'logo-white.png' ); ?>" alt="LETCO">
			</a>
			<div class="brand-copy">
				<span>Đại học Công nghiệp Hà Nội</span>
				<strong>Công ty Đào tạo và Cung ứng Nhân lực – HaUI</strong>
			</div>
		</div>
	</div>

	<nav class="main-navigation" aria-label="Menu chính">
		<div class="container nav-inner">
			<a class="nav-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo letco_asset( 'logo.png' ); ?>" alt="LETCO">
			</a>
			<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" data-menu-toggle>
				<span></span><span></span><span></span>
				<span class="screen-reader-text">Mở menu</span>
			</button>
			<div class="menu-panel" id="primary-navigation" data-menu-panel>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'primary-menu',
						'fallback_cb'    => 'letco_primary_menu_fallback',
					)
				);
				?>
				<a class="button button-small nav-cta" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>">Đăng ký tư vấn</a>
			</div>
		</div>
	</nav>
</header>

<main id="main-content">
