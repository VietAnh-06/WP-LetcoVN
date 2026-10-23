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
$tab_meta = array(
	'korea'   => array(
		'image'       => 'home-korea-gate.jpg',
		'eyebrow'     => 'Học tiếng · Học nghề · Chuyên ngành',
		'description' => 'Ba hệ chính: học tiếng (D-4-1), học nghề (D-4-6) và chuyên ngành (D-2). Em được làm thêm hợp pháp và có lộ trình chuyển sang visa việc làm sau khi tốt nghiệp.',
		// The visa path after graduation, from the Korea page's work stages.
		'work_extra'  => array( 'Sau tốt nghiệp', 'Visa tìm việc D-10 (1 – 2 năm), rồi visa lao động chuyên môn E-7 khi có hợp đồng đúng ngành; về lâu dài có thể lên F-2, F-5.' ),
	),
	'japan'   => array(
		'image'       => 'home-japan-city.jpg',
		'eyebrow'     => 'Nhật ngữ · Chuyên môn · Đi làm',
		'description' => 'Em có thể học tiếng rồi lên trường chuyên môn, đại học, hoặc đi theo lộ trình làm việc: visa Kỹ sư, visa Kỹ năng đặc định.',
		'cost_note'   => 'Chi phí du học Nhật Bản khác nhau theo trường và chương trình. Em để lại thông tin, cô Mai sẽ dự toán theo hồ sơ của em.',
	),
	'taiwan'  => array( 'image' => 'home-taiwan-taipei.jpg', 'credit' => array( 'Sinchen.Lin, CC BY 2.0', 'https://commons.wikimedia.org/wiki/File:Taipei_Skyline_2016.jpg' ) ),
	'germany' => array( 'image' => 'home-germany-heidelberg.jpg', 'credit' => array( 'Ribax, CC BY 4.0', 'https://commons.wikimedia.org/wiki/File:Das_Neuenheimer_Neckar_Ufer_mit_Blick_auf_Heidelberger_Schloss_und_K%C3%B6nigstuhl_BILD0977.jpg' ) ),
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
		'costs'        => isset( $country['costs'] ) ? $country['costs'] : array(),
		'cost_note'    => '',
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
	} else {
		// Japan's cards keep their one-line summary; Taiwan and Germany carry facts.
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
	array( 'q' => 'Học lực trung bình có đi du học được không?', 'a' => 'Được em nhé. Nhiều trường Hàn Quốc nhận học sinh có GPA từ 6.5; ở Đài Loan và Đức, mỗi trường có yêu cầu riêng. Cô sẽ xem học bạ để gợi ý nơi vừa sức với em.' ),
	array( 'q' => 'Vừa học vừa làm thêm được bao nhiêu giờ?', 'a' => 'Hàn Quốc: hệ tiếng được làm sau 6 tháng, 20 – 25 giờ/tuần; hệ chuyên ngành 25 – 35 giờ/tuần. Đài Loan: tối đa 20 giờ/tuần, cần giấy phép. Đức: 140 ngày hoặc 280 nửa ngày mỗi năm. Làm thêm giúp em trang trải một phần, đừng trông vào nó để đóng toàn bộ chi phí.' ),
	array( 'q' => 'Học xong có ở lại đi làm được không?', 'a' => 'Có lộ trình ở cả bốn nước. Hàn Quốc: visa tìm việc D-10 rồi E-7. Nhật Bản: visa Kỹ sư hoặc Kỹ năng đặc định. Đài Loan: ở lại tìm việc và làm theo hệ thống tính điểm. Đức: tìm việc tối đa 18 tháng rồi chuyển visa lao động chuyên môn.' ),
	array( 'q' => 'Nước nào chi phí năm đầu thấp nhất?', 'a' => 'Theo số liệu tham khảo trên trang: Đài Loan khoảng 142 – 218 triệu (chưa gồm bảo hiểm, visa, vé máy bay), Hàn Quốc khoảng 180 – 400 triệu. Đức gần như miễn học phí nhưng em cần khoảng 355 triệu trong tài khoản phong tỏa để chi sinh hoạt năm đầu.' ),
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
		<a class="lp-button lp-button--small" href="#dang-ky">Hỏi cô Mai</a>
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
					<a class="lp-button" href="#dang-ky">Hỏi cô Mai</a>
					<a class="lp-link" href="#quoc-gia">Xem các nước</a>
				</div>
			</div>
			<nav class="study-hub-hero-media" aria-label="Chọn nước">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<a href="#du-hoc-<?php echo esc_attr( $key ); ?>">
						<img src="<?php echo letco_asset( $tab['image'] ); ?>" alt="" fetchpriority="high">
						<span><?php echo esc_html( $tab['flag'] . ' ' . $tab['name'] ); ?></span>
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
						<div>
							<span class="study-program-tag"><?php echo esc_html( $tab['eyebrow'] ); ?></span>
							<h3><?php echo esc_html( $tab['name'] ); ?></h3>
							<p><?php echo esc_html( $tab['description'] ); ?></p>
							<a class="lp-button" href="#dang-ky">Hỏi cô Mai về <?php echo esc_html( $tab['name'] ); ?></a>
						</div>
					</div>

					<h4 class="study-hub-subhead">Các hệ học</h4>
					<div class="study-hub-program-grid">
						<?php foreach ( $tab['programs'] as $program ) : ?>
							<article class="study-program-card">
								<span class="study-program-tag"><?php echo esc_html( $program['tag'] ); ?></span>
								<h3><?php echo esc_html( $program['title'] ); ?></h3>
								<?php if ( ! empty( $program['text'] ) ) : ?><p><?php echo esc_html( $program['text'] ); ?></p><?php endif; ?>
								<?php if ( ! empty( $program['facts'] ) ) : ?>
									<dl class="study-hub-facts">
										<?php foreach ( $program['facts'] as $fact ) : ?>
											<div><dt><?php echo esc_html( $fact[0] ); ?></dt><dd><?php echo esc_html( $fact[1] ); ?></dd></div>
										<?php endforeach; ?>
									</dl>
								<?php endif; ?>
							</article>
						<?php endforeach; ?>
					</div>

					<?php if ( ! empty( $tab['work'] ) ) : ?>
						<h4 class="study-hub-subhead">Làm thêm &amp; việc làm</h4>
						<dl class="study-hub-list study-hub-list--grid">
							<?php foreach ( $tab['work'] as $rule ) : ?>
								<div><dt><?php echo esc_html( rtrim( $rule[0], ':' ) ); ?></dt><dd><?php echo esc_html( mb_strtoupper( mb_substr( $rule[1], 0, 1 ) ) . mb_substr( $rule[1], 1 ) ); // The Korean rules continue their label in lower case. ?></dd></div>
							<?php endforeach; ?>
						</dl>
					<?php endif; ?>

					<?php if ( ! empty( $tab['costs'] ) || $tab['cost_note'] ) : ?>
						<h4 class="study-hub-subhead">Chi phí năm đầu</h4>
						<?php if ( ! empty( $tab['costs'] ) ) : ?>
							<article class="study-cost-card">
								<ul>
									<?php foreach ( $tab['costs']['items'] as $cost ) : ?>
										<li>
											<div><strong><?php echo esc_html( $cost['label'] ); ?></strong><?php if ( ! empty( $cost['note'] ) ) : ?><small><?php echo esc_html( $cost['note'] ); ?></small><?php endif; ?></div>
											<span><?php echo esc_html( $cost['amount'] ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
								<?php if ( ! empty( $tab['costs']['total'] ) ) : ?>
									<p class="study-cost-total"><span><?php echo esc_html( $tab['costs']['total_label'] ); ?></span><strong><?php echo esc_html( $tab['costs']['total'] ); ?></strong></p>
								<?php endif; ?>
							</article>
							<?php if ( ! empty( $tab['costs']['tip'] ) ) : ?><p class="study-cost-tip"><?php echo esc_html( $tab['costs']['tip'] ); ?></p><?php endif; ?>
						<?php else : ?>
							<p class="study-cost-tip"><?php echo esc_html( $tab['cost_note'] ); ?></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( ! empty( $tab['scholarships'] ) ) : ?>
						<h4 class="study-hub-subhead">Học bổng</h4>
						<dl class="study-hub-list study-hub-list--grid">
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
			'button'          => 'Gửi cho cô Mai',
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
