<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function letco_rebuild_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo' );
	register_nav_menus(
		array(
			'primary' => __( 'Menu chính', 'letco-rebuild' ),
		)
	);
}
add_action( 'after_setup_theme', 'letco_rebuild_setup' );

/**
 * Study-abroad landing pages render without the site menu, footer banner or
 * floating contact buttons, and get their own stylesheet.
 */
function letco_is_landing() {
	return is_front_page() || is_page( array( 'du-hoc-han-quoc', 'du-hoc-nhat-ban' ) ) || is_page_template( 'template-study-school.php' );
}

function letco_landing_body_class( $classes ) {
	if ( letco_is_landing() ) {
		$classes[] = 'is-landing';
	}
	return $classes;
}
add_filter( 'body_class', 'letco_landing_body_class' );

/**
 * Version of a theme file: theme version plus the file's modification time, so an
 * edited stylesheet or script gets a new URL and browsers stop serving a stale copy.
 */
function letco_asset_version( $relative_path ) {
	$mtime = filemtime( get_template_directory() . '/' . $relative_path );
	return wp_get_theme()->get( 'Version' ) . ( $mtime ? '.' . $mtime : '' );
}

function letco_rebuild_assets() {
	wp_enqueue_style( 'letco-rebuild', get_stylesheet_uri(), array(), letco_asset_version( 'style.css' ) );
	if ( letco_is_landing() ) {
		wp_enqueue_style( 'letco-landing', get_template_directory_uri() . '/assets/css/landing.css', array( 'letco-rebuild' ), letco_asset_version( 'assets/css/landing.css' ) );
		if ( is_page( 'dai-hoc-daeduk' ) ) {
			wp_enqueue_style( 'letco-daeduk', get_template_directory_uri() . '/assets/css/daeduk.css', array( 'letco-landing' ), letco_asset_version( 'assets/css/daeduk.css' ) );
		}
	}
	wp_enqueue_script(
		'letco-rebuild',
		get_template_directory_uri() . '/assets/js/site.js',
		array(),
		letco_asset_version( 'assets/js/site.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'letco_rebuild_assets' );

function letco_asset( $filename ) {
	return esc_url( get_template_directory_uri() . '/assets/images/' . ltrim( $filename, '/' ) );
}

/**
 * Opens a block that folds behind a toggle on phones and is always open on wider
 * screens. The title stays a real heading; the toggle exists only where it works.
 * Close with letco_fold_close().
 *
 * @param string $title Visible title.
 * @param array  $args  tag (title element, default h3), class (block classes),
 *                      title_class (extra title classes), id (anchor on the block).
 */
function letco_fold_open( $title, $args = array() ) {
	static $count = 0;
	++$count;
	$tag         = isset( $args['tag'] ) && in_array( $args['tag'], array( 'h3', 'h4', 'p' ), true ) ? $args['tag'] : 'h3';
	$class       = isset( $args['class'] ) ? $args['class'] : '';
	$title_class = isset( $args['title_class'] ) ? $args['title_class'] : '';
	$id          = 'fold-' . $count;
	$anchor      = empty( $args['id'] ) ? '' : ' id="' . esc_attr( $args['id'] ) . '"';
	printf(
		'<div class="lp-fold %1$s"%6$s data-fold><div class="lp-fold-head"><%2$s class="lp-fold-title %3$s" id="%4$s-title">%5$s</%2$s><button type="button" class="lp-fold-toggle" aria-expanded="true" aria-controls="%4$s" aria-labelledby="%4$s-title"></button></div><div class="lp-fold-body" id="%4$s">',
		esc_attr( $class ),
		$tag, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- limited to the allowed list above.
		esc_attr( $title_class ),
		esc_attr( $id ),
		esc_html( $title ),
		$anchor // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
	);
}

function letco_fold_close() {
	echo '</div></div>';
}

/**
 * Description and social-share tags for landing pages that define 'seo' in their config.
 */
function letco_landing_meta() {
	if ( ! is_page() ) {
		return;
	}
	$slug    = get_post_field( 'post_name', get_queried_object_id() );
	$configs = require get_template_directory() . '/template-parts/study-school-configs.php';
	if ( empty( $configs[ $slug ]['seo'] ) ) {
		return;
	}
	$seo   = $configs[ $slug ]['seo'];
	$title = wp_get_document_title();
	$image = get_template_directory_uri() . '/assets/images/' . $seo['image'];
	$size  = getimagesize( get_template_directory() . '/assets/images/' . $seo['image'] );
	printf( '<meta name="description" content="%s">' . "\n", esc_attr( $seo['description'] ) );
	printf( '<meta property="og:type" content="website">' . "\n" );
	printf( '<meta property="og:locale" content="vi_VN">' . "\n" );
	printf( '<meta property="og:site_name" content="LETCO – HaUI">' . "\n" );
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $seo['description'] ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( get_permalink() ) );
	printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $image ) );
	if ( $size ) {
		printf( '<meta property="og:image:width" content="%d">' . "\n", (int) $size[0] );
		printf( '<meta property="og:image:height" content="%d">' . "\n", (int) $size[1] );
	}
	printf( '<meta property="og:image:alt" content="%s">' . "\n", esc_attr( $seo['image_alt'] ) );
	printf( '<meta name="twitter:card" content="summary_large_image">' . "\n" );
}
add_action( 'wp_head', 'letco_landing_meta', 5 );

function letco_primary_menu_fallback() {
	$links = array(
		'Trang chủ'         => home_url( '/' ),
		'Giới thiệu'        => home_url( '/gioi-thieu/' ),
		'Cung ứng nhân lực' => home_url( '/cung-ung-nhan-luc/' ),
		'Du học'            => home_url( '/du-hoc/' ),
		'Đào tạo'           => home_url( '/dao-tao/' ),
		'Tin tức'           => home_url( '/tin-tuc/' ),
		'Đơn hàng'          => home_url( '/don-hang/' ),
	);

	echo '<ul class="primary-menu">';
	foreach ( $links as $label => $url ) {
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}

function letco_excerpt_length() {
	return 24;
}
add_filter( 'excerpt_length', 'letco_excerpt_length' );

function letco_register_lead_post_type() {
	register_post_type(
		'letco_lead',
		array(
			'labels' => array(
				'name'          => 'Đăng ký tư vấn',
				'singular_name' => 'Đăng ký tư vấn',
				'menu_name'     => 'Đăng ký tư vấn',
				'edit_item'     => 'Xem đăng ký',
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-email-alt',
			'supports'            => array( 'title' ),
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'exclude_from_search' => true,
		)
	);
}
add_action( 'init', 'letco_register_lead_post_type' );

/**
 * Normalises a Vietnamese phone/Zalo number to 0xxxxxxxxx, or returns '' when it is not one.
 * Accepts spaces, dots, dashes and a +84 / 84 prefix.
 */
function letco_normalize_phone( $raw ) {
	$digits = preg_replace( '/[\s.\-()]/', '', (string) $raw );
	if ( ! preg_match( '/^(?:\+?84|0)([35789]\d{8})$/', $digits, $match ) ) {
		return '';
	}
	return '0' . $match[1];
}

function letco_handle_consultation_form() {
	if ( ! isset( $_POST['letco_lead_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['letco_lead_nonce'] ) ), 'letco_submit_lead' ) ) {
		wp_die( 'Phiên gửi biểu mẫu không hợp lệ. Vui lòng thử lại.', 'Yêu cầu không hợp lệ', array( 'response' => 403 ) );
	}

	$redirect = isset( $_POST['redirect_to'] ) ? wp_validate_redirect( esc_url_raw( wp_unslash( $_POST['redirect_to'] ) ), home_url( '/' ) ) : home_url( '/' );
	$name     = isset( $_POST['full_name'] ) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : '';
	$phone    = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email    = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$program  = isset( $_POST['program'] ) ? sanitize_text_field( wp_unslash( $_POST['program'] ) ) : '';
	$message  = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$company  = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$details  = array();
	foreach ( array( 'birth_year', 'major', 'gpa', 'korean_level', 'study_status', 'school_name' ) as $field ) {
		$details[ $field ] = isset( $_POST[ $field ] ) ? sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) : '';
	}

	if ( $company ) {
		wp_safe_redirect( add_query_arg( 'lead', 'success', $redirect ) . '#form-dang-ky' );
		exit;
	}

	if ( '' === $name || '' === $phone ) {
		wp_safe_redirect( add_query_arg( 'lead', 'error', $redirect ) . '#form-dang-ky' );
		exit;
	}

	$phone = letco_normalize_phone( $phone );
	if ( '' === $phone ) {
		wp_safe_redirect( add_query_arg( 'lead', 'phone', $redirect ) . '#form-dang-ky' );
		exit;
	}

	$lead_id = wp_insert_post(
		array(
			'post_type'   => 'letco_lead',
			'post_status' => 'private',
			'post_title'  => sprintf( '%s – %s', $name, $phone ),
		)
	);

	if ( is_wp_error( $lead_id ) ) {
		wp_safe_redirect( add_query_arg( 'lead', 'error', $redirect ) . '#form-dang-ky' );
		exit;
	}

	update_post_meta( $lead_id, 'letco_phone', $phone );
	update_post_meta( $lead_id, 'letco_email', $email );
	update_post_meta( $lead_id, 'letco_program', $program );
	update_post_meta( $lead_id, 'letco_message', $message );
	update_post_meta( $lead_id, 'letco_source_url', $redirect );
	foreach ( $details as $field => $value ) {
		if ( '' !== $value ) {
			update_post_meta( $lead_id, 'letco_' . $field, $value );
		}
	}

	wp_safe_redirect( add_query_arg( 'lead', 'success', $redirect ) . '#form-dang-ky' );
	exit;
}
add_action( 'admin_post_nopriv_letco_submit_lead', 'letco_handle_consultation_form' );
add_action( 'admin_post_letco_submit_lead', 'letco_handle_consultation_form' );

function letco_lead_columns( $columns ) {
	return array(
		'cb'      => $columns['cb'],
		'title'   => 'Họ tên – Điện thoại',
		'program' => 'Chương trình',
		'major'   => 'Ngành quan tâm',
		'study'   => 'Tình trạng học',
		'email'   => 'Email',
		'date'    => 'Thời gian',
	);
}
add_filter( 'manage_letco_lead_posts_columns', 'letco_lead_columns' );

function letco_lead_column_content( $column, $post_id ) {
	if ( 'program' === $column ) {
		echo esc_html( get_post_meta( $post_id, 'letco_program', true ) );
	}
	if ( 'email' === $column ) {
		echo esc_html( get_post_meta( $post_id, 'letco_email', true ) );
	}
	if ( 'major' === $column ) {
		echo esc_html( get_post_meta( $post_id, 'letco_major', true ) );
	}
	if ( 'study' === $column ) {
		echo esc_html( implode( ' · ', array_filter( array( get_post_meta( $post_id, 'letco_study_status', true ), get_post_meta( $post_id, 'letco_school_name', true ) ) ) ) );
	}
}
add_action( 'manage_letco_lead_posts_custom_column', 'letco_lead_column_content', 10, 2 );

// Keep WordPress's default "Uncategorized" sample content out of the news listing.
function letco_news_query( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
		$query->set( 'category__not_in', array( (int) get_option( 'default_category' ) ) );
	}
}
add_action( 'pre_get_posts', 'letco_news_query' );
