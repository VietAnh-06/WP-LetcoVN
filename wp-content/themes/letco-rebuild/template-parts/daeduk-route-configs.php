<?php
/** Route-specific content; shared school information comes from the Daeduk overview. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$base = $configs['dai-hoc-daeduk'];
$routes = array(
	'd2-6' => array(
		'title' => 'Trao đổi sinh viên D2-6 tại Đại học Daeduk',
		'intro' => 'Visa ngắn hạn 6 – 12 tháng, dành riêng cho sinh viên đang theo học tại trường đối tác Việt Nam, kết hợp học tập và thực tập tại Hàn Quốc, được công nhận tín chỉ theo thỏa thuận giữa các trường.',
		'visa_index' => 2,
		'majors' => array( array( 'name' => 'Công nghệ kỹ thuật cơ khí' ), array( 'name' => 'Công nghệ kỹ thuật ô tô' ), array( 'name' => 'Điều khiển điện – Tự động hóa' ), array( 'name' => 'Quản trị Nhà hàng – Khách sạn – Du lịch' ) ),
		'conditions' => array( 'Sinh viên từ năm 2 trở đi, đang theo học tại HaUI hoặc trường Đại học / Cao đẳng đối tác tại Việt Nam.', 'Căn cứ theo Giấy xác nhận sinh viên và Bảng điểm ĐH/CĐ hiện tại, kèm Bằng tốt nghiệp & Học bạ THPT để làm thủ tục đối chiếu hồ sơ.', 'Ưu tiên ứng viên có TOPIK 2 trở lên; chưa có TOPIK vẫn có thể đăng ký tư vấn.', 'Đáp ứng yêu cầu hồ sơ, sức khỏe và tài chính của trường và visa.' ),
		'outcomes' => array( 'Học kiến thức ngành và văn hóa doanh nghiệp tại Daeduk, sau đó thực tập chuyên ngành có trợ cấp.', 'Các nhóm ngành kỳ tháng 3/2027: Công nghệ kỹ thuật cơ khí; Công nghệ kỹ thuật ô tô; Điều khiển điện – Tự động hóa; Quản trị Nhà hàng – Khách sạn – Du lịch.', 'Tín chỉ được công nhận theo thỏa thuận giữa các trường.', 'Kết thúc chương trình, sinh viên bắt buộc trở về Việt Nam tốt nghiệp trường gốc, hoặc xin gia hạn/chuyển tiếp sang hệ chuyên ngành Visa D2-1 nếu đáp ứng đủ điều kiện; không tự động nhận bằng Cao đẳng hoặc chuyển visa.' ),
		'steps' => array( array( 'Đăng ký & đánh giá hồ sơ', 'Xác nhận trường, ngành và trình độ tiếng Hàn.' ), array( 'Chuẩn bị tiếng & hồ sơ', 'Lập kế hoạch học tiếng và dự toán chi phí.' ), array( 'Xét tuyển & visa D2-6', 'Phỏng vấn và làm hồ sơ visa.' ), array( 'Học & thực tập', 'Học tại Daeduk, sau đó thực tập tại doanh nghiệp.' ), array( 'Hoàn thành trao đổi', 'Trở về Việt Nam tốt nghiệp hoặc xin chuyển tiếp sang D2-1 nếu đủ điều kiện.' ) ),
		'faq' => array( array( 'Chương trình thực tập tại Hàn Quốc được tổ chức thế nào?', 'Đây là chương trình thực tập chuyên ngành (Co-op) nằm trong lộ trình hợp tác đào tạo giữa Nhà trường và Doanh nghiệp Hàn Quốc. Trong thời gian thực tập, sinh viên được hưởng chế độ trợ cấp/học bổng thực tập theo chính sách của doanh nghiệp tiếp nhận.' ), array( 'Sinh viên các trường Đại học / Cao đẳng khác có tham gia được không?', 'Chương trình áp dụng cho sinh viên đang theo học tại các cơ sở giáo dục đối tác của LETCO và Đại học Daeduk. Sinh viên vui lòng liên hệ Ban tuyển sinh để được hỗ trợ kiểm tra điều kiện tiếp nhận hồ sơ theo từng trường.' ), array( 'Quyền lợi sau khi hoàn thành chương trình trao đổi D2-6 là gì?', 'Sinh viên bắt buộc trở về Việt Nam tốt nghiệp trường gốc, hoặc xin gia hạn/chuyển tiếp sang hệ chuyên ngành Visa D2-1 nếu đáp ứng đủ điều kiện. Việc chuyển đổi do cơ quan có thẩm quyền của Hàn Quốc quyết định, dựa trên hồ sơ và năng lực cá nhân như TOPIK, kết quả học tập; đơn vị tư vấn và Nhà trường không có thẩm quyền cam kết 100% đổi được visa.' ), array( 'Thời gian và lịch trình thực tập được sắp xếp ra sao?', 'Lịch thực tập và phân công vị trí được sắp xếp phù hợp với kế hoạch đào tạo của chương trình và quy định của doanh nghiệp tiếp nhận, nhằm cân bằng giữa khối lượng học tập và trải nghiệm thực tế.' ), array( 'Điều kiện sinh hoạt trong thời gian thực tập như thế nào?', 'Sinh viên thực tập được doanh nghiệp hỗ trợ về nơi ở (Ký túc xá/nhà ở thực tập) và chế độ ăn uống trong ngày làm việc theo quy định nội bộ của từng đơn vị tiếp nhận.' ), array( 'Chi phí tham gia chương trình được tính như thế nào?', 'Chi phí chương trình được lập dự toán chi tiết, minh bạch theo từng hồ sơ cụ thể (phụ thuộc vào trình độ tiếng Hàn hiện tại và các hạng mục thủ tục liên quan). Phụ huynh và sinh viên sẽ nhận bảng thông báo chi phí chính thức từ Cán bộ tư vấn trước khi làm hồ sơ.' ) ),
		'documents' => array( 'Giấy xác nhận sinh viên và bảng điểm.', 'Bằng tốt nghiệp và học bạ THPT.', 'Hộ chiếu, giấy tờ gia đình và cư trú.', 'Hồ sơ tài chính và sức khỏe.' ),
	),
	'd2-1' => array(
		'title' => 'Cao đẳng chính quy D2-1 tại Đại học Daeduk',
		'intro' => 'Học chuyên ngành 2 – 3 năm cho người đã tốt nghiệp THPT, kết hợp học tại trường với thực tập và hướng tới bằng Cao đẳng Daeduk.',
		'visa_index' => 1,
		'conditions' => array( 'Tốt nghiệp THPT hoặc tương đương, GPA THPT từ 6.5 trở lên.', 'Đạt TOPIK 2 trở lên, hoặc chứng chỉ Sejong 2B / bài kiểm tra nội bộ của Đại học Daeduk; chưa đủ tiếng có thể học tại Việt Nam hoặc bắt đầu từ D4-1.', 'Đáp ứng yêu cầu hồ sơ, sức khỏe và tài chính của trường và visa.' ),
		'outcomes' => array( 'Học chuyên ngành 2 – 3 năm tùy ngành, nhận bằng Cao đẳng khi đủ điều kiện tốt nghiệp.', 'Các nhóm ngành: Cơ khí; Điện – Điện tử – Điều khiển; Quản trị Kinh doanh; Ngôn ngữ Hàn Quốc.', 'Học lý thuyết & văn hóa tại trường trong kì đầu, sau đó thực tập có trợ cấp và công nhận tín chỉ.', 'Có học bổng theo chính sách của trường.', 'Sau tốt nghiệp có thể tìm hiểu visa D-10 hoặc E‑7‑1 khi đáp ứng điều kiện.' ),
		'steps' => array( array( 'Đánh giá & chọn ngành', 'Đối chiếu hồ sơ và mục tiêu nghề nghiệp.' ), array( 'Đạt điều kiện đầu vào', 'Hoàn thiện tiếng Hàn, hồ sơ và tài chính.' ), array( 'Xét tuyển & visa D2-1', 'Nhận kết quả và làm hồ sơ visa.' ), array( 'Học chuyên ngành', 'Học tại trường, sau đó thực tập đến khi tốt nghiệp.' ), array( 'Tốt nghiệp & định hướng việc làm', 'Nhận bằng và xem xét việc làm phù hợp.' ) ),
		'faq' => array( array( 'Chưa có TOPIK có đăng ký tư vấn D2-1 được không?', 'Được. LETCO đánh giá hồ sơ và tư vấn lộ trình học tiếng phù hợp.' ), array( 'Làm thế nào để biết ngân sách cần chuẩn bị?', 'LETCO tư vấn riêng theo ngành học, kỳ nhập học và hồ sơ của bạn.' ), array( 'Có tự động được cấp E‑7‑1 sau tốt nghiệp không?', 'Không. Cần đáp ứng yêu cầu về bằng cấp, công việc và doanh nghiệp tại thời điểm nộp hồ sơ.' ), array( 'Học bổng kỳ đầu và kỳ sau có giống nhau không?', 'Học bổng được xét theo từng kỳ và kết quả học tập; LETCO xác nhận khi tư vấn.' ) ),
		'documents' => array( 'Bằng tốt nghiệp và học bạ THPT.', 'Chứng chỉ tiếng Hàn.', 'Hộ chiếu, giấy tờ gia đình và cư trú.', 'Hồ sơ tài chính và sức khỏe.' ),
	),
	'd4-1' => array(
		'title' => 'Học tiếng Hàn D4-1 tại Đại học Daeduk',
		'intro' => 'Dành cho người chưa đủ tiếng Hàn để học chuyên ngành. Học tại Viện Hàn ngữ Daeduk, sau đó chuyển sang học chuyên ngành khi đạt yêu cầu.',
		'visa_index' => 0,
		'conditions' => array( 'Tốt nghiệp THPT hoặc tương đương; GPA THPT từ 6.5 trở lên.', 'Chưa bắt buộc có chứng chỉ tiếng Hàn khi nộp hồ sơ.', 'Chuẩn bị ngân sách học tiếng và sinh hoạt.', 'Đáp ứng yêu cầu hồ sơ, tài chính, sức khỏe và visa.' ),
		'outcomes' => array( 'Thời gian tham khảo 6 – 12 tháng.', 'Học nghe, nói, đọc, viết để theo học chuyên ngành.', 'Đạt yêu cầu tiếng Hàn, sau đó chuyển sang học chuyên ngành.', 'Giai đoạn học tiếng chưa cấp bằng Cao đẳng và không áp dụng thực tập hưởng trợ cấp.' ),
		'steps' => array( array( 'Đánh giá hồ sơ', 'Xác định trình độ tiếng Hàn và mục tiêu học tiếp.' ), array( 'Chọn kỳ & lập ngân sách', 'Nhận dự toán học tiếng và sinh hoạt.' ), array( 'Xét tuyển & visa D4-1', 'Hoàn thiện hồ sơ và thủ tục visa.' ), array( 'Học tiếng tại Daeduk', 'Nâng trình độ tiếng Hàn theo từng kỳ.' ), array( 'Chuyển sang chuyên ngành', 'Đăng ký học chuyên ngành khi đạt yêu cầu.' ) ),
		'faq' => array( array( 'Chưa biết tiếng Hàn có tham gia được không?', 'Có thể đăng ký tư vấn ngay; LETCO đánh giá hồ sơ và chọn kỳ phù hợp.' ), array( 'Chi phí D4-1 có bằng D2-6 hay D2-1 không?', 'Không. D4-1 có bảng phí riêng theo số kỳ học và chỗ ở.' ), array( 'Học D4-1 có nhận trợ cấp thực tập không?', 'Không. Trợ cấp gắn với thực tập chuyên ngành; bạn cần tự chuẩn bị kinh phí học tập và sinh hoạt.' ), array( 'Đạt TOPIK 2 có tự động chuyển D2-1 không?', 'Không. Bạn còn cần được trường tiếp nhận và được xét chuyển tư cách lưu trú.' ) ),
		'documents' => array( 'Bằng tốt nghiệp và học bạ THPT.', 'Đơn đăng ký và kế hoạch học tiếng.', 'Hộ chiếu, giấy tờ gia đình và cư trú.', 'Hồ sơ tài chính và sức khỏe.' ),
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
		'majors' => isset( $route['majors'] ) ? $route['majors'] : $base['majors'],
		'popup_delay' => 0,
		'popup_buttons' => false,
		'seo' => array_merge( $base['seo'], array( 'description' => $route['intro'] ) ),
		'lead' => array( 'title' => 'Nhận tư vấn Daeduk ' . strtoupper( $slug ), 'intro' => 'Để lại thông tin để LETCO đối chiếu hồ sơ, kỳ nhập học và dự toán của chương trình ' . strtoupper( $slug ) . '.', 'bullets' => array( 'Điều kiện và kế hoạch học phù hợp với hồ sơ.', 'Các khoản chi phí và giấy tờ cần chuẩn bị.' ) ),
	) );
}
