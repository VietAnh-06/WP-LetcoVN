<?php
/**
 * Daeduk K-Tech Bridge landing page, ordered so a visitor first sees the HaUI – Daeduk
 * partnership, the three linked visa routes, the campus and a general consultation form. Styles live in assets/css/daeduk.css.
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

$voices = isset( $dk['voices'] ) ? $dk['voices'] : array();
$nav    = array( 'he-dao-tao' => 'Chương trình', 'doi-tac' => 'Đối tác', 'khuon-vien' => 'Daeduk', 'hoi-dap' => 'Hỏi đáp' );
if ( ! empty( $voices['items'] ) ) {
	$nav['cam-nhan'] = 'Cảm nhận';
}

get_template_part(
	'template-parts/landing',
	'header',
	array(
		'links'   => $nav,
		'hotline' => $hotline,
		'button'  => $cta,
	)
);

$hero       = $dk['hero'];
$title_html = str_replace( esc_html( $hero['accent'] ), '<em>' . esc_html( $hero['accent'] ) . '</em>', esc_html( $hero['title'] ) );
$campus     = isset( $dk['campus'] ) ? $dk['campus'] : array();
$steps      = $dk['steps'];
$work       = $dk['work'];
$benefits   = $dk['benefits'];
$students   = isset( $dk['students'] ) ? $dk['students'] : array();
$faq = array(
	'label' => 'Chọn chương trình', 'title' => 'Bạn nên bắt đầu từ đâu?', 'intro' => 'Mỗi diện có điều kiện và lịch tuyển sinh riêng. Xem trang chương trình hoặc đăng ký tư vấn để chọn lộ trình phù hợp.',
	'items' => array(
		array( 'Ba chương trình khác nhau thế nào?', 'D2-6 dành cho sinh viên trường đối tác đi trao đổi 6 – 12 tháng. D2-1 là hệ Cao đẳng chuyên ngành 2 – 3 năm. D4-1 là giai đoạn học tiếng Hàn để chuẩn bị học tiếp.' ),
		array( 'Chưa xác định được diện phù hợp thì làm gì?', 'Bạn có thể gửi form bên dưới với trường đang học hoặc năm tốt nghiệp. LETCO đối chiếu học lực, tiếng Hàn và mục tiêu để tư vấn chương trình phù hợp.' ),
		array( 'Có thể dùng chung chi phí và lịch tuyển sinh không?', 'Không. Mỗi chương trình có lộ trình riêng; LETCO tư vấn ngân sách theo hồ sơ. D4-1 không áp dụng trợ cấp thực tập của D2-6.' ),
	),
);
?>

<?php get_template_part( 'template-parts/daeduk', 'route-nav' ); ?>
<div class="study-landing <?php echo esc_attr( $data['class'] ); ?> jd-page jd-overview-page">

	<section class="jd-hero" id="hop-tac">
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

				<p class="jd-float-tag"><strong><?php echo esc_html( $hero['card'][1] ); ?></strong> <?php echo esc_html( $hero['card'][0] ); ?></p>
			</figure>
		</div>
		<?php if ( ! empty( $hero['stats'] ) ) : ?>
		<div class="container">
			<dl class="jd-stats">
				<?php foreach ( $hero['stats'] as $stat ) : ?>
					<div<?php echo empty( $stat[3] ) ? '' : ' class="is-' . esc_attr( $stat[3] ) . '"'; ?>>
						<dt><?php echo esc_html( $stat[1] ); ?></dt>
						<dd<?php echo empty( $stat[2] ) ? '' : ' data-countup'; ?>><?php echo esc_html( $stat[0] ); ?></dd>
					</div>
				<?php endforeach; ?>
			</dl>
		</div>
		<?php endif; ?>
	</section>

	<?php get_template_part( 'template-parts/daeduk', 'countdown', array( 'countdown' => $dk['countdown'] ) ); ?>

	<?php if ( ! empty( $dk['proof'] ) ) : ?>
	<?php // Full-bleed ceremony photo: the programme is an official agreement between the two universities. ?>
	<section class="jd-proof" aria-labelledby="jd-proof-title">
		<?php $image( $dk['proof']['photo'][0], $dk['proof']['photo'][1], 'loading="lazy" class="jd-proof-photo"' ); ?>
		<div class="container jd-proof-copy">
			<h2 id="jd-proof-title"><?php echo esc_html( $dk['proof']['title'] ); ?></h2>
			<p><?php echo esc_html( $dk['proof']['text'] ); ?></p>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $dk['ecosystem'] ) ) : ?>
	<?php // The parties behind the programme, so visitors see it is not a visa sale. ?>
	<section class="section jd-section jd-ecosystem-zone" id="doi-tac">
		<div class="container">
			<?php $head( 'Hợp tác HaUI – Daeduk', 'Hệ sinh thái đào tạo và tuyển dụng', 'Đơn vị điều phối, trường Việt Nam, Đại học Daeduk và doanh nghiệp phối hợp từ tuyển chọn, đào tạo đến đánh giá và tuyển dụng.', '', 'left' ); ?>
			<ol class="jd-ecosystem">
				<?php foreach ( $dk['ecosystem'] as $party ) : ?>
					<li>
						<span class="jd-benefit-icon"><?php $icon( $party[0], 24 ); ?></span>
						<h3><?php echo esc_html( $party[1] ); ?></h3>
						<p><?php echo esc_html( $party[2] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>
	<?php endif; ?>

	<?php // The three ways in: D2-6 exchange, D2-1 college degree, D4-1 Korean first. ?>
	<section class="section jd-section jd-steps-zone" id="he-dao-tao">
		<div class="container">
			<?php $head( 'Diện tham gia', $data['visas_title'], $data['visas_intro'], '', 'left' ); ?>
			<div class="jd-pathway-grid jd-pathway-grid--<?php echo (int) count( $data['visas'] ); ?>">
				<?php foreach ( $data['visas'] as $visa_index => $visa ) : ?>
					<article class="jd-pathway-card<?php echo empty( $visa['featured'] ) ? '' : ' is-featured'; ?>">
                        <?php $route_photo = array( array( 'daeduk-mou-speech.jpg', 'Phát biểu tại lễ ký kết thỏa thuận hợp tác HaUI – Daeduk ở Hà Nội' ), array( 'daeduk-campus-techno.jpg', 'Một tòa nhà trong khuôn viên Đại học Daeduk' ), array( 'daeduk-life-intl-welcome.jpg', 'Buổi chào mừng du học sinh quốc tế nhập học tại Đại học Daeduk' ) )[ $visa_index ]; ?>
						<figure class="jd-pathway-photo"><?php $image( $route_photo[0], $route_photo[1] ); ?></figure>
						<span class="jd-pathway-tag"><?php echo esc_html( $visa['tag'] ); ?></span>
						<h3><?php echo esc_html( $visa['title'] ); ?></h3>
						<dl class="jd-pathway-facts">
							<?php foreach ( $visa['rows'] as $row ) : ?>
								<div><dt><?php echo esc_html( $row[0] ); ?></dt><dd><?php echo esc_html( $row[1] ); ?></dd></div>
							<?php endforeach; ?>
						</dl>
						<a class="jd-button" href="<?php echo esc_url( letco_daeduk_url( array( 'd2-6', 'd2-1', 'd4-1' )[ $visa_index ] ) ); ?>">Xem chương trình <?php echo esc_html( $visa['tag'] ); ?></a>
					</article>
				<?php endforeach; ?>
			</div>
			<p class="jd-note"><?php echo esc_html( $data['visas_note'] ); ?></p>
			<?php $signup( $dk['buttons']['he-dao-tao'] ); ?>
		</div>
	</section>

	<?php if ( ! empty( $campus['items'] ) ) : ?>
	<section class="section jd-section jd-campus-zone" id="khuon-vien">
		<div class="container">
			<?php $head( $campus['label'], $campus['title'], $campus['intro'], '', 'left' ); ?>
			<?php if ( ! empty( $campus['points'] ) ) : ?>
				<ul class="jd-campus-points">
					<?php foreach ( $campus['points'] as $point ) : ?>
						<li><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
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

	<?php if ( ! empty( $voices['items'] ) ) : ?>
	<?php // Quotes from students who took part; only real, attributed quotes go in the config. ?>
	<section class="section jd-section jd-voices-zone" id="cam-nhan">
		<div class="container">
			<?php $head( $voices['label'], $voices['title'], $voices['intro'], '', 'left' ); ?>
			<ul class="jd-voice-grid">
				<?php foreach ( $voices['items'] as $voice ) : ?>
					<li>
						<figure class="jd-voice">
							<blockquote><p><?php echo esc_html( $voice[0] ); ?></p></blockquote>
							<figcaption>
								<?php if ( ! empty( $voice[3] ) ) : ?>
									<?php $image( $voice[3], $voice[1], 'loading="lazy" class="jd-voice-photo"' ); ?>
								<?php endif; ?>
								<span><strong><?php echo esc_html( $voice[1] ); ?></strong><?php echo empty( $voice[2] ) ? '' : esc_html( $voice[2] ); ?></span>
							</figcaption>
						</figure>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $students['facts'] ) ) : ?>
	<?php // Checked facts about students already selected; quotes are added to 'voices' only when real. ?>
	<section class="section jd-section jd-students-zone" id="sinh-vien">
		<div class="container jd-students">
			<figure class="jd-students-photo">
				<?php $image( $students['photo'][0], $students['photo'][1] ); ?>
			</figure>
			<div>
				<?php $head( $students['label'], $students['title'], '', '', 'left' ); ?>
				<dl class="jd-students-facts">
					<?php foreach ( $students['facts'] as $fact ) : ?>
						<div><dt><?php echo esc_html( $fact[0] ); ?></dt><dd><?php echo esc_html( $fact[1] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="section jd-section jd-faq" id="hoi-dap">
		<div class="container jd-faq-grid">
			<?php $head( $faq['label'], $faq['title'], $faq['intro'], '', 'left' ); ?>
			<div class="jd-faq-stack study-accordion">
				<p class="jd-note">Tham khảo quy định chung về việc làm và chuyển diện cư trú tại <a href="https://www.studyinkorea.go.kr/ko/work/aboutForeignerEmploymentSystem.do" target="_blank" rel="noopener">Study in Korea</a>; điều kiện của từng hồ sơ cần được xác nhận riêng.</p>
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
			'school_summary'    => true,
			'program'           => 'Du học ' . $data['name'],
			'form_note'         => 'Chưa có TOPIK vẫn có thể đăng ký để lên kế hoạch học tiếng.',
			'form_title'        => 'Gửi thông tin nhận tư vấn',
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
