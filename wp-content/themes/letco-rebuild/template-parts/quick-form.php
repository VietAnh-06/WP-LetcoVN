<?php
/**
 * Two-field sign-up form (name and phone) for the hero and mid-page bands.
 * $args: program (saved with the lead), button (label), note (small print).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$major_choices      = isset( $args['major_choices'] ) ? $args['major_choices'] : array();
$collect_birth_year = ! empty( $args['collect_birth_year'] );
?>
<form class="lp-quick-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
	<input type="hidden" name="action" value="letco_submit_lead">
	<input type="hidden" name="program" value="<?php echo esc_attr( $args['program'] ); ?>">
	<input type="hidden" name="redirect_to" value="<?php echo esc_url( get_permalink() ); ?>">
	<input type="hidden" name="letco_lead_nonce" value="<?php echo esc_attr( wp_create_nonce( 'letco_submit_lead' ) ); ?>">
	<div class="form-honeypot" aria-hidden="true"><label>Công ty<input type="text" name="company" tabindex="-1" autocomplete="off"></label></div>
	<label>Họ và tên<input type="text" name="full_name" required autocomplete="name" placeholder="Nguyễn Văn A"></label>
	<label>Số điện thoại / Zalo<input type="tel" name="phone" required autocomplete="tel" inputmode="tel" placeholder="09xx xxx xxx"></label>
	<?php if ( ! empty( $major_choices ) || $collect_birth_year ) : ?>
		<div class="lp-quick-form-row">
			<?php if ( ! empty( $major_choices ) ) : ?>
				<label>Ngành học <span class="field-optional">(tùy chọn)</span>
					<select name="major">
						<option value="">Chưa xác định</option>
						<?php foreach ( $major_choices as $choice ) : ?><option value="<?php echo esc_attr( $choice ); ?>"><?php echo esc_html( $choice ); ?></option><?php endforeach; ?>
					</select>
				</label>
			<?php endif; ?>
			<?php if ( $collect_birth_year ) : ?>
				<label>Năm sinh <span class="field-optional">(tùy chọn)</span><input type="text" name="birth_year" inputmode="numeric" maxlength="4" placeholder="2007"></label>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<button class="lp-button lp-button--block" type="submit"><?php echo esc_html( $args['button'] ); ?></button>
	<?php if ( ! empty( $args['note'] ) ) : ?><small><?php echo esc_html( $args['note'] ); ?></small><?php endif; ?>
</form>
