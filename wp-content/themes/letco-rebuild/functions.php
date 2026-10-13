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

function letco_rebuild_assets() {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'letco-rebuild', get_stylesheet_uri(), array(), $version );
	if ( letco_is_landing() ) {
		wp_enqueue_style( 'letco-landing', get_template_directory_uri() . '/assets/css/landing.css', array( 'letco-rebuild' ), $version );
	}
	wp_enqueue_script(
		'letco-rebuild',
		get_template_directory_uri() . '/assets/js/site.js',
		array(),
		$version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'letco_rebuild_assets' );

function letco_asset( $filename ) {
	return esc_url( get_template_directory_uri() . '/assets/images/' . ltrim( $filename, '/' ) );
}

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
	foreach ( array( 'birth_year', 'major', 'gpa', 'korean_level' ) as $field ) {
		$details[ $field ] = isset( $_POST[ $field ] ) ? sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) : '';
	}

	if ( $company ) {
		wp_safe_redirect( add_query_arg( 'lead', 'success', $redirect ) . '#dang-ky' );
		exit;
	}

	if ( '' === $name || '' === $phone ) {
		wp_safe_redirect( add_query_arg( 'lead', 'error', $redirect ) . '#dang-ky' );
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
		wp_safe_redirect( add_query_arg( 'lead', 'error', $redirect ) . '#dang-ky' );
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

	wp_safe_redirect( add_query_arg( 'lead', 'success', $redirect ) . '#dang-ky' );
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
}
add_action( 'manage_letco_lead_posts_custom_column', 'letco_lead_column_content', 10, 2 );

// Keep WordPress's default "Uncategorized" sample content out of the news listing.
function letco_news_query( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
		$query->set( 'category__not_in', array( (int) get_option( 'default_category' ) ) );
	}
}
add_action( 'pre_get_posts', 'letco_news_query' );
