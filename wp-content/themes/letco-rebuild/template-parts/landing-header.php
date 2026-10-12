<?php
/**
 * Header for the homepage and landing pages: logo, up to four in-page links,
 * hotline and the sign-up button. $args: links (anchor id => label), hotline.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hotline = $args['hotline'];
?>
<header class="lp-header" id="top">
	<div class="container lp-header-inner">
		<a class="lp-logo" href="#top" aria-label="LETCO – HaUI, về đầu trang"><img src="<?php echo letco_asset( 'logo.png' ); ?>" alt="LETCO" width="132" height="40"></a>
		<nav class="lp-header-nav" aria-label="Nội dung trang">
			<?php foreach ( $args['links'] as $anchor_id => $anchor_label ) : ?>
				<a href="#<?php echo esc_attr( $anchor_id ); ?>"><?php echo esc_html( $anchor_label ); ?></a>
			<?php endforeach; ?>
		</nav>
		<a class="lp-header-phone" href="tel:<?php echo esc_attr( preg_replace( '/\D+/', '', $hotline ) ); ?>"><?php echo esc_html( $hotline ); ?></a>
		<a class="lp-button lp-button--small" href="#form-dang-ky">Đăng ký tư vấn</a>
	</div>
</header>
