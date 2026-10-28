<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$active = isset( $args['active'] ) ? $args['active'] : '';
$routes = array( 'd2-6' => array( 'D2-6', 'Trao đổi' ), 'd2-1' => array( 'D2-1', 'Cao đẳng' ), 'd4-1' => array( 'D4-1', 'Tiếng Hàn' ) );
$active_index = array_search( $active, array_keys( $routes ), true );
?>
<div class="jd-program-bar" data-daeduk-switcher>
    <nav class="container jd-route-nav" aria-label="Chuyển chương trình Daeduk"<?php echo false !== $active_index ? ' style="--dd-active: ' . (int) $active_index . '"' : ''; ?>>
        <?php if ( false !== $active_index ) : ?><span class="jd-route-indicator" aria-hidden="true"></span><?php endif; ?>
        <?php foreach ( array_keys( $routes ) as $index => $slug ) : ?>
            <a href="<?php echo esc_url( letco_daeduk_url( $slug ) ); ?>" data-route-index="<?php echo (int) $index; ?>"<?php echo $active === $slug ? ' aria-current="page"' : ''; ?>><strong><?php echo esc_html( $routes[ $slug ][0] ); ?></strong><span><?php echo esc_html( $routes[ $slug ][1] ); ?></span></a>
        <?php endforeach; ?>
    </nav>
</div>
