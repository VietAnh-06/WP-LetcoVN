<?php
/**
 * One visa route with its own reason to be interested and to sign up. The route's 'order' places
 * majors, photos, benefits and fit before the steps; documents stay folded just above the form.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$data = $args['data'];
$route = $data['route'];
$code = strtoupper( $route['slug'] );
$visuals = $route['visuals'];
$hero_photo = $visuals['hero'];
$photo_tag = static function ( $file, $alt, $width, $height ) {
	printf( '<img src="%s" alt="%s" width="%d" height="%d" loading="lazy" decoding="async">', letco_asset( $file ), esc_attr( $alt ), (int) $width, (int) $height ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- letco_asset returns an escaped URL.
};
$sections = array(
	'majors'  => static function () use ( $route, $data, $photo_tag ) {
		$has_photos = ! empty( $data['majors'][0]['photo'] );
		?>
		<section class="section jd-section" id="nganh">
			<div class="container">
				<header class="jd-head jd-head--left"><p class="jd-eyebrow">Ngành học</p><h2><?php echo esc_html( $route['majors_title'] ); ?></h2></header>
				<ul class="jd-route-majors">
					<?php foreach ( $data['majors'] as $major ) : ?>
						<li>
							<?php if ( ! empty( $major['photo'] ) ) : ?><figure class="jd-route-major-photo"><?php $photo_tag( $major['photo'][0], 'Ảnh minh họa ngành ' . $major['name'], $major['photo'][1], $major['photo'][2] ); ?></figure><?php endif; ?>
							<h3><?php echo esc_html( $major['name'] ); ?></h3>
							<?php if ( ! empty( $major['duration'] ) ) : ?><small><?php echo esc_html( $major['duration'] ); ?></small><?php endif; ?>
							<?php if ( ! empty( $major['summary'] ) ) : ?><p><?php echo esc_html( $major['summary'] ); ?></p><?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php if ( $has_photos ) : ?><p class="jd-note">Ảnh minh họa cho nhóm ngành, không chụp tại Đại học Daeduk hay doanh nghiệp đối tác.</p><?php endif; ?>
			</div>
		</section>
		<?php
	},
	'gallery' => static function () use ( $route, $visuals, $photo_tag ) {
		?>
		<section class="section jd-section jd-experience" id="trai-nghiem">
			<div class="container">
				<header class="jd-head jd-head--left"><p class="jd-eyebrow">Trải nghiệm</p><h2><?php echo esc_html( $route['gallery_title'] ); ?></h2><p class="jd-intro"><?php echo esc_html( $route['gallery_intro'] ); ?></p></header>
				<div class="jd-experience-grid">
					<?php foreach ( $visuals['gallery'] as $photo ) : ?>
						<figure><?php $photo_tag( $photo[0], $photo[2], $photo[3], $photo[4] ); ?><figcaption><strong><?php echo esc_html( $photo[1] ); ?></strong><span<?php echo empty( $photo[5] ) ? '' : ' class="is-illustrative"'; ?>><?php echo esc_html( $photo[2] ); ?></span></figcaption></figure>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	},
	'perks'   => static function () use ( $route ) {
		?>
		<section class="section jd-section jd-perks-zone" id="quyen-loi">
			<div class="container">
				<header class="jd-head jd-head--left"><p class="jd-eyebrow"><?php echo esc_html( $route['perks_label'] ); ?></p><h2><?php echo esc_html( $route['perks_title'] ); ?></h2></header>
				<ul class="jd-perks<?php echo 3 === count( $route['perks'] ) ? ' jd-perks--3' : ''; ?>">
					<?php foreach ( $route['perks'] as $perk ) : ?>
						<li><h3><?php echo esc_html( $perk[0] ); ?></h3><p><?php echo esc_html( $perk[1] ); ?></p><p class="jd-perk-condition"><?php echo esc_html( $perk[2] ); ?></p></li>
					<?php endforeach; ?>
				</ul>
				<p class="jd-cta-row"><a class="jd-button" href="#dang-ky"><?php echo esc_html( $route['button'] ); ?></a></p>
			</div>
		</section>
		<?php
	},
	'fit'     => static function () use ( $route, $data, $code ) {
		?>
		<section class="section jd-section" id="dieu-kien">
			<div class="container jd-route-columns">
				<div><header class="jd-head jd-head--left"><p class="jd-eyebrow">Đối tượng & đầu vào</p><h2><?php echo esc_html( $code ); ?> phù hợp với ai?</h2></header><ul class="jd-route-list"><?php foreach ( $route['conditions'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul></div>
				<div><header class="jd-head jd-head--left"><p class="jd-eyebrow">Hiểu đúng về chương trình</p><h2>Cần lưu ý</h2></header><ul class="jd-route-list"><?php foreach ( $route['notes'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?><li><?php echo esc_html( $data['visa_authority'] ); ?></li></ul></div>
			</div>
		</section>
		<?php
	},
);
get_template_part( 'template-parts/landing', 'header', array( 'links' => $route['nav'], 'hotline' => $data['contact']['phones'][0], 'button' => 'Tư vấn ' . $code ) );
?>
<?php get_template_part( 'template-parts/daeduk', 'route-nav', array( 'active' => $route['slug'] ) ); ?>
<div class="study-landing study-korea study-school study-daeduk jd-page jd-route-page" data-route="<?php echo esc_attr( $route['slug'] ); ?>">
	<section class="jd-hero">
		<div class="container jd-hero-grid">
			<div class="jd-hero-copy">
				<p class="jd-hero-eyebrow">Đại học Daeduk · Daejeon, Hàn Quốc · <?php echo esc_html( $code ); ?></p>
				<h1><?php echo esc_html( $route['title'] ); ?></h1>
				<p class="jd-hero-sub"><?php echo esc_html( $route['intro'] ); ?></p>
				<div class="jd-hero-actions"><a class="jd-button" href="#dang-ky"><?php echo esc_html( $route['button'] ); ?></a><a class="jd-play" href="#lo-trinh">Xem lộ trình</a></div>
				<dl class="jd-route-highlights"><?php foreach ( $visuals['facts'] as $fact ) : ?><div><dt><?php echo esc_html( $fact[1] ); ?></dt><dd><?php echo esc_html( $fact[0] ); ?></dd></div><?php endforeach; ?></dl>
			</div>
			<figure class="jd-hero-media"><img src="<?php echo letco_asset( $hero_photo[0] ); ?>" alt="<?php echo esc_attr( $hero_photo[1] ); ?>" width="<?php echo (int) $hero_photo[2]; ?>" height="<?php echo (int) $hero_photo[3]; ?>" fetchpriority="high"><figcaption><?php echo esc_html( $hero_photo[1] ); ?></figcaption></figure>
		</div>
	</section>
	<?php foreach ( $route['order'] as $section ) { $sections[ $section ](); } ?>
	<section class="section jd-section jd-steps-zone" id="lo-trinh">
		<div class="container"><header class="jd-head jd-head--left"><p class="jd-eyebrow">Các bước tham gia</p><h2>Từng bước tham gia <?php echo esc_html( $code ); ?></h2></header>
			<ol class="jd-route-steps"><?php foreach ( $route['steps'] as $index => $step ) : ?><li><?php $step_photo = $visuals['steps'][ $index ]; ?><figure class="jd-route-step-photo"><?php $photo_tag( $step_photo[0], $step_photo[1], $step_photo[2], $step_photo[3] ); ?></figure><span class="jd-visa-map-num"><?php echo (int) $index + 1; ?></span><h3><?php echo esc_html( $step[0] ); ?></h3><p><?php echo esc_html( $step[1] ); ?></p></li><?php endforeach; ?></ol>
			<?php if ( 'd2-6' !== $route['slug'] ) : ?><p class="jd-note">Lịch nhập học <?php echo esc_html( $code ); ?> tùy theo thông báo của trường và hồ sơ của bạn. Để lại thông tin, LETCO sẽ báo kỳ phù hợp.</p><?php endif; ?>
		</div>
	</section>
	<?php if ( 'd2-6' === $route['slug'] ) { get_template_part( 'template-parts/daeduk', 'countdown', array( 'countdown' => $data['dk']['countdown'] ) ); } ?>
	<section class="section jd-section jd-faq" id="hoi-dap"><div class="container jd-faq-grid"><header class="jd-head jd-head--left"><p class="jd-eyebrow">Hỏi đáp <?php echo esc_html( $code ); ?></p><h2>Câu hỏi thường gặp</h2></header><div class="jd-faq-stack study-accordion"><?php foreach ( $route['faq'] as $item ) : ?><details><summary><?php echo esc_html( $item[0] ); ?><span aria-hidden="true"></span></summary><p><?php echo esc_html( $item[1] ); ?></p></details><?php endforeach; ?><details id="ho-so"><summary>Cần chuẩn bị những hồ sơ gì?<span aria-hidden="true"></span></summary><ul class="jd-route-list"><?php foreach ( $route['documents'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul></details></div></div></section>
	<?php get_template_part( 'template-parts/lead', 'form', array( 'lead' => $data['lead'], 'contact' => $data['contact'], 'zalo' => $data['zalo'], 'contact_in_footer' => true, 'compact' => true, 'school_summary' => true, 'button' => $route['button'], 'program' => 'Du học ' . $data['name'], 'quick_contact' => $data['contact']['phones'][0] ) ); ?>
	<?php get_template_part( 'template-parts/consult', 'modal', array( 'data' => $data, 'lead_status' => $args['lead_status'] ) ); ?>
</div>
