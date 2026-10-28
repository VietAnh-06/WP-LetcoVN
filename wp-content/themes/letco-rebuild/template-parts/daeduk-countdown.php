<?php
/** Countdown to the LETCO application deadline; the server fills the first values and site.js ticks them. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$countdown = $args['countdown'];
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
