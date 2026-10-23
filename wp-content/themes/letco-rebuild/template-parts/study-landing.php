<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$country = isset( $args['country'] ) ? $args['country'] : 'japan';

$configs     = require __DIR__ . '/study-country-configs.php';
$configs     += require __DIR__ . '/study-school-configs.php';
$data        = isset( $configs[ $country ] ) ? $configs[ $country ] : $configs['korea'];
$lead_status = isset( $_GET['lead'] ) ? sanitize_key( wp_unslash( $_GET['lead'] ) ) : '';
// Pages with their own zoned layout render it in full and skip the generic sections.
if ( isset( $data['layout'] ) && 'zones' === $data['layout'] ) {
	get_template_part( 'template-parts/daeduk', 'landing', array( 'data' => $data, 'lead_status' => $lead_status ) );
	return;
}
// Named step sets follow the visa routes in the Korea brief.
$step_sets   = array(
	'd2-1' => array(
		array( 'Chuẩn bị hồ sơ', 'Chuẩn bị hồ sơ và đăng ký chương trình.' ),
		array( 'Nhập cảnh Visa D4-1', 'Sang Hàn Quốc theo diện du học tiếng.' ),
		array( 'Học tiếng Hàn', 'Học tiếng Hàn từ 6 đến 10 tháng.' ),
		array( 'Đạt yêu cầu', 'TOPIK 2 trở lên và điều kiện riêng của trường.' ),
		array( 'Chuyển Visa D2-1', 'Chuyển sang học chuyên ngành cao đẳng.' ),
		array( 'Học tập & làm việc', 'Học tập, thực hành, phát triển nghề nghiệp và làm việc tại Hàn Quốc sau tốt nghiệp.' ),
	),
	'd2-2' => array(
		array( 'Chuẩn bị hồ sơ THPT', 'Độ tuổi 18 – 25, GPA THPT từ 6.0 – 7.5+ tùy trường.' ),
		array( 'Nhập cảnh hệ D4-1', 'Học tiếng Hàn 1 – 2 năm, nâng cao TOPIK.' ),
		array( 'Đạt TOPIK 3+', 'Hoặc IELTS/TOEFL đối với hệ tiếng Anh.' ),
		array( 'Chuyển tiếp D2-2', 'Học chuyên ngành cử nhân 4 năm.' ),
		array( 'Tốt nghiệp & làm việc', 'Định hướng làm việc hoặc chuyển visa D-10, E-7.' ),
	),
);
if ( ! empty( $data['steps'] ) && is_string( $data['steps'] ) ) {
	$data['steps'] = $step_sets[ $data['steps'] ];
}
$trust       = isset( $data['trust'] ) ? $data['trust'] : array( '26 năm', 'Kinh nghiệm đào tạo và hội nhập quốc tế' );
$steps       = ! empty( $data['steps'] ) ? $data['steps'] : letco_study_default_steps();

// Optional sections only get a nav link when the config provides their data.
$anchors = array_filter(
	array(
		'phu-hop'      => empty( $data['fit'] ) ? '' : 'Phù hợp với ai',
		'tong-quan'    => empty( $data['overview'] ) ? '' : 'Tổng quan',
		'loi-ich'      => 'Lợi ích',
		'chuong-trinh' => empty( $data['visas'] ) ? 'Chương trình' : 'Hệ du học',
		'truong'       => empty( $data['regions'] ) ? '' : 'Trường đối tác',
		'nganh-hoc'    => empty( $data['majors'] ) ? '' : 'Ngành học',
		'chi-phi'      => empty( $data['costs'] ) && empty( $data['budget'] ) ? '' : 'Chi phí',
		'hoc-bong'     => empty( $data['scholarships'] ) ? '' : 'Học bổng',
		'dieu-kien'    => empty( $data['conditions'] ) ? '' : 'Điều kiện',
		'doanh-nghiep' => empty( $data['companies'] ) ? '' : 'Doanh nghiệp',
		'tuyen-sinh'   => empty( $data['schedule'] ) ? '' : 'Kỳ tuyển sinh',
		'ho-tro'       => empty( $data['responsibilities'] ) ? '' : 'Trách nhiệm',
		'lo-trinh'     => 'Lộ trình',
		'lam-them'     => empty( $data['work'] ) ? '' : 'Làm thêm & visa',
		'doi-tac'      => empty( $data['partners'] ) ? '' : ( empty( $data['regions'] ) ? 'Đối tác' : 'Chi tiết trường' ),
		'faq'          => empty( $data['faq'] ) ? '' : 'Hỏi đáp',
	)
);
?>

<?php
// Landing pages link only to each other; other site pages stay reachable by URL only.
$landing_urls = array( '/du-hoc/du-hoc-han-quoc/', '/du-hoc/du-hoc-nhat-ban/', '/du-hoc/du-hoc-han-quoc/dai-hoc-daeduk/' );
$header_ids   = isset( $data['header_links'] ) ? $data['header_links'] : array( 'doanh-nghiep', 'chuong-trinh', 'nganh-hoc', 'chi-phi', 'dieu-kien', 'lo-trinh', 'faq' );
$header_links = array();
foreach ( $header_ids as $header_id ) {
	if ( isset( $anchors[ $header_id ] ) && count( $header_links ) < 4 ) {
		$header_links[ $header_id ] = $anchors[ $header_id ];
	}
}
$hotline      = ! empty( $data['hotline'] ) ? $data['hotline'] : ( ! empty( $data['contact']['phones'][0] ) ? $data['contact']['phones'][0] : '024 3763 8154' );
?>
<?php
get_template_part(
	'template-parts/landing',
	'header',
	array(
		'links'   => $header_links,
		'hotline' => $hotline,
		'button'  => isset( $data['primary_cta'] ) ? $data['primary_cta'] : 'Đăng ký tư vấn',
	)
);
?>

<div class="study-landing <?php echo esc_attr( $data['class'] ); ?> jd-page">
<?php ob_start(); ?>
	<?php if ( ! empty( $data['hero_form'] ) ) : ?>
	<section class="lp-hero lp-hero--lead">
		<div class="container lp-hero-grid">
			<div class="lp-hero-copy">
				<p class="lp-kicker"><?php echo esc_html( $data['eyebrow'] ); ?></p>
				<h1><?php echo esc_html( $data['title'] ); ?></h1>
				<p class="lp-lede"><?php echo esc_html( $data['description'] ); ?></p>
				<ul class="lp-hero-points">
					<?php foreach ( $data['hero_form']['points'] as $point ) : ?><li><?php echo esc_html( $point ); ?></li><?php endforeach; ?>
				</ul>
			</div>
			<div class="lp-hero-form">
				<?php if ( 'success' === $lead_status ) : ?><div class="form-notice form-success">Cảm ơn bạn! LETCO đã nhận được thông tin và sẽ sớm liên hệ.</div><?php endif; ?>
				<?php if ( 'error' === $lead_status ) : ?><div class="form-notice form-error">Vui lòng nhập đầy đủ họ tên và số điện thoại.</div><?php endif; ?>
				<h2><?php echo esc_html( $data['hero_form']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['hero_form']['intro'] ); ?></p>
				<?php get_template_part( 'template-parts/quick', 'form', array( 'program' => 'Du học ' . $data['name'], 'button' => 'Đăng ký tư vấn', 'note' => $data['hero_form']['note'] ) ); ?>
				<?php if ( ! empty( $data['zalo'] ) ) : ?>
					<p class="lp-alt-contact">Hoặc liên hệ ngay: <a href="https://zalo.me/<?php echo esc_attr( $data['zalo'] ); ?>" rel="noopener" target="_blank">Nhắn Zalo</a> · <a href="tel:<?php echo esc_attr( preg_replace( '/\D+/', '', $hotline ) ); ?>">Gọi <?php echo esc_html( $hotline ); ?></a></p>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php else : ?>
	<?php
	// The headline may highlight one phrase, e.g. the headline figure.
	$title_html = esc_html( $data['title'] );
	if ( ! empty( $data['title_accent'] ) ) {
		$title_html = str_replace( esc_html( $data['title_accent'] ), '<em>' . esc_html( $data['title_accent'] ) . '</em>', $title_html );
	}
	?>
	<section class="lp-hero<?php echo empty( $data['hero_photo'] ) ? '' : ' lp-hero--photo'; ?><?php echo empty( $data['hero_backdrop'] ) ? '' : ' lp-hero--cinema'; ?>">
		<div class="container lp-hero-grid">
			<div class="lp-hero-copy">
				<p class="lp-kicker"><?php echo esc_html( $data['eyebrow'] ); ?></p>
				<h1><?php echo $title_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?></h1>
				<p class="lp-lede"><?php echo esc_html( $data['description'] ); ?></p>
				<?php if ( ! empty( $data['hero_signals'] ) ) : ?>
					<dl class="lp-hero-signals" aria-label="Thông tin nhanh về chương trình">
						<?php foreach ( $data['hero_signals'] as $signal ) : ?>
							<div><dt><?php echo esc_html( $signal[0] ); ?></dt><dd><?php echo esc_html( $signal[1] ); ?></dd></div>
						<?php endforeach; ?>
					</dl>
				<?php endif; ?>
				<?php if ( ! empty( $data['hero_note'] ) ) : ?><p class="lp-hero-note"><?php echo esc_html( $data['hero_note'] ); ?></p><?php endif; ?>
				<div class="lp-actions">
					<a class="lp-button" href="#dang-ky"><?php echo esc_html( isset( $data['hero_button'] ) ? $data['hero_button'] : 'Đăng ký tư vấn' ); ?></a>
					<a class="lp-link" href="<?php echo esc_attr( isset( $data['hero_link'][1] ) ? $data['hero_link'][1] : '#chuong-trinh' ); ?>"><?php echo esc_html( isset( $data['hero_link'][0] ) ? $data['hero_link'][0] : 'Xem chương trình' ); ?></a>
				</div>
			</div>
			<figure class="lp-hero-media">
				<img src="<?php echo letco_asset( $data['image'] ); ?>" alt="<?php echo esc_attr( isset( $data['image_alt'] ) ? $data['image_alt'] : 'Du học ' . $data['name'] . ' cùng LETCO' ); ?>" fetchpriority="high">
				<?php if ( ! empty( $data['image_caption'] ) ) : ?><figcaption><?php echo esc_html( $data['image_caption'] ); ?></figcaption><?php endif; ?>
			</figure>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['summary'] ) ) : ?>
	<section class="lp-summary" id="tom-tat">
		<div class="container">
			<h2><?php echo esc_html( $data['summary']['title'] ); ?></h2>
			<dl class="lp-summary-list">
				<?php foreach ( $data['summary']['items'] as $item ) : ?>
					<div>
						<dt><?php echo esc_html( $item[0] ); ?></dt>
						<dd>
							<strong><?php echo esc_html( $item[1] ); ?></strong>
							<span><?php echo esc_html( $item[2] ); ?></span>
							<a href="<?php echo esc_attr( $item[4] ); ?>"><?php echo esc_html( $item[3] ); ?></a>
						</dd>
					</div>
				<?php endforeach; ?>
			</dl>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['fit'] ) ) : ?>
	<section class="section lp-fit" id="phu-hop">
		<div class="container lp-fit-layout">
			<div class="lp-fit-intro">
				<span class="eyebrow"><?php echo esc_html( $data['fit']['eyebrow'] ); ?></span>
				<h2><?php echo esc_html( $data['fit']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['fit']['intro'] ); ?></p>
				<?php if ( ! empty( $data['fit']['photo'] ) ) : ?>
					<figure>
						<img src="<?php echo letco_asset( $data['fit']['photo'][0] ); ?>" alt="<?php echo esc_attr( $data['fit']['photo'][1] ); ?>" loading="lazy">
						<figcaption><?php echo esc_html( $data['fit']['photo'][1] ); ?></figcaption>
					</figure>
				<?php endif; ?>
			</div>
			<div class="lp-fit-groups">
				<?php foreach ( $data['fit']['groups'] as $index => $group ) : ?>
					<article<?php echo 0 === $index ? ' class="is-primary"' : ''; ?>>
						<p class="lp-fit-number" aria-hidden="true">0<?php echo esc_html( $index + 1 ); ?></p>
						<h3><?php echo esc_html( $group[0] ); ?></h3>
						<ul><?php foreach ( $group[1] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
					</article>
				<?php endforeach; ?>
				<?php if ( ! empty( $data['fit']['note'] ) ) : ?><p class="lp-fit-note"><?php echo esc_html( $data['fit']['note'] ); ?></p><?php endif; ?>
				<a class="lp-button" href="#dang-ky"><?php echo esc_html( isset( $data['primary_cta'] ) ? $data['primary_cta'] : 'Đăng ký tư vấn' ); ?></a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['parents'] ) ) : ?>
	<section class="section lp-parents" id="phu-huynh">
		<div class="container">
			<div class="section-heading">
				<h2><?php echo esc_html( $data['parents']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['parents']['intro'] ); ?></p>
			</div>
			<ol class="lp-parents-list">
				<?php foreach ( $data['parents']['items'] as $item ) : ?>
					<li>
						<?php letco_fold_open( $item[0] ); ?>
							<p><?php echo esc_html( $item[1] ); ?></p>
							<a href="<?php echo esc_attr( $item[3] ); ?>"><?php echo esc_html( $item[2] ); ?></a>
						<?php letco_fold_close(); ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['payments'] ) ) : ?>
	<section class="section lp-payments" id="lich-dong-tien">
		<div class="container">
			<div class="section-heading">
				<h2><?php echo esc_html( $data['payments']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['payments']['intro'] ); ?></p>
			</div>
			<ul class="lp-payee-legend" aria-label="Đơn vị nhận tiền">
				<?php foreach ( $data['payments']['payees'] as $payee_key => $payee_label ) : ?><li class="is-<?php echo esc_attr( $payee_key ); ?>"><?php echo esc_html( $payee_label ); ?></li><?php endforeach; ?>
			</ul>
			<ol class="lp-paytrack">
				<?php foreach ( $data['payments']['stages'] as $index => $stage ) : ?>
					<li>
						<span class="lp-paytrack-step"><?php echo esc_html( $index + 1 ); ?></span>
						<p class="lp-paytrack-when"><?php echo esc_html( $stage['when'] ); ?></p>
						<h3><?php echo esc_html( $stage['title'] ); ?></h3>
						<ul>
							<?php foreach ( $stage['items'] as $pay ) : ?>
								<li class="is-<?php echo esc_attr( $pay[0] ); ?>"><span><?php echo esc_html( $pay[1] ); ?></span><strong><?php echo esc_html( $pay[2] ); ?></strong></li>
							<?php endforeach; ?>
						</ul>
					</li>
				<?php endforeach; ?>
			</ol>
			<p class="lp-block-note"><?php echo esc_html( $data['payments']['note'] ); ?></p>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['stats'] ) ) : ?>
	<section class="lp-stats" aria-label="Số liệu nổi bật">
		<div class="container">
			<dl class="lp-stats-list">
				<?php foreach ( $data['stats'] as $stat ) : ?>
					<div><dt data-countup><?php echo esc_html( $stat[0] ); ?></dt><dd><?php echo esc_html( $stat[1] ); ?></dd></div>
				<?php endforeach; ?>
			</dl>
		</div>
	</section>
	<?php elseif ( empty( $data['summary'] ) ) : ?>
	<section class="lp-facts" aria-label="Điểm nổi bật">
		<div class="container">
			<ul class="lp-facts-list">
				<li><strong><?php echo esc_html( $trust[0] ); ?></strong><span><?php echo esc_html( $trust[1] ); ?></span></li>
				<?php foreach ( array_slice( $data['highlights'], 0, 3 ) as $highlight ) : ?>
					<li><span><?php echo esc_html( $highlight ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['bridge'] ) ) : ?>
	<section class="section lp-bridge" id="cau-noi">
		<div class="container">
			<div class="section-heading">
				<h2><?php echo esc_html( $data['bridge']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['bridge']['intro'] ); ?></p>
			</div>
			<div class="lp-bridge-figure">
				<svg class="lp-bridge-arch" viewBox="0 0 1200 230" preserveAspectRatio="none" aria-hidden="true" focusable="false">
					<path class="lp-bridge-arch-b" d="M20 205 Q600 -105 1180 205" pathLength="1"/>
					<path class="lp-bridge-arch-a" d="M20 205 Q600 -165 1180 205" pathLength="1"/>
					<line class="lp-bridge-deck" x1="0" y1="205" x2="1200" y2="205"/>
				</svg>
				<ol class="lp-bridge-stops">
					<?php foreach ( $data['bridge']['stops'] as $stop ) : ?>
						<li>
							<span class="lp-bridge-dot" aria-hidden="true"></span>
							<small><?php echo esc_html( $stop[0] ); ?></small>
							<strong><?php echo esc_html( $stop[1] ); ?></strong>
							<p><?php echo esc_html( $stop[2] ); ?></p>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['overview'] ) ) : ?>
		<section class="section study-overview" id="tong-quan">
			<div class="container study-overview-layout">
				<div class="study-overview-copy">
					<span class="eyebrow">Tổng quan về trường</span>
					<h2><?php echo esc_html( $data['overview']['title'] ); ?></h2>
					<?php foreach ( $data['overview']['text'] as $paragraph ) : ?>
						<p><?php echo esc_html( $paragraph ); ?></p>
					<?php endforeach; ?>
				</div>
				<dl class="study-overview-facts">
					<?php foreach ( $data['overview']['facts'] as $fact ) : ?>
						<div><dt><?php echo esc_html( $fact['value'] ); ?></dt><dd><?php echo esc_html( $fact['label'] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
			</div>
		</section>
	<?php endif; ?>

	<section class="section study-benefits" id="loi-ich">
		<div class="container">
			<div class="section-heading section-heading-center">
				<span class="eyebrow"><?php echo esc_html( isset( $data['benefits_eyebrow'] ) ? $data['benefits_eyebrow'] : 'Vì sao chọn ' . $data['name'] ); ?></span>
				<h2><?php echo esc_html( isset( $data['benefits_title'] ) ? $data['benefits_title'] : 'Một hành trình học tập, nhiều giá trị dài hạn' ); ?></h2>
				<p><?php echo esc_html( isset( $data['benefits_intro'] ) ? $data['benefits_intro'] : 'Không chỉ là một tấm bằng, đây còn là cơ hội phát triển ngôn ngữ, kỹ năng và tư duy hội nhập.' ); ?></p>
				<p class="section-heading-action"><a class="lp-button" href="#dang-ky"><?php echo esc_html( isset( $data['primary_cta'] ) ? $data['primary_cta'] : 'Đăng ký tư vấn' ); ?></a></p>
			</div>
			<div class="study-benefit-grid<?php echo 4 === count( $data['benefits'] ) ? ' study-benefit-grid--four' : ''; ?>">
				<?php foreach ( $data['benefits'] as $benefit ) : ?>
					<article>
						<span class="study-icon"><?php echo esc_html( $benefit['icon'] ); ?></span>
						<h3><?php echo esc_html( $benefit['title'] ); ?></h3>
						<p><?php echo esc_html( $benefit['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $data['companies'] ) ) : ?>
		<section class="section lp-companies" id="doanh-nghiep">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $data['companies']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['companies']['intro'] ); ?></p>
				</div>
				<dl class="lp-figures">
					<?php foreach ( $data['companies']['figures'] as $figure ) : ?>
						<div><dt><?php echo esc_html( $figure[0] ); ?></dt><dd><?php echo esc_html( $figure[1] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
				<?php if ( ! empty( $data['companies']['note'] ) ) : ?><p class="lp-note"><?php echo esc_html( $data['companies']['note'] ); ?></p><?php endif; ?>
				<?php if ( ! empty( $data['companies']['list_summary'] ) ) : ?><details class="lp-details lp-details--wide"><summary><?php echo esc_html( $data['companies']['list_summary'] ); ?></summary><?php endif; ?>
				<div class="lp-ledger-wrap lp-ledger-wrap--always">
					<table class="lp-ledger lp-ledger--list">
						<thead><tr><th scope="col">Doanh nghiệp</th><th scope="col">Địa điểm</th><th scope="col">Lĩnh vực</th></tr></thead>
						<tbody>
							<?php foreach ( $data['companies']['list'] as $company ) : ?>
								<tr><th scope="row"><?php echo esc_html( $company[0] ); ?></th><td data-label="Địa điểm"><?php echo esc_html( $company[1] ); ?></td><td data-label="Lĩnh vực"><?php echo esc_html( $company[2] ); ?></td></tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php if ( ! empty( $data['companies']['list_summary'] ) ) : ?></details><?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['cta_band'] ) ) : ?>
		<section class="lp-band" aria-label="Đăng ký tư vấn">
			<div class="container lp-band-inner">
				<div>
					<h2><?php echo esc_html( $data['cta_band']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['cta_band']['text'] ); ?></p>
				</div>
				<?php get_template_part( 'template-parts/quick', 'form', array( 'program' => 'Du học ' . $data['name'], 'button' => isset( $data['cta_band']['button'] ) ? $data['cta_band']['button'] : 'Đăng ký tư vấn', 'note' => '' ) ); ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['focus'] ) ) : ?>
		<section class="section lp-focus" id="chuong-trinh">
			<div class="container lp-focus-layout">
				<div class="lp-focus-main">
					<p class="lp-focus-tag"><?php echo esc_html( $data['focus']['tag'] ); ?></p>
					<h2><?php echo esc_html( $data['focus']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['focus']['intro'] ); ?></p>
					<dl class="lp-focus-facts">
						<?php foreach ( $data['focus']['facts'] as $fact ) : ?>
							<div><dt><?php echo esc_html( $fact[0] ); ?></dt><dd><?php echo esc_html( $fact[1] ); ?></dd></div>
						<?php endforeach; ?>
					</dl>
				</div>
				<div class="lp-focus-other">
					<h3><?php echo esc_html( $data['focus']['other_title'] ); ?></h3>
					<?php foreach ( $data['focus']['other'] as $option ) : ?>
						<details class="lp-details">
							<summary><?php echo esc_html( $option[0] ); ?></summary>
							<p><?php echo esc_html( $option[1] ); ?></p>
							<ul><?php foreach ( $option[2] as $line ) : ?><li><?php echo esc_html( $line ); ?></li><?php endforeach; ?></ul>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php elseif ( ! empty( $data['visas'] ) ) : ?>
		<section class="section study-program-section" id="chuong-trinh">
			<div class="container">
				<div class="section-heading section-heading-center">
					<span class="eyebrow">Chọn đúng hướng đi</span>
					<h2><?php echo esc_html( $data['visas_title'] ); ?></h2>
					<p><?php echo esc_html( $data['visas_intro'] ); ?></p>
				</div>
				<div class="lp-ledger-wrap<?php echo empty( $data['visas_pair'] ) ? '' : ' lp-ledger-wrap--pair'; ?>">
					<table class="lp-ledger<?php echo empty( $data['visas_pair'] ) ? '' : ' lp-ledger--pair'; ?>">
						<thead>
							<tr>
								<th scope="col"><span class="screen-reader-text">Tiêu chí</span></th>
								<?php foreach ( $data['visas'] as $visa ) : ?>
									<th scope="col"<?php echo empty( $visa['featured'] ) ? '' : ' class="is-featured"'; ?>><span><?php echo esc_html( $visa['tag'] ); ?></span><?php echo esc_html( $visa['title'] ); ?></th>
								<?php endforeach; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $data['visas'][0]['rows'] as $row_index => $row ) : ?>
								<tr>
									<th scope="row"><?php echo esc_html( $row[0] ); ?></th>
									<?php foreach ( $data['visas'] as $visa ) : ?>
										<td<?php echo empty( $visa['featured'] ) ? '' : ' class="is-featured"'; ?> data-label="<?php echo esc_attr( $visa['tag'] ); ?>"><?php echo esc_html( $visa['rows'][ $row_index ][1] ); ?></td>
									<?php endforeach; ?>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="study-visa-grid"<?php echo empty( $data['visas_pair'] ) ? '' : ' hidden'; ?>>
					<?php foreach ( $data['visas'] as $visa ) : ?>
						<article class="study-visa-card<?php echo empty( $visa['featured'] ) ? '' : ' is-featured'; ?>">
							<span class="study-program-tag"><?php echo esc_html( $visa['tag'] ); ?></span>
							<h3><?php echo esc_html( $visa['title'] ); ?></h3>
							<dl>
								<?php foreach ( $visa['rows'] as $row ) : ?>
									<div><dt><?php echo esc_html( $row[0] ); ?></dt><dd><?php echo esc_html( $row[1] ); ?></dd></div>
								<?php endforeach; ?>
							</dl>
						</article>
					<?php endforeach; ?>
				</div>
				<?php if ( ! empty( $data['visas_note'] ) ) : ?><p class="lp-block-note"><?php echo esc_html( $data['visas_note'] ); ?></p><?php endif; ?>
			</div>
		</section>
	<?php else : ?>
	<section class="section study-program-section" id="chuong-trinh">
		<div class="container">
			<div class="section-heading heading-row">
				<div><span class="eyebrow">Chọn đúng hướng đi</span><h2>Chương trình nổi bật</h2></div>
				<p><?php echo esc_html( isset( $data['programs_intro'] ) ? $data['programs_intro'] : 'Mỗi hồ sơ được đánh giá riêng để lựa chọn bậc học, trường và kỳ nhập học phù hợp.' ); ?></p>
			</div>
			<div class="content-carousel content-carousel--three study-program-carousel" data-content-carousel data-interval="3000">
				<div class="content-carousel-viewport" role="region" aria-label="Chương trình du học nổi bật">
					<div class="study-program-grid content-carousel-track" data-carousel-track>
						<?php foreach ( $data['programs'] as $program ) : ?>
							<article class="study-program-card">
								<span class="study-program-tag"><?php echo esc_html( $program['tag'] ); ?></span>
								<h3><?php echo esc_html( $program['title'] ); ?></h3>
								<p><?php echo esc_html( $program['text'] ); ?></p>
								<ul>
									<?php foreach ( $program['items'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?>
								</ul>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="content-carousel-controls">
					<button type="button" data-carousel-prev aria-label="Xem nhóm chương trình trước">‹</button>
					<div class="content-carousel-dots" data-carousel-dots aria-label="Chọn nhóm chương trình"></div>
					<button type="button" data-carousel-next aria-label="Xem nhóm chương trình tiếp theo">›</button>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['regions'] ) ) : ?>
		<section class="section study-regions" id="truong">
			<div class="container">
				<div class="section-heading section-heading-center">
					<span class="eyebrow">Mạng lưới trường đối tác</span>
					<h2><?php echo esc_html( $data['regions_title'] ); ?></h2>
					<p><?php echo esc_html( $data['regions_intro'] ); ?></p>
				</div>
				<div class="study-region-grid">
					<?php foreach ( $data['regions'] as $region ) : ?>
						<article class="study-region">
							<h3><?php echo esc_html( $region['title'] ); ?></h3>
							<ul>
								<?php foreach ( $region['schools'] as $school ) : ?>
									<li<?php echo empty( $school['image'] ) ? '' : ' class="has-image"'; ?>>
										<?php if ( ! empty( $school['image'] ) ) : ?><img src="<?php echo letco_asset( $school['image'] ); ?>" alt="<?php echo esc_attr( $school['name'] ); ?>" loading="lazy"><?php endif; ?>
										<div>
										<strong><?php if ( ! empty( $school['url'] ) && in_array( $school['url'], $landing_urls, true ) ) : ?><a href="<?php echo esc_url( home_url( $school['url'] ) ); ?>"><?php echo esc_html( $school['name'] ); ?> <span aria-hidden="true">→</span></a><?php else : ?><?php echo esc_html( $school['name'] ); ?><?php endif; ?></strong>
										<p><?php echo esc_html( $school['text'] ); ?></p>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['majors'] ) ) : ?>
		<section class="section study-majors" id="nganh-hoc">
			<div class="container">
			<div class="section-heading section-heading-center">
				<span class="eyebrow">Ngành đào tạo mũi nhọn</span>
				<h2><?php echo esc_html( isset( $data['majors_title'] ) ? $data['majors_title'] : 'Chọn ngành theo định hướng việc làm' ); ?></h2>
				<?php if ( ! empty( $data['majors_intro'] ) ) : ?><p><?php echo esc_html( $data['majors_intro'] ); ?></p><?php endif; ?>
				</div>
				<?php if ( empty( $data['majors'][0]['duration'] ) ) : ?>
					<ul class="study-major-chips">
						<?php foreach ( $data['majors'] as $major ) : ?><li><?php echo esc_html( $major['name'] ); ?></li><?php endforeach; ?>
					</ul>
				<?php else : ?>
				<div class="study-major-table<?php echo empty( $data['majors'][0]['career'] ) ? ' study-major-table--compact' : ''; ?>" role="table" aria-label="Danh mục ngành đào tạo">
					<div class="study-major-row study-major-head" role="row">
					<span role="columnheader">Khoa / khối ngành</span><span role="columnheader"><?php echo esc_html( isset( $data['majors_duration_label'] ) ? $data['majors_duration_label'] : 'Thời gian' ); ?></span><span role="columnheader"><?php echo esc_html( isset( $data['majors_detail_label'] ) ? $data['majors_detail_label'] : 'Chuyên ngành chi tiết' ); ?></span><span role="columnheader"><?php echo esc_html( isset( $data['majors_career_label'] ) ? $data['majors_career_label'] : 'Định hướng việc làm' ); ?></span>
					</div>
					<?php foreach ( $data['majors'] as $major ) : ?>
						<div class="study-major-row" role="row">
							<strong role="cell"><?php echo esc_html( $major['name'] ); ?></strong>
							<span role="cell" class="study-major-duration"><?php echo esc_html( $major['duration'] ); ?></span>
							<p role="cell" data-label="Chuyên ngành"><?php echo esc_html( $major['detail'] ); ?></p>
							<?php if ( ! empty( $major['career'] ) ) : ?><p role="cell" data-label="Việc làm"><?php echo esc_html( $major['career'] ); ?></p><?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
				<?php if ( ! empty( $data['majors_note'] ) ) : ?><p class="lp-block-note"><?php echo esc_html( $data['majors_note'] ); ?></p><?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['budget'] ) ) : ?>
		<section class="section lp-budget" id="chi-phi">
			<div class="container">
				<div class="lp-budget-head">
					<div class="section-heading">
						<h2><?php echo esc_html( $data['budget']['title'] ); ?></h2>
						<p><?php echo esc_html( $data['budget']['intro'] ); ?></p>
					</div>
					<p class="lp-budget-total"><span><?php echo esc_html( $data['budget']['total_label'] ); ?></span><strong><?php echo esc_html( $data['budget']['total'] ); ?></strong><span class="lp-budget-lines"><?php foreach ( $data['budget']['groups'] as $group ) : ?><span><span><?php echo esc_html( $group['title'] ); ?></span><b><?php echo esc_html( $group['amount'] ); ?></b></span><?php endforeach; ?></span><small><?php echo esc_html( $data['budget']['total_note'] ); ?><?php if ( ! empty( $data['budget']['total_source'] ) ) : ?> <a href="<?php echo esc_url( $data['budget']['total_source'][1] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $data['budget']['total_source'][0] ); ?></a><?php endif; ?></small></p>
				</div>
				<div class="lp-budget-body">
					<div class="lp-budget-groups">
						<?php foreach ( $data['budget']['groups'] as $group ) : ?>
							<details class="lp-budget-group">
								<summary><span><?php echo esc_html( $group['title'] ); ?></span><strong><?php echo esc_html( $group['amount'] ); ?></strong></summary>
								<div class="lp-budget-group-panel">
									<ul>
										<?php foreach ( $group['rows'] as $row ) : ?>
											<li><span><?php echo esc_html( $row[0] ); ?><?php if ( ! empty( $row[2] ) ) : ?><small><?php echo esc_html( $row[2] ); ?></small><?php endif; ?></span><span><?php echo esc_html( $row[1] ); ?></span></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</details>
						<?php endforeach; ?>
					</div>
					<aside class="lp-budget-aside">
						<?php foreach ( $data['budget']['scope'] as $scope ) : ?>
							<h3><?php echo esc_html( $scope[0] ); ?></h3>
							<ul><?php foreach ( $scope[1] as $line ) : ?><li><?php echo esc_html( $line ); ?></li><?php endforeach; ?></ul>
						<?php endforeach; ?>
						<a class="lp-button lp-button--block" href="#dang-ky"><?php echo esc_html( $data['budget']['button'] ); ?></a>
					</aside>
				</div>
				<?php foreach ( $data['budget']['reference'] as $reference ) : ?>
					<details class="lp-details lp-details--wide">
						<summary><?php echo esc_html( $reference['title'] ); ?></summary>
						<?php if ( ! empty( $reference['intro'] ) ) : ?><p><?php echo esc_html( $reference['intro'] ); ?></p><?php endif; ?>
						<ul class="lp-ref-list">
							<?php foreach ( $reference['rows'] as $row ) : ?>
								<li><span><?php echo esc_html( $row[0] ); ?><?php if ( ! empty( $row[2] ) ) : ?><small><?php echo esc_html( $row[2] ); ?></small><?php endif; ?></span><span><?php echo esc_html( $row[1] ); ?></span></li>
							<?php endforeach; ?>
						</ul>
					</details>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['costs'] ) ) : ?>
		<section class="section study-costs" id="chi-phi">
			<div class="container">
				<div class="section-heading section-heading-center">
					<span class="eyebrow">Biểu phí & dự toán tài chính</span>
					<h2><?php echo esc_html( isset( $data['costs']['title'] ) ? $data['costs']['title'] : 'Học phí & học bổng tham khảo' ); ?></h2>
				</div>
				<div class="study-cost-layout<?php echo empty( $data['costs']['projection'] ) ? ' study-cost-layout--single' : ''; ?>">
					<article class="study-cost-card">
						<h3><?php echo esc_html( $data['costs']['items_title'] ); ?></h3>
						<ul>
							<?php foreach ( $data['costs']['items'] as $cost ) : ?>
								<li>
									<div><strong><?php echo esc_html( $cost['label'] ); ?></strong><?php if ( $cost['note'] ) : ?><small><?php echo esc_html( $cost['note'] ); ?></small><?php endif; ?></div>
									<span><?php echo esc_html( $cost['amount'] ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php if ( ! empty( $data['costs']['total'] ) ) : ?>
							<p class="study-cost-total"><span><?php echo esc_html( $data['costs']['total_label'] ); ?></span><strong><?php echo esc_html( $data['costs']['total'] ); ?></strong></p>
						<?php endif; ?>
					</article>
					<?php if ( ! empty( $data['costs']['projection'] ) ) : ?>
					<article class="study-cost-card study-cost-projection">
						<h3><?php echo esc_html( $data['costs']['projection_title'] ); ?></h3>
						<ul>
							<?php foreach ( $data['costs']['projection'] as $row ) : ?>
								<li><div><strong><?php echo esc_html( $row['label'] ); ?></strong><?php if ( ! empty( $row['note'] ) ) : ?><small><?php echo esc_html( $row['note'] ); ?></small><?php endif; ?></div><span><?php echo esc_html( $row['amount'] ); ?></span></li>
							<?php endforeach; ?>
						</ul>
						<?php if ( ! empty( $data['costs']['net'] ) ) : ?>
							<p class="study-cost-total"><span><?php echo esc_html( $data['costs']['net_label'] ); ?></span><strong><?php echo esc_html( $data['costs']['net'] ); ?></strong></p>
							<?php if ( ! empty( $data['costs']['net_note'] ) ) : ?><p class="study-cost-total-note"><?php echo esc_html( $data['costs']['net_note'] ); ?></p><?php endif; ?>
						<?php endif; ?>
					</article>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $data['costs']['tip'] ) ) : ?>
					<p class="study-cost-tip"><strong>Chiến lược tối ưu chi phí:</strong> <?php echo esc_html( $data['costs']['tip'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $data['costs']['notes'] ) ) : ?>
					<ul class="lp-cost-notes">
						<?php foreach ( $data['costs']['notes'] as $cost_note ) : ?>
							<li><strong><?php echo esc_html( $cost_note[0] ); ?></strong><?php echo esc_html( $cost_note[1] ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if ( ! empty( $data['costs']['note'] ) ) : ?>
					<p class="study-cost-note"><?php echo esc_html( $data['costs']['note'] ); ?></p>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['scholarships'] ) ) : ?>
		<section class="section study-benefits study-scholarships" id="hoc-bong">
			<div class="container">
				<div class="section-heading section-heading-center">
					<span class="eyebrow">Chính sách học bổng</span>
					<h2><?php echo esc_html( $data['scholarships_title'] ); ?></h2>
				</div>
				<?php if ( ! empty( $data['scholarships_compact'] ) ) : ?>
				<dl class="lp-deflist">
					<?php foreach ( $data['scholarships'] as $scholarship ) : ?>
						<div><dt><?php echo esc_html( $scholarship['title'] ); ?></dt><dd><?php echo esc_html( $scholarship['text'] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
				<?php else : ?>
				<div class="study-benefit-grid<?php echo 4 === count( $data['scholarships'] ) ? ' study-benefit-grid--four' : ''; ?>">
					<?php foreach ( $data['scholarships'] as $scholarship ) : ?>
						<article>
							<span class="study-icon"><?php echo esc_html( $scholarship['icon'] ); ?></span>
							<h3><?php echo esc_html( $scholarship['title'] ); ?></h3>
							<p><?php echo esc_html( $scholarship['text'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['conditions'] ) ) : ?>
	<section class="section study-conditions" id="dieu-kien">
		<div class="container study-split">
			<div class="study-split-copy">
				<span class="eyebrow eyebrow-light"><?php echo esc_html( isset( $data['conditions_eyebrow'] ) ? $data['conditions_eyebrow'] : 'Điều kiện tham khảo' ); ?></span>
				<h2><?php echo esc_html( isset( $data['conditions_title'] ) ? $data['conditions_title'] : 'Bạn đã sẵn sàng cho hành trình du học?' ); ?></h2>
				<p><?php echo esc_html( isset( $data['conditions_intro'] ) ? $data['conditions_intro'] : 'Điều kiện chính thức thay đổi theo trường, chương trình và từng thời điểm. LETCO sẽ kiểm tra hồ sơ trước khi đưa ra lộ trình.' ); ?></p>
				<?php if ( ! empty( $data['documents'] ) ) : ?>
					<?php if ( ! empty( $data['documents_collapsed'] ) ) : ?>
					<details class="study-documents study-documents--details">
						<summary>Hồ sơ cần chuẩn bị (<?php echo esc_html( count( $data['documents'] ) ); ?> mục)</summary>
						<ol>
							<?php foreach ( $data['documents'] as $document ) : ?><li><?php echo esc_html( $document ); ?></li><?php endforeach; ?>
						</ol>
					</details>
					<?php else : ?>
					<div class="study-documents">
						<h3>Hồ sơ cần chuẩn bị</h3>
						<ol>
							<?php foreach ( $data['documents'] as $document ) : ?><li><?php echo esc_html( $document ); ?></li><?php endforeach; ?>
						</ol>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<a class="lp-button lp-button--light" href="#dang-ky"><?php echo esc_html( isset( $data['conditions_button'] ) ? $data['conditions_button'] : 'Đăng ký tư vấn' ); ?></a>
			</div>
			<div class="study-condition-list">
				<?php foreach ( $data['conditions'] as $index => $condition ) : ?>
					<div><span>0<?php echo esc_html( $index + 1 ); ?></span><p><?php echo esc_html( $condition ); ?></p></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['responsibilities'] ) ) : ?>
	<section class="section lp-responsibilities" id="ho-tro">
		<div class="container">
			<div class="section-heading">
				<span class="eyebrow"><?php echo esc_html( $data['responsibilities']['eyebrow'] ); ?></span>
				<h2><?php echo esc_html( $data['responsibilities']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['responsibilities']['intro'] ); ?></p>
			</div>
			<div class="lp-responsibility-grid">
				<?php foreach ( $data['responsibilities']['groups'] as $group ) : ?>
					<article>
						<?php letco_fold_open( $group[0] ); ?>
							<ul><?php foreach ( $group[1] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
						<?php letco_fold_close(); ?>
					</article>
				<?php endforeach; ?>
			</div>
			<?php if ( ! empty( $data['responsibilities']['note'] ) ) : ?><p class="lp-block-note"><?php echo esc_html( $data['responsibilities']['note'] ); ?></p><?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<section class="section study-roadmap" id="lo-trinh">
		<div class="container">
			<div class="section-heading section-heading-center">
				<span class="eyebrow">Quy trình đồng hành</span>
				<h2><?php echo esc_html( count( $steps ) ); ?> bước cùng LETCO</h2>
				<?php if ( ! empty( $data['steps_intro'] ) ) : ?><p><?php echo esc_html( $data['steps_intro'] ); ?></p><?php endif; ?>
			</div>
			<div class="study-timeline study-timeline--<?php echo esc_attr( count( $steps ) ); ?>">
				<?php foreach ( $steps as $index => $step ) : ?>
					<article><span><?php echo esc_html( $index + 1 ); ?></span><h3><?php echo esc_html( $step[0] ); ?></h3><p><?php echo esc_html( $step[1] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $data['organizer'] ) ) : ?>
		<section class="section lp-organizer" id="don-vi">
			<div class="container">
				<div class="lp-organizer-layout">
					<div class="lp-organizer-copy">
						<h2><?php echo esc_html( $data['organizer']['title'] ); ?></h2>
						<p><?php echo esc_html( $data['organizer']['intro'] ); ?></p>
						<dl>
							<?php foreach ( $data['organizer']['points'] as $point ) : ?>
								<div><dt><?php echo esc_html( $point[0] ); ?></dt><dd><?php echo esc_html( $point[1] ); ?></dd></div>
							<?php endforeach; ?>
						</dl>
						<?php if ( ! empty( $data['organizer']['source'] ) ) : ?><p class="lp-source">Nguồn: <a href="<?php echo esc_url( $data['organizer']['source'][1] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $data['organizer']['source'][0] ); ?></a></p><?php endif; ?>
					</div>
					<div class="lp-organizer-photos">
						<?php foreach ( $data['organizer']['photos'] as $photo ) : ?>
							<figure>
								<img src="<?php echo letco_asset( $photo[0] ); ?>" alt="<?php echo esc_attr( $photo[1] ); ?>" loading="lazy">
								<figcaption><?php echo esc_html( $photo[1] ); ?></figcaption>
							</figure>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['schedule'] ) ) : ?>
		<section class="section lp-schedule" id="tuyen-sinh">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $data['schedule']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['schedule']['intro'] ); ?></p>
				</div>
				<div class="lp-ledger-wrap lp-ledger-wrap--always">
					<table class="lp-ledger lp-ledger--list">
						<thead><tr><?php foreach ( $data['schedule']['head'] as $cell ) : ?><th scope="col"><?php echo esc_html( $cell ); ?></th><?php endforeach; ?></tr></thead>
						<tbody>
							<?php foreach ( $data['schedule']['rows'] as $row ) : ?>
								<tr><th scope="row"><?php echo esc_html( $row[0] ); ?></th><td data-label="<?php echo esc_attr( $data['schedule']['head'][1] ); ?>"><?php echo esc_html( $row[1] ); ?></td><td data-label="<?php echo esc_attr( $data['schedule']['head'][2] ); ?>"><?php echo esc_html( $row[2] ); ?></td></tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<ul class="lp-plain-list">
					<?php foreach ( $data['schedule']['notes'] as $note ) : ?><li><?php echo esc_html( $note ); ?></li><?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php foreach ( isset( $data['blocks'] ) ? $data['blocks'] : array() as $block_id => $block ) : ?>
		<section class="section lp-campus lp-block" id="<?php echo esc_attr( $block_id ); ?>">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $block['title'] ); ?></h2>
					<?php if ( ! empty( $block['intro'] ) ) : ?><p><?php echo esc_html( $block['intro'] ); ?></p><?php endif; ?>
				</div>
				<div class="lp-campus-grid lp-campus-grid--<?php echo esc_attr( count( $block['groups'] ) ); ?>">
					<?php foreach ( $block['groups'] as $group ) : ?>
						<div>
							<h3><?php echo esc_html( $group[0] ); ?></h3>
							<p><?php echo esc_html( $group[1] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
				<?php if ( ! empty( $block['note'] ) ) : ?><p class="lp-block-note"><?php echo esc_html( $block['note'] ); ?></p><?php endif; ?>
				<?php if ( ! empty( $block['button'] ) ) : ?><p class="lp-block-action"><a class="lp-button" href="#dang-ky"><?php echo esc_html( $block['button'] ); ?></a></p><?php endif; ?>
			</div>
		</section>
	<?php endforeach; ?>

	<?php if ( ! empty( $data['quotes'] ) ) : ?>
		<section class="section lp-quotes" id="cam-nhan">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $data['quotes']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['quotes']['intro'] ); ?></p>
				</div>
				<?php if ( empty( $data['quotes']['image'] ) ) : ?>
				<div class="lp-comment">
					<?php foreach ( $data['quotes']['list'] as $quote ) : ?>
						<blockquote><p><?php echo esc_html( $quote ); ?></p></blockquote>
					<?php endforeach; ?>
					<p class="lp-story-by"><?php echo esc_html( $data['quotes']['by'] ); ?></p>
					<?php if ( ! empty( $data['quotes']['note'] ) ) : ?><p class="lp-comment-note"><?php echo esc_html( $data['quotes']['note'] ); ?></p><?php endif; ?>
				</div>
				<?php else : ?>
				<div class="lp-story">
					<figure class="lp-story-media">
						<img src="<?php echo letco_asset( $data['quotes']['image'] ); ?>" alt="<?php echo esc_attr( $data['quotes']['caption'] ); ?>" loading="lazy">
						<figcaption><?php echo esc_html( $data['quotes']['caption'] ); ?></figcaption>
					</figure>
					<div class="lp-story-copy">
						<?php foreach ( $data['quotes']['list'] as $quote ) : ?>
							<blockquote><p><?php echo esc_html( $quote ); ?></p></blockquote>
						<?php endforeach; ?>
						<p class="lp-story-by"><?php echo esc_html( $data['quotes']['by'] ); ?></p>
						<?php if ( ! empty( $data['quotes']['results'] ) ) : ?>
						<dl class="lp-story-results">
							<?php foreach ( $data['quotes']['results'] as $result ) : ?>
								<div><dt><?php echo esc_html( $result[0] ); ?></dt><dd><?php echo esc_html( $result[1] ); ?></dd></div>
							<?php endforeach; ?>
						</dl>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['campus'] ) ) : ?>
		<section class="section lp-campus" id="khuon-vien">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $data['campus']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['campus']['intro'] ); ?></p>
				</div>
				<?php if ( ! empty( $data['campus']['collapsed'] ) ) : ?>
					<?php foreach ( $data['campus']['groups'] as $group ) : ?>
						<details class="lp-details lp-details--wide"><summary><?php echo esc_html( $group[0] ); ?></summary><p><?php echo esc_html( $group[1] ); ?></p></details>
					<?php endforeach; ?>
				<?php else : ?>
				<div class="lp-campus-grid">
					<?php foreach ( $data['campus']['groups'] as $group ) : ?>
						<div>
							<h3><?php echo esc_html( $group[0] ); ?></h3>
							<p><?php echo esc_html( $group[1] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php foreach ( isset( $data['galleries'] ) ? $data['galleries'] : array() as $gallery_id => $gallery ) : ?>
		<section class="section lp-gallery<?php echo empty( $gallery['compact'] ) ? '' : ' lp-gallery--compact'; ?>" id="<?php echo esc_attr( $gallery_id ); ?>">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $gallery['title'] ); ?></h2>
					<p><?php echo esc_html( $gallery['intro'] ); ?></p>
					<?php if ( ! empty( $gallery['source'] ) ) : ?><p class="lp-source">Nguồn: <a href="<?php echo esc_url( $gallery['source'][1] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $gallery['source'][0] ); ?></a></p><?php endif; ?>
				</div>
				<div class="<?php echo empty( $gallery['compact'] ) ? 'lp-mosaic lp-mosaic--' . esc_attr( count( $gallery['photos'] ) ) : 'lp-photo-pair'; ?>">
					<?php foreach ( $gallery['photos'] as $photo ) : ?>
						<figure>
							<img src="<?php echo letco_asset( $photo['image'] ); ?>" alt="<?php echo esc_attr( $photo['caption'] ); ?>" loading="lazy">
							<figcaption><?php echo esc_html( $photo['caption'] ); ?></figcaption>
						</figure>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endforeach; ?>

	<?php if ( ! empty( $data['work'] ) ) : ?>
		<section class="section study-conditions study-work" id="lam-them">
			<div class="container study-split">
				<div class="study-split-copy">
					<span class="eyebrow eyebrow-light"><?php echo esc_html( $data['work']['eyebrow'] ); ?></span>
					<h2><?php echo esc_html( $data['work']['title'] ); ?></h2>
					<ul class="study-work-rules">
						<?php foreach ( $data['work']['rules'] as $rule ) : ?>
							<li><strong><?php echo esc_html( $rule[0] ); ?></strong> <?php echo esc_html( $rule[1] ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php if ( ! empty( $data['work']['career'] ) ) : ?>
						<div class="study-documents">
							<h3><?php echo esc_html( $data['work']['career_title'] ); ?></h3>
							<p><?php echo esc_html( $data['work']['career'] ); ?></p>
						</div>
					<?php endif; ?>
				</div>
				<div class="study-condition-list">
					<?php foreach ( $data['work']['stages'] as $stage ) : ?>
						<div><span><?php echo esc_html( $stage[0] ); ?></span><p><?php echo esc_html( $stage[1] ); ?></p></div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['partners'] ) ) : ?>
	<section class="section study-partners" id="doi-tac">
		<div class="container study-partner-layout">
			<div class="study-partner-copy">
				<span class="eyebrow">Mạng lưới giáo dục</span>
				<h2><?php echo esc_html( isset( $data['partners_title'] ) ? $data['partners_title'] : 'Trường và chương trình đối tác' ); ?></h2>
				<p><?php echo esc_html( isset( $data['partners_intro'] ) ? $data['partners_intro'] : 'LETCO kết nối người học với các trường và chương trình phù hợp, ưu tiên chất lượng đào tạo, trải nghiệm thực tế và lộ trình phát triển sau tốt nghiệp.' ); ?></p>
				<div class="study-partner-count"><strong><?php echo esc_html( count( $data['partners'] ) ); ?></strong><span>lựa chọn trường & chương trình tiêu biểu</span></div>
			</div>
			<div class="content-carousel content-carousel--study-partners study-partner-carousel" data-content-carousel data-interval="3000">
				<div class="content-carousel-viewport" role="region" aria-label="Trường và chương trình đối tác">
					<div class="study-partner-list content-carousel-track" data-carousel-track>
						<?php foreach ( $data['partners'] as $partner ) : ?>
							<article>
								<div class="study-partner-image"><img src="<?php echo letco_asset( $partner['image'] ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>"><span class="study-partner-flag"><?php echo esc_html( $data['flag'] ); ?></span></div>
								<div class="study-partner-card-copy"><small><?php echo esc_html( $partner['type'] ); ?></small><strong><?php echo esc_html( $partner['name'] ); ?></strong><p><?php echo esc_html( $partner['text'] ); ?></p><?php if ( ! empty( $partner['url'] ) && in_array( $partner['url'], $landing_urls, true ) ) : ?><a class="study-partner-link" href="<?php echo esc_url( home_url( $partner['url'] ) ); ?>">Xem chương trình</a><?php endif; ?></div>
							</article>
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
	<?php endif; ?>

	<?php if ( ! empty( $data['faq'] ) ) : ?>
	<section class="section study-faq" id="faq">
		<div class="container study-faq-layout">
			<div><span class="eyebrow">Câu hỏi thường gặp</span><h2>Điều bạn cần biết trước khi bắt đầu</h2><p>Chưa tìm thấy câu trả lời? Hãy để lại thông tin, chuyên viên LETCO sẽ liên hệ tư vấn.</p></div>
			<div class="study-accordion">
				<?php foreach ( $data['faq'] as $index => $item ) : ?>
					<details <?php echo 0 === $index ? 'open' : ''; ?>><summary><?php echo esc_html( $item['q'] ); ?><span aria-hidden="true"></span></summary><p><?php echo esc_html( $item['a'] ); ?></p></details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php
	get_template_part(
		'template-parts/lead',
		'form',
		array(
			'lead'       => isset( $data['lead'] ) ? $data['lead'] : array(
				'title'   => 'Nhận lộ trình du học ' . $data['name'] . ' phù hợp với bạn',
				'intro'   => 'Để lại thông tin cơ bản. LETCO sẽ liên hệ để đánh giá hồ sơ, giải đáp chi phí và gợi ý kỳ nhập học phù hợp.',
				'bullets' => array( 'Kiểm tra hồ sơ ban đầu miễn phí', 'Thông tin rõ ràng, không cam kết quá mức', 'Bảo mật thông tin người đăng ký' ),
			),
			'contact'    => isset( $data['contact'] ) ? $data['contact'] : array(),
			'zalo'       => isset( $data['zalo'] ) ? $data['zalo'] : '',
			'contact_in_footer' => 'dai-hoc-daeduk' === $country,
			'compact'    => ! empty( $data['lead_compact'] ),
			'button'     => isset( $data['lead_button'] ) ? $data['lead_button'] : 'Gửi đăng ký',
			'lead_extra' => ! empty( $data['lead_extra'] ),
			'program'    => 'Du học ' . $data['name'],
			'major_choices' => ! empty( $data['majors'] ) ? wp_list_pluck( $data['majors'], 'name' ) : array(),
		)
	);
	?>
<?php
// Print the sections in the page's own order when it sets one; the rest keep
// their template order. Sections are never nested, so a flat match is safe.
$sections_html = ob_get_clean();
if ( ! empty( $data['order'] ) && preg_match_all( '/<section\b[^>]*>.*?<\/section>/s', $sections_html, $matches ) ) {
	$sections = array();
	foreach ( $matches[0] as $section_html ) {
		// Key by id, or by the first class for sections without one (hero, facts, band).
		if ( preg_match( '/^<section\b[^>]*\bid="([^"]+)"/', $section_html, $key ) || preg_match( '/^<section\b[^>]*\bclass="([\w-]+)/', $section_html, $key ) ) {
			$section_key = $key[1];
		} else {
			$section_key = 'section-' . count( $sections );
		}
		if ( ! empty( $data['omit_sections'] ) && in_array( $section_key, $data['omit_sections'], true ) ) {
			continue;
		}
		$sections[ $section_key ] = $section_html;
	}
	$ordered = array();
	foreach ( $data['order'] as $section_key ) {
		if ( isset( $sections[ $section_key ] ) ) {
			$ordered[] = $sections[ $section_key ];
			unset( $sections[ $section_key ] );
		}
	}
	$sections_html = implode( "\n\n", array_merge( $ordered, $sections ) );
}
echo $sections_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped where it was built.
?>

<?php if ( 'dai-hoc-daeduk' === $country ) : ?>
	<?php get_template_part( 'template-parts/consult', 'modal', array( 'data' => $data, 'lead_status' => $lead_status ) ); ?>
<?php endif; ?>
</div>
