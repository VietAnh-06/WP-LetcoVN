<?php
/**
 * Consultation popup: shows the result after a submission. It opens on its own only when
 * the page sets popup_delay above 0, or once when the reader reaches popup_trigger (a selector). $args: data (page config), lead_status ('', 'success' or 'error').
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$data        = $args['data'];
$lead_status = $args['lead_status'];
?>
<div class="lp-consult-modal" data-consult-modal data-modal-delay="<?php echo $lead_status ? '150' : esc_attr( isset( $data['popup_delay'] ) ? $data['popup_delay'] : 0 ); ?>"<?php echo ( ! $lead_status && ! empty( $data['popup_trigger'] ) ) ? ' data-modal-trigger="' . esc_attr( $data['popup_trigger'] ) . '"' : ''; ?> hidden>
	<div class="lp-consult-modal-backdrop" data-consult-close></div>
	<section class="lp-consult-dialog" role="dialog" aria-modal="true" aria-labelledby="daeduk-consult-title" tabindex="-1">
		<button class="lp-consult-close" type="button" data-consult-close aria-label="Đóng form tư vấn">×</button>
		<p class="lp-consult-kicker">Tư vấn Daeduk · K-Tech Bridge</p>
		<?php if ( 'success' === $lead_status ) : ?>
			<h2 id="daeduk-consult-title">LETCO đã nhận được thông tin</h2>
			<p class="lp-consult-intro">Cảm ơn bạn. Chuyên viên LETCO sẽ liên hệ để đối chiếu hồ sơ và tư vấn lộ trình phù hợp.</p>
			<button class="lp-button lp-button--block" type="button" data-consult-close>Tiếp tục xem chương trình</button>
		<?php else : ?>
			<h2 id="daeduk-consult-title">Kiểm tra lộ trình phù hợp với bạn</h2>
			<p class="lp-consult-intro lp-consult-intro--form">Để lại họ tên và số điện thoại/Zalo. LETCO sẽ liên hệ để đối chiếu điều kiện, kỳ nhập học và dự toán chi phí.</p>
			<p class="lp-consult-intro lp-consult-intro--contact">Gọi hoặc nhắn Zalo để tư vấn viên LETCO đối chiếu điều kiện, kỳ nhập học và dự toán chi phí cho bạn.</p>
			<?php if ( 'error' === $lead_status ) : ?><div class="form-notice form-error">Vui lòng nhập đầy đủ họ tên và số điện thoại.</div><?php endif; ?>
			<?php if ( 'phone' === $lead_status ) : ?><div class="form-notice form-error">Số điện thoại chưa đúng. Vui lòng nhập số Việt Nam gồm 10 chữ số, ví dụ 0989 086 386.</div><?php endif; ?>
			<?php get_template_part( 'template-parts/quick', 'form', array( 'program' => 'Du học ' . $data['name'], 'button' => isset( $data['primary_cta'] ) ? $data['primary_cta'] : 'Nhận tư vấn', 'note' => 'Thông tin được dùng để LETCO liên hệ phục vụ nhu cầu tư vấn.', 'major_choices' => ! empty( $data['majors'] ) ? wp_list_pluck( $data['majors'], 'name' ) : array(), 'collect_birth_year' => true ) ); ?>
		<?php endif; ?>
	</section>
</div>
