<?php
/**
 * Daeduk K-Tech Bridge landing page, laid out like a light travel-agency landing.
 * Decision facts come first: a hero with a floating card, three starting steps
 * with the conditions and intake, programme cards, a navy journey band with the
 * internship and partners, then costs. The school introduction, trust and FAQ
 * follow, then a soft sign-up band. Styles live in assets/css/daeduk.css.
 * $args: data (page config from study-school-configs.php),
 * lead_status (result of a form submission, for the consultation popup).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$data    = $args['data'];
$dk      = $data['dk'];
$hotline = $data['contact']['phones'][0];
$cta     = $data['primary_cta'];

// Centred section heading: small caption, title (with an optional highlighted phrase) and one line of context.
$head = static function ( $label, $title, $intro = '', $mark = '', $align = 'center' ) {
	// Keep "Đại học" on the same line as the school name that follows it.
	$title_html = str_replace( 'Đại học ', 'Đại&nbsp;học&nbsp;', esc_html( $title ) );
	if ( $mark ) {
		$title_html = str_replace( esc_html( $mark ), '<span class="jd-mark">' . esc_html( $mark ) . '</span>', $title_html );
	}
	?>
	<header class="jd-head jd-head--<?php echo esc_attr( $align ); ?>">
		<p class="jd-eyebrow"><?php echo esc_html( $label ); ?></p>
		<h2><?php echo $title_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?></h2>
		<?php if ( $intro ) : ?><p class="jd-intro"><?php echo esc_html( $intro ); ?></p><?php endif; ?>
	</header>
	<?php
};

// Theme image with its intrinsic size, so the layout does not shift while it loads.
$image = static function ( $file, $alt, $attributes = 'loading="lazy"' ) {
	$size = getimagesize( get_template_directory() . '/assets/images/' . $file );
	printf(
		'<img src="%s" alt="%s" width="%d" height="%d" %s>',
		letco_asset( $file ),
		esc_attr( $alt ),
		$size ? (int) $size[0] : 0,
		$size ? (int) $size[1] : 0,
		$attributes // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed attribute strings from this template.
	);
};

// Source line: what kind of source it is, its name, and a clearly styled link out.
$source = static function ( $name, $url = '', $kind = 'Nguồn công khai' ) {
	echo '<span class="jd-src-line"><span class="jd-src-kind">' . esc_html( $kind ) . ':</span> ' . esc_html( $name );
	if ( $url ) {
		echo ' <a class="jd-src" href="' . esc_url( $url ) . '" rel="noopener" target="_blank">Xem nguồn <span aria-hidden="true">↗</span><span class="screen-reader-text"> (mở trong tab mới)</span></a>';
	}
	echo '</span>';
};

// One stroke icon family for the whole page.
$icons = array(
	'bolt'     => '<path d="M13 2 4 14h7l-1 8 9-12h-7z"/>',
	'gear'     => '<circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M2 12h3M19 12h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1"/>',
	'chart'    => '<path d="M3 3v18h18"/><path d="m7 15 4-4 3 3 5-6"/>',
	'chat'     => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M8 9h8M8 13h5"/>',
	'badge'    => '<circle cx="12" cy="8" r="5"/><path d="m8.5 12.5-1.5 9 5-3 5 3-1.5-9"/>',
	'test'     => '<path d="M9 11l3 3 8-8"/><path d="M20 12v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h9"/>',
	'book'     => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V3H6.5A2.5 2.5 0 0 0 4 5.5z"/><path d="M4 19.5V21h16"/>',
	'pin'      => '<path d="M12 22s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12z"/><circle cx="12" cy="10" r="2.5"/>',
	'calendar' => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
	'plane'    => '<path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4z"/>',
	'arrow'    => '<path d="M5 12h14M13 6l6 6-6 6"/>',
);
$icon = static function ( $name, $size = 24 ) use ( $icons ) {
	printf(
		'<svg aria-hidden="true" viewBox="0 0 24 24" width="%1$d" height="%1$d" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">%2$s</svg>',
		(int) $size,
		$icons[ $name ] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed markup above.
	);
};

get_template_part(
	'template-parts/landing',
	'header',
	array(
		'links'   => $dk['nav'],
		'hotline' => $hotline,
		'button'  => $cta,
	)
);

$hero       = $dk['hero'];
$title_html = str_replace( esc_html( $hero['accent'] ), '<em>' . esc_html( $hero['accent'] ) . '</em>', esc_html( $hero['title'] ) );
$fit        = $dk['fit'];
$study      = $dk['study'];
$work       = $dk['work'];
$money      = $dk['money'];
$trust      = $dk['trust'];
$faq        = $dk['faq'];
$moments    = $dk['moments'];
?>

<div class="study-landing <?php echo esc_attr( $data['class'] ); ?> jd-page">

	<section class="jd-hero">
		<span class="jd-hero-blob" aria-hidden="true"></span>
		<div class="container jd-hero-grid">
			<div class="jd-hero-copy">
				<p class="jd-hero-eyebrow"><?php echo esc_html( implode( ' · ', $hero['kicker'] ) ); ?></p>
				<h1><?php echo $title_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?></h1>
				<p class="jd-hero-sub"><?php echo esc_html( $hero['sub'] ); ?></p>
				<p class="jd-hero-lede"><?php echo esc_html( $hero['lede'] ); ?></p>
				<div class="jd-hero-actions">
					<a class="jd-button" href="#dang-ky"><?php echo esc_html( $cta ); ?></a>
					<a class="jd-play" href="<?php echo esc_attr( $hero['link'][1] ); ?>"><span class="jd-play-dot"><?php $icon( 'arrow', 18 ); ?></span><?php echo esc_html( $hero['link'][0] ); ?></a>
				</div>
			</div>
			<figure class="jd-hero-media">
				<span class="jd-plane jd-plane--a" aria-hidden="true"><?php $icon( 'plane', 32 ); ?></span>
				<span class="jd-plane jd-plane--b" aria-hidden="true"><?php $icon( 'plane', 24 ); ?></span>
				<?php $image( $hero['photo'][0], $hero['photo'][1], 'fetchpriority="high"' ); ?>
				<a class="jd-float-card" href="#tuyen-sinh">
					<span class="jd-float-icon"><?php $icon( 'calendar', 20 ); ?></span>
					<span><small><?php echo esc_html( $hero['badge'][0] . ' · ' . $hero['badge'][1] ); ?></small><strong><?php echo esc_html( $hero['badge'][2] . ' ' . $hero['badge'][3] ); ?></strong></span>
				</a>
				<p class="jd-float-tag"><strong><?php echo esc_html( $hero['card'][1] ); ?></strong> <?php echo esc_html( mb_strtolower( $hero['card'][0] ) ); ?></p>
				<figcaption><?php echo esc_html( $hero['photo'][2] ); ?></figcaption>
			</figure>
		</div>
		<div class="container">
			<dl class="jd-facts">
				<?php foreach ( $hero['facts'] as $fact ) : ?>
					<div<?php echo empty( $fact[2] ) ? '' : ' class="is-' . esc_attr( $fact[2] ) . '"'; ?>>
						<dt><span><?php echo esc_html( $fact[4] ); ?></span><?php echo esc_html( $fact[0] ); ?></dt>
						<dd><?php echo esc_html( $fact[1] ); ?> <a href="<?php echo esc_attr( $fact[3] ); ?>">Xem chi tiết<span class="screen-reader-text"> về <?php echo esc_html( mb_strtolower( $fact[4] ) ); ?></span> <span aria-hidden="true">→</span></a></dd>
					</div>
				<?php endforeach; ?>
			</dl>
		</div>
	</section>

	<section class="section jd-section jd-steps-zone" id="phu-hop">
		<div class="container">
			<div class="jd-steps-grid" id="bat-dau">
				<div>
					<?php $head( $fit['label'], $fit['start_title'], $fit['start_intro'], '', 'left' ); ?>
					<ol class="jd-steps">
						<?php $step_icons = array( 'badge', 'test', 'book' ); ?>
						<?php foreach ( $fit['start'] as $index => $case ) : ?>
							<li class="is-<?php echo esc_attr( (string) $index ); ?>">
								<span class="jd-step-icon"><?php $icon( $step_icons[ $index ], 22 ); ?></span>
								<div>
									<h3><?php echo esc_html( $case[0] ); ?> <span class="jd-step-tag"><?php echo esc_html( $case[2] ); ?></span></h3>
									<p><?php echo esc_html( $case[1] ); ?></p>
								</div>
							</li>
						<?php endforeach; ?>
					</ol>
					<p class="jd-note"><?php $source( $fit['start_source'][0], $fit['start_source'][1] ); ?></p>
				</div>
				<div class="jd-trip">
					<figure class="jd-trip-card">
						<?php $image( $fit['photo'][0], $fit['photo'][1] ); ?>
						<figcaption>
							<strong><?php echo esc_html( $fit['photo'][2] ); ?></strong>
							<span><?php echo esc_html( $fit['photo'][3] ); ?></span>
						</figcaption>
					</figure>
					<p class="jd-trip-chip"><span class="jd-float-icon"><?php $icon( 'calendar', 18 ); ?></span><span><small>Đợt chính thức</small><strong>Nộp đến 20/01/2027</strong></span></p>
				</div>
			</div>

			<div class="jd-block">
				<?php $head( 'Điều kiện', $fit['title'], $fit['intro'], '', 'left' ); ?>
				<div class="jd-split">
					<div class="jd-panel">
						<h3><?php echo esc_html( $fit['conditions_title'] ); ?></h3>
						<ol class="jd-numbered">
							<?php foreach ( $data['conditions'] as $condition ) : ?><li><?php echo esc_html( $condition ); ?></li><?php endforeach; ?>
						</ol>
						<details class="jd-mini-details jd-mini-details--row">
							<summary>Hồ sơ cần chuẩn bị (<?php echo esc_html( count( $data['documents'] ) ); ?> mục)</summary>
							<ul class="jd-ticks"><?php foreach ( $data['documents'] as $document ) : ?><li><?php echo esc_html( $document ); ?></li><?php endforeach; ?></ul>
						</details>
					</div>
					<div class="jd-stack">
						<?php foreach ( $fit['audience'] as $group ) : ?>
							<?php letco_fold_open( $group[0], array( 'class' => 'jd-panel jd-panel--soft' ) ); ?>
								<ul class="jd-ticks"><?php foreach ( $group[1] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
							<?php letco_fold_close(); ?>
						<?php endforeach; ?>
						<details class="jd-mini-details jd-mini-details--row">
							<summary><?php echo esc_html( $fit['compare_title'] ); ?></summary>
							<div class="lp-ledger-wrap lp-ledger-wrap--pair">
								<table class="lp-ledger lp-ledger--pair">
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
													<td<?php echo empty( $visa['featured'] ) ? '' : ' class="is-featured"'; ?>><?php echo esc_html( $visa['rows'][ $row_index ][1] ); ?></td>
												<?php endforeach; ?>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</details>
					</div>
				</div>
			</div>

			<div class="jd-block" id="tuyen-sinh">
				<h3 class="jd-subtitle"><?php echo esc_html( $fit['intake_title'] ); ?></h3>
				<p class="jd-intro"><?php echo esc_html( $data['schedule']['intro'] ); ?></p>
				<ol class="jd-dates">
					<?php foreach ( $fit['intake_key'] as $index => $round ) : ?>
						<li><span class="jd-date-num"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span><p class="jd-date-kind"><?php echo esc_html( $round[0] ); ?></p><p class="jd-date-main"><?php echo esc_html( $round[1] ); ?></p><p><?php echo esc_html( $round[2] ); ?></p></li>
					<?php endforeach; ?>
				</ol>
				<p class="jd-note"><?php $source( 'chương trình K-Tech Bridge', '', 'Tài liệu LETCO cung cấp' ); ?></p>
				<details class="jd-mini-details jd-mini-details--row">
					<summary><?php echo esc_html( $fit['intake_more'] ); ?></summary>
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
					<ul class="jd-ticks"><?php foreach ( $data['schedule']['notes'] as $note ) : ?><li><?php echo esc_html( $note ); ?></li><?php endforeach; ?></ul>
				</details>
				<?php $topik = $data['topik']; ?>
				<p class="jd-callout"><?php echo esc_html( $fit['topik_note'] ); ?></p>
				<details class="jd-mini-details jd-mini-details--row" id="lich-topik">
					<summary><?php echo esc_html( $fit['topik_more'] ); ?></summary>
					<p><?php echo esc_html( $topik['intro'] ); ?> <?php echo esc_html( $topik['vn_note'] ); ?></p>
					<div class="lp-ledger-wrap lp-ledger-wrap--always">
						<table class="lp-ledger lp-ledger--list">
							<thead><tr><?php foreach ( $topik['head'] as $cell ) : ?><th scope="col"><?php echo esc_html( $cell ); ?></th><?php endforeach; ?></tr></thead>
							<tbody>
								<?php foreach ( $topik['rows'] as $row ) : ?>
									<tr>
										<th scope="row"><?php echo esc_html( $row[0] ); ?></th>
										<?php foreach ( array_slice( $row, 1 ) as $cell_index => $cell ) : ?>
											<td data-label="<?php echo esc_attr( $topik['head'][ $cell_index + 1 ] ); ?>"><?php echo esc_html( $cell ); ?></td>
										<?php endforeach; ?>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<ul class="jd-ticks"><?php foreach ( $topik['notes'] as $note ) : ?><li><?php echo esc_html( $note ); ?></li><?php endforeach; ?></ul>
					<p class="jd-note"><?php echo esc_html( $topik['source'] ); ?></p>
					<p class="jd-note"><?php $source( 'Trang chính thức kỳ thi TOPIK (' . $topik['link'][0] . ')', $topik['link'][1] ); ?></p>
				</details>
			</div>
		</div>
	</section>

	<section class="section jd-section jd-services" id="nganh-hoc">
		<div class="container">
			<?php $head( $study['label'], $study['title'], $study['intro'], '', 'split' ); ?>
			<div class="jd-majors" role="list">
				<?php foreach ( $data['majors'] as $major ) : ?>
					<article class="jd-major is-<?php echo esc_attr( $major['tone'] ); ?>" role="listitem">
						<div class="jd-major-top">
							<span class="jd-major-icon"><?php $icon( $major['icon'], 26 ); ?></span>
							<p class="jd-major-badge"><?php echo esc_html( $major['duration'] ); ?> · Cao đẳng</p>
						</div>
						<h3><?php echo esc_html( $major['name'] ); ?></h3>
						<p class="jd-major-summary"><?php echo esc_html( $major['summary'] ); ?></p>
						<?php // Whether the current partner list covers this major, shown before the reader picks it. ?>
						<p class="jd-major-intern is-<?php echo esc_attr( $major['internship'][0] ); ?>"><strong>Thực tập:</strong> <?php echo esc_html( $major['internship'][1] ); ?></p>
						<?php letco_fold_open( 'Kỹ năng và học phần', array( 'tag' => 'p', 'class' => 'jd-major-more' ) ); ?>
							<ul class="jd-ticks"><?php foreach ( $major['skills'] as $skill ) : ?><li><?php echo esc_html( $skill ); ?></li><?php endforeach; ?></ul>
							<details class="jd-mini-details">
								<summary>Học phần tiêu biểu</summary>
								<p><?php echo esc_html( $major['detail'] ); ?></p>
							</details>
						<?php letco_fold_close(); ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section jd-section jd-route-zone" id="thuc-tap">
		<div class="jd-journey">
			<div class="container">
				<?php $head( $work['label'], $work['title'], $work['intro'], '', 'split' ); ?>
				<?php // The paid internship stop carries a link to its conditions, so the two are read together. ?>
				<ol class="jd-route">
					<?php foreach ( $data['bridge']['stops'] as $index => $stop ) : ?>
						<?php $is_paid = 2 === $index; ?>
						<li<?php echo $is_paid ? ' class="is-key"' : ''; ?>>
							<span class="jd-route-num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<div class="jd-route-body">
								<p class="jd-route-when"><?php echo esc_html( $stop[0] ); ?></p>
								<h3><?php echo esc_html( $stop[1] ); ?></h3>
								<p><?php echo esc_html( $stop[2] ); ?></p>
								<?php if ( $is_paid ) : ?><a class="jd-route-link" href="#dieu-kien-thuc-tap">Xem điều kiện áp dụng <span aria-hidden="true">↓</span></a><?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
		<div class="container">
			<div class="jd-split">
				<div class="jd-panel" id="dieu-kien-thuc-tap">
					<h3><?php echo esc_html( $work['terms_title'] ); ?></h3>
					<dl class="jd-terms">
						<?php foreach ( $work['terms'] as $term ) : ?>
							<div<?php echo empty( $term[2] ) ? '' : ' class="is-key"'; ?>><dt><?php echo esc_html( $term[0] ); ?></dt><dd><?php echo esc_html( $term[1] ); ?></dd></div>
						<?php endforeach; ?>
					</dl>
					<p class="jd-note"><?php echo esc_html( $work['rate_note'] ); ?></p>
				</div>
				<div class="jd-stack">
					<div class="jd-photo-row">
						<?php foreach ( $work['photos'] as $photo ) : ?>
							<figure class="jd-photo"><?php $image( $photo[0], $photo[1] ); ?><figcaption><?php echo esc_html( $photo[1] ); ?></figcaption></figure>
						<?php endforeach; ?>
					</div>
					<?php letco_fold_open( $work['ask_title'], array( 'class' => 'jd-panel jd-panel--soft' ) ); ?>
						<ul class="jd-ticks"><?php foreach ( $work['ask'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
					<?php letco_fold_close(); ?>
				</div>
			</div>

			<?php // The only partner list on the page: where, what kind of work, and a picture of that work. ?>
			<div class="jd-block" id="doanh-nghiep">
				<h3 class="jd-subtitle"><?php echo esc_html( $work['companies_title'] . ' (' . count( $data['companies']['list'] ) . ')' ); ?></h3>
				<p class="jd-intro"><?php echo esc_html( $data['companies']['intro'] ); ?></p>
				<ul class="jd-companies">
					<?php foreach ( $data['companies']['list'] as $company ) : ?>
						<li>
							<?php if ( ! empty( $company[3] ) ) : ?>
								<figure><?php $image( $company[3][0], $company[3][1] ); ?></figure>
							<?php endif; ?>
							<h4><?php echo esc_html( $company[0] ); ?></h4>
							<p class="jd-company-where"><?php $icon( 'pin', 14 ); ?> <?php echo esc_html( $company[1] ); ?></p>
							<p><?php echo esc_html( $company[2] ); ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
				<p class="jd-note"><?php echo esc_html( $data['companies']['photo_note'] ); ?> <a href="<?php echo esc_url( home_url( '/nguon-anh/' ) ); ?>">Nguồn ảnh</a></p>
				<p class="jd-callout"><?php echo esc_html( $work['gap_note'] ); ?></p>
			</div>
		</div>
	</section>

	<section class="section jd-section jd-money" id="chi-phi">
		<div class="container">
			<?php $head( $money['label'], $money['title'], $money['intro'] ); ?>
			<?php // The two sums to pay sit side by side with equal weight; neither is a package total. ?>
			<div class="jd-totals">
				<div class="jd-total is-vn">
					<p class="jd-total-label"><?php echo esc_html( $money['total_label'] ); ?></p>
					<p class="jd-total-value"><?php echo esc_html( $money['total'] ); ?></p>
					<p><?php echo esc_html( $money['formula'] ); ?></p>
				</div>
				<span class="jd-totals-plus" aria-hidden="true">+</span>
				<div class="jd-total is-school">
					<p class="jd-total-label"><?php echo esc_html( $money['school_total'][0] ); ?></p>
					<p class="jd-total-value"><?php echo esc_html( $money['school_total'][1] ); ?></p>
					<p><?php echo esc_html( $money['school_total'][2] ); ?></p>
				</div>
			</div>
			<p class="jd-note jd-note--center"><?php echo esc_html( $money['convert'] ); ?> <a class="jd-src" href="<?php echo esc_url( $data['budget']['total_source'][1] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $data['budget']['total_source'][0] ); ?> <span aria-hidden="true">↗</span><span class="screen-reader-text"> (mở trong tab mới)</span></a></p>
			<p class="jd-callout"><?php echo esc_html( $money['rate_note'] ); ?></p>

			<div class="jd-split jd-split--even">
				<div class="jd-panel">
					<h3><?php echo esc_html( $money['outside_title'] ); ?></h3>
					<p class="jd-kicker"><?php echo esc_html( $money['outside_label'] ); ?></p>
					<dl class="jd-terms jd-terms--stack">
						<?php foreach ( $money['outside'] as $item ) : ?>
							<div><dt><?php echo esc_html( $item[0] ); ?></dt><dd><?php echo esc_html( $item[1] ); ?></dd></div>
						<?php endforeach; ?>
					</dl>
				</div>
				<div class="jd-panel jd-panel--warm">
					<p class="jd-kicker"><?php echo esc_html( $money['proof'][0] ); ?></p>
					<h3><?php echo esc_html( $money['proof'][1] ); ?></h3>
					<p><?php echo esc_html( $money['proof'][2] ); ?></p>
				</div>
			</div>

			<div class="jd-payees">
				<?php foreach ( $money['groups'] as $group ) : ?>
					<article class="jd-payee is-<?php echo esc_attr( $group['payee'] ); ?>">
						<p class="jd-payee-where"><?php echo esc_html( $group['where'] ); ?></p>
						<h3><?php echo esc_html( $group['title'] ); ?></h3>
						<p class="jd-payee-amount"><?php echo esc_html( $group['amount'] ); ?></p>
						<?php letco_fold_open( 'Chi tiết từng khoản', array( 'tag' => 'p', 'class' => 'jd-payee-fold' ) ); ?>
						<ul>
							<?php foreach ( $group['rows'] as $row ) : ?>
								<li><span><?php echo esc_html( $row[0] ); ?><?php if ( ! empty( $row[2] ) ) : ?><small><?php echo esc_html( $row[2] ); ?></small><?php endif; ?></span><b><?php echo esc_html( $row[1] ); ?></b></li>
							<?php endforeach; ?>
						</ul>
						<?php letco_fold_close(); ?>
					</article>
				<?php endforeach; ?>
			</div>

			<?php letco_fold_open( $data['payments']['title'], array( 'class' => 'jd-block jd-fold-block lp-payments', 'id' => 'lich-dong-tien' ) ); ?>
				<p class="jd-intro"><?php echo esc_html( $data['payments']['intro'] ); ?></p>
				<ul class="lp-payee-legend" aria-label="Đơn vị nhận tiền">
					<?php foreach ( $data['payments']['payees'] as $payee_key => $payee_label ) : ?><li class="is-<?php echo esc_attr( $payee_key ); ?>"><?php echo esc_html( $payee_label ); ?></li><?php endforeach; ?>
				</ul>
				<ol class="lp-paytrack">
					<?php foreach ( $data['payments']['stages'] as $index => $stage ) : ?>
						<li>
							<span class="lp-paytrack-step"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
							<p class="lp-paytrack-when"><?php echo esc_html( $stage['when'] ); ?></p>
							<h4><?php echo esc_html( $stage['title'] ); ?></h4>
							<ul>
								<?php foreach ( $stage['items'] as $pay ) : ?>
									<li class="is-<?php echo esc_attr( $pay[0] ); ?>"><span><?php echo esc_html( $pay[1] ); ?></span><strong><?php echo esc_html( $pay[2] ); ?></strong></li>
								<?php endforeach; ?>
							</ul>
						</li>
					<?php endforeach; ?>
				</ol>
				<p class="jd-note"><?php echo esc_html( $data['payments']['note'] ); ?></p>
			<?php letco_fold_close(); ?>

			<div class="jd-block" id="hoc-bong">
				<h3 class="jd-subtitle"><?php echo esc_html( $money['scholar_title'] ); ?></h3>
				<div class="jd-split">
					<div class="jd-panel jd-panel--warm">
						<p class="jd-kicker"><?php echo esc_html( $money['scholar_in'][0] ); ?></p>
						<h4><?php echo esc_html( $data['scholarships'][0]['title'] ); ?></h4>
						<p><?php echo esc_html( $money['scholar_in'][1] ); ?></p>
					</div>
					<details class="jd-mini-details jd-mini-details--row">
						<summary><?php echo esc_html( $money['scholar_more'] ); ?> (<?php echo esc_html( (string) ( count( $data['scholarships'] ) - 1 ) ); ?>)</summary>
						<dl class="jd-terms jd-terms--stack">
							<?php foreach ( array_slice( $data['scholarships'], 1 ) as $scholarship ) : ?>
								<div><dt><?php echo esc_html( $scholarship['title'] ); ?></dt><dd><?php echo esc_html( $scholarship['text'] ); ?></dd></div>
							<?php endforeach; ?>
						</dl>
						<p class="jd-note"><?php echo esc_html( $money['scholar_note'] ); ?></p>
					</details>
				</div>
			</div>

			<?php $refund = $data['blocks']['hoan-phi']; ?>
			<div class="jd-block" id="hoan-phi">
				<h3 class="jd-subtitle"><?php echo esc_html( $money['refund_title'] ); ?></h3>
				<p class="jd-kicker"><?php echo esc_html( $money['refund_school'] ); ?></p>
				<div class="jd-refund">
					<?php foreach ( $refund['groups'] as $group ) : ?>
						<div class="jd-panel"><h4><?php echo esc_html( $group[0] ); ?></h4><p><?php echo esc_html( $group[1] ); ?></p></div>
					<?php endforeach; ?>
				</div>
				<div class="jd-callout">
					<p class="jd-kicker"><?php echo esc_html( $money['refund_letco'] ); ?></p>
					<p><?php echo esc_html( $refund['note'] ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="section jd-section jd-destinations" id="truong">
		<div class="container">
			<?php $head( 'Khuôn viên', $study['school_title'], $data['galleries']['daejeon']['intro'] ?? '' ); ?>
			<?php // One photo strip: the campus buildings lead, then the facilities. ?>
			<div class="jd-carousel" data-carousel>
				<button type="button" class="jd-carousel-btn jd-carousel-btn--prev" data-carousel-step="-1" aria-label="Xem cơ sở vật chất trước"><?php $icon( 'arrow', 22 ); ?></button>
				<ul class="jd-cards jd-cards--facilities" tabindex="0" aria-label="<?php echo esc_attr( $study['facilities_title'] ); ?>">
					<?php foreach ( $data['galleries']['daejeon']['photos'] as $photo ) : ?>
						<li>
							<figure class="jd-card">
								<?php $image( $photo['image'], 'Đại học Daeduk: ' . $photo['caption'] ); ?>
								<figcaption>
									<strong><?php echo esc_html( $photo['caption'] ); ?></strong>
									<span><?php $icon( 'pin', 16 ); ?> Đại học Daeduk, Daejeon</span>
								</figcaption>
							</figure>
						</li>
					<?php endforeach; ?>
					<?php foreach ( $study['facilities'] as $facility ) : ?>
						<li>
							<figure class="jd-card">
								<?php $image( $facility[0], $facility[3] ); ?>
								<figcaption>
									<strong><?php echo esc_html( $facility[1] ); ?></strong>
									<span><?php $icon( 'pin', 16 ); ?> <?php echo esc_html( $facility[2] ); ?></span>
								</figcaption>
							</figure>
						</li>
					<?php endforeach; ?>
				</ul>
				<button type="button" class="jd-carousel-btn jd-carousel-btn--next" data-carousel-step="1" aria-label="Xem cơ sở vật chất tiếp theo"><?php $icon( 'arrow', 22 ); ?></button>
			</div>
			<p class="jd-note jd-note--center"><?php echo esc_html( $study['photos_note'] ); ?> <a href="<?php echo esc_url( home_url( '/nguon-anh/' ) ); ?>">Nguồn ảnh</a></p>
			<p class="jd-note jd-note--center"><?php $source( $study['facilities_source'][0], $study['facilities_source'][1] ); ?></p>

			<div class="jd-school">
				<dl class="jd-facts-list">
					<?php foreach ( $data['benefits'] as $benefit ) : ?>
						<div><dt><?php echo esc_html( $benefit['title'] ); ?></dt><dd><?php echo esc_html( $benefit['text'] ); ?> <?php $source( $benefit['source'][0], $benefit['source'][1] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
				<div class="jd-campus">
					<h3><?php echo esc_html( $study['campus_title'] ); ?></h3>
					<?php foreach ( $data['campus']['groups'] as $group ) : ?>
						<details class="jd-mini-details jd-mini-details--row"><summary><?php echo esc_html( $group[0] ); ?></summary><p><?php echo esc_html( $group[1] ); ?></p></details>
					<?php endforeach; ?>
					<p class="jd-note"><?php echo esc_html( $study['school_source'] ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="section jd-section jd-trust" id="tin-cay">
		<div class="container">
			<?php $head( $trust['label'], $trust['title'], $trust['intro'] ); ?>
			<?php
			$mou       = $data['galleries']['hop-tac'];
			$mou_main  = $mou['photos'][0];
			$mou_small = $mou['photos'][1];
			?>
			<div class="jd-evidence">
				<figure class="jd-photo jd-evidence-photo">
					<?php $image( $mou_main['image'], $mou_main['caption'] ); ?>
					<figcaption><?php echo esc_html( $mou_main['caption'] ); ?></figcaption>
				</figure>
				<div class="jd-evidence-card">
					<h3><?php echo esc_html( $mou['title'] ); ?></h3>
					<p><?php echo esc_html( $mou['intro'] ); ?></p>
					<p class="jd-note"><?php $source( $mou['source'][0], $mou['source'][1] ); ?></p>
					<figure class="jd-photo jd-evidence-small">
						<?php $image( $mou_small['image'], $mou_small['caption'] ); ?>
						<figcaption><?php echo esc_html( $mou_small['caption'] ); ?></figcaption>
					</figure>
				</div>
			</div>

			<div class="jd-moments">
				<div class="jd-moments-head">
					<h3 id="jd-moments-title"><?php echo esc_html( $moments['title'] ); ?></h3>
					<p><?php echo esc_html( $moments['intro'] ); ?></p>
				</div>
				<div class="dk-moments-viewport" data-autoplay>
					<ul class="dk-moments-track" tabindex="0" aria-labelledby="jd-moments-title">
						<?php foreach ( $moments['photos'] as $photo ) : ?>
							<li>
								<figure class="jd-card jd-card--small">
									<?php $image( $photo[0], $photo[1] ); ?>
									<figcaption><strong><?php echo esc_html( $photo[1] ); ?></strong></figcaption>
								</figure>
							</li>
						<?php endforeach; ?>
					</ul>
					<div class="jd-moments-nav">
						<button type="button" class="jd-round-btn" data-moments="-1" aria-label="Ảnh trước"><span aria-hidden="true">←</span></button>
						<button type="button" class="jd-round-btn" data-moments="1" aria-label="Ảnh tiếp theo"><span aria-hidden="true">→</span></button>
					</div>
				</div>
			</div>

			<?php $voices = $trust['voices']; ?>
			<div class="jd-block jd-voices">
				<h3 class="jd-subtitle"><?php echo esc_html( $voices['title'] ); ?></h3>
				<div class="jd-voices-list">
					<?php foreach ( $voices['quotes'] as $quote ) : ?>
						<blockquote class="jd-panel jd-panel--soft"><p><?php echo esc_html( $quote ); ?></p></blockquote>
					<?php endforeach; ?>
				</div>
				<p class="jd-note"><?php echo esc_html( $voices['source'] ); ?></p>
			</div>

			<details class="jd-mini-details jd-mini-details--row">
				<summary>Về LETCO – HaUI và đối tác điều phối</summary>
				<dl class="jd-terms jd-terms--stack">
					<?php foreach ( $data['organizer']['points'] as $point ) : ?>
						<div><dt><?php echo esc_html( $point[0] ); ?></dt><dd><?php echo esc_html( $point[1] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
				<p class="jd-note"><?php $source( $data['organizer']['source'][0], $data['organizer']['source'][1], 'Thông tin từ LETCO' ); ?></p>
			</details>

			<div class="jd-block" id="ho-tro">
				<h3 class="jd-subtitle"><?php echo esc_html( $trust['roles_title'] ); ?></h3>
				<div class="jd-roles">
					<?php foreach ( $trust['roles'] as $role ) : ?>
						<?php letco_fold_open( $role['who'], array( 'tag' => 'h4', 'class' => 'jd-panel jd-role' ) ); ?>
							<ul class="jd-ticks"><?php foreach ( $role['does'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
							<p class="jd-role-contact"><?php echo esc_html( $role['contact'] ); ?></p>
						<?php letco_fold_close(); ?>
					<?php endforeach; ?>
				</div>
				<p class="jd-callout"><?php echo esc_html( $data['responsibilities']['note'] ); ?></p>
			</div>
		</div>
	</section>

	<section class="section jd-section jd-faq" id="hoi-dap">
		<div class="container jd-faq-grid">
			<?php $head( $faq['label'], $faq['title'], $faq['intro'], '', 'left' ); ?>
			<div class="jd-faq-stack study-accordion">
				<?php foreach ( $faq['items'] as $item ) : ?>
					<details><summary><?php echo esc_html( $item[0] ); ?><span aria-hidden="true"></span></summary><p><?php echo esc_html( $item[1] ); ?></p></details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	get_template_part(
		'template-parts/lead',
		'form',
		array(
			'lead'              => $data['lead'],
			'contact'           => $data['contact'],
			'zalo'              => $data['zalo'],
			'contact_in_footer' => true,
			'compact'           => true,
			'button'            => $data['lead_button'],
			'lead_extra'        => true,
			'program'           => 'Du học ' . $data['name'],
			'major_choices'     => wp_list_pluck( $data['majors'], 'name' ),
			'quick_contact'     => $hotline,
		)
	);
	?>
	<?php // Wide screens keep a call and Zalo route in reach; phones already have the fixed sign-up bar. ?>
	<nav class="dk-dock" aria-label="Liên hệ nhanh">
		<a class="dk-dock-zalo" href="https://zalo.me/<?php echo esc_attr( $data['zalo'] ); ?>" rel="noopener" target="_blank">Zalo<span class="screen-reader-text"> LETCO</span></a>
		<a class="dk-dock-call" href="tel:<?php echo esc_attr( preg_replace( '/\D+/', '', $hotline ) ); ?>"><svg aria-hidden="true" viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></svg><span class="screen-reader-text">Gọi <?php echo esc_html( $hotline ); ?></span></a>
	</nav>
	<?php get_template_part( 'template-parts/consult', 'modal', array( 'data' => $data, 'lead_status' => $args['lead_status'] ) ); ?>
</div>
