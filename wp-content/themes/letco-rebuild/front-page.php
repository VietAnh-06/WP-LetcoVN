<?php
get_header();

$services = array(
	array(
		'number' => '01',
		'title'  => 'Cung ứng nhân lực',
		'text'   => 'Kết nối người lao động Việt Nam với cơ hội nghề nghiệp bền vững tại Nhật Bản, Hàn Quốc, Đài Loan và châu Âu.',
		'link'   => home_url( '/cung-ung-nhan-luc/' ),
	),
	array(
		'number' => '02',
		'title'  => 'Tư vấn du học',
		'text'   => 'Đồng hành từ chọn trường, chuẩn bị hồ sơ, đào tạo ngoại ngữ đến khi học viên ổn định cuộc sống tại nước ngoài.',
		'link'   => home_url( '/du-hoc/' ),
	),
	array(
		'number' => '03',
		'title'  => 'Đào tạo ngắn hạn',
		'text'   => 'Các chương trình ngoại ngữ và kỹ năng nghề thực tiễn, giúp học viên sẵn sàng cho môi trường học tập và làm việc quốc tế.',
		'link'   => home_url( '/dao-tao/' ),
	),
);

$news = array(
	array(
		'image' => 'news-germany.png',
		'tag'   => 'Du học châu Âu',
		'title' => 'Du học nghề Đức: 3 sai lầm phổ biến và sự thật bạn cần biết',
		'date'  => '02/10/2026',
		'text'  => 'Một lộ trình thực tế để hiểu đúng về điều kiện, chi phí và cơ hội nghề nghiệp khi lựa chọn du học nghề Đức.',
	),
	array(
		'image' => 'news-korea.jpg',
		'tag'   => 'Hợp tác quốc tế',
		'title' => 'HaUI ký kết hợp tác với Đại học Daeduk, mở rộng cơ hội du học – thực tập tại Hàn Quốc',
		'date'  => '29/09/2026',
	),
	array(
		'image' => 'news-sports.jpg',
		'tag'   => 'LETCO News',
		'title' => 'LETCO tham gia Hội thao HaUI 2026: Sôi nổi, đoàn kết và fair play',
		'date'  => '26/09/2026',
	),
);

$jobs = array(
	array( 'image' => 'job-kagoshima.jpg', 'market' => 'Nhật Bản', 'title' => 'Nữ làm điện tử tại Kagoshima', 'salary' => '175.560 Yên/tháng', 'quantity' => '03 nữ', 'location' => 'Kagoshima', 'deadline' => 'Tuyển sớm' ),
	array( 'image' => 'job-germany.jpg', 'market' => 'CHLB Đức', 'title' => 'Du học nghề và làm việc tại Đức', 'salary' => 'Từ 2.500 Euro/tháng', 'quantity' => '50 học viên', 'location' => 'CHLB Đức', 'deadline' => 'Liên tục' ),
	array( 'image' => 'job-electronics.jpg', 'market' => 'Nhật Bản', 'title' => 'Lắp ráp linh kiện điện tử', 'salary' => '161.280 Yên/tháng', 'quantity' => '11 nữ', 'location' => 'Kagoshima', 'deadline' => 'Tuyển sớm' ),
	array( 'image' => 'job-warehouse.jpg', 'market' => 'Nhật Bản', 'title' => 'Quản lý kho, phân loại hàng hóa', 'salary' => '179.316 Yên/tháng', 'quantity' => '07 lao động', 'location' => 'Ishikawa', 'deadline' => 'Tuyển gấp' ),
	array( 'image' => 'job-kagoshima.jpg', 'market' => 'Nhật Bản', 'title' => 'Nam làm san lấp, đào xới tại Kyushu', 'salary' => '1.125 Yên/giờ', 'quantity' => '06 nam', 'location' => 'Kyushu', 'deadline' => 'Tuyển sớm' ),
	array( 'image' => 'news-europe.png', 'market' => 'Châu Âu', 'title' => 'Chương trình du học và làm việc tại châu Âu', 'salary' => 'Từ 1.000 Euro/tháng', 'quantity' => 'Liên tục', 'location' => 'Châu Âu', 'deadline' => 'Liên tục' ),
);

$testimonials = array(
	array(
		'quote' => 'Mình lựa chọn du học Nhật Bản vì yêu thích văn hóa và phong cách sống. Quá trình học tại LETCO giúp mình tự tin hơn trước khi lên đường.',
		'name'  => 'Quốc Toàn',
		'role'  => 'Thực tập sinh',
		'image' => 'avatar-student.jpg',
	),
	array(
		'quote' => 'Cảm ơn LETCO và các thầy cô đã giúp chúng em chuẩn bị hành trang vững chắc để bắt đầu công việc tại Nhật Bản.',
		'name'  => 'Nguyễn Hữu Tấn',
		'role'  => 'Kỹ thuật viên',
		'image' => 'avatar-engineer.png',
	),
	array(
		'quote'    => 'Gia đình tôi tin tưởng LETCO đã đồng hành, hỗ trợ để con trai hoàn thiện hồ sơ và thực hiện ước mơ làm kỹ sư tại Nhật Bản.',
		'name'     => 'Ông Nguyễn Minh Hải',
		'role'     => 'Phụ huynh học viên',
		'initials' => 'MH',
	),
	array(
		'quote'    => 'LETCO hỗ trợ học viên rất kịp thời về nơi ở và sinh hoạt trong giai đoạn khó khăn. Gia đình chúng tôi thực sự trân trọng sự đồng hành ấy.',
		'name'     => 'Bà Đặng Thị Phương',
		'role'     => 'Phụ huynh học viên',
		'initials' => 'TP',
	),
	array(
		'quote'    => 'Các thầy cô luôn tận tâm chỉ dẫn. Từ chỗ chưa hứng thú, tiếng Nhật với em giờ không chỉ là nhiệm vụ mà còn trở thành niềm đam mê.',
		'name'     => 'Trần Nho Hoàng',
		'role'     => 'Thực tập sinh',
		'initials' => 'NH',
	),
	array(
		'quote'    => 'Học viên LETCO được đào tạo tiếng Nhật bài bản, có thái độ học tập nghiêm túc và khả năng thích nghi tốt khi sang Nhật Bản.',
		'name'     => 'Ông Kikawa',
		'role'     => 'Trường Nhật ngữ Tochinoki',
		'initials' => 'K',
	),
);

$partners = array(
	array( 'image' => 'partner-1.jpg', 'name' => 'Waseda University' ),
	array( 'image' => 'partner-2.jpg', 'name' => 'Honda' ),
	array( 'image' => 'partner-3.jpg', 'name' => 'Dongguk University' ),
	array( 'image' => 'partner-4.jpg', 'name' => 'Ajou University' ),
	array( 'image' => 'partner-5.jpg', 'name' => 'Toyota' ),
	array( 'image' => 'partner-6.jpg', 'name' => 'Hitachi' ),
	array( 'image' => 'partner-7.jpg', 'name' => 'Mazda' ),
	array( 'image' => 'partner-8.jpg', 'name' => 'Isuzu' ),
);
?>

<section class="hero" aria-label="LETCO - Tựu trường quốc tế">
	<div class="hero-media" data-hero-slider data-interval="5000" role="region" aria-roledescription="carousel" aria-label="Chương trình nổi bật của LETCO">
		<div class="hero-slides" aria-live="off">
			<figure class="hero-slide is-active" data-hero-slide aria-hidden="false">
				<img src="<?php echo letco_asset( 'hero-program.jpg' ); ?>" alt="LETCO - Tựu trường quốc tế, học bổng trao tay">
			</figure>
			<figure class="hero-slide" data-hero-slide aria-hidden="true">
				<img src="<?php echo letco_asset( 'hero-study.jpg' ); ?>" alt="LETCO tuyển sinh du học Hàn Quốc">
			</figure>
			<figure class="hero-slide" data-hero-slide aria-hidden="true">
				<img src="<?php echo letco_asset( 'hero-global.png' ); ?>" alt="LETCO - Kết nối tri thức, khởi nghiệp tại Đức">
			</figure>
			<figure class="hero-slide" data-hero-slide aria-hidden="true">
				<img src="<?php echo letco_asset( 'hero-training.jpg' ); ?>" alt="LETCO tuyển sinh đào tạo nghề">
			</figure>
		</div>
		<button class="hero-arrow hero-arrow-prev" type="button" data-hero-prev aria-label="Xem banner trước">‹</button>
		<button class="hero-arrow hero-arrow-next" type="button" data-hero-next aria-label="Xem banner tiếp theo">›</button>
		<div class="hero-dots" role="group" aria-label="Chọn banner">
			<button class="is-active" type="button" data-hero-dot="0" aria-label="Banner 1" aria-current="true"></button>
			<button type="button" data-hero-dot="1" aria-label="Banner 2" aria-current="false"></button>
			<button type="button" data-hero-dot="2" aria-label="Banner 3" aria-current="false"></button>
			<button type="button" data-hero-dot="3" aria-label="Banner 4" aria-current="false"></button>
		</div>
	</div>
	<div class="container hero-actions">
		<div class="hero-action-card">
			<span>Chương trình 2026</span>
			<strong>Học tập và làm việc toàn cầu</strong>
		</div>
		<a class="button" href="<?php echo esc_url( home_url( '/du-hoc/' ) ); ?>">Khám phá chương trình</a>
	</div>
</section>

<section class="trust-strip" aria-label="Năng lực LETCO">
	<div class="container trust-grid">
		<div><strong>26</strong><span>Năm thành lập</span></div>
		<div><strong>10.000+</strong><span>Học viên & lao động</span></div>
		<div><strong>12+</strong><span>Thị trường quốc tế</span></div>
		<div><strong>200+</strong><span>Đối tác tin cậy</span></div>
	</div>
</section>

<section class="section services-section">
	<div class="container">
		<div class="section-heading section-heading-center">
			<span class="eyebrow">Lĩnh vực hoạt động</span>
			<h2>Mở lối cho hành trình <em>vươn ra thế giới</em></h2>
			<p>LETCO xây dựng hệ sinh thái đào tạo, tư vấn và kết nối việc làm đồng bộ cho học sinh, sinh viên và người lao động Việt Nam.</p>
		</div>
		<div class="service-grid">
			<?php foreach ( $services as $service ) : ?>
				<a class="service-card" href="<?php echo esc_url( $service['link'] ); ?>">
					<span class="service-number"><?php echo esc_html( $service['number'] ); ?></span>
					<h3><?php echo esc_html( $service['title'] ); ?></h3>
					<p><?php echo esc_html( $service['text'] ); ?></p>
					<span class="text-link">Tìm hiểu thêm <span>→</span></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section news-section">
	<div class="container">
		<div class="section-heading heading-row">
			<div>
				<span class="eyebrow">Cập nhật mới nhất</span>
				<h2>Tin tức & hoạt động</h2>
			</div>
			<a class="text-link" href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>">Xem tất cả tin <span>→</span></a>
		</div>
		<div class="news-layout">
			<article class="featured-news">
				<a class="news-image" href="#">
					<img src="<?php echo letco_asset( $news[0]['image'] ); ?>" alt="<?php echo esc_attr( $news[0]['title'] ); ?>">
				</a>
				<div class="news-copy">
					<div class="meta"><span><?php echo esc_html( $news[0]['tag'] ); ?></span><time><?php echo esc_html( $news[0]['date'] ); ?></time></div>
					<h3><a href="#"><?php echo esc_html( $news[0]['title'] ); ?></a></h3>
					<p><?php echo esc_html( $news[0]['text'] ); ?></p>
				</div>
			</article>
			<div class="news-stack">
				<?php foreach ( array_slice( $news, 1 ) as $item ) : ?>
					<article class="news-card">
						<a class="news-thumb" href="#"><img src="<?php echo letco_asset( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>"></a>
						<div>
							<div class="meta"><span><?php echo esc_html( $item['tag'] ); ?></span><time><?php echo esc_html( $item['date'] ); ?></time></div>
							<h3><a href="#"><?php echo esc_html( $item['title'] ); ?></a></h3>
						</div>
					</article>
				<?php endforeach; ?>
				<article class="news-brief">
					<span class="news-brief-icon">↗</span>
					<div>
						<span>LETCO News</span>
						<h3><a href="#">Kết nối thị trường Bulgari – Mở thêm cơ hội việc làm cho sinh viên Việt Nam</a></h3>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>

<section class="section jobs-section">
	<div class="container">
		<div class="section-heading heading-row heading-light">
			<div>
				<span class="eyebrow eyebrow-light">Cơ hội đang tuyển</span>
				<h2>Đơn hàng nổi bật</h2>
			</div>
			<a class="text-link text-link-light" href="<?php echo esc_url( home_url( '/don-hang/' ) ); ?>">Xem tất cả đơn hàng <span>→</span></a>
		</div>
		<div class="content-carousel content-carousel--three jobs-carousel" data-content-carousel data-interval="3000">
			<div class="content-carousel-viewport" role="region" aria-label="Đơn hàng nổi bật">
				<div class="jobs-grid content-carousel-track" data-carousel-track>
					<?php foreach ( $jobs as $job ) : ?>
						<article class="job-card">
							<div class="job-image"><img src="<?php echo letco_asset( $job['image'] ); ?>" alt="<?php echo esc_attr( $job['title'] ); ?>"><span><?php echo esc_html( $job['market'] ); ?></span></div>
							<div class="job-copy">
								<h3><?php echo esc_html( $job['title'] ); ?></h3>
								<dl>
									<div><dt>Thu nhập</dt><dd><?php echo esc_html( $job['salary'] ); ?></dd></div>
									<div><dt>Số lượng</dt><dd><?php echo esc_html( $job['quantity'] ); ?></dd></div>
									<div><dt>Nơi làm việc</dt><dd><?php echo esc_html( $job['location'] ); ?></dd></div>
									<div><dt>Thời hạn</dt><dd><?php echo esc_html( $job['deadline'] ); ?></dd></div>
								</dl>
								<a class="text-link" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>">Đăng ký ứng tuyển <span>→</span></a>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="content-carousel-controls">
				<button type="button" data-carousel-prev aria-label="Xem nhóm đơn hàng trước">‹</button>
				<div class="content-carousel-dots" data-carousel-dots aria-label="Chọn nhóm đơn hàng"></div>
				<button type="button" data-carousel-next aria-label="Xem nhóm đơn hàng tiếp theo">›</button>
			</div>
		</div>
	</div>
</section>

<section class="section about-section">
	<div class="container about-grid">
		<div class="about-media">
			<img src="<?php echo letco_asset( 'about.jpg' ); ?>" alt="Hoạt động của LETCO">
			<div class="about-badge"><strong>26</strong><span>Năm thành lập</span></div>
		</div>
		<div class="about-copy">
			<span class="eyebrow">Về LETCO</span>
			<h2>Niềm tin tạo nên những hành trình bền vững</h2>
			<p>Công ty TNHH Một thành viên Đào tạo và Cung ứng Nhân lực – HaUI được thành lập ngày 29/11/2000. LETCO là cầu nối giữa đào tạo, người học và các nhà tuyển dụng trong nước, quốc tế.</p>
			<p>Chúng tôi lấy thành công của khách hàng làm thước đo chất lượng, xây dựng dịch vụ trên nền tảng chuyên nghiệp, minh bạch và đồng hành lâu dài.</p>
			<ul class="check-list">
				<li>Quy trình tư vấn và đào tạo khép kín</li>
				<li>Mạng lưới đối tác quốc tế uy tín</li>
				<li>Đội ngũ tận tâm, giàu kinh nghiệm</li>
			</ul>
			<a class="button button-outline" href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>">Tìm hiểu về LETCO</a>
		</div>
	</div>
</section>

<section class="section testimonial-section">
	<div class="container">
		<div class="section-heading section-heading-center">
			<span class="eyebrow">Câu chuyện thật</span>
			<h2>Khách hàng nói về LETCO</h2>
			<p>Những chia sẻ từ học viên, phụ huynh và đối tác đã đồng hành cùng LETCO trên hành trình học tập và làm việc quốc tế.</p>
		</div>
		<div class="content-carousel content-carousel--three testimonial-carousel" data-content-carousel data-interval="3000">
			<div class="content-carousel-viewport" role="region" aria-label="Khách hàng nói về LETCO">
				<div class="testimonial-grid content-carousel-track" data-carousel-track>
					<?php foreach ( $testimonials as $testimonial ) : ?>
						<blockquote>
							<p>“<?php echo esc_html( $testimonial['quote'] ); ?>”</p>
							<footer>
								<?php if ( ! empty( $testimonial['image'] ) ) : ?>
									<img src="<?php echo letco_asset( $testimonial['image'] ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>">
								<?php else : ?>
									<span class="testimonial-avatar" aria-hidden="true"><?php echo esc_html( $testimonial['initials'] ); ?></span>
								<?php endif; ?>
								<div><strong><?php echo esc_html( $testimonial['name'] ); ?></strong><span><?php echo esc_html( $testimonial['role'] ); ?></span></div>
							</footer>
						</blockquote>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="content-carousel-controls">
				<button type="button" data-carousel-prev aria-label="Xem nhóm chia sẻ trước">‹</button>
				<div class="content-carousel-dots" data-carousel-dots aria-label="Chọn nhóm chia sẻ"></div>
				<button type="button" data-carousel-next aria-label="Xem nhóm chia sẻ tiếp theo">›</button>
			</div>
		</div>
	</div>
</section>

<section class="section gallery-section">
	<div class="container">
		<div class="section-heading heading-row">
			<div><span class="eyebrow">Khoảnh khắc LETCO</span><h2>Hoạt động & sự kiện</h2></div>
			<a class="text-link" href="<?php echo esc_url( home_url( '/thu-vien/' ) ); ?>">Xem thư viện <span>→</span></a>
		</div>
		<div class="gallery-grid">
			<figure class="gallery-main"><img src="<?php echo letco_asset( 'gallery-1.jpg' ); ?>" alt="Hoạt động tại LETCO"></figure>
			<figure><img src="<?php echo letco_asset( 'gallery-2.jpg' ); ?>" alt="Học viên LETCO"></figure>
			<figure><img src="<?php echo letco_asset( 'gallery-3.jpg' ); ?>" alt="Sự kiện LETCO"></figure>
		</div>
	</div>
</section>

<section class="partners-section">
	<div class="container">
		<div class="section-heading section-heading-center partner-heading">
			<span class="eyebrow">Mạng lưới hợp tác</span>
			<h2>Đối tác đồng hành cùng LETCO</h2>
			<p>Kết nối cùng các trường đại học và doanh nghiệp uy tín để mở rộng cơ hội học tập, thực tập và việc làm quốc tế.</p>
		</div>
		<div class="content-carousel content-carousel--partners partner-carousel" data-content-carousel data-interval="3000">
			<div class="content-carousel-viewport" role="region" aria-label="Đối tác của LETCO">
				<div class="partner-row content-carousel-track" data-carousel-track>
					<?php foreach ( $partners as $partner ) : ?>
						<div><img src="<?php echo letco_asset( $partner['image'] ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>"><span><?php echo esc_html( $partner['name'] ); ?></span></div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="content-carousel-controls">
				<button type="button" data-carousel-prev aria-label="Xem nhóm đối tác trước">‹</button>
				<div class="content-carousel-dots" data-carousel-dots aria-label="Chọn nhóm đối tác"></div>
				<button type="button" data-carousel-next aria-label="Xem nhóm đối tác tiếp theo">›</button>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
