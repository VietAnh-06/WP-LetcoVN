<?php
/**
 * Template Name: Trang tổng hợp du học
 *
 * Personal study-and-work overview page, not a LETCO page: it renders its own document,
 * header and footer so no company name, logo, favicon, hotline or address appears.
 * Content is built from the same configs as the country pages.
 */

// The page owner's name and contact details, shown in the header, sign-up section and footer.
$contact = array(
	'brand' => 'Cô Thanh Mai Du Học',
	'phone' => '0979018586',
	'email' => 'maintt2013@gmail.com',
);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Du học và việc làm tại Hàn Quốc, Nhật Bản, Đài Loan, Đức: hệ học, chi phí năm đầu, học bổng, làm thêm và cơ hội việc làm sau tốt nghiệp.">
	<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E%F0%9F%8E%93%3C/text%3E%3C/svg%3E">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content">Chuyển đến nội dung</a>
<main id="main-content">
<?php get_template_part( 'template-parts/study', 'hub', array( 'contact' => $contact ) ); ?>
</main>
<footer class="lp-footer study-hub-footer">
	<div class="container study-hub-footer-contact">
		<p><strong>Liên hệ tư vấn:</strong> <a href="tel:<?php echo esc_attr( $contact['phone'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a> · <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a></p>
	</div>
	<div class="container lp-footer-bottom">
		<p>Thông tin tổng hợp từ nguồn công khai, chỉ mang tính tham khảo. Điều kiện và chi phí có thể thay đổi theo từng thời điểm.</p>
		<span>© <?php echo esc_html( gmdate( 'Y' ) . ' ' . $contact['brand'] ); ?> · Nguồn số liệu và ảnh được ghi tại từng nội dung</span>
	</div>
</footer>
<div class="lp-mobile-cta">
	<a class="lp-button" href="#dang-ky">Đăng ký tư vấn</a>
	<a class="lp-button lp-button--light" href="tel:<?php echo esc_attr( $contact['phone'] ); ?>">Gọi cô Mai</a>
</div>
<button class="lp-to-top" type="button" data-to-top hidden>
	<svg aria-hidden="true" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
	<span class="screen-reader-text">Lên đầu trang</span>
</button>
<?php wp_footer(); ?>
</body>
</html>
