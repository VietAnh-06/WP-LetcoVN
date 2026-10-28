<?php
/**
 * Template Name: Trang trường du học
 *
 * Partner-school landing page. Content comes from
 * template-parts/study-school-configs.php, keyed by the page slug.
 */

get_header();
get_template_part( 'template-parts/study', 'landing', array( 'country' => letco_school_config_key() ) );
get_footer();
