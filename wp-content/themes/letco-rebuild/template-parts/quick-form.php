<?php
/**
 * Two-field sign-up form (name and phone) for the hero and mid-page bands.
 * $args: program (saved with the lead), button (label), note (small print).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form class="lp-quick-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
	<input type="hidden" name="action" value="letco_submit_lead">
	<input type="hidden" name="program" value="<?php echo esc_attr( $args['program'] ); ?>">
	<input type="hidden" name="redirect_to" value="<?php echo esc_url( get_permalink() ); ?>">
	<input type="hidden" name="letco_lead_nonce" value="<?php echo esc_attr( wp_create_nonce( 'letco_submit_lead' ) ); ?>">
	<div class="form-honeypot" aria-hidden="true"><label>Công ty<input type="text" name="company" tabindex="-1" autocomplete="off"></label></div>
	<label>Họ và tên<input type="text" name="full_name" required autocomplete="name" placeholder="Nguyễn Văn A"></label>
	<label>Số điện thoại / Zalo<input type="tel" name="phone" required autocomplete="tel" inputmode="tel" placeholder="09xx xxx xxx"></label>
	<button class="lp-button lp-button--block" type="submit"><?php echo esc_html( $args['button'] ); ?></button>
	<?php if ( ! empty( $args['note'] ) ) : ?><small><?php echo esc_html( $args['note'] ); ?></small><?php endif; ?>
</form>
