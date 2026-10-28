<?php
/**
 * Header for the homepage and landing pages: logo (links to the homepage), up to four in-page links,
 * hotline and the sign-up button. $args: links (anchor id => label), hotline,
 * button (optional CTA label), logo (optional image file for dark headers).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hotline = $args['hotline'];
$button  = isset( $args['button'] ) ? $args['button'] : 'Đăng ký tư vấn';
$logo    = isset( $args['logo'] ) ? $args['logo'] : 'logo.png';
$logo_url = letco_is_daeduk() ? letco_daeduk_url() : home_url( '/' );
$logo_label = letco_is_daeduk() ? 'LETCO – Tổng quan Đại học Daeduk' : 'LETCO – HaUI, trang chủ';
?>
<span id="top" class="lp-top-anchor" aria-hidden="true"></span>
<header class="lp-header">
	<div class="container lp-header-inner">
		<a class="lp-logo" href="<?php echo esc_url( $logo_url ); ?>" aria-label="<?php echo esc_attr( $logo_label ); ?>"><img src="<?php echo letco_asset( $logo ); ?>" alt="LETCO" width="132" height="<?php echo 'logo.png' === $logo ? '40' : '34'; ?>"></a>
		<nav class="lp-header-nav" aria-label="Nội dung trang">
			<?php foreach ( $args['links'] as $anchor_id => $anchor_label ) : ?>
				<a href="#<?php echo esc_attr( $anchor_id ); ?>"><?php echo esc_html( $anchor_label ); ?></a>
			<?php endforeach; ?>
		</nav>
		<a class="lp-header-phone" href="tel:<?php echo esc_attr( preg_replace( '/\D+/', '', $hotline ) ); ?>"><?php echo esc_html( $hotline ); ?></a>
		<a class="lp-button lp-button--small" href="#dang-ky"><?php echo esc_html( $button ); ?></a>
	</div>
</header>
