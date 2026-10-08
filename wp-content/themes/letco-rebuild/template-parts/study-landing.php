<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$country = isset( $args['country'] ) ? $args['country'] : 'japan';

$configs = array(
	'japan' => array(
		'class'       => 'study-japan',
		'flag'        => '🇯🇵',
		'name'        => 'Nhật Bản',
		'eyebrow'     => 'Tuyển sinh các kỳ 2026',
		'title'       => 'Du học Nhật Bản: Vững tiếng, chắc nghề, rộng tương lai',
		'description' => 'LETCO đồng hành từ chọn trường, đào tạo tiếng Nhật, hoàn thiện hồ sơ đến khi bạn ổn định cuộc sống tại Nhật Bản.',
		'image'       => 'gallery-2.jpg',
		'highlights'  => array( 'Lộ trình cá nhân hóa', 'Đào tạo tiếng tại LETCO', 'Hỗ trợ hồ sơ & visa' ),
		'benefits'    => array(
			array( 'icon' => '学', 'title' => 'Nền giáo dục thực tiễn', 'text' => 'Chương trình đa dạng, chú trọng kỷ luật, kỹ năng và khả năng ứng dụng trong công việc.' ),
			array( 'icon' => '働', 'title' => 'Trải nghiệm nghề nghiệp', 'text' => 'Cơ hội rèn luyện ngôn ngữ và tác phong trong môi trường học tập, doanh nghiệp Nhật Bản.' ),
			array( 'icon' => '道', 'title' => 'Lộ trình phát triển dài hạn', 'text' => 'Có thể tiếp tục học chuyên môn, đại học hoặc xây dựng sự nghiệp phù hợp sau tốt nghiệp.' ),
		),
		'programs'    => array(
			array( 'tag' => 'Nền tảng', 'title' => 'Trường Nhật ngữ', 'text' => 'Củng cố tiếng Nhật và kỹ năng học tập trước khi chuyển tiếp lên bậc chuyên môn cao hơn.', 'items' => array( 'Phù hợp học sinh mới tốt nghiệp', 'Nhiều kỳ nhập học trong năm', 'Định hướng trường chuyên môn/đại học' ) ),
			array( 'tag' => 'Thực hành', 'title' => 'Trường chuyên môn', 'text' => 'Đào tạo theo nghề với nội dung sát nhu cầu doanh nghiệp và chú trọng kỹ năng thực tế.', 'items' => array( 'Công nghệ, cơ khí, dịch vụ', 'Chăm sóc sức khỏe, du lịch', 'Thiết kế và kinh doanh' ) ),
			array( 'tag' => 'Học thuật', 'title' => 'Đại học & sau đại học', 'text' => 'Lựa chọn dành cho học viên có nền tảng học tập và tiếng Nhật phù hợp với yêu cầu trường.', 'items' => array( 'Lộ trình cử nhân', 'Chương trình thạc sĩ', 'Tư vấn ngành theo năng lực' ) ),
			array( 'tag' => 'Kỹ sư', 'title' => 'Học tiếng, chuyển Visa Kỹ sư', 'text' => 'Lộ trình học tiếng Nhật gắn với mục tiêu làm việc chính thức dành cho người đã tốt nghiệp cao đẳng hoặc đại học.', 'items' => array( 'Mục tiêu tiếng Nhật N3–N2', 'Định hướng việc làm theo chuyên môn', 'Cơ hội tại Tokyo, Chiba, Tochigi' ) ),
			array( 'tag' => 'Tokutei', 'title' => 'Visa Kỹ năng đặc định', 'text' => 'Hướng đi dành cho học viên tốt nghiệp THPT, kết hợp học tiếng và chuẩn bị chứng chỉ kỹ năng nghề.', 'items' => array( 'Mục tiêu tiếng Nhật từ N4', 'Ôn thi chứng chỉ kỹ năng nghề', 'Lộ trình làm việc dài hạn tại Nhật' ) ),
			array( 'tag' => 'Học bổng', 'title' => 'Du học Nhật Bản học bổng báo', 'text' => 'Chương trình học tiếng kết hợp công việc phát báo, có chính sách hỗ trợ học phí và chỗ ở theo kỳ tuyển sinh.', 'items' => array( 'Yêu cầu tiếng Nhật khoảng N4', 'Học tiếng từ 1–2 năm', 'Cơ hội chuyển visa làm việc' ) ),
		),
		'conditions'  => array( 'Tốt nghiệp THPT, cao đẳng hoặc đại học theo yêu cầu từng chương trình', 'Có mục tiêu học tập rõ ràng và ý thức tuân thủ quy định', 'Đáp ứng yêu cầu sức khỏe, tài chính và hồ sơ của trường', 'Năng lực tiếng Nhật được xây dựng theo lộ trình nhập học' ),
		'partners'    => array(
			array( 'type' => 'Trường Nhật ngữ', 'name' => 'JCLI – Tokyo', 'text' => 'Đối tác tiếp nhận và phỏng vấn du học sinh LETCO tại Tokyo.', 'image' => 'school-jcli.jpg' ),
			array( 'type' => 'Trường Nhật ngữ', 'name' => 'Trường Moka', 'text' => 'Chương trình phỏng vấn, tuyển sinh du học Nhật Bản được LETCO triển khai.', 'image' => 'school-moka.jpg' ),
			array( 'type' => 'Chương trình học bổng', 'name' => 'Học bổng báo Nhật Bản', 'text' => 'Học tiếng kết hợp phát báo, hỗ trợ học phí và nhà ở theo điều kiện từng kỳ.', 'image' => 'program-japan-scholarship.jpg' ),
			array( 'type' => 'Lộ trình nghề nghiệp', 'name' => 'Chuyển Visa Kỹ sư', 'text' => 'Đào tạo tiếng và định hướng việc làm đúng chuyên môn cho ứng viên phù hợp.', 'image' => 'program-japan-engineer.jpg' ),
			array( 'type' => 'Lộ trình nghề nghiệp', 'name' => 'Visa Kỹ năng đặc định', 'text' => 'Chuẩn bị tiếng Nhật và chứng chỉ kỹ năng cho các nhóm nghề tiếp nhận.', 'image' => 'program-japan-skilled.jpg' ),
			array( 'type' => 'Học tập & trải nghiệm', 'name' => 'Chương trình vừa học vừa làm', 'text' => 'Kết hợp học tiếng, trải nghiệm thực tế và chuẩn bị lộ trình làm việc sau đào tạo.', 'image' => 'program-japan-studywork.jpg' ),
		),
		'faq'         => array(
			array( 'q' => 'Chưa biết tiếng Nhật có đăng ký được không?', 'a' => 'Có. LETCO sẽ đánh giá đầu vào và xây dựng lộ trình tiếng Nhật phù hợp trước kỳ nhập học. Yêu cầu cụ thể phụ thuộc trường và chương trình bạn chọn.' ),
			array( 'q' => 'Nên bắt đầu hồ sơ trước bao lâu?', 'a' => 'Bạn nên chuẩn bị sớm để có thời gian học tiếng, chọn trường và hoàn thiện giấy tờ. Chuyên viên LETCO sẽ lập mốc công việc theo kỳ nhập học dự kiến.' ),
			array( 'q' => 'LETCO hỗ trợ những gì sau khi có visa?', 'a' => 'Học viên được hướng dẫn trước xuất cảnh, chuẩn bị hành lý, kỹ năng hòa nhập và kết nối hỗ trợ trong giai đoạn đầu tại Nhật Bản.' ),
		),
	),
	'korea' => array(
		'class'       => 'study-korea',
		'flag'        => '🇰🇷',
		'name'        => 'Hàn Quốc',
		'eyebrow'     => 'Chương trình học bổng 2026',
		'title'       => 'Du học Hàn Quốc: Học tập quốc tế, kết nối tương lai',
		'description' => 'Từ chương trình tiếng đến đại học, thạc sĩ và K‑TECH Bridge, LETCO giúp bạn chọn đúng lộ trình và chuẩn bị hồ sơ bài bản.',
		'image'       => 'hero-study.jpg',
		'highlights'  => array( 'Chương trình đa dạng', 'Cơ hội học bổng', 'Đối tác đại học uy tín' ),
		'benefits'    => array(
			array( 'icon' => '한', 'title' => 'Môi trường năng động', 'text' => 'Tiếp cận giáo dục hiện đại, văn hóa sáng tạo và hệ sinh thái doanh nghiệp phát triển.' ),
			array( 'icon' => '꿈', 'title' => 'Nhiều lựa chọn học bổng', 'text' => 'Hồ sơ được định hướng theo năng lực để tìm kiếm chính sách hỗ trợ phù hợp của từng trường.' ),
			array( 'icon' => '길', 'title' => 'Học đi đôi với trải nghiệm', 'text' => 'Các lộ trình chú trọng tiếng Hàn, chuyên môn và khả năng thích nghi trong môi trường quốc tế.' ),
		),
		'programs'    => array(
			array( 'tag' => 'D4-1', 'title' => 'Hệ tiếng Hàn', 'text' => 'Xây dựng nền tảng ngôn ngữ và văn hóa trước khi chuyển tiếp lên chương trình chuyên ngành.', 'items' => array( 'Lộ trình tiếng từ cơ bản', 'Định hướng TOPIK', 'Chuẩn bị chuyển tiếp đại học' ) ),
			array( 'tag' => 'D2', 'title' => 'Đại học & thạc sĩ', 'text' => 'Chương trình chính quy với ngành học đa dạng tại các trường đối tác của LETCO.', 'items' => array( 'Bậc cử nhân', 'Bậc thạc sĩ', 'Tư vấn ngành và học bổng' ) ),
			array( 'tag' => 'K‑TECH', 'title' => 'Học tập gắn doanh nghiệp', 'text' => 'Hướng đi kết hợp đào tạo chuyên môn với trải nghiệm thực tế tại doanh nghiệp Hàn Quốc.', 'items' => array( 'Đào tạo kỹ thuật', 'Thực hành nghề nghiệp', 'Định hướng việc làm' ) ),
			array( 'tag' => 'D2-1', 'title' => 'Kunjang & Daewon', 'text' => 'Chương trình cao đẳng nghề dành cho học sinh tốt nghiệp THPT, gắn đào tạo với nhu cầu doanh nghiệp.', 'items' => array( 'Yêu cầu TOPIK 2 theo kỳ tuyển', 'Nhóm ngành kỹ thuật và dịch vụ', 'Chính sách học bổng theo hồ sơ' ) ),
			array( 'tag' => 'Thạc sĩ', 'title' => 'Học bổng sau đại học', 'text' => 'Lộ trình thạc sĩ bằng tiếng Anh hoặc tiếng Hàn dành cho ứng viên đã tốt nghiệp đại học.', 'items' => array( 'IELTS 5.5 hoặc TOPIK 2 tham khảo', 'Đào tạo tiếng trước chuyên ngành', 'Nhiều nhóm ngành quốc tế' ) ),
			array( 'tag' => 'PTU', 'title' => 'Chương trình Đại học Pyeongtaek', 'text' => 'Lựa chọn học tập tại đối tác chiến lược của LETCO ở trung tâm công nghệ cao Pyeongtaek.', 'items' => array( 'Kinh doanh & Logistics', 'Kỹ thuật, ICT', 'Truyền thông & Nghệ thuật' ) ),
		),
		'conditions'  => array( 'Tốt nghiệp THPT, cao đẳng hoặc đại học phù hợp chương trình đăng ký', 'Kết quả học tập và thời gian trống được đánh giá theo yêu cầu từng trường', 'Đáp ứng điều kiện sức khỏe, tài chính và hồ sơ theo quy định', 'Tiếng Hàn được đào tạo theo mục tiêu của hệ tiếng hoặc chuyên ngành' ),
		'partners'    => array(
			array( 'type' => 'Đại học đối tác', 'name' => 'Đại học Pyeongtaek (PTU)', 'text' => 'Thế mạnh Kinh doanh, Logistics, ICT, truyền thông đa phương tiện và nghệ thuật.', 'image' => 'school-pyeongtaek.jpg' ),
			array( 'type' => 'Đại học công lập', 'name' => 'Đại học Quốc gia Changwon', 'text' => 'Nổi bật về cơ khí, điện – điện tử, máy tính, công nghệ thông tin và hàng hải.', 'image' => 'school-changwon.jpg' ),
			array( 'type' => 'Đại học nghề', 'name' => 'Kunjang University College', 'text' => 'Đào tạo ô tô, đóng tàu, khách sạn – ẩm thực, điều dưỡng và chăm sóc sắc đẹp.', 'image' => 'school-kunjang.jpg' ),
			array( 'type' => 'Đại học nghề', 'name' => 'Daewon University College', 'text' => 'Các ngành IT, điện tử viễn thông, kinh doanh, du lịch quốc tế và y tế cộng đồng.', 'image' => 'school-daewon.jpg' ),
			array( 'type' => 'Đại học & doanh nghiệp', 'name' => 'Đại học Daeduk – IBTech', 'text' => 'Mạng lưới triển khai chương trình K‑TECH Bridge gắn học tập với doanh nghiệp.', 'image' => 'school-daeduk-ktech.png' ),
			array( 'type' => 'Chương trình D2-1', 'name' => 'Học bổng Kunjang & Daewon', 'text' => 'Lộ trình tuyển sinh và học bổng được áp dụng theo điều kiện của từng kỳ.', 'image' => 'school-kunjang.jpg' ),
			array( 'type' => 'Chương trình thực tập', 'name' => 'K‑TECH Bridge', 'text' => 'Học tại Daeduk, trải nghiệm và có cơ hội thực tập hưởng lương tại doanh nghiệp Hàn Quốc.', 'image' => 'school-daeduk-ktech.png' ),
		),
		'faq'         => array(
			array( 'q' => 'Không biết tiếng Hàn có thể bắt đầu không?', 'a' => 'Có. Nhiều học viên bắt đầu từ chương trình đào tạo tiếng. LETCO sẽ kiểm tra hồ sơ và tư vấn lộ trình phù hợp với kỳ nhập học, trường và mục tiêu chuyên ngành.' ),
			array( 'q' => 'Học bổng có được đảm bảo 100% không?', 'a' => 'Học bổng phụ thuộc chính sách từng trường và chất lượng hồ sơ. LETCO hỗ trợ bạn lựa chọn chương trình phù hợp và chuẩn bị hồ sơ để tăng khả năng đạt học bổng.' ),
			array( 'q' => 'K‑TECH Bridge phù hợp với ai?', 'a' => 'Chương trình phù hợp với người học quan tâm nhóm ngành kỹ thuật và mong muốn kết hợp kiến thức chuyên môn với trải nghiệm tại doanh nghiệp.' ),
		),
	),
);

$data        = $configs[ $country ];
$lead_status = isset( $_GET['lead'] ) ? sanitize_key( wp_unslash( $_GET['lead'] ) ) : '';
?>

<div class="study-landing <?php echo esc_attr( $data['class'] ); ?>">
	<section class="study-hero">
		<div class="study-hero-orb study-hero-orb-one"></div>
		<div class="study-hero-orb study-hero-orb-two"></div>
		<div class="container study-hero-grid">
			<div class="study-hero-copy">
				<span class="study-kicker"><span><?php echo esc_html( $data['flag'] ); ?></span><?php echo esc_html( $data['eyebrow'] ); ?></span>
				<h1><?php echo esc_html( $data['title'] ); ?></h1>
				<p><?php echo esc_html( $data['description'] ); ?></p>
				<div class="study-hero-buttons">
					<a class="button study-primary-button" href="#dang-ky">Nhận tư vấn lộ trình</a>
					<a class="study-secondary-link" href="#chuong-trinh">Xem chương trình <span>↓</span></a>
				</div>
				<ul class="study-chips">
					<?php foreach ( $data['highlights'] as $highlight ) : ?>
						<li>✓ <?php echo esc_html( $highlight ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="study-hero-visual">
				<div class="study-flag-card"><span><?php echo esc_html( $data['flag'] ); ?></span><strong><?php echo esc_html( $data['name'] ); ?></strong><small>Study destination</small></div>
				<img src="<?php echo letco_asset( $data['image'] ); ?>" alt="Du học <?php echo esc_attr( $data['name'] ); ?> cùng LETCO">
				<div class="study-trust-card"><strong>26 năm</strong><span>Kinh nghiệm đào tạo và hội nhập quốc tế</span></div>
			</div>
		</div>
	</section>

	<nav class="study-anchor-nav" aria-label="Điều hướng nội dung landing page">
		<div class="container">
			<a href="#loi-ich">Lợi ích</a>
			<a href="#chuong-trinh">Chương trình</a>
			<a href="#dieu-kien">Điều kiện</a>
			<a href="#lo-trinh">Lộ trình</a>
			<a href="#doi-tac">Đối tác</a>
			<a href="#faq">FAQ</a>
		</div>
	</nav>

	<section class="section study-benefits" id="loi-ich">
		<div class="container">
			<div class="section-heading section-heading-center">
				<span class="eyebrow">Vì sao chọn <?php echo esc_html( $data['name'] ); ?></span>
				<h2>Một hành trình học tập, nhiều giá trị dài hạn</h2>
				<p>Không chỉ là một tấm bằng, đây còn là cơ hội phát triển ngôn ngữ, kỹ năng và tư duy hội nhập.</p>
			</div>
			<div class="study-benefit-grid">
				<?php foreach ( $data['benefits'] as $benefit ) : ?>
					<article>
						<span class="study-icon"><?php echo esc_html( $benefit['icon'] ); ?></span>
						<h3><?php echo esc_html( $benefit['title'] ); ?></h3>
						<p><?php echo esc_html( $benefit['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section study-program-section" id="chuong-trinh">
		<div class="container">
			<div class="section-heading heading-row">
				<div><span class="eyebrow">Chọn đúng hướng đi</span><h2>Chương trình nổi bật</h2></div>
				<p>Mỗi hồ sơ được đánh giá riêng để lựa chọn bậc học, trường và kỳ nhập học phù hợp.</p>
			</div>
			<div class="content-carousel content-carousel--three study-program-carousel" data-content-carousel data-interval="3000">
				<div class="content-carousel-viewport" role="region" aria-label="Chương trình du học nổi bật">
					<div class="study-program-grid content-carousel-track" data-carousel-track>
						<?php foreach ( $data['programs'] as $program ) : ?>
							<article class="study-program-card">
								<span class="study-program-tag"><?php echo esc_html( $program['tag'] ); ?></span>
								<h3><?php echo esc_html( $program['title'] ); ?></h3>
								<p><?php echo esc_html( $program['text'] ); ?></p>
								<ul>
									<?php foreach ( $program['items'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?>
								</ul>
								<a href="#dang-ky">Tư vấn chương trình <span>→</span></a>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="content-carousel-controls">
					<button type="button" data-carousel-prev aria-label="Xem nhóm chương trình trước">‹</button>
					<div class="content-carousel-dots" data-carousel-dots aria-label="Chọn nhóm chương trình"></div>
					<button type="button" data-carousel-next aria-label="Xem nhóm chương trình tiếp theo">›</button>
				</div>
			</div>
		</div>
	</section>

	<section class="section study-conditions" id="dieu-kien">
		<div class="container study-split">
			<div class="study-split-copy">
				<span class="eyebrow eyebrow-light">Điều kiện tham khảo</span>
				<h2>Bạn đã sẵn sàng cho hành trình du học?</h2>
				<p>Điều kiện chính thức thay đổi theo trường, chương trình và từng thời điểm. LETCO sẽ kiểm tra hồ sơ trước khi đưa ra lộ trình.</p>
				<a class="button button-light" href="#dang-ky">Kiểm tra hồ sơ miễn phí</a>
			</div>
			<div class="study-condition-list">
				<?php foreach ( $data['conditions'] as $index => $condition ) : ?>
					<div><span>0<?php echo esc_html( $index + 1 ); ?></span><p><?php echo esc_html( $condition ); ?></p></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section study-roadmap" id="lo-trinh">
		<div class="container">
			<div class="section-heading section-heading-center">
				<span class="eyebrow">Quy trình đồng hành</span>
				<h2>6 bước cùng LETCO</h2>
			</div>
			<div class="study-timeline">
				<?php
				$steps = array(
					array( 'Tư vấn', 'Đánh giá học lực, tài chính và mục tiêu.' ),
					array( 'Chọn trường', 'Xây dựng danh sách trường và kỳ nhập học.' ),
					array( 'Đào tạo tiếng', 'Học ngôn ngữ và kỹ năng hội nhập.' ),
					array( 'Hoàn thiện hồ sơ', 'Chuẩn hóa giấy tờ, hồ sơ trường và visa.' ),
					array( 'Phỏng vấn & visa', 'Luyện phỏng vấn và theo dõi kết quả.' ),
					array( 'Xuất cảnh', 'Định hướng trước bay và hỗ trợ giai đoạn đầu.' ),
				);
				foreach ( $steps as $index => $step ) :
					?>
					<article><span><?php echo esc_html( $index + 1 ); ?></span><h3><?php echo esc_html( $step[0] ); ?></h3><p><?php echo esc_html( $step[1] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section study-partners" id="doi-tac">
		<div class="container study-partner-layout">
			<div class="study-partner-copy">
				<span class="eyebrow">Mạng lưới giáo dục</span>
				<h2>Trường và chương trình đối tác</h2>
				<p>LETCO kết nối người học với các trường và chương trình phù hợp, ưu tiên chất lượng đào tạo, trải nghiệm thực tế và lộ trình phát triển sau tốt nghiệp.</p>
				<div class="study-partner-count"><strong><?php echo esc_html( count( $data['partners'] ) ); ?></strong><span>lựa chọn trường & chương trình tiêu biểu</span></div>
			</div>
			<div class="content-carousel content-carousel--study-partners study-partner-carousel" data-content-carousel data-interval="3000">
				<div class="content-carousel-viewport" role="region" aria-label="Trường và chương trình đối tác">
					<div class="study-partner-list content-carousel-track" data-carousel-track>
						<?php foreach ( $data['partners'] as $partner ) : ?>
							<article>
								<div class="study-partner-image"><img src="<?php echo letco_asset( $partner['image'] ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>"><span class="study-partner-flag"><?php echo esc_html( $data['flag'] ); ?></span></div>
								<div class="study-partner-card-copy"><small><?php echo esc_html( $partner['type'] ); ?></small><strong><?php echo esc_html( $partner['name'] ); ?></strong><p><?php echo esc_html( $partner['text'] ); ?></p></div>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="content-carousel-controls">
					<button type="button" data-carousel-prev aria-label="Xem nhóm đối tác trước">‹</button>
					<div class="content-carousel-dots" data-carousel-dots aria-label="Chọn nhóm đối tác"></div>
					<button type="button" data-carousel-next aria-label="Xem nhóm đối tác tiếp theo">›</button>
				</div>
			</div>
		</div>
	</section>

	<section class="section study-faq" id="faq">
		<div class="container study-faq-layout">
			<div><span class="eyebrow">Câu hỏi thường gặp</span><h2>Điều bạn cần biết trước khi bắt đầu</h2><p>Chưa tìm thấy câu trả lời? Hãy để lại thông tin, chuyên viên LETCO sẽ liên hệ tư vấn.</p></div>
			<div class="study-accordion">
				<?php foreach ( $data['faq'] as $index => $item ) : ?>
					<details <?php echo 0 === $index ? 'open' : ''; ?>><summary><?php echo esc_html( $item['q'] ); ?><span aria-hidden="true"></span></summary><p><?php echo esc_html( $item['a'] ); ?></p></details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section study-lead-section" id="dang-ky">
		<div class="container study-lead-layout">
			<div class="study-lead-copy">
				<span class="eyebrow eyebrow-light">Tư vấn 1:1 cùng chuyên viên</span>
				<h2>Nhận lộ trình du học <?php echo esc_html( $data['name'] ); ?> phù hợp với bạn</h2>
				<p>Để lại thông tin cơ bản. LETCO sẽ liên hệ để đánh giá hồ sơ, giải đáp chi phí và gợi ý kỳ nhập học phù hợp.</p>
				<ul><li>Kiểm tra hồ sơ ban đầu miễn phí</li><li>Thông tin rõ ràng, không cam kết quá mức</li><li>Bảo mật thông tin người đăng ký</li></ul>
			</div>
			<div class="study-lead-form-wrap">
				<?php if ( 'success' === $lead_status ) : ?><div class="form-notice form-success">Cảm ơn bạn! LETCO đã nhận được thông tin và sẽ sớm liên hệ.</div><?php endif; ?>
				<?php if ( 'error' === $lead_status ) : ?><div class="form-notice form-error">Vui lòng nhập đầy đủ họ tên và số điện thoại.</div><?php endif; ?>
				<form class="study-lead-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
					<input type="hidden" name="action" value="letco_submit_lead">
					<input type="hidden" name="program" value="Du học <?php echo esc_attr( $data['name'] ); ?>">
					<input type="hidden" name="redirect_to" value="<?php echo esc_url( get_permalink() ); ?>">
					<?php wp_nonce_field( 'letco_submit_lead', 'letco_lead_nonce' ); ?>
					<div class="form-honeypot" aria-hidden="true"><label>Công ty<input type="text" name="company" tabindex="-1" autocomplete="off"></label></div>
					<label>Họ và tên <span>*</span><input type="text" name="full_name" required autocomplete="name" placeholder="Nguyễn Văn A"></label>
					<div class="form-row">
						<label>Số điện thoại <span>*</span><input type="tel" name="phone" required autocomplete="tel" placeholder="09xx xxx xxx"></label>
						<label>Email<input type="email" name="email" autocomplete="email" placeholder="email@example.com"></label>
					</div>
					<label>Điều bạn đang quan tâm<textarea name="message" rows="4" placeholder="Kỳ nhập học, bậc học, ngành học..."></textarea></label>
					<button class="button study-primary-button" type="submit">Gửi đăng ký tư vấn</button>
					<small>Bằng việc gửi thông tin, bạn đồng ý để LETCO liên hệ phục vụ nhu cầu tư vấn.</small>
				</form>
			</div>
		</div>
	</section>
</div>
