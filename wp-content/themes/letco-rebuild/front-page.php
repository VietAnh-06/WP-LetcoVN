<?php
/**
 * Homepage: entry point to the three study-abroad landing pages.
 * Links only to those pages; the rest of the site stays reachable by URL.
 */

get_header();

$programs = array(
	array(
		'url'   => '/du-hoc/du-hoc-han-quoc/',
		'image' => 'home-korea-gate.jpg',
		'name'  => 'Du học Hàn Quốc',
		'text'  => 'Hệ tiếng D-4, hệ nghề D-4-6 và chuyên ngành D-2 tại hơn 20 trường đại học đối tác ở Seoul, Busan, Daegu, Incheon, Daejeon.',
		'value' => '180 – 400 triệu VNĐ',
		'label' => 'Tổng chi phí dự trù năm đầu',
	),
	array(
		'url'   => '/du-hoc/du-hoc-nhat-ban/',
		'image' => 'home-japan-city.jpg',
		'name'  => 'Du học Nhật Bản',
		'text'  => 'Trường Nhật ngữ, trường chuyên môn, đại học và lộ trình Visa Kỹ sư, Kỹ năng đặc định.',
		'value' => '6 lộ trình',
		'label' => 'Từ học tiếng đến làm việc',
	),
	array(
		'url'   => '/du-hoc/du-hoc-han-quoc/dai-hoc-daeduk/',
		'image' => 'home-daeduk-class.jpg',
		'name'  => 'Du học song hành Đại học Daeduk',
		'text'  => '80% thời gian học tập và thực tế tại doanh nghiệp Hàn Quốc, lộ trình chuyển đổi Visa E-7-1.',
		'value' => '~40 triệu VNĐ/tháng',
		'label' => 'Thu nhập thực tập',
	),
);

$reasons = array(
	array( 'Trực thuộc Đại học Công nghiệp Hà Nội', 'Doanh nghiệp nhà nước với 25 năm kinh nghiệm tư vấn du học và hợp tác quốc tế, không phải trung tâm môi giới tự phát.' ),
	array( 'Minh bạch tài chính', 'Bảng dự trù chi phí lập theo từng trường và thành phố; mọi khoản thu ghi rõ trong hợp đồng và xuất hóa đơn đỏ.' ),
	array( 'Học tiếng ngay tại HaUI', 'Trung tâm đào tạo tiếng đặt trong khuôn viên trường, giúp học viên có nền tảng ngôn ngữ vững chắc trước khi bay.' ),
	array( 'Đồng hành tại nước ngoài', 'Hỗ trợ thẻ cư trú, bảo hiểm y tế, giấy phép làm thêm đúng luật và kết nối cộng đồng sinh viên Việt Nam.' ),
);

$quotes = array(
	array( 'avatar-handa.jpg', 'Tôi đã đi thăm khoảng 80 công ty tại Hải Phòng, Hà Nội, Đà Nẵng, Hồ Chí Minh và nhận thấy chất lượng thực tập sinh của LETCO là tốt nhất, nên đã quyết định hợp tác với LETCO.', 'Ông Handa', 'Chủ tịch Nghiệp đoàn International' ),
	array( 'avatar-dang-thi-phuong.jpg', 'Trong giai đoạn dịch Covid 19, LETCO đã hỗ trợ chi phí sinh hoạt và nơi ăn chốn ở, đảm bảo an toàn cho con trai tôi và các học viên khác.', 'Bà Đặng Thị Phương', 'Phụ huynh học viên' ),
	array( 'avatar-kikawa.jpg', 'Học viên LETCO được đào tạo tiếng Nhật rất bài bản, nên khi sang đây các em không gặp nhiều khó khăn.', 'Ông Kikawa', 'Trường Nhật ngữ Tochinoki' ),
);

get_template_part(
	'template-parts/landing',
	'header',
	array(
		'links'   => array(
			'chuong-trinh' => 'Chương trình',
			'vi-sao'       => 'Vì sao LETCO',
			'cam-nhan'     => 'Cảm nhận',
		),
		'hotline' => '0989.086.386',
	)
);
?>

<div class="study-landing study-korea lp-home jd-page">
	<section class="lp-hero">
		<div class="container lp-hero-grid">
			<div class="lp-hero-copy">
				<p class="lp-kicker">LETCO – Đại học Công nghiệp Hà Nội</p>
				<h1>Du học Hàn Quốc và Nhật Bản cùng đơn vị trực thuộc HaUI</h1>
				<p class="lp-lede">25 năm đồng hành cùng học sinh và phụ huynh, từ định hướng, đào tạo tiếng tại HaUI, hồ sơ visa đến khi ổn định học tập và làm việc ở nước ngoài.</p>
				<div class="lp-actions">
					<a class="lp-button" href="#dang-ky">Đăng ký tư vấn</a>
					<a class="lp-link" href="#chuong-trinh">Xem chương trình</a>
				</div>
			</div>
			<figure class="lp-hero-media">
				<img src="<?php echo letco_asset( 'about.jpg' ); ?>" alt="Đội ngũ LETCO tại Đại học Công nghiệp Hà Nội" fetchpriority="high">
			</figure>
		</div>
	</section>

	<section class="lp-facts" aria-label="Điểm nổi bật">
		<div class="container">
			<ul class="lp-facts-list">
				<li><strong>25 năm</strong><span>Kinh nghiệm tư vấn du học và hợp tác quốc tế</span></li>
				<li><span>100% vốn Nhà nước</span></li>
				<li><span>Đối tác của hơn 20 đại học Hàn Quốc</span></li>
				<li><span>Hợp đồng rõ ràng, có hóa đơn</span></li>
			</ul>
		</div>
	</section>

	<section class="section lp-programs" id="chuong-trinh">
		<div class="container">
			<div class="section-heading">
				<h2>Chọn chương trình phù hợp</h2>
				<p>Mỗi chương trình có trang riêng với điều kiện, chi phí, học bổng và lộ trình chi tiết.</p>
			</div>
			<div class="lp-program-grid">
				<?php foreach ( $programs as $index => $program ) : ?>
					<a class="lp-program<?php echo 0 === $index ? ' lp-program--lead' : ''; ?>" href="<?php echo esc_url( home_url( $program['url'] ) ); ?>">
						<img src="<?php echo letco_asset( $program['image'] ); ?>" alt="" loading="lazy">
						<div class="lp-program-copy">
							<h3><?php echo esc_html( $program['name'] ); ?></h3>
							<p><?php echo esc_html( $program['text'] ); ?></p>
							<dl><dt><?php echo esc_html( $program['label'] ); ?></dt><dd><?php echo esc_html( $program['value'] ); ?></dd></dl>
							<span class="lp-program-more">Xem chương trình</span>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section study-benefits" id="vi-sao">
		<div class="container">
			<div class="section-heading">
				<h2>Vì sao các gia đình chọn LETCO</h2>
				<p>Lộ trình toàn diện, chi phí minh bạch, doanh nghiệp 100% vốn Nhà nước.</p>
				<p class="section-heading-action"><a class="lp-button" href="#dang-ky">Đăng ký tư vấn</a></p>
			</div>
			<div class="study-benefit-grid">
				<?php foreach ( $reasons as $reason ) : ?>
					<article><h3><?php echo esc_html( $reason[0] ); ?></h3><p><?php echo esc_html( $reason[1] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section lp-quotes" id="cam-nhan">
		<div class="container">
			<div class="section-heading">
				<h2>Phụ huynh và đối tác nói về LETCO</h2>
			</div>
			<div class="lp-quote-grid">
				<?php foreach ( $quotes as $index => $quote ) : ?>
					<figure class="lp-quote<?php echo 0 === $index ? ' lp-quote--lead' : ''; ?>">
						<blockquote><p><?php echo esc_html( $quote[1] ); ?></p></blockquote>
						<figcaption>
							<img src="<?php echo letco_asset( $quote[0] ); ?>" alt="" width="48" height="48" loading="lazy">
							<span><strong><?php echo esc_html( $quote[2] ); ?></strong><?php echo esc_html( $quote[3] ); ?></span>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	get_template_part(
		'template-parts/lead',
		'form',
		array(
			'lead'            => array(
				'title'   => 'Nhận tư vấn lộ trình du học miễn phí',
				'intro'   => 'Để lại thông tin, chuyên viên LETCO sẽ đánh giá hồ sơ và gợi ý chương trình phù hợp với học lực và ngân sách của gia đình.',
				'bullets' => array( 'Đánh giá hồ sơ dựa trên GPA, tuổi và học bạ THPT', 'Gợi ý 3–5 trường vừa sức, đúng định hướng ngành nghề', 'Bảng dự trù chi phí chi tiết cho năm đầu tiên' ),
			),
			'contact'         => array(
				'label'     => 'Đơn vị tư vấn',
				'partners'  => 'LETCO – Đại học Công nghiệp Hà Nội (HaUI)',
				'phones'    => array( '0989.086.386' ),
				'addresses' => array( 'Tòa nhà A5, Số 298 Đường Cầu Diễn, Phường Tây Tựu, Hà Nội' ),
			),
			'program_choices' => array( 'Du học Hàn Quốc', 'Du học Nhật Bản', 'Du học song hành Đại học Daeduk', 'Chưa xác định' ),
		)
	);
	?>
</div>

<?php get_footer(); ?>
