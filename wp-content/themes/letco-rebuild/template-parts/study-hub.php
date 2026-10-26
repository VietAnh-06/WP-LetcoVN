<?php
/**
 * Personal study-and-work overview page for students: one tab per country with its
 * programmes, first-year costs, scholarships and work rules, then a few questions and
 * the sign-up. The page is not LETCO's, so it uses the country facts from
 * study-country-configs.php and leaves out everything that speaks for the company:
 * partner lists, service fees, company answers, logo and contact details. It speaks to
 * students as "em" and keeps each block short. Without scripts every country panel
 * shows in turn.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$countries = require __DIR__ . '/study-country-configs.php';
$contact   = $args['contact'];

// Photo, short introduction and photo credit for each tab, in tab order. Korea and Japan
// replace the country pages' introductions, which present the company.
// Hero strips: the usual direct flight from Nội Bài (HAN), its rough flight time, and a
// portrait photo where the tab photo is a poor fit for a tall strip.
$hero_routes = array(
	'korea'   => array( 'code' => 'ICN', 'city' => 'Seoul', 'hours' => '4,5' ),
	'japan'   => array( 'code' => 'NRT', 'city' => 'Tokyo', 'hours' => '5' ),
	'taiwan'  => array( 'code' => 'TPE', 'city' => 'Đài Bắc', 'hours' => '3' ),
	'germany' => array( 'code' => 'FRA', 'city' => 'Frankfurt', 'hours' => '12', 'image' => 'study-germany-liebherr-students.jpg' ),
);

$tab_meta = array(
	'korea'   => array(
		'image'       => 'home-korea-gate.jpg',
		'eyebrow'     => 'Học tiếng · Học nghề · Chuyên ngành',
		'description' => 'Ba hệ: học tiếng, học nghề và chuyên ngành. Được làm thêm, học xong có đường sang visa việc làm.',
		// The visa path after graduation, from the Korea page's work stages.
		// Short versions of the Korea page's work rules and scholarships.
		'work'         => array(
			array( 'Hệ tiếng (D-4)', 'Sau 6 tháng, tối đa 20 – 25 giờ/tuần.' ),
			array( 'Đại học (D-2)', 'Ngay khi nhập học, 25 – 35 giờ/tuần.' ),
			array( 'Lương tối thiểu', '9.860 KRW/giờ (~180.000 VNĐ).' ),
			array( 'Sau tốt nghiệp', 'Visa tìm việc D-10, rồi E-7 khi có việc đúng ngành.' ),
		),
		'scholarships' => array(
			array( 'title' => 'Học bổng Chính phủ', 'text' => 'Miễn 100% học phí, trợ cấp ~1 triệu KRW/tháng, vé máy bay.' ),
			array( 'title' => 'Học bổng nhập học', 'text' => 'Giảm 20 – 100% học phí kỳ đầu theo TOPIK hoặc IELTS.' ),
			array( 'title' => 'Học bổng thành tích', 'text' => 'Giảm 30 – 100% các kỳ sau theo điểm GPA.' ),
		),
		'gallery'     => array(
			array( 'letco-korea-departure-2026-09.jpg', 'Học viên LETCO chuẩn bị khởi hành sang Hàn Quốc', 1200, 803 ),
			array( 'daeduk-mou-students.jpg', 'Học viên dự lễ ký kết với Đại học Daeduk, Hàn Quốc', 1400, 933 ),
			array( 'daeduk-students-meeting.jpg', 'Học viên phỏng vấn cùng đoàn Đại học Daeduk', 1400, 882 ),
			array( 'daeduk-letco-class-visit.jpg', 'Đoàn Đại học Daeduk thăm lớp học viên LETCO', 1200, 898 ),
			array( 'home-daeduk-class.jpg', 'Lớp học viên chuẩn bị du học Hàn Quốc', 1000, 629 ),
		),
	),
	// Japan lists the adviser's own three routes instead of the company page's programmes.
	'japan'   => array(
		'image'       => 'home-japan-city.jpg',
		'eyebrow'     => 'Thực tập sinh · Kỹ sư · Du học',
		'description' => 'Ba hướng: thực tập sinh, kỹ sư, hoặc du học từ trường Nhật ngữ.',
		'estimate'    => '25 – 215 triệu VNĐ',
		'programs'    => array(
			array( 'tag' => 'Thực tập sinh', 'title' => 'Thực tập sinh (Ikusei Shuro)', 'text' => 'Vừa làm vừa học nghề, có đường lên visa Kỹ năng đặc định.' ),
			array( 'tag' => 'Kỹ sư', 'title' => 'Visa Kỹ sư', 'text' => 'Cho người tốt nghiệp cao đẳng, đại học: làm đúng chuyên ngành.' ),
			array( 'tag' => 'Du học', 'title' => 'Du học Nhật Bản', 'text' => 'Học tiếng Nhật rồi lên trường nghề hoặc đại học, được làm thêm.' ),
		),
		'gallery'     => array(
			array( 'study-japan-departure-group.jpg', 'Học viên sẵn sàng xuất cảnh sang Nhật Bản', 1440, 756 ),
			array( 'study-japan-departure-luggage.jpg', 'Hành lý đã sẵn sàng cho hành trình sang Nhật Bản', 1440, 960 ),
			array( 'study-japan-family-farewell.jpg', 'Gia đình tiễn học viên trước giờ xuất cảnh', 1440, 850 ),
			array( 'study-japan-student-family.jpg', 'Khoảnh khắc cùng gia đình tại sân bay', 1440, 960 ),
		),
	),
	'taiwan'  => array(
		'image'   => 'home-taiwan-taipei.jpg',
		'credit'  => array( 'Sinchen.Lin, CC BY 2.0', 'https://commons.wikimedia.org/wiki/File:Taipei_Skyline_2016.jpg' ),
		'gallery' => array(
			array( 'study-taiwan-technical-training-1.jpg', 'Học viên thực hành kỹ thuật trên máy tính', 1477, 1108 ),
			array( 'study-taiwan-technical-training-2.jpg', 'Giờ đào tạo kỹ thuật của học viên', 1477, 1108 ),
			// Public-domain (CC0) photos of Taiwan from Wikimedia Commons: NTU Royal Palm Boulevard
			// 20140407, National Taiwan Normal University Main Campus Buildings, Auditorium and Student
			// Center - National Cheng Kung University - DSC01255, Shilin Night Market March 2024 R12S 201.
			array( 'study-taiwan-ntu-palm-boulevard.jpg', 'Đại lộ cọ trong khuôn viên Đại học Quốc gia Đài Loan', 1440, 960 ),
			array( 'study-taiwan-ntnu-campus.jpg', 'Khuôn viên Đại học Sư phạm Quốc gia Đài Loan, Đài Bắc', 1440, 960 ),
			array( 'study-taiwan-ncku-student-center.jpg', 'Hội trường và trung tâm sinh viên Đại học Thành Công, Đài Nam', 1440, 960 ),
			array( 'study-taiwan-shilin-night-market.jpg', 'Quầy đồ ăn ở chợ đêm Sĩ Lâm, Đài Bắc', 1440, 1080 ),
		),
	),
	'germany' => array(
		'image'   => 'study-germany-liebherr-students.jpg',
		'gallery' => array(
			array( 'study-germany-reichstag-flag.jpg', 'Hình ảnh nước Đức', 592, 508 ),
			array( 'study-germany-liebherr-students.jpg', 'Học viên tại nhà máy Liebherr, Đức', 960, 1280, 'bottom' ),
			array( 'study-germany-liebherr-cranes.jpg', 'Môi trường làm việc kỹ thuật tại Đức', 958, 1276 ),
			array( 'study-germany-language-class.jpg', 'Lớp tiếng Đức và hội nhập', 1280, 960 ),
			array( 'study-germany-students.jpg', 'Học viên tại Đức', 1280, 960 ),
		),
	),
);

// Rows that speak for the company stay on the company's pages.
$is_neutral = fn( $text ) => false === strpos( $text, 'LETCO' );

// The three Korean visa rows that tell the programmes apart; the card title gives the goal.
$visa_rows = array( 'Ngoại ngữ tại Việt Nam', 'Sổ tiết kiệm', 'Làm thêm' );

// Every tab in one shape: programmes, costs, up to three scholarships, work rules.
$tabs = array();
foreach ( $tab_meta as $key => $meta ) {
	if ( empty( $countries[ $key ] ) ) {
		continue;
	}
	$country = $countries[ $key ];
	$tab     = $meta + array(
		'flag'         => $country['flag'],
		'name'         => $country['name'],
		'eyebrow'      => $country['eyebrow'],
		'description'  => $country['description'],
		'programs'     => array(),
		'estimate'     => isset( $country['estimate'] ) ? $country['estimate'] : '',
		'costs'        => isset( $country['costs'] ) ? $country['costs'] : array(),
		'scholarships' => isset( $country['scholarships'] ) ? array_slice( $country['scholarships'], 0, 3 ) : array(),
		'work'         => isset( $country['work']['rules'] ) ? $country['work']['rules'] : array(),
		'sources'      => isset( $country['sources'] ) ? $country['sources'] : array(),
	);
	if ( 'korea' === $key ) {
		foreach ( $country['visas'] as $visa ) {
			$tab['programs'][] = array(
				'tag'   => 'Visa ' . $visa['tag'],
				'title' => $visa['title'],
				'facts' => array_values( array_filter( $visa['rows'], fn( $row ) => in_array( $row[0], $visa_rows, true ) ) ),
			);
		}
	} elseif ( empty( $meta['programs'] ) ) {
		foreach ( $country['programs'] as $program ) {
			$tab['programs'][] = array_intersect_key( $program, array_flip( array( 'tag', 'title', 'text', 'facts' ) ) );
		}
	}
	if ( ! empty( $meta['work_extra'] ) ) {
		$tab['work'][] = $meta['work_extra'];
	}
	if ( ! empty( $tab['costs'] ) ) {
		$tab['costs']['items'] = array_values( array_filter( $tab['costs']['items'], fn( $cost ) => $is_neutral( $cost['label'] . $cost['note'] ) ) );
	}
	$tabs[ $key ] = $tab;
}

// Questions students ask most, answered from the figures in the tabs above.
$faq = array(
	array( 'q' => 'Học lực trung bình có đi du học được không?', 'a' => 'Được em nhé. Nhiều trường Hàn Quốc nhận GPA từ 6.5. Cô sẽ xem học bạ để gợi ý nơi vừa sức.' ),
	array( 'q' => 'Vừa học vừa làm thêm được bao nhiêu giờ?', 'a' => 'Hàn Quốc 20 – 35 giờ/tuần, Đài Loan tối đa 20 giờ/tuần. Học nghề ở Đức có lương từ 724 €/tháng. Làm thêm chỉ đủ trang trải một phần.' ),
	array( 'q' => 'Học xong có ở lại đi làm được không?', 'a' => 'Được, cả bốn nước đều có đường ở lại làm việc. Đức còn cho xin định cư sau 2 năm làm đúng nghề.' ),
	array( 'q' => 'Đi nước nào tốn ít chi phí nhất?', 'a' => 'Ước tính: Nhật Bản 25 – 215 triệu, Đài Loan 75 – 165 triệu, Đức 165 – 265 triệu, Hàn Quốc 180 – 400 triệu năm đầu.' ),
);
?>

<span id="top" class="lp-top-anchor" aria-hidden="true"></span>
<header class="lp-header">
	<div class="container lp-header-inner">
		<a class="lp-logo study-hub-brand" href="#top"><span aria-hidden="true">🎓</span> <?php echo esc_html( $contact['brand'] ); ?></a>
		<nav class="lp-header-nav" aria-label="Nội dung trang">
			<a href="#quoc-gia">Các nước</a>
			<a href="#faq">Hỏi đáp</a>
			<a href="#dang-ky">Liên hệ</a>
		</nav>
		<a class="lp-header-phone" href="tel:<?php echo esc_attr( $contact['phone'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a>
		<a class="lp-button lp-button--small" href="#dang-ky">Đăng ký tư vấn</a>
	</div>
</header>

<div class="study-landing study-hub jd-page">
	<section class="lp-hero study-hub-hero">
		<div class="container lp-hero-grid">
			<div class="lp-hero-copy">
				<p class="lp-kicker">Du học &amp; việc làm 2026</p>
				<h1>Du học và việc làm tại Hàn Quốc, Nhật Bản, Đài Loan, Đức</h1>
				<p class="lp-lede">Hệ học, chi phí, làm thêm và cơ hội việc làm của 4 nước, gọn trong một trang để em dễ so sánh.</p>
				<div class="lp-actions">
					<a class="lp-button" href="#dang-ky">Đăng ký tư vấn miễn phí</a>
					<a class="lp-link" href="#quoc-gia">Xem chi tiết 4 nước</a>
				</div>
			</div>
			<nav class="study-hub-routes" aria-label="Chọn nước">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<?php $route = $hero_routes[ $key ]; ?>
					<a class="study-hub-route" href="#du-hoc-<?php echo esc_attr( $key ); ?>">
						<img src="<?php echo letco_asset( isset( $route['image'] ) ? $route['image'] : $tab['image'] ); ?>" alt="" fetchpriority="high">
						<span class="study-hub-route-short" aria-hidden="true">
							<span><?php echo esc_html( $tab['flag'] ); ?></span>
							<span class="study-hub-route-vertical"><?php echo esc_html( $tab['name'] ); ?></span>
						</span>
						<span class="study-hub-route-full">
							<span class="study-hub-route-name"><?php echo esc_html( $tab['flag'] . ' ' . $tab['name'] ); ?></span>
							<span class="study-hub-route-trip">
								<b>HAN</b>
								<span class="study-hub-route-line" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M21 16v-2l-8-5V3.5a1.5 1.5 0 0 0-3 0V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5z"/></svg></span>
								<b><?php echo esc_html( $route['code'] ); ?></b>
							</span>
							<span class="study-hub-route-note"><?php echo esc_html( 'Hà Nội → ' . $route['city'] . ' · khoảng ' . $route['hours'] . ' giờ bay' ); ?></span>
						</span>
					</a>
				<?php endforeach; ?>
			</nav>
		</div>
	</section>

	<section class="section study-hub-countries" id="quoc-gia" data-tabs>
		<div class="container">
			<div class="section-heading section-heading-center">
				<span class="eyebrow">Các nước</span>
				<h2>Em muốn tìm hiểu nước nào?</h2>
			</div>

			<div class="study-hub-tablist" role="tablist" aria-label="Các nước" hidden>
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<button type="button" role="tab" id="tab-<?php echo esc_attr( $key ); ?>" aria-controls="du-hoc-<?php echo esc_attr( $key ); ?>" aria-selected="false" tabindex="-1">
						<span aria-hidden="true"><?php echo esc_html( $tab['flag'] ); ?></span> <?php echo esc_html( $tab['name'] ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div class="study-hub-panel" id="du-hoc-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-<?php echo esc_attr( $key ); ?>">
					<div class="study-hub-intro">
						<figure>
							<img src="<?php echo letco_asset( $tab['image'] ); ?>" alt="<?php echo esc_attr( $tab['name'] ); ?>" loading="lazy">
							<?php if ( ! empty( $tab['credit'] ) ) : ?>
								<figcaption class="lp-source">Ảnh: <a href="<?php echo esc_url( $tab['credit'][1] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $tab['credit'][0] ); ?></a></figcaption>
							<?php endif; ?>
						</figure>
						<div class="study-hub-intro-copy">
							<span class="study-program-tag"><?php echo esc_html( $tab['eyebrow'] ); ?></span>
							<h3><?php echo esc_html( $tab['name'] ); ?></h3>
							<p><?php echo esc_html( $tab['description'] ); ?></p>
							<a class="lp-button" href="#dang-ky">Tư vấn du học <?php echo esc_html( $tab['name'] ); ?></a>
						</div>
					</div>

					<?php if ( ! empty( $tab['gallery'] ) ) : ?>
						<h4 class="study-hub-subhead">Hình ảnh học viên</h4>
						<ul class="study-hub-gallery" aria-label="Hình ảnh học viên chương trình <?php echo esc_attr( $tab['name'] ); ?>">
							<?php foreach ( $tab['gallery'] as $photo ) : ?>
								<li>
									<figure>
										<img src="<?php echo letco_asset( $photo[0] ); ?>" alt="<?php echo esc_attr( $photo[1] ); ?>" width="<?php echo esc_attr( $photo[2] ); ?>" height="<?php echo esc_attr( $photo[3] ); ?>" loading="lazy"<?php echo ! empty( $photo[4] ) ? ' style="object-position: ' . esc_attr( $photo[4] ) . '"' : ''; ?>>
										<figcaption><?php echo esc_html( $photo[1] ); ?></figcaption>
									</figure>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<h4 class="study-hub-subhead">Các hệ học</h4>
					<div class="study-hub-program-grid study-hub-program-grid--<?php echo esc_attr( count( $tab['programs'] ) ); ?>">
						<?php foreach ( $tab['programs'] as $program ) : ?>
							<article class="study-program-card study-hub-ticket">
								<div class="study-hub-ticket-stub">
									<span class="study-program-tag"><?php echo esc_html( $program['tag'] ); ?></span>
									<h3><?php echo esc_html( $program['title'] ); ?></h3>
								</div>
								<div class="study-hub-ticket-body">
									<?php if ( ! empty( $program['text'] ) ) : ?><p><?php echo esc_html( $program['text'] ); ?></p><?php endif; ?>
									<?php if ( ! empty( $program['facts'] ) ) : ?>
										<dl class="study-hub-facts">
											<?php foreach ( $program['facts'] as $fact ) : ?>
												<div><dt><?php echo esc_html( $fact[0] ); ?></dt><dd><?php echo esc_html( $fact[1] ); ?></dd></div>
											<?php endforeach; ?>
										</dl>
									<?php endif; ?>
								</div>
							</article>
						<?php endforeach; ?>
					</div>

					<?php if ( ! empty( $tab['work'] ) ) : ?>
						<h4 class="study-hub-subhead">Làm thêm &amp; việc làm</h4>
						<dl class="study-hub-list study-hub-list--work">
							<?php foreach ( $tab['work'] as $rule ) : ?>
								<div><dt><?php echo esc_html( rtrim( $rule[0], ':' ) ); ?></dt><dd><?php echo esc_html( mb_strtoupper( mb_substr( $rule[1], 0, 1 ) ) . mb_substr( $rule[1], 1 ) ); // The Korean rules continue their label in lower case. ?></dd></div>
							<?php endforeach; ?>
						</dl>
					<?php endif; ?>

					<?php if ( $tab['estimate'] ) : ?>
						<h4 class="study-hub-subhead">Chi phí</h4>
						<p class="study-cost-total study-hub-estimate"><span>Ước tính, tùy hình thức đi</span><strong><?php echo esc_html( $tab['estimate'] ); ?></strong></p>
					<?php elseif ( ! empty( $tab['costs'] ) ) : ?>
						<h4 class="study-hub-subhead">Chi phí năm đầu</h4>
							<article class="study-cost-card">
								<ul>
									<?php foreach ( $tab['costs']['items'] as $cost ) : ?>
										<li>
											<div><strong><?php echo esc_html( $cost['label'] ); ?></strong></div>
											<span><?php echo esc_html( $cost['amount'] ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
								<?php if ( ! empty( $tab['costs']['total'] ) ) : ?>
									<p class="study-cost-total"><span>Tổng năm đầu, tùy hệ học và thành phố</span><strong><?php echo esc_html( $tab['costs']['total'] ); ?></strong></p>
								<?php endif; ?>
							</article>
					<?php endif; ?>

					<?php if ( ! empty( $tab['scholarships'] ) ) : ?>
						<h4 class="study-hub-subhead">Học bổng</h4>
						<dl class="study-hub-list study-hub-list--scholarships">
							<?php foreach ( $tab['scholarships'] as $scholarship ) : ?>
								<div><dt><?php echo esc_html( $scholarship['title'] ); ?></dt><dd><?php echo esc_html( $scholarship['text'] ); ?></dd></div>
							<?php endforeach; ?>
						</dl>
					<?php endif; ?>

					<?php if ( ! empty( $tab['sources'] ) ) : ?>
						<p class="lp-source study-hub-sources">Nguồn:
							<?php foreach ( $tab['sources'] as $index => $source ) : ?><?php echo $index ? ' · ' : ''; ?><a href="<?php echo esc_url( $source[1] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $source[0] ); ?></a><?php endforeach; ?>
						</p>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="section study-faq" id="faq">
		<div class="container study-faq-layout">
			<div><span class="eyebrow">Hỏi đáp</span><h2>Em hay hỏi cô</h2><p>Chưa thấy câu em cần? Gọi hoặc để lại tin cho cô Mai nhé.</p></div>
			<div class="study-accordion">
				<?php foreach ( $faq as $index => $item ) : ?>
					<details <?php echo 0 === $index ? 'open' : ''; ?>><summary><?php echo esc_html( $item['q'] ); ?><span aria-hidden="true"></span></summary><p><?php echo esc_html( $item['a'] ); ?></p></details>
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
				'title'   => 'Chưa biết chọn nước nào? Hỏi cô Mai nhé!',
				'intro'   => 'Em để lại tên và số điện thoại, cô sẽ gọi lại để cùng em xem học lực, ngân sách và mục tiêu, rồi gợi ý lộ trình học và làm việc hợp với em.',
				'bullets' => array( 'Tư vấn 1–1, miễn phí', 'So sánh 4 nước theo hồ sơ của em', 'Thông tin của em được giữ kín' ),
			),
			'consent'         => 'Gửi thông tin là em đồng ý để cô Mai liên hệ tư vấn.',
			'thanks'          => 'Cảm ơn em! Cô Mai đã nhận được thông tin và sẽ sớm gọi lại.',
			'form_title'      => 'Đăng ký tư vấn miễn phí',
			'form_note'       => 'Chỉ cần tên và số điện thoại, chưa đến 1 phút.',
			'button'          => 'Nhận tư vấn miễn phí từ cô Mai',
			'message_label'   => 'Em đang quan tâm điều gì?',
			'photo'           => array( 'hub-co-thanh-mai.jpg', 'Cô Thanh Mai tại Đại học Công nghiệp Hà Nội', 'Cô Thanh Mai' ),
			'phone_example'   => '0912 345 678',
			'quick_contact'   => $contact['phone'],
			'email'           => $contact['email'],
			'program_choices' => array_merge(
				array_map( fn( $tab ) => 'Du học & việc làm ' . $tab['name'], array_values( $tabs ) ),
				array( 'Chưa chọn nước' )
			),
		)
	);
	?>
</div>
