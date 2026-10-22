<?php
/**
 * Daeduk D2-6 landing page, kept short for students who skim: a hero with three facts,
 * the programme on one screen, three sign-up steps, two cost totals, the internship
 * companies and a short FAQ. Details (conditions, timetable, line items, refunds,
 * internship terms) stay folded. Styles live in assets/css/daeduk.css.
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
// Accepts a local filename (resolved via letco_asset) or a full URL.
$image = static function ( $file, $alt, $attributes = 'loading="lazy"' ) {
	if ( strpos( $file, 'http' ) === 0 ) {
		printf(
			'<img src="%s" alt="%s" %s>',
			esc_url( $file ),
			esc_attr( $alt ),
			$attributes // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed attribute strings from this template.
		);
		return;
	}
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

// Sign-up button closing a section; every one leads to the form at the bottom.
// $button may be a label string or array( label, optional persuasive line ).
$signup = static function ( $button, $hook = '' ) {
	if ( is_array( $button ) ) {
		$hook   = isset( $button[1] ) ? $button[1] : $hook;
		$button = isset( $button[0] ) ? $button[0] : '';
	}
	$label = (string) $button;
	echo '<p class="jd-cta-row"><a class="jd-button" href="#dang-ky">' . esc_html( $label ) . '</a></p>';
	if ( $hook ) {
		echo '<p class="jd-cta-hook">' . esc_html( $hook ) . '</p>';
	}
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
	'exchange' => '<path d="M7 7h11l-3-3M17 17H6l3 3"/><path d="M18 7l-3 3M6 17l3-3"/>',
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
$campus     = isset( $dk['campus'] ) ? $dk['campus'] : array();
$steps      = $dk['steps'];
$work       = $dk['work'];
$money      = $dk['money'];
$faq        = $dk['faq'];
$refund     = $data['blocks']['hoan-phi'];
?>

<div class="study-landing <?php echo esc_attr( $data['class'] ); ?> jd-page">

	<section class="jd-hero">
		<span class="jd-hero-blob" aria-hidden="true"></span>
		<div class="container jd-hero-grid">
			<div class="jd-hero-copy">
				<p class="jd-hero-eyebrow"><?php echo esc_html( implode( ' · ', $hero['kicker'] ) ); ?></p>
				<h1><?php echo $title_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?></h1>
				<p class="jd-hero-sub"><?php echo esc_html( $hero['sub'] ); ?></p>
				<div class="jd-hero-actions">
					<a class="jd-button" href="#dang-ky"><?php echo esc_html( $cta ); ?></a>
					<a class="jd-play" href="<?php echo esc_attr( $hero['link'][1] ); ?>"><span class="jd-play-dot"><?php $icon( 'arrow', 18 ); ?></span><?php echo esc_html( $hero['link'][0] ); ?></a>
				</div>
			</div>
			<figure class="jd-hero-media">
				<span class="jd-plane jd-plane--a" aria-hidden="true"><?php $icon( 'plane', 32 ); ?></span>
				<span class="jd-plane jd-plane--b" aria-hidden="true"><?php $icon( 'plane', 24 ); ?></span>
				<?php $image( $hero['photo'][0], $hero['photo'][1], 'fetchpriority="high"' ); ?>
				<a class="jd-float-card" href="#cac-buoc">
					<span class="jd-float-icon"><?php $icon( 'calendar', 20 ); ?></span>
					<span><small><?php echo esc_html( $hero['badge'][0] . ' · ' . $hero['badge'][1] ); ?></small><strong><?php echo esc_html( $hero['badge'][2] . ' ' . $hero['badge'][3] ); ?></strong></span>
				</a>
				<p class="jd-float-tag"><strong><?php echo esc_html( $hero['card'][1] ); ?></strong> <?php echo esc_html( mb_strtolower( $hero['card'][0] ) ); ?></p>
				<figcaption><?php echo esc_html( $hero['photo'][2] ); ?></figcaption>
			</figure>
		</div>
		<!-- <div class="container">
			<dl class="jd-facts">
				<?php foreach ( $hero['facts'] as $fact ) : ?>
					<div<?php echo empty( $fact[2] ) ? '' : ' class="is-' . esc_attr( $fact[2] ) . '"'; ?>>
						<dt><span><?php echo esc_html( $fact[4] ); ?></span><?php echo esc_html( $fact[0] ); ?></dt>
						<dd><?php echo esc_html( $fact[1] ); ?> <a href="<?php echo esc_attr( $fact[3] ); ?>">Xem chi tiết<span class="screen-reader-text"> về <?php echo esc_html( mb_strtolower( $fact[4] ) ); ?></span> <span aria-hidden="true">→</span></a></dd>
					</div>
				<?php endforeach; ?>
			</dl>
		</div> -->
	</section>

	<?php
	// Time left until the LETCO deadline; the server fills the first values and site.js ticks them.
	$countdown = $dk['countdown'];
	$left      = max( 0, strtotime( $countdown['deadline'] ) - time() );
	$units     = array(
		'days'    => array( 'Ngày', intdiv( $left, 86400 ) ),
		'hours'   => array( 'Giờ', intdiv( $left % 86400, 3600 ) ),
		'minutes' => array( 'Phút', intdiv( $left % 3600, 60 ) ),
		'seconds' => array( 'Giây', $left % 60 ),
	);
	?>
	<section class="section jd-section jd-countdown" id="dem-nguoc" data-countdown="<?php echo esc_attr( $countdown['deadline'] ); ?>">
		<div class="container jd-countdown-inner">
			<div class="jd-countdown-copy">
				<p class="jd-eyebrow"><?php echo esc_html( $countdown['label'] ); ?></p>
				<h2><?php echo esc_html( $countdown['title'] ); ?></h2>
				<p><?php echo esc_html( $countdown['intro'] ); ?></p>
			</div>
			<ol class="jd-countdown-clock" role="timer" aria-label="<?php echo esc_attr( 'Thời gian còn lại đến ' . $countdown['intro'] ); ?>"<?php echo $left ? '' : ' hidden'; ?>>
				<?php foreach ( $units as $unit => $part ) : ?>
					<li><span data-countdown-unit="<?php echo esc_attr( $unit ); ?>"><?php echo esc_html( str_pad( (string) $part[1], 2, '0', STR_PAD_LEFT ) ); ?></span><small><?php echo esc_html( $part[0] ); ?></small></li>
				<?php endforeach; ?>
			</ol>
			<a class="jd-button" href="#dang-ky"<?php echo $left ? '' : ' hidden'; ?>><?php echo esc_html( $countdown['button'] ); ?></a>
			<p class="jd-countdown-closed"<?php echo $left ? ' hidden' : ''; ?>><?php echo esc_html( $countdown['closed'] ); ?></p>
		</div>
	</section>

	<?php if ( ! empty( $campus['items'] ) ) : ?>
	<section class="section jd-section jd-campus-zone" id="khuon-vien">
		<div class="container">
			<?php $head( $campus['label'], $campus['title'], $campus['intro'], '', 'left' ); ?>
			<ul class="jd-campus-gallery" aria-label="Ảnh khuôn viên Đại học Daeduk">
				<?php foreach ( $campus['items'] as $campus_photo ) : ?>
					<li>
						<figure>
							<?php $image( $campus_photo[0], $campus_photo[2] ); ?>
							<figcaption><?php echo esc_html( $campus_photo[1] ); ?></figcaption>
						</figure>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $campus['source'] ) ) : ?>
				<p class="jd-campus-credit"><?php $source( $campus['source'][0], $campus['source'][1], 'Nguồn ảnh' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php // The whole programme on one screen: the exchange itself and its K-Tech Bridge package. ?>
	<section class="section jd-section jd-steps-zone" id="he-dao-tao">
		<div class="container">
			<?php $head( 'Hệ D2-6', $data['visas_title'], $data['visas_intro'], '', 'left' ); ?>
			<div class="jd-pathway-grid">
				<?php foreach ( $data['visas'] as $visa ) : ?>
					<article class="jd-pathway-card<?php echo empty( $visa['featured'] ) ? '' : ' is-featured'; ?>">
						<span class="jd-pathway-tag"><?php echo esc_html( $visa['tag'] ); ?></span>
						<h3><?php echo esc_html( $visa['title'] ); ?></h3>
						<dl class="jd-pathway-facts">
							<?php foreach ( $visa['rows'] as $row ) : ?>
								<div><dt><?php echo esc_html( $row[0] ); ?></dt><dd><?php echo esc_html( $row[1] ); ?></dd></div>
							<?php endforeach; ?>
						</dl>
					</article>
				<?php endforeach; ?>
			</div>
			<p class="jd-note"><?php echo esc_html( $data['visas_note'] ); ?></p>
			<?php $signup( $dk['buttons']['he-dao-tao'] ); ?>
		</div>
	</section>

	<?php // Three steps with their dates; conditions and the full timetable stay folded. ?>
	<section class="section jd-section" id="cac-buoc">
		<div class="container">
			<?php $head( $steps['label'], $steps['title'], '', '', 'left' ); ?>
			<div class="jd-steps">
				<?php $step_icons = array( 'test', 'badge', 'plane' ); ?>
				<?php foreach ( $steps['items'] as $index => $step ) : ?>
					<div class="jd-step is-<?php echo esc_attr( (string) $index ); ?>">
						<?php if ( ! empty( $step[3] ) ) : ?>
							<figure class="jd-step-media"><?php $image( $step[3], isset( $step[4] ) ? $step[4] : $step[0] ); ?></figure>
						<?php endif; ?>
						<div class="jd-step-content">
							<span class="jd-step-icon"><?php $icon( $step_icons[ $index ], 22 ); ?></span>
							<div>
								<h3><?php echo esc_html( $step[0] ); ?> <span class="jd-step-tag"><?php echo esc_html( $step[2] ); ?></span></h3>
								<p><?php echo esc_html( $step[1] ); ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</section>

	<?php // Roadmap steps front and center; cost line items, payment timetable and refunds stay folded. ?>
	<section class="section jd-section jd-money" id="chi-phi">
		<div class="container">
			<?php // A solid panel keeps the falling petals and the corner petals out from behind the text. ?>
			<div class="jd-roadmap-panel">
			<?php $head( $money['roadmap_label'], $money['roadmap_title'], $money['roadmap_intro'], '', 'left' ); ?>
			<?php if ( ! empty( $money['roadmap_steps'] ) ) : ?>
			<div class="jd-roadmap-layout">
			<ol class="jd-roadmap">
				<?php foreach ( $money['roadmap_steps'] as $rindex => $rstep ) : ?>
				<li class="jd-roadmap-step">
					<span class="jd-roadmap-num" aria-hidden="true"><?php echo esc_html( (string) ( $rindex + 1 ) ); ?></span>
					<div class="jd-roadmap-body">
						<h3><?php echo esc_html( $rstep['title'] ); ?></h3>
						<ul class="jd-ticks">
							<?php foreach ( $rstep['items'] as $ritem ) : ?>
							<li><?php echo esc_html( $ritem ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</li>
				<?php endforeach; ?>
			</ol>
			<figure class="jd-roadmap-art" aria-hidden="true"><?php $image( 'daeduk-roadmap-illustration.png', '' ); ?></figure>
			</div>
			<?php endif; ?>
			</div>
			<p class="jd-callout"><?php echo esc_html( $money['summary'] ); ?></p>
			<?php $signup( $dk['buttons']['chi-phi'] ); ?>
		</div>
	</section>

	<?php // Where the internship happens; the conditions behind the allowance stay folded. ?>
	<section class="section jd-section" id="thuc-tap">
		<div class="container">
			<?php $head( $work['label'], $work['title'], $work['intro'], '', 'left' ); ?>
			<ul class="jd-companies">
				<?php foreach ( $data['companies']['list'] as $company ) : ?>
					<li>
						<?php if ( ! empty( $company[3] ) ) : ?>
							<figure><?php $image( $company[3], isset( $company[4] ) ? $company[4] : $company[0] ); ?></figure>
						<?php endif; ?>
						<div class="jd-company-copy">
							<h4><?php echo esc_html( $company[0] ); ?></h4>
							<p class="jd-company-where"><?php $icon( 'pin', 14 ); ?> <?php echo esc_html( $company[1] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php $signup( $dk['buttons']['thuc-tap'] ); ?>
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
			'study_status'      => true,
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
