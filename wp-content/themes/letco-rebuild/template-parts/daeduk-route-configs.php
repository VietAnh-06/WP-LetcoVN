<?php
/** Route-specific content; shared school information comes from the Daeduk overview. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$base = $configs['dai-hoc-daeduk'];
$routes = array(
	'd2-6' => array(
		'title' => 'Trao đổi sinh viên D2-6 tại Đại học Daeduk',
		'intro' => 'Dành cho sinh viên trường đối tác muốn học tập và trải nghiệm doanh nghiệp tại Hàn Quốc trong 6 – 12 tháng. Kết quả học tập được công nhận theo thỏa thuận với trường Việt Nam.',
		'visa_index' => 0,
		'conditions' => array( 'Đang là sinh viên năm 2, 3 hoặc năm cuối tại trường đối tác như HaUI, ĐH Công nghệ Đông Á; LETCO kiểm tra thỏa thuận áp dụng cho trường của bạn.', 'Có kế hoạch công nhận tín chỉ và trở về hoàn thành chương trình hoặc xin học tiếp khi đủ điều kiện.', 'Chưa có TOPIK vẫn có thể đăng ký tư vấn. Yêu cầu tiếng Hàn và kỳ tham gia được xác nhận theo thông báo tuyển sinh.', 'Chuẩn bị hồ sơ học tập, sức khỏe và chứng minh tài chính theo yêu cầu của trường và cơ quan xét visa.' ),
		'outcomes' => array( 'Theo mô hình 6 tháng: 4 tuần học kiến thức ngành và văn hóa doanh nghiệp tại Daeduk, sau đó 20 tuần thực tập chuyên ngành.', 'Hồ sơ K-Tech Bridge dự kiến công nhận 15 tín chỉ mỗi kỳ thực tập; việc chuyển tín chỉ về Việt Nam theo thỏa thuận của các trường.', 'Trợ cấp tham khảo 2,15 – 2,7 triệu KRW/tháng. Mức thực nhận, hỗ trợ ăn ở và thời lượng thực tập theo văn bản tiếp nhận.', 'Kết thúc trao đổi không tự động nhận bằng Cao đẳng hoặc chuyển E‑7‑1. Bạn về nước hoàn thành chương trình hoặc xin chuyển tiếp khi được tiếp nhận và xét duyệt.' ),
		'steps' => array( array( 'Đăng ký & đánh giá hồ sơ', 'Xác nhận trường đang học, năm học, ngành và trình độ tiếng Hàn.' ), array( 'Chuẩn bị tiếng & hồ sơ', 'Lập kế hoạch học tiếng, công nhận tín chỉ và dự toán chi phí.' ), array( 'Xét tuyển & visa D2-6', 'Phỏng vấn, hoàn thiện hồ sơ trường và xin visa theo đợt tuyển sinh.' ), array( 'Học & thực tập', 'Tham gia học phần và thực tập theo kế hoạch được trường xác nhận.' ), array( 'Hoàn thành trao đổi', 'Nhận kết quả học tập, về nước hoặc xin học tiếp nếu đáp ứng điều kiện.' ) ),
		'faq' => array( $base['dk']['faq']['items'][0], $base['dk']['faq']['items'][2], $base['dk']['faq']['items'][3], $base['dk']['faq']['items'][4], $base['dk']['faq']['items'][5], array( 'Tôi cần chuẩn bị ngân sách thế nào?', 'LETCO gửi dự toán riêng theo kỳ tham gia, trình độ tiếng Hàn và hồ sơ. Bạn cần xác nhận các khoản nộp trường, dịch vụ, thủ tục và sinh hoạt ngoài phần hỗ trợ trước khi tham gia.' ) ),
		'documents' => array( 'Giấy xác nhận sinh viên và bảng điểm hiện tại.', 'Bằng tốt nghiệp, học bạ THPT và giấy tờ học tập theo yêu cầu.', 'Hộ chiếu, căn cước, giấy tờ gia đình và cư trú.', 'Hồ sơ tài chính, sức khỏe và chứng chỉ ngoại ngữ nếu có.' ),
	),
	'd2-1' => array(
		'title' => 'Cao đẳng chính quy D2-1 tại Đại học Daeduk',
		'intro' => 'Lộ trình học chuyên ngành 2 – 3 năm dành cho người đã tốt nghiệp THPT, kết hợp kiến thức tại trường với thực hành nghề nghiệp và hướng tới bằng Cao đẳng Daeduk.',
		'visa_index' => 1,
		'conditions' => array( 'Tốt nghiệp THPT, GPA từ 6.5 theo hồ sơ chương trình; trường xét hồ sơ cụ thể.', 'TOPIK 2 là mốc tiếng Hàn trong hồ sơ chương trình. Điều kiện nhập học chuyên ngành cần xác nhận theo ngành và kỳ tuyển sinh.', 'Chưa đủ tiếng có thể học tại Việt Nam để chờ kỳ phù hợp hoặc tìm hiểu lộ trình tiếng Hàn D4-1.', 'Đáp ứng yêu cầu hồ sơ, sức khỏe và chứng minh tài chính của trường và cơ quan xét visa.' ),
		'outcomes' => array( 'Học chuyên ngành trong 2 – 3 năm tùy ngành; nhận bằng Cao đẳng khi hoàn thành chương trình và điều kiện tốt nghiệp.', 'Các nhóm ngành trong hồ sơ: Cơ khí; Điện – Điện tử – Điều khiển; Quản trị Kinh doanh; Ngôn ngữ Hàn Quốc.', 'Thực hành và thực tập theo chương trình của ngành. Vị trí, tín chỉ, trợ cấp và hỗ trợ ăn ở được xác nhận trong kế hoạch tiếp nhận.', 'Học bổng được xét theo chính sách của trường và kết quả học tập; LETCO xác nhận mức áp dụng khi tư vấn hồ sơ.', 'Sau tốt nghiệp có thể tìm hiểu D-10 hoặc E‑7‑1; việc chuyển diện phụ thuộc bằng cấp, công việc, doanh nghiệp và kết quả xét duyệt.' ),
		'steps' => array( array( 'Đánh giá & chọn ngành', 'Đối chiếu học lực, trình độ tiếng Hàn và mục tiêu nghề nghiệp.' ), array( 'Đạt điều kiện đầu vào', 'Hoàn thiện tiếng Hàn, hồ sơ học tập và kế hoạch tài chính.' ), array( 'Xét tuyển & visa D2-1', 'Nhận kết quả xét tuyển và chuẩn bị hồ sơ visa theo hướng dẫn.' ), array( 'Học chuyên ngành', 'Học 2 – 3 năm, tham gia thực hành và thực tập theo kế hoạch ngành.' ), array( 'Tốt nghiệp & định hướng việc làm', 'Hoàn thành điều kiện cấp bằng, xem xét việc làm và diện cư trú phù hợp.' ) ),
		'faq' => array( array( 'Chưa có TOPIK có đăng ký tư vấn D2-1 được không?', 'Được. Bạn có thể đăng ký để đánh giá hồ sơ và học tiếng trước. Nhập học chuyên ngành cần đáp ứng điều kiện của trường; nếu cần học tiếng tại Hàn Quốc, hãy xem chương trình D4-1.' ), array( 'Làm thế nào để biết ngân sách cần chuẩn bị?', 'LETCO tư vấn riêng theo ngành học, kỳ nhập học và hồ sơ. Bạn sẽ được làm rõ khoản nộp trường, dịch vụ, thủ tục, yêu cầu tài chính và chi phí sinh hoạt trước khi quyết định.' ), array( 'Có tự động được cấp E‑7‑1 sau tốt nghiệp không?', 'Không. Bằng cấp là một phần điều kiện. Công việc, doanh nghiệp tiếp nhận, hợp đồng và các yêu cầu cư trú phải đáp ứng quy định tại thời điểm nộp hồ sơ.' ), array( 'Học bổng kỳ đầu và kỳ sau có giống nhau không?', 'Học bổng được xét theo chính sách của từng kỳ và kết quả học tập. LETCO xác nhận điều kiện và mức áp dụng khi tư vấn riêng.' ) ),
		'documents' => array( 'Bằng tốt nghiệp và học bạ THPT.', 'Bằng và bảng điểm cấp học cao nhất nếu có.', 'Chứng chỉ tiếng Hàn và hồ sơ đăng ký theo yêu cầu ngành.', 'Hộ chiếu, căn cước, giấy tờ gia đình, cư trú, tài chính và sức khỏe.' ),
	),
	'd4-1' => array(
		'title' => 'Học tiếng Hàn D4-1 tại Đại học Daeduk',
		'intro' => 'Dành cho người chưa đủ tiếng Hàn để học chuyên ngành. Bắt đầu tại Viện Hàn ngữ Daeduk, xây nền tảng ngôn ngữ và chuẩn bị hồ sơ chuyển tiếp khi đáp ứng yêu cầu.',
		'visa_index' => 2,
		'conditions' => array( 'Đã tốt nghiệp THPT hoặc đang là sinh viên, muốn học tiếng Hàn trước khi vào chuyên ngành.', 'Chưa có TOPIK vẫn có thể đăng ký tư vấn. Trường xét hồ sơ học tập và kế hoạch học tiếng cụ thể.', 'Chuẩn bị ngân sách học tiếng và sinh hoạt; không dựa vào thu nhập thực tập của chương trình D2-6 để chi trả.', 'Đáp ứng yêu cầu hồ sơ, tài chính, sức khỏe và visa của đợt tuyển sinh.' ),
		'outcomes' => array( 'Thời gian tham khảo 6 – 12 tháng, mỗi kỳ học tiếng 10 tuần theo hồ sơ chương trình.', 'Tập trung nghe, nói, đọc, viết và chuẩn bị năng lực tiếng Hàn để theo học chuyên ngành.', 'TOPIK 2 là mốc định hướng trong hồ sơ; chuyển sang D2-1 còn cần trường tiếp nhận và đáp ứng yêu cầu xét chuyển diện.', 'D4-1 là giai đoạn học tiếng, chưa phải chương trình cấp bằng Cao đẳng và không áp dụng gói thực tập hưởng trợ cấp của D2-6.' ),
		'steps' => array( array( 'Đánh giá hồ sơ', 'Xác định nền tảng tiếng Hàn, học lực và mục tiêu học tiếp.' ), array( 'Chọn kỳ & lập ngân sách', 'Nhận bảng phí học tiếng, ký túc xá và các khoản sinh hoạt riêng.' ), array( 'Xét tuyển & visa D4-1', 'Hoàn thiện hồ sơ học tiếng và thủ tục visa.' ), array( 'Học tiếng tại Daeduk', 'Học theo kỳ, nâng năng lực tiếng Hàn và chuẩn bị điều kiện đầu vào chuyên ngành.' ), array( 'Xin chuyển tiếp', 'Đăng ký D2-1 khi được trường tiếp nhận và đủ điều kiện chuyển diện.' ) ),
		'faq' => array( array( 'Chưa biết tiếng Hàn có tham gia được không?', 'Bạn có thể đăng ký tư vấn ngay. D4-1 là lộ trình học tiếng; trường và đơn vị tư vấn đánh giá hồ sơ, lựa chọn kỳ phù hợp.' ), array( 'Chi phí D4-1 có bằng D2-6 hay D2-1 không?', 'Không. Học tiếng có bảng phí riêng theo số kỳ, chỗ ở và thời gian dự kiến. Ngân sách của các chương trình chuyên ngành hoặc trao đổi không áp dụng cho giai đoạn D4-1.' ), array( 'Học D4-1 có nhận trợ cấp thực tập 2,15 – 2,7 triệu KRW/tháng không?', 'Mức trợ cấp trong hồ sơ K-Tech Bridge gắn với kế hoạch thực tập chuyên ngành, không phải quyền lợi mặc định của khóa tiếng D4-1. Cần tự chuẩn bị kinh phí học tập và sinh hoạt.' ), array( 'Đạt TOPIK 2 có tự động chuyển D2-1 không?', 'Không. Bạn còn phải đáp ứng điều kiện ngành học, được trường tiếp nhận và được xét chuyển tư cách lưu trú. Thời gian học tiếng tùy tiến độ và kỳ tuyển sinh.' ) ),
		'documents' => array( 'Bằng tốt nghiệp và học bạ THPT; hồ sơ cấp học cao nhất nếu có.', 'Đơn đăng ký và kế hoạch học tiếng.', 'Hộ chiếu, căn cước và giấy tờ gia đình, cư trú.', 'Hồ sơ chứng minh tài chính và sức khỏe theo yêu cầu.' ),
	),
);

// Existing documentary photographs; captions describe the actual setting.
// Each photo appears once across the Daeduk overview and its three visa pages.
$visuals = array(
	'd2-6' => array(
		'hero' => array( 'daeduk-students-meeting.jpg', 'Buổi gặp gỡ, tuyển chọn sinh viên tại LETCO', 1400, 882 ),
		'visa' => array( 'daeduk-ktech-agreement.jpg', 'Lễ ký kết cùng vận hành K-TECH Bridge Program tại Đại học Daeduk', 800, 450 ),
		'facts' => array( array( '6 – 12 tháng', 'Thời gian trao đổi' ), array( 'Học + thực tập', 'Theo chương trình liên kết' ) ),
		'gallery' => array(
			array( 'daeduk-company-ibtech.jpg', 'Môi trường doanh nghiệp', 'Hoạt động tại doanh nghiệp đối tác IB Tech', 640, 480 ),
			array( 'daeduk-life-vietnam-partners.jpg', 'Kết nối Việt Nam – Hàn Quốc', 'Đại học Daeduk ký thỏa thuận hợp tác với các trường tại Việt Nam', 760, 427 ),
			array( 'daeduk-facility-gymnasium.jpg', 'Thể thao trong trường', 'Nhà thi đấu trong khuôn viên Đại học Daeduk', 1000, 466 ),
			array( 'daeduk-life-industry-agreement.jpg', 'Học gắn với việc làm', 'Buổi ký kết hợp tác đào tạo gắn với việc làm và trao đổi về thực tập hiện trường tại Daeduk', 800, 600 ),
			array( 'daeduk-life-global-program.jpg', 'Giao lưu quốc tế', 'Chương trình hợp tác toàn cầu Địa phương – Doanh nghiệp – Đại học 2026 tại Daejeon', 800, 533 ),
			array( 'daeduk-life-ev-vr-class.jpg', 'Học bằng công nghệ mới', 'Lớp chẩn đoán xe điện bằng VR của Khoa Quản lý an toàn xe điện', 800, 600 ),
		),
		// One photo per step, in step order.
		'steps' => array(
			array( 'news-letco-college-visit.jpg', 'Trụ sở LETCO – HaUI, nơi tiếp nhận và đánh giá hồ sơ', 600, 472 ),
			array( 'home-daeduk-class.jpg', 'Lớp học viên chuẩn bị du học Hàn Quốc tại LETCO', 1000, 629 ),
			array( 'daeduk-company-geon.jpg', 'Xưởng sản xuất của doanh nghiệp đối tác Geon Tech', 640, 480 ),
			array( 'daeduk-company-jiin.jpg', 'Khu vực sản xuất bảng mạch in PCB tại doanh nghiệp đối tác', 640, 480 ),
			array( 'daeduk-campus-field.jpg', 'Sân vận động và giảng đường trong khuôn viên Đại học Daeduk', 705, 470 ),
		),
	),
	'd2-1' => array(
		'hero' => array( 'daeduk-campus-engineering.jpg', 'Tòa Kỹ thuật trong khuôn viên Đại học Daeduk', 916, 1014 ),
		'visa' => array( 'daeduk-campus-business.jpg', 'Khuôn viên Đại học Daeduk, nơi học chương trình Cao đẳng D2-1', 916, 1014 ),
		'facts' => array( array( '2 – 3 năm', 'Tùy chương trình ngành' ), array( 'Bằng Cao đẳng', 'Khi đủ điều kiện tốt nghiệp' ) ),
		'gallery' => array(
			array( 'daeduk-campus-mechanical.jpg', 'Học chuyên ngành', 'Tòa Cơ khí tại Đại học Daeduk', 916, 1014 ),
			array( 'daeduk-company-ibtech-site.jpg', 'Gắn với thực hành', 'Môi trường làm việc tại doanh nghiệp IB Tech', 548, 411 ),
			array( 'daeduk-campus-student-hall.jpg', 'Cuộc sống trong trường', 'Tòa nhà sinh viên trong khuôn viên Đại học Daeduk', 916, 1014 ),
			array( 'daeduk-life-entrance-ceremony.jpg', 'Ngày nhập học', 'Lễ nhập học tân sinh viên năm học 2025 tại Đại học Daeduk', 760, 520 ),
			array( 'daeduk-life-lab-practice.jpg', 'Thực hành chuyên ngành', 'Sinh viên Daeduk thực hành trong phòng thí nghiệm chuyên ngành', 705, 470 ),
			array( 'daeduk-life-graduation.jpg', 'Nhận bằng Cao đẳng', 'Lễ trao bằng tốt nghiệp năm học 2024 tại Đại học Daeduk', 760, 570 ),
		),
		// One photo per step, in step order.
		'steps' => array(
			array( 'daeduk-campus-sign.jpg', 'Biển tên Đại học Daeduk trong khuôn viên', 705, 470 ),
			array( 'daeduk-mou-presentation.jpg', 'Đại học Daeduk giới thiệu chương trình tại lễ ký kết ở Hà Nội', 1400, 933 ),
			array( 'letco-korea-departure-2026-09.jpg', 'Học viên LETCO chuẩn bị khởi hành sang Hàn Quốc', 1200, 803 ),
			array( 'daeduk-company-seowon-site.jpg', 'Dây chuyền sản xuất tại Seowon Industrial', 552, 414 ),
			array( 'daeduk-company-boeun-site.jpg', 'Khu vực kiểm tra linh kiện bán dẫn tại Boeun Tech', 552, 414 ),
		),
	),
	'd4-1' => array(
		'hero' => array( 'daeduk-letco-class-visit.jpg', 'Đại diện Daeduk gặp gỡ học viên tại lớp học LETCO ở Việt Nam', 1200, 898 ),
		'visa' => array( 'daeduk-life-language-graduation.jpg', 'Học viên hoàn thành khóa tiếng tại Viện Giáo dục tiếng Hàn Daeduk', 637, 428 ),
		'facts' => array( array( '6 – 12 tháng', 'Thời gian học tham khảo' ), array( 'Tiếng Hàn', 'Nền tảng để học chuyên ngành' ) ),
		'gallery' => array(
			array( 'daeduk-campus-modern.jpg', 'Khám phá khuôn viên', 'Một tòa nhà hiện đại trong khuôn viên Đại học Daeduk', 705, 470 ),
			array( 'daeduk-facility-fitness.jpg', 'Rèn luyện sức khỏe', 'Phòng tập thể hình trong khuôn viên Đại học Daeduk', 1000, 466 ),
			array( 'daeduk-facility-tennis.jpg', 'Nhịp sống sinh viên', 'Sân tennis trong khuôn viên Đại học Daeduk', 1000, 466 ),
			array( 'daeduk-campus-dorm-women.jpg', 'Ở ngay trong trường', 'Ký túc xá trong khuôn viên Đại học Daeduk', 916, 1014 ),
			array( 'daeduk-life-lunar-new-year.jpg', 'Đón Tết tại Hàn', 'Trò chơi truyền thống dịp Tết cùng học viên tiếng Hàn người Việt tại Daeduk', 760, 427 ),
			array( 'daeduk-facility-dorm-cafeteria.jpg', 'Bữa ăn hằng ngày', 'Nhà ăn ký túc xá Đại học Daeduk', 518, 390 ),
		),
		// One photo per step, in step order.
		'steps' => array(
			array( 'daeduk-campus-dome.jpg', 'Một góc khuôn viên Đại học Daeduk', 705, 470 ),
			array( 'daeduk-campus-forsythia.jpg', 'Hoa liên kiều (gaenari) nở vàng trong khuôn viên Đại học Daeduk', 691, 517 ),
			array( 'news-departure-hall.jpg', 'Sảnh khởi hành tại sân bay', 900, 675 ),
			array( 'daeduk-campus-spring-road.jpg', 'Con đường trong khuôn viên Đại học Daeduk vào mùa xuân', 705, 529 ),
			array( 'daeduk-campus-glass.jpg', 'Giảng đường trong khuôn viên Đại học Daeduk', 705, 470 ),
		),
	),
);

foreach ( $routes as $slug => $route ) {
	$route['slug'] = $slug;
	$route['visuals'] = $visuals[ $slug ];
	$route['visa'] = $base['visas'][ $route['visa_index'] ];

	$configs[ 'daeduk-' . $slug ] = array_merge( $base, array(
		'layout' => 'daeduk-route',
		'name' => 'Đại học Daeduk · ' . strtoupper( $slug ),
		'route' => $route,
		'popup_delay' => 0,
		'popup_buttons' => false,
		'seo' => array_merge( $base['seo'], array( 'description' => $route['intro'] ) ),
		'lead' => array( 'title' => 'Nhận tư vấn Daeduk ' . strtoupper( $slug ), 'intro' => 'Để lại thông tin để LETCO đối chiếu hồ sơ, kỳ nhập học và dự toán của chương trình ' . strtoupper( $slug ) . '.', 'bullets' => array( 'Điều kiện và kế hoạch học phù hợp với hồ sơ.', 'Các khoản chi phí và giấy tờ cần chuẩn bị.' ) ),
	) );
}
