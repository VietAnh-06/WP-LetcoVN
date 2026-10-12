</main>

<?php if ( letco_is_landing() ) : ?>
<footer class="lp-footer">
	<div class="container lp-footer-inner">
		<div>
			<img src="<?php echo letco_asset( 'logo.png' ); ?>" alt="LETCO" width="120" height="36">
			<p>Công ty TNHH Một thành viên Đào tạo và Cung ứng Nhân lực – HaUI. Đơn vị trực thuộc Đại học Công nghiệp Hà Nội.</p>
		</div>
		<p>Nhà A5, Đại học Công nghiệp Hà Nội, 298 Cầu Diễn, Tây Tựu, Hà Nội</p>
	</div>
	<div class="container lp-footer-bottom">
		<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> LETCO – HaUI</p>
		<a href="<?php echo esc_url( home_url( '/nguon-anh/' ) ); ?>">Nguồn ảnh</a>
	</div>
</footer>
<div class="lp-mobile-cta">
	<a class="lp-button" href="#form-dang-ky">Đăng ký tư vấn</a>
	<a class="lp-button lp-button--light" href="https://zalo.me/0989086386" rel="noopener" target="_blank">Zalo</a>
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

