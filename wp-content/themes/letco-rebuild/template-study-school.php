<?php
/**
 * Template Name: Trang trường du học
 *
 * Partner-school landing page. Content comes from
 * template-parts/study-school-configs.php, keyed by the page slug.
 */

get_header();
get_template_part( 'template-parts/study', 'landing', array( 'country' => get_post_field( 'post_name' ) ) );
get_footer();
