<?php
/** One visa route, with its own admissions content and lead attribution. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$data = $args['data'];
$route = $data['route'];
$code = strtoupper( $route['slug'] );
$visuals = $route['visuals'];
$hero_photo = $visuals['hero'];
get_template_part( 'template-parts/landing', 'header', array( 'links' => array( 'dieu-kien' => 'Điều kiện', 'ho-so' => 'Hồ sơ', 'lo-trinh' => 'Lộ trình', 'hoi-dap' => 'Hỏi đáp' ), 'hotline' => $data['contact']['phones'][0], 'button' => 'Tư vấn ' . $code ) );
?>
<?php get_template_part( 'template-parts/daeduk', 'route-nav', array( 'active' => $route['slug'] ) ); ?>
<div class="study-landing study-korea study-school study-daeduk jd-page jd-route-page" data-route="<?php echo esc_attr( $route['slug'] ); ?>">
	<section class="jd-hero">
		<div class="container jd-hero-grid">
			<div class="jd-hero-copy">
				<p class="jd-hero-eyebrow">Đại học Daeduk · Daejeon, Hàn Quốc · <?php echo esc_html( $code ); ?></p>
				<h1><?php echo str_replace( esc_html( $code ), '<span class="jd-nowrap">' . esc_html( $code ) . '</span>', esc_html( $route['title'] ) ); ?></h1>
				<p class="jd-hero-sub"><?php echo esc_html( $route['intro'] ); ?></p>
				<div class="jd-hero-actions"><a class="jd-button" href="#dang-ky">Nhận tư vấn <?php echo esc_html( $code ); ?></a><a class="jd-play" href="#lo-trinh">Xem lộ trình</a></div>
				<dl class="jd-route-highlights"><?php foreach ( $visuals['facts'] as $fact ) : ?><div><dt><?php echo esc_html( $fact[1] ); ?></dt><dd><?php echo esc_html( $fact[0] ); ?></dd></div><?php endforeach; ?></dl>
			</div>
			<figure class="jd-hero-media"><img src="<?php echo letco_asset( $hero_photo[0] ); ?>" alt="<?php echo esc_attr( $hero_photo[1] ); ?>" width="<?php echo (int) $hero_photo[2]; ?>" height="<?php echo (int) $hero_photo[3]; ?>" fetchpriority="high"><figcaption><?php echo esc_html( $hero_photo[1] ); ?></figcaption></figure>
		</div>
	</section>
	<section class="section jd-section" id="dieu-kien">
		<div class="container jd-route-columns">
			<div><header class="jd-head jd-head--left"><p class="jd-eyebrow">Đối tượng & đầu vào</p><h2><?php echo esc_html( $code ); ?> phù hợp với ai?</h2></header><ul class="jd-route-list"><?php foreach ( $route['conditions'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul></div>
			<article class="jd-pathway-card is-featured"><?php $visa_photo = $visuals['visa']; ?><figure class="jd-pathway-photo"><img src="<?php echo letco_asset( $visa_photo[0] ); ?>" alt="<?php echo esc_attr( $visa_photo[1] ); ?>" width="<?php echo (int) $visa_photo[2]; ?>" height="<?php echo (int) $visa_photo[3]; ?>" loading="lazy" decoding="async"></figure><span class="jd-pathway-tag"><?php echo esc_html( $route['visa']['tag'] ); ?></span><h3><?php echo esc_html( $route['visa']['title'] ); ?></h3><dl class="jd-pathway-facts"><?php foreach ( $route['visa']['rows'] as $row ) : ?><div><dt><?php echo esc_html( $row[0] ); ?></dt><dd><?php echo esc_html( $row[1] ); ?></dd></div><?php endforeach; ?></dl></article>
		</div>
	</section>
	<section class="section jd-section jd-steps-zone" id="chuong-trinh">
		<div class="container"><header class="jd-head jd-head--left"><p class="jd-eyebrow">Nội dung chương trình</p><h2>Học gì và nhận được gì?</h2></header><ul class="jd-route-list"><?php foreach ( $route['outcomes'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul></div>
	</section>
	<section class="section jd-section jd-experience" id="hinh-anh">
		<div class="container">
			<header class="jd-head jd-head--left"><p class="jd-eyebrow">Một góc hành trình</p><h2>Từ lớp học đến trải nghiệm thực tế</h2><p class="jd-intro">Hình ảnh từ Đại học Daeduk và các hoạt động hợp tác của chương trình.</p></header>
			<div class="jd-experience-grid">
				<?php foreach ( $visuals['gallery'] as $photo ) : ?><figure><img src="<?php echo letco_asset( $photo[0] ); ?>" alt="<?php echo esc_attr( $photo[2] ); ?>" width="<?php echo (int) $photo[3]; ?>" height="<?php echo (int) $photo[4]; ?>" loading="lazy" decoding="async"><figcaption><strong><?php echo esc_html( $photo[1] ); ?></strong><span><?php echo esc_html( $photo[2] ); ?></span></figcaption></figure><?php endforeach; ?>
			</div>
		</div>
	</section>
	<section class="section jd-section jd-steps-zone" id="lo-trinh">
		<div class="container"><header class="jd-head jd-head--left"><p class="jd-eyebrow">Các bước tham gia</p><h2>Lộ trình visa & các bước tham gia <?php echo esc_html( $code ); ?></h2></header>
			<ol class="jd-route-steps"><?php foreach ( $route['steps'] as $index => $step ) : ?><li><?php $step_photo = $visuals['steps'][ $index ]; ?><figure class="jd-route-step-photo"><img src="<?php echo letco_asset( $step_photo[0] ); ?>" alt="<?php echo esc_attr( $step_photo[1] ); ?>" width="<?php echo (int) $step_photo[2]; ?>" height="<?php echo (int) $step_photo[3]; ?>" loading="lazy" decoding="async"></figure><span class="jd-visa-map-num"><?php echo (int) $index + 1; ?></span><h3><?php echo esc_html( $step[0] ); ?></h3><p><?php echo esc_html( $step[1] ); ?></p></li><?php endforeach; ?></ol>
			<?php if ( 'd2-6' !== $route['slug'] ) : ?><p class="jd-note">Lịch nhập học <?php echo esc_html( $code ); ?> tùy theo thông báo của trường và hồ sơ của bạn. Để lại thông tin, LETCO sẽ báo kỳ phù hợp.</p><?php endif; ?>
		</div>
	</section>
	<?php if ( 'd2-6' === $route['slug'] ) { get_template_part( 'template-parts/daeduk', 'countdown', array( 'countdown' => $data['dk']['countdown'] ) ); } ?>
	<section class="section jd-section" id="ho-so"><div class="container"><header class="jd-head jd-head--left"><p class="jd-eyebrow">Chuẩn bị trước khi nộp</p><h2>Hồ sơ cần chuẩn bị</h2></header><ul class="jd-route-list"><?php foreach ( $route['documents'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul></div></section>
	<section class="section jd-section jd-faq" id="hoi-dap"><div class="container jd-faq-grid"><header class="jd-head jd-head--left"><p class="jd-eyebrow">Hỏi đáp <?php echo esc_html( $code ); ?></p><h2>Câu hỏi thường gặp</h2></header><div class="jd-faq-stack study-accordion"><?php foreach ( $route['faq'] as $item ) : ?><details><summary><?php echo esc_html( $item[0] ); ?><span aria-hidden="true"></span></summary><p><?php echo esc_html( $item[1] ); ?></p></details><?php endforeach; ?></div></div></section>
	<?php get_template_part( 'template-parts/lead', 'form', array( 'lead' => $data['lead'], 'contact' => $data['contact'], 'zalo' => $data['zalo'], 'contact_in_footer' => true, 'compact' => true, 'school_summary' => true, 'button' => 'Nhận tư vấn ' . $code, 'program' => 'Du học ' . $data['name'], 'quick_contact' => $data['contact']['phones'][0] ) ); ?>
	<?php get_template_part( 'template-parts/consult', 'modal', array( 'data' => $data, 'lead_status' => $args['lead_status'] ) ); ?>
</div>
