</main>

<?php
$landing_page      = letco_is_landing();
$landing_is_daeduk = letco_is_daeduk();
$landing_cta       = 'Đăng ký tư vấn';
// Landings sign up in their own form; other pages send visitors to the contact page.
$landing_cta_url   = $landing_page ? '#dang-ky' : home_url( '/lien-he/' );
// Every page shows the same contact block; the Daeduk page overrides it from its config.
$landing_contact   = array(
	'label'     => 'Phòng thị trường Châu Á',
	'partners'  => 'Du học LETCO – Đại học Công nghiệp Hà Nội (HaUI)',
	'phones'    => array( '0987882891', '0395662065' ),
	'addresses' => array( 'Phòng 103 - Toà A5 Đại học Công nghiệp Hà Nội' ),
	'website'   => 'https://letco.vn/',
);
$landing_zalo      = '0989086386';

if ( $landing_is_daeduk ) {
	$landing_configs = require get_template_directory() . '/template-parts/study-school-configs.php';
	if ( isset( $landing_configs['dai-hoc-daeduk'] ) ) {
		$landing_contact = isset( $landing_configs['dai-hoc-daeduk']['contact'] ) ? $landing_configs['dai-hoc-daeduk']['contact'] : $landing_contact;
		$landing_zalo    = isset( $landing_configs['dai-hoc-daeduk']['zalo'] ) ? $landing_configs['dai-hoc-daeduk']['zalo'] : $landing_zalo;
	}
}
?>
<?php if ( ! $landing_page ) : ?>
<section class="lp-site-cta">
	<div class="container lp-site-cta-inner">
		<div>
			<h2>Bạn cần một lộ trình phù hợp?</h2>
			<p>Tư vấn viên LETCO đối chiếu hồ sơ của bạn với chương trình học tập và việc làm phù hợp.</p>
		</div>
		<div class="lp-actions">
			<a class="lp-button" href="<?php echo esc_url( $landing_cta_url ); ?>"><?php echo esc_html( $landing_cta ); ?></a>
			<a class="lp-button lp-button--light" href="https://zalo.me/<?php echo esc_attr( $landing_zalo ); ?>" rel="noopener" target="_blank">Nhắn Zalo</a>
		</div>
	</div>
</section>
<?php endif; ?>
<footer class="lp-footer">
	<div class="container lp-footer-inner">
		<div class="lp-footer-brand">
			<img src="<?php echo letco_asset( 'logo.png' ); ?>" alt="LETCO" width="120" height="36">
			<p>Công ty TNHH Một thành viên Đào tạo và Cung ứng Nhân lực – HaUI. Đơn vị trực thuộc Đại học Công nghiệp Hà Nội.</p>
		</div>
		<?php if ( ! $landing_page ) : ?>
			<nav class="lp-footer-links" aria-label="Khám phá LETCO">
				<a href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>">Giới thiệu LETCO</a>
				<a href="<?php echo esc_url( home_url( '/cung-ung-nhan-luc/' ) ); ?>">Cung ứng nhân lực</a>
				<a href="<?php echo esc_url( home_url( '/du-hoc/' ) ); ?>">Chương trình du học</a>
				<a href="<?php echo esc_url( home_url( '/don-hang/' ) ); ?>">Đơn hàng tuyển dụng</a>
			</nav>
		<?php endif; ?>
		<?php if ( ! empty( $landing_contact ) ) : ?>
			<div class="study-contact lp-footer-contact">
				<p><?php echo esc_html( $landing_contact['partners'] ); ?></p>
				<?php if ( ! empty( $landing_contact['phones'] ) ) : ?>
					<p><strong>Hotline:</strong>
						<?php foreach ( $landing_contact['phones'] as $index => $phone ) : ?>
							<?php echo $index ? ' / ' : ''; ?><a href="tel:<?php echo esc_attr( preg_replace( '/\D+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
						<?php endforeach; ?>
					</p>
				<?php endif; ?>
				<?php if ( $landing_zalo ) : ?><p><strong>Zalo:</strong> <a href="https://zalo.me/<?php echo esc_attr( $landing_zalo ); ?>" rel="noopener" target="_blank">Nhắn Zalo cho tư vấn viên</a></p><?php endif; ?>
				<?php if ( ! empty( $landing_contact['addresses'] ) ) : ?>
					<?php foreach ( $landing_contact['addresses'] as $address ) : ?><p class="lp-footer-address"><?php echo esc_html( $address ); ?></p><?php endforeach; ?>
				<?php endif; ?>
				<?php if ( ! empty( $landing_contact['website'] ) ) : ?><p><strong>Website:</strong> <a href="<?php echo esc_url( $landing_contact['website'] ); ?>" rel="noopener"><?php echo esc_html( preg_replace( '#^https?://|/$#', '', $landing_contact['website'] ) ); ?></a></p><?php endif; ?>
			</div>
		<?php else : ?>
			<p>Phòng 103 - Toà A5 Đại học Công nghiệp Hà Nội</p>
		<?php endif; ?>
	</div>
	<div class="container lp-footer-bottom">
		<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> LETCO – HaUI</p>
		<span>Nguồn ảnh được ghi tại từng nội dung</span>
	</div>
</footer>
<div class="lp-mobile-cta">
	<a class="lp-button" href="<?php echo esc_url( $landing_cta_url ); ?>"><?php echo esc_html( $landing_cta ); ?></a>
	<a class="lp-button lp-button--light" href="https://zalo.me/<?php echo esc_attr( $landing_zalo ); ?>" rel="noopener" target="_blank">Zalo</a>
</div>
<button class="lp-to-top" type="button" data-to-top hidden>
	<svg aria-hidden="true" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
	<span class="screen-reader-text">Lên đầu trang</span>
</button>

<?php wp_footer(); ?>
</body>
</html>
