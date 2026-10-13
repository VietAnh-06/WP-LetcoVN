</main>

<?php if ( letco_is_landing() ) : ?>
	<?php
	$landing_is_daeduk = is_page( 'dai-hoc-daeduk' );
	$landing_cta       = $landing_is_daeduk ? 'Nhận tư vấn lộ trình phù hợp' : 'Đăng ký tư vấn';
	$landing_contact   = array();
	$landing_zalo      = '0989086386';

	if ( $landing_is_daeduk ) {
		$landing_configs = require get_template_directory() . '/template-parts/study-school-configs.php';
		if ( isset( $landing_configs['dai-hoc-daeduk'] ) ) {
			$landing_contact = isset( $landing_configs['dai-hoc-daeduk']['contact'] ) ? $landing_configs['dai-hoc-daeduk']['contact'] : array();
			$landing_zalo    = isset( $landing_configs['dai-hoc-daeduk']['zalo'] ) ? $landing_configs['dai-hoc-daeduk']['zalo'] : $landing_zalo;
		}
	}
	?>
<footer class="lp-footer">
	<div class="container lp-footer-inner">
		<div class="lp-footer-brand">
			<img src="<?php echo letco_asset( 'logo.png' ); ?>" alt="LETCO" width="120" height="36">
			<p>Công ty TNHH Một thành viên Đào tạo và Cung ứng Nhân lực – HaUI. Đơn vị trực thuộc Đại học Công nghiệp Hà Nội.</p>
		</div>
		<?php if ( ! empty( $landing_contact ) ) : ?>
			<div class="study-contact lp-footer-contact">
				<p><strong><?php echo esc_html( isset( $landing_contact['label'] ) ? $landing_contact['label'] : 'Đơn vị tuyển sinh chính thức' ); ?>:</strong> <?php echo esc_html( $landing_contact['partners'] ); ?></p>
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
			<p>Nhà A5, Đại học Công nghiệp Hà Nội, 298 Cầu Diễn, Tây Tựu, Hà Nội</p>
		<?php endif; ?>
	</div>
	<div class="container lp-footer-bottom">
		<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> LETCO – HaUI</p>
		<a href="<?php echo esc_url( home_url( '/nguon-anh/' ) ); ?>">Nguồn ảnh</a>
	</div>
</footer>
<div class="lp-mobile-cta">
	<a class="lp-button" href="#form-dang-ky"><?php echo esc_html( $landing_cta ); ?></a>
	<a class="lp-button lp-button--light" href="https://zalo.me/<?php echo esc_attr( $landing_zalo ); ?>" rel="noopener" target="_blank">Zalo</a>
</div>
<?php else : ?>
<section class="footer-cta">
	<div class="container footer-cta-inner">
		<div>
			<span class="eyebrow eyebrow-light">Bắt đầu hành trình quốc tế</span>
			<h2>Bạn cần một lộ trình phù hợp?</h2>
			<p>Đội ngũ LETCO sẵn sàng tư vấn chương trình học tập và việc làm dành riêng cho bạn.</p>
		</div>
		<a class="button button-light" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>">Nhận tư vấn miễn phí</a>
	</div>
</section>

<footer class="site-footer">
	<div class="container footer-grid">
		<div class="footer-brand">
			<img src="<?php echo letco_asset( 'logo-white.png' ); ?>" alt="LETCO">
			<p>Công ty TNHH Một thành viên Đào tạo và Cung ứng Nhân lực – HaUI.</p>
			<p class="footer-slogan">Đổi mới · Sáng tạo · Hội nhập · Phát triển bền vững</p>
		</div>
		<div>
			<h3>Khám phá</h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>">Giới thiệu LETCO</a></li>
				<li><a href="<?php echo esc_url( home_url( '/cung-ung-nhan-luc/' ) ); ?>">Cung ứng nhân lực</a></li>
				<li><a href="<?php echo esc_url( home_url( '/du-hoc/' ) ); ?>">Chương trình du học</a></li>
				<li><a href="<?php echo esc_url( home_url( '/don-hang/' ) ); ?>">Đơn hàng tuyển dụng</a></li>
			</ul>
		</div>
		<div>
			<h3>Liên hệ</h3>
			<ul class="contact-list">
				<li>Nhà A5, Đại học Công nghiệp Hà Nội, 298 Cầu Diễn, Tây Tựu, Hà Nội</li>
				<li><a href="tel:02437638154">(84.24) 3763 8154</a></li>
				<li><a href="mailto:haui@letco.vn">haui@letco.vn</a></li>
			</ul>
		</div>
	</div>
	<div class="container footer-bottom">
		<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> LETCO – HaUI. All rights reserved.</p>
		<div class="footer-bottom-links"><a href="<?php echo esc_url( home_url( '/nguon-anh/' ) ); ?>">Nguồn ảnh</a><a href="#main-content">Lên đầu trang ↑</a></div>
	</div>
</footer>

<div class="floating-contact" aria-label="Liên hệ nhanh">
	<a class="floating-zalo" href="https://zalo.me/0346753345" target="_blank" rel="noopener">Zalo</a>
	<a class="floating-phone" href="tel:02437638154" aria-label="Gọi LETCO">☎</a>
</div>

<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
