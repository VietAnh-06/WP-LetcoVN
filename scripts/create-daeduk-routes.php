<?php
/** Run with WP-CLI eval-file or load after wp-load.php; safe to repeat. */
if ( ! defined( 'ABSPATH' ) ) { exit( "Load WordPress first.\n" ); }
$parent = get_page_by_path( 'du-hoc/du-hoc-han-quoc/dai-hoc-daeduk' );
if ( ! $parent ) { throw new RuntimeException( 'Daeduk parent page not found.' ); }
foreach ( array( 'd2-6' => 'Daeduk D2-6 – Trao đổi sinh viên', 'd2-1' => 'Daeduk D2-1 – Cao đẳng chính quy', 'd4-1' => 'Daeduk D4-1 – Học tiếng Hàn' ) as $slug => $title ) {
	$existing = get_page_by_path( get_page_uri( $parent ) . '/' . $slug );
	if ( $existing ) {
		if ( 'template-study-school.php' !== get_page_template_slug( $existing ) ) { throw new RuntimeException( 'Existing page uses a different template: ' . $slug ); }
		$id = $existing->ID;
	} else {
		$id = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_parent' => $parent->ID, 'post_name' => $slug, 'post_title' => $title, 'meta_input' => array( '_wp_page_template' => 'template-study-school.php' ) ), true );
		if ( is_wp_error( $id ) ) { throw new RuntimeException( $id->get_error_message() ); }
	}
	echo get_permalink( $id ) . "\n";
}
