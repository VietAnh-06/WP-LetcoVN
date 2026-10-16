<?php
/**
 * Sign-up section shared by the homepage and the study-abroad landing pages.
 *
 * $args: lead (title, intro, bullets), contact (optional), lead_extra (bool),
 * program (hidden value) or program_choices (list shown as a select).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$lead            = $args['lead'];
$contact         = isset( $args['contact'] ) ? $args['contact'] : array();
$lead_extra      = ! empty( $args['lead_extra'] );
$zalo            = isset( $args['zalo'] ) ? $args['zalo'] : '';
$contact_in_footer = ! empty( $args['contact_in_footer'] );
$compact         = ! empty( $args['compact'] );
$button          = isset( $args['button'] ) ? $args['button'] : 'Gửi đăng ký';
$program         = isset( $args['program'] ) ? $args['program'] : '';
$program_choices = isset( $args['program_choices'] ) ? $args['program_choices'] : array();
$major_choices   = isset( $args['major_choices'] ) ? $args['major_choices'] : array();
$lead_status     = isset( $_GET['lead'] ) ? sanitize_key( wp_unslash( $_GET['lead'] ) ) : '';
?>
<section class="section study-lead-section" id="dang-ky">
	<div class="container study-lead-layout">
		<div class="study-lead-copy">
			<h2><?php echo esc_html( $lead['title'] ); ?></h2>
			<p><?php echo esc_html( $lead['intro'] ); ?></p>
			<ul><?php foreach ( $lead['bullets'] as $bullet ) : ?><li><?php echo esc_html( $bullet ); ?></li><?php endforeach; ?></ul>
			<?php if ( ! empty( $args['quick_contact'] ) ) : ?>
				<p class="study-lead-actions">
					<a class="lp-button lp-button--light" href="tel:<?php echo esc_attr( preg_replace( '/\D+/', '', $args['quick_contact'] ) ); ?>">Gọi <?php echo esc_html( $args['quick_contact'] ); ?></a>
					<?php if ( $zalo ) : ?><a class="lp-button lp-button--ghost" href="https://zalo.me/<?php echo esc_attr( $zalo ); ?>" rel="noopener" target="_blank">Nhắn Zalo</a><?php endif; ?>
				</p>
			<?php endif; ?>
			<?php if ( ! empty( $contact ) && ! $contact_in_footer ) : ?>
				<div class="study-contact">
					<p><strong><?php echo esc_html( isset( $contact['label'] ) ? $contact['label'] : 'Đơn vị tuyển sinh chính thức' ); ?>:</strong> <?php echo esc_html( $contact['partners'] ); ?></p>
					<p><strong><?php echo $zalo ? 'Hotline' : 'Hotline / Zalo'; ?>:</strong>
						<?php foreach ( $contact['phones'] as $index => $phone ) : ?>
							<?php echo $index ? ' / ' : ''; ?><a href="tel:<?php echo esc_attr( preg_replace( '/\D+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
						<?php endforeach; ?>
					</p>
					<?php if ( $zalo ) : ?><p><strong>Zalo:</strong> <a href="https://zalo.me/<?php echo esc_attr( $zalo ); ?>" rel="noopener" target="_blank">Nhắn Zalo cho tư vấn viên</a></p><?php endif; ?>
					<?php foreach ( $contact['addresses'] as $address ) : ?><p><?php echo esc_html( $address ); ?></p><?php endforeach; ?>
					<?php if ( ! empty( $contact['website'] ) ) : ?><p><strong>Website:</strong> <a href="<?php echo esc_url( $contact['website'] ); ?>" rel="noopener"><?php echo esc_html( preg_replace( '#^https?://|/$#', '', $contact['website'] ) ); ?></a></p><?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="study-lead-form-wrap" id="form-dang-ky">
			<?php if ( 'success' === $lead_status ) : ?><div class="form-notice form-success">Cảm ơn bạn! LETCO đã nhận được thông tin và sẽ sớm liên hệ.</div><?php endif; ?>
			<?php if ( 'error' === $lead_status ) : ?><div class="form-notice form-error">Vui lòng nhập đầy đủ họ tên và số điện thoại.</div><?php endif; ?>
			<?php if ( 'phone' === $lead_status ) : ?><div class="form-notice form-error">Số điện thoại chưa đúng. Vui lòng nhập số Việt Nam gồm 10 chữ số, ví dụ 0989 086 386.</div><?php endif; ?>
			<form class="study-lead-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<input type="hidden" name="action" value="letco_submit_lead">
				<?php if ( empty( $program_choices ) ) : ?>
					<input type="hidden" name="program" value="<?php echo esc_attr( $program ); ?>">
				<?php endif; ?>
				<input type="hidden" name="redirect_to" value="<?php echo esc_url( get_permalink() ); ?>">
				<?php wp_nonce_field( 'letco_submit_lead', 'letco_lead_nonce' ); ?>
				<div class="form-honeypot" aria-hidden="true"><label>Công ty<input type="text" name="company" tabindex="-1" autocomplete="off"></label></div>
				<label>Họ và tên <span>*</span><input type="text" name="full_name" required autocomplete="name" placeholder="Nguyễn Văn A"></label>
				<?php if ( $compact ) : ?>
					<label>Số điện thoại / Zalo <span>*</span><input type="tel" name="phone" required pattern="[\s.\-]*(\+?84|0)[\s.\-]*[35789]([\s.\-]*\d){8}[\s.\-]*" title="Số điện thoại Việt Nam gồm 10 chữ số, ví dụ 0989 086 386" data-phone autocomplete="tel" inputmode="tel" placeholder="09xx xxx xxx"></label>
					<?php if ( ! empty( $major_choices ) ) : ?>
						<div class="form-row">
							<label>Ngành học <span class="field-optional">(không bắt buộc)</span>
								<select name="major">
									<option value="">Chưa xác định</option>
									<?php foreach ( $major_choices as $choice ) : ?><option value="<?php echo esc_attr( $choice ); ?>"><?php echo esc_html( $choice ); ?></option><?php endforeach; ?>
								</select>
							</label>
							<label>Năm sinh <span class="field-optional">(không bắt buộc)</span><input type="text" name="birth_year" inputmode="numeric" maxlength="4" placeholder="2007"></label>
						</div>
					<?php endif; ?>
					<details class="study-lead-more">
						<summary>Thêm thông tin để tư vấn sát hơn (không bắt buộc)</summary>
						<label>Email<input type="email" name="email" autocomplete="email" placeholder="email@example.com"></label>
				<?php else : ?>
				<div class="form-row">
					<label>Số điện thoại <span>*</span><input type="tel" name="phone" required pattern="[\s.\-]*(\+?84|0)[\s.\-]*[35789]([\s.\-]*\d){8}[\s.\-]*" title="Số điện thoại Việt Nam gồm 10 chữ số, ví dụ 0989 086 386" data-phone autocomplete="tel" placeholder="09xx xxx xxx"></label>
					<label>Email<input type="email" name="email" autocomplete="email" placeholder="email@example.com"></label>
				</div>
				<?php endif; ?>
				<?php if ( ! empty( $program_choices ) ) : ?>
					<label>Chương trình quan tâm <span>*</span>
						<select name="program" required>
							<?php foreach ( $program_choices as $choice ) : ?><option value="<?php echo esc_attr( $choice ); ?>"><?php echo esc_html( $choice ); ?></option><?php endforeach; ?>
						</select>
					</label>
				<?php endif; ?>
				<?php if ( ! empty( $lead_extra ) ) : ?>
					<?php if ( empty( $major_choices ) ) : ?>
						<div class="form-row">
							<label>Năm sinh<input type="text" name="birth_year" inputmode="numeric" maxlength="4" placeholder="2007"></label>
							<label>Điểm GPA THPT<input type="text" name="gpa" inputmode="decimal" maxlength="4" placeholder="7.5"></label>
						</div>
					<?php else : ?>
						<label>Điểm GPA THPT<input type="text" name="gpa" inputmode="decimal" maxlength="4" placeholder="7.5"></label>
					<?php endif; ?>
					<fieldset class="study-choice-group">
						<legend>Trình độ tiếng Hàn hiện tại</legend>
						<?php foreach ( array( 'Chưa học', 'Đang học', 'Có TOPIK 1/2' ) as $level ) : ?>
							<label><input type="radio" name="korean_level" value="<?php echo esc_attr( $level ); ?>"> <?php echo esc_html( $level ); ?></label>
						<?php endforeach; ?>
					</fieldset>
				<?php endif; ?>
				<label>Điều bạn đang quan tâm<textarea name="message" rows="4" placeholder="Kỳ nhập học, bậc học, ngành học..."></textarea></label>
				<?php if ( $compact ) : ?></details><?php endif; ?>
				<button class="lp-button lp-button--block" type="submit"><?php echo esc_html( $button ); ?></button>
				<small>Bằng việc gửi thông tin, bạn đồng ý để LETCO liên hệ phục vụ nhu cầu tư vấn.</small>
			</form>
		</div>
	</div>
</section>
