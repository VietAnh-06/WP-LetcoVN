<?php
/** Route-specific content; shared school information comes from the Daeduk overview. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$base = $configs['dai-hoc-daeduk'];
$routes = array(
	'd2-6' => array(
		'title' => 'Trải nghiệm một chặng đường sinh viên tại Hàn Quốc',
		'intro' => 'Chương trình trao đổi 6 – 12 tháng dành cho sinh viên HaUI và các trường đối tác, kết hợp học tập và thực tập theo chuyên ngành.',
		'button' => 'Tìm hiểu cơ hội trao đổi dành cho mình',
		'lead' => array( 'title' => 'Trường của bạn có tham gia trao đổi không?', 'intro' => 'Để lại thông tin để LETCO kiểm tra trường, ngành và kỳ trao đổi phù hợp với bạn.', 'bullets' => array( 'Điều kiện theo trường và năm học của bạn.', 'Các mốc kỳ tháng 3/2027 và dự toán chi phí.' ) ),
		'order' => array( 'majors', 'perks', 'gallery', 'fit' ),
		'nav' => array( 'nganh' => 'Ngành học', 'quyen-loi' => 'Điểm thu hút', 'dieu-kien' => 'Điều kiện', 'lo-trinh' => 'Lộ trình' ),
		'majors_title' => 'Các nhóm ngành kỳ tháng 3/2027 (tham khảo)',
		'gallery_title' => 'Học tập và trải nghiệm doanh nghiệp',
		'perks_label' => 'Điểm thu hút',
		'perks_title' => 'Vì sao nên thử một chặng ở Hàn Quốc?',
		'perks' => array(
			array( 'Trải nghiệm quốc tế', 'Học 6 – 12 tháng tại Hàn Quốc ngay khi đang là sinh viên.', 'Ưu tiên ứng viên có TOPIK 2 trở lên; chưa có TOPIK vẫn có thể đăng ký tư vấn.' ),
			array( 'Học gắn với thực tập', 'Học kiến thức ngành và văn hóa doanh nghiệp tại Daeduk, sau đó thực tập chuyên ngành có trợ cấp.', 'Mức trợ cấp và lịch thực tập theo chính sách của từng doanh nghiệp.' ),
			array( 'Công nhận tín chỉ', 'Tín chỉ được công nhận theo thỏa thuận giữa các trường.', 'Không tự động nhận bằng Cao đẳng.' ),
		),
		'notes' => array( 'Học bổng: giảm khoảng 60% học phí kỳ 1 khi đạt TOPIK 2+ trước xuất cảnh.', 'Có thể tiếp tục học tại Hàn Quốc hoặc trở về Việt Nam sau khi hoàn thành chương trình.' ),
		// Illustrative photos from Wikimedia Commons, not taken at Daeduk or its partners (CC0 / public domain):
		// File:Mechanical_engineering_workshop_at_Arusha_Technical_College,_Tanzania.jpg, File:Mechanic_repairing_car_engine.jpg,
		// File:Factory_Automation_Robotics_Palettizing_Bread.jpg, File:20181124_Hotel_Golden_Tulip_Warsaw_Centre-November_2018_lobby_reception.jpg
		'majors' => array(
			array( 'name' => 'Công nghệ kỹ thuật cơ khí', 'photo' => array( 'daeduk-major-mechanical.jpg', 1000, 750 ) ),
			array( 'name' => 'Công nghệ kỹ thuật ô tô', 'photo' => array( 'daeduk-major-automotive.jpg', 1000, 750 ) ),
			array( 'name' => 'Điều khiển điện – Tự động hóa', 'photo' => array( 'daeduk-major-automation.jpg', 1000, 750 ) ),
			array( 'name' => 'Quản trị Nhà hàng – Khách sạn – Du lịch', 'photo' => array( 'daeduk-major-hospitality.jpg', 1000, 750 ) ),
		),
		'conditions' => array( 'Sinh viên từ năm 2 trở đi, đang theo học tại HaUI hoặc trường Đại học / Cao đẳng đối tác tại Việt Nam.', 'Ưu tiên ứng viên có TOPIK 2 trở lên; chưa có TOPIK vẫn có thể đăng ký tư vấn.', 'Đáp ứng yêu cầu hồ sơ, sức khỏe và tài chính của trường và visa.' ),
		'steps' => array( array( 'Đăng ký & đánh giá hồ sơ', 'Xác nhận trường, ngành và trình độ tiếng Hàn.' ), array( 'Chuẩn bị tiếng & hồ sơ', 'Lập kế hoạch học tiếng và dự toán chi phí.' ), array( 'Xét tuyển & visa D2-6', 'Phỏng vấn và làm hồ sơ visa.' ), array( 'Học & thực tập', 'Học tại Daeduk, sau đó thực tập tại doanh nghiệp.' ), array( 'Hoàn thành trao đổi', 'Có thể trở về Việt Nam tốt nghiệp hoặc xin chuyển tiếp sang D2-1 nếu đủ điều kiện.' ) ),
		'faq' => array( array( 'Quyền lợi trợ cấp thực tập tại Hàn Quốc được quy định như thế nào?', 'Trong các học kỳ thực tập chuyên ngành (Co-op), sinh viên được doanh nghiệp tiếp nhận chi trả trợ cấp thực tập / hỗ trợ sinh hoạt phí hàng tháng, cùng hỗ trợ nơi ở và bữa ăn trong ngày làm việc, theo chính sách của từng doanh nghiệp và quy định áp dụng tại Hàn Quốc. Sinh viên tự chi trả chi phí cá nhân hoặc phí điện nước phát sinh, nếu có.' ), array( 'Sinh viên các trường Đại học / Cao đẳng khác có tham gia được không?', 'Chương trình áp dụng cho sinh viên đang theo học tại các cơ sở giáo dục đối tác của LETCO và Đại học Daeduk. Sinh viên vui lòng liên hệ Ban tuyển sinh để được hỗ trợ kiểm tra điều kiện tiếp nhận hồ sơ theo từng trường.' ), array( 'Quyền lợi sau khi hoàn thành chương trình trao đổi D2-6 là gì?', 'Có thể trở về Việt Nam tốt nghiệp trường gốc hoặc xin gia hạn/chuyển tiếp sang hệ chuyên ngành Visa D2-1 nếu đáp ứng đủ điều kiện. Việc chuyển đổi do cơ quan có thẩm quyền của Hàn Quốc quyết định theo từng hồ sơ; LETCO và Nhà trường không cam kết kết quả.' ), array( 'Thời gian và lịch trình thực tập được sắp xếp ra sao?', 'Lịch thực tập và phân công vị trí được sắp xếp phù hợp với kế hoạch đào tạo của chương trình và quy định của doanh nghiệp tiếp nhận, nhằm cân bằng giữa khối lượng học tập và trải nghiệm thực tế.' ), array( 'Chi phí tham gia chương trình được tính như thế nào?', 'Chi phí chương trình được lập dự toán chi tiết, minh bạch theo từng hồ sơ cụ thể (phụ thuộc vào trình độ tiếng Hàn hiện tại và các hạng mục thủ tục liên quan). Phụ huynh và sinh viên sẽ nhận bảng thông báo chi phí chính thức từ Cán bộ tư vấn trước khi làm hồ sơ.' ) ),
		'documents' => array( 'Giấy xác nhận sinh viên và bảng điểm.', 'Bằng tốt nghiệp và học bạ THPT.', 'Hộ chiếu, giấy tờ gia đình và cư trú.', 'Hồ sơ tài chính và sức khỏe.' ),
	),
	'd2-1' => array(
		'title' => 'Học chuyên ngành tại Hàn Quốc, tích lũy trải nghiệm thực tế',
		'intro' => 'Theo học hệ Cao đẳng tại Daeduk trong 2 – 3 năm tùy ngành, kết hợp học tại trường và thực tập theo chương trình.',
		'button' => 'Nhận tư vấn chọn ngành và lộ trình',
		'lead' => array( 'title' => 'Bạn quan tâm ngành nào?', 'intro' => 'Để lại thông tin để LETCO cùng bạn chọn ngành, kiểm tra điều kiện đầu vào và xem kỳ nhập học.', 'bullets' => array( 'Ngành học và lộ trình gợi ý theo hồ sơ của bạn.', 'Kế hoạch đạt chuẩn tiếng Hàn và dự toán chi phí.' ) ),
		'order' => array( 'majors', 'gallery', 'perks', 'fit' ),
		'nav' => array( 'nganh' => 'Ngành học', 'quyen-loi' => 'Quyền lợi', 'dieu-kien' => 'Điều kiện', 'lo-trinh' => 'Lộ trình' ),
		'majors_title' => 'Bạn quan tâm ngành nào?',
		'gallery_title' => 'Cách học bạn có thể trải nghiệm',
		'perks_label' => 'Quyền lợi',
		'perks_title' => 'Bạn nhận được gì?',
		'perks' => array(
			array( 'Bằng Cao đẳng Daeduk', 'Học chuyên ngành 2 – 3 năm tùy ngành.', 'Nhận bằng khi đủ điều kiện tốt nghiệp.' ),
			array( 'Học gắn với thực tập', 'Học tại trường trong kỳ đầu, sau đó thực tập có trợ cấp và công nhận tín chỉ.', 'Mức trợ cấp theo chính sách của từng doanh nghiệp.' ),
			array( 'Học bổng kỳ đầu', 'Giảm 40% học phí kỳ 1.', 'Khi đạt chuẩn tiếng Hàn đầu vào. Các kỳ sau xét theo kết quả học tập.' ),
			array( 'Hướng đi sau tốt nghiệp', 'Được tư vấn thủ tục học liên thông Đại học hoặc chuyển đổi visa làm việc.', 'Khi đáp ứng đủ điều kiện; không tự động được cấp visa.' ),
		),
		'notes' => array( 'Sau tốt nghiệp có thể tìm hiểu visa D-10 hoặc E‑7‑1 khi đáp ứng điều kiện.' ),
		'conditions' => array( 'Tốt nghiệp THPT hoặc tương đương, GPA THPT từ 6.5 trở lên.', 'Đạt TOPIK 2 trở lên, hoặc chứng chỉ Sejong 2B / bài kiểm tra nội bộ của Đại học Daeduk; chưa đủ tiếng có thể học tại Việt Nam hoặc bắt đầu từ D4-1.', 'Đáp ứng yêu cầu hồ sơ, sức khỏe và tài chính của trường và visa.' ),
		'steps' => array( array( 'Đánh giá & chọn ngành', 'Đối chiếu hồ sơ và mục tiêu nghề nghiệp.' ), array( 'Đạt điều kiện đầu vào', 'Hoàn thiện tiếng Hàn, hồ sơ và tài chính.' ), array( 'Xét tuyển & visa D2-1', 'Nhận kết quả và làm hồ sơ visa.' ), array( 'Học chuyên ngành', 'Học tại trường, sau đó thực tập đến khi tốt nghiệp.' ), array( 'Tốt nghiệp & định hướng việc làm', 'Nhận bằng và xem xét việc làm phù hợp.' ) ),
		'faq' => array( array( 'Quyền lợi trợ cấp thực tập tại Hàn Quốc được quy định như thế nào?', 'Trong các học kỳ thực tập chuyên ngành (Co-op), sinh viên được doanh nghiệp tiếp nhận chi trả trợ cấp thực tập / hỗ trợ sinh hoạt phí hàng tháng, cùng hỗ trợ nơi ở và bữa ăn trong ngày làm việc, theo chính sách của từng doanh nghiệp và quy định áp dụng tại Hàn Quốc. Sinh viên tự chi trả chi phí cá nhân hoặc phí điện nước phát sinh, nếu có.' ), array( 'Chưa có TOPIK có đăng ký tư vấn D2-1 được không?', 'Được. LETCO đánh giá hồ sơ và tư vấn lộ trình học tiếng phù hợp.' ), array( 'Làm thế nào để biết ngân sách cần chuẩn bị?', 'LETCO tư vấn riêng theo ngành học, kỳ nhập học và hồ sơ của bạn.' ), array( 'Có tự động được cấp E‑7‑1 sau tốt nghiệp không?', 'Không. Cần đáp ứng yêu cầu về bằng cấp, công việc và doanh nghiệp tại thời điểm nộp hồ sơ.' ), array( 'Học bổng kỳ đầu và kỳ sau có giống nhau không?', 'Học bổng được xét theo từng kỳ và kết quả học tập; LETCO xác nhận khi tư vấn.' ) ),
		'documents' => array( 'Bằng tốt nghiệp và học bạ THPT.', 'Chứng chỉ tiếng Hàn.', 'Hộ chiếu, giấy tờ gia đình và cư trú.', 'Hồ sơ tài chính và sức khỏe.' ),
	),
	'd4-1' => array(
		'title' => 'Bắt đầu hành trình du học từ tiếng Hàn',
		'intro' => 'Học tiếng tại Đại học Daeduk, từng bước làm quen cuộc sống ở Hàn Quốc và chuẩn bị cho hướng học chuyên ngành.',
		'button' => 'Nhận tư vấn lộ trình học tiếng của mình',
		'lead' => array( 'title' => 'Chưa biết tiếng Hàn vẫn có thể bắt đầu tìm hiểu', 'intro' => 'Để lại thông tin để LETCO hỗ trợ bạn chọn kỳ học và lên kế hoạch học tiếng.', 'bullets' => array( 'Kỳ học và kế hoạch học tiếng phù hợp với bạn.', 'Dự toán học tiếng, sinh hoạt và giấy tờ cần chuẩn bị.' ) ),
		'order' => array( 'gallery', 'perks', 'fit' ),
		'nav' => array( 'trai-nghiem' => 'Trải nghiệm', 'quyen-loi' => 'Quyền lợi', 'dieu-kien' => 'Điều kiện', 'lo-trinh' => 'Lộ trình' ),
		'gallery_title' => 'Học tiếng và sống tại Daeduk',
		'perks_label' => 'Quyền lợi',
		'perks_title' => 'Vì sao dễ bắt đầu từ đây?',
		'perks' => array(
			array( 'Bắt đầu khi chưa có chứng chỉ', 'Chưa bắt buộc có chứng chỉ tiếng Hàn khi nộp hồ sơ.', 'Cần tốt nghiệp THPT hoặc tương đương, GPA THPT từ 6.5 trở lên.' ),
			array( 'Học tiếng tại Viện Hàn ngữ Daeduk', 'Học nghe, nói, đọc, viết trong thời gian tham khảo 6 – 12 tháng.', 'Giai đoạn học tiếng chưa cấp bằng Cao đẳng và không áp dụng thực tập hưởng trợ cấp.' ),
			array( 'Chuẩn bị cho chuyên ngành', 'Đạt yêu cầu tiếng Hàn, sau đó có thể chuyển sang học Cao đẳng D2-1.', 'Khi đủ điều kiện; cần được trường tiếp nhận và được xét chuyển tư cách lưu trú.' ),
		),
		'notes' => array( 'Học bổng áp dụng theo quy định của Viện Hàn ngữ Đại học Daeduk theo từng kỳ tuyển sinh.', 'Cần chuẩn bị ngân sách học tiếng và sinh hoạt.' ),
		'conditions' => array( 'Tốt nghiệp THPT hoặc tương đương; GPA THPT từ 6.5 trở lên.', 'Chưa bắt buộc có chứng chỉ tiếng Hàn khi nộp hồ sơ.', 'Đáp ứng yêu cầu hồ sơ, tài chính, sức khỏe và visa.' ),
		'steps' => array( array( 'Đánh giá hồ sơ', 'Xác định trình độ tiếng Hàn và mục tiêu học tiếp.' ), array( 'Chọn kỳ & lập ngân sách', 'Nhận dự toán học tiếng và sinh hoạt.' ), array( 'Xét tuyển & visa D4-1', 'Hoàn thiện hồ sơ và thủ tục visa.' ), array( 'Học tiếng tại Daeduk', 'Nâng trình độ tiếng Hàn theo từng kỳ.' ), array( 'Chuyển sang chuyên ngành', 'Đăng ký học chuyên ngành khi đạt yêu cầu.' ) ),
		'faq' => array( array( 'Chưa biết tiếng Hàn có tham gia được không?', 'Có thể đăng ký tư vấn ngay; LETCO đánh giá hồ sơ và chọn kỳ phù hợp.' ), array( 'Chi phí D4-1 có bằng D2-6 hay D2-1 không?', 'Không. D4-1 có bảng phí riêng theo số kỳ học và chỗ ở.' ), array( 'Học D4-1 có nhận trợ cấp thực tập không?', 'Không. Trợ cấp gắn với thực tập chuyên ngành; bạn cần tự chuẩn bị kinh phí học tập và sinh hoạt.' ), array( 'Đạt TOPIK 2 có tự động chuyển D2-1 không?', 'Không. Bạn còn cần được trường tiếp nhận và được xét chuyển tư cách lưu trú.' ) ),
		'documents' => array( 'Bằng tốt nghiệp và học bạ THPT.', 'Đơn đăng ký và kế hoạch học tiếng.', 'Hộ chiếu, giấy tờ gia đình và cư trú.', 'Hồ sơ tài chính và sức khỏe.' ),
	),
);

// Existing documentary photographs; captions describe the actual setting.
// Each photo appears once across the three visa pages; the overview may reuse the strongest student photos.
$visuals = array(
	'd2-6' => array(
		'hero' => array( 'daeduk-students-meeting.jpg', 'Buổi gặp gỡ, tuyển chọn sinh viên tại LETCO', 1400, 882 ),
		'facts' => array( array( '6 – 12 tháng', 'Thời gian trao đổi' ), array( 'Học + thực tập', 'Theo chương trình liên kết' ) ),
		'gallery' => array(
			array( 'daeduk-company-ibtech.jpg', 'Môi trường doanh nghiệp', 'Hình ảnh minh họa môi trường làm việc', 640, 480 ),
			array( 'daeduk-life-ev-vr-class.jpg', 'Học bằng công nghệ mới', 'Lớp chẩn đoán xe điện bằng VR của Khoa Quản lý an toàn xe điện', 800, 600 ),
			array( 'daeduk-company-geon.jpg', 'Xưởng sản xuất', 'Hình ảnh minh họa môi trường làm việc', 640, 480 ),
			array( 'daeduk-life-global-program.jpg', 'Giao lưu quốc tế', 'Chương trình hợp tác toàn cầu Địa phương – Doanh nghiệp – Đại học 2026 tại Daejeon', 800, 533 ),
			array( 'daeduk-company-jiin.jpg', 'Sản xuất bảng mạch', 'Hình ảnh minh họa môi trường làm việc', 640, 480 ),
			array( 'daeduk-facility-gymnasium.jpg', 'Thể thao trong trường', 'Nhà thi đấu trong khuôn viên Đại học Daeduk', 1000, 466 ),
		),
		// One photo per step, in step order.
		'steps' => array(
			array( 'news-letco-college-visit.jpg', 'Trụ sở LETCO – HaUI, nơi tiếp nhận và đánh giá hồ sơ', 600, 472 ),
			array( 'home-daeduk-class.jpg', 'Lớp học viên chuẩn bị du học Hàn Quốc tại LETCO', 1000, 629 ),
			array( 'daeduk-life-vietnam-partners.jpg', 'Đại học Daeduk ký thỏa thuận hợp tác với các trường tại Việt Nam', 760, 427 ),
			array( 'daeduk-life-industry-agreement.jpg', 'Buổi ký kết hợp tác đào tạo gắn với việc làm và trao đổi về thực tập hiện trường tại Daeduk', 800, 600 ),
			array( 'daeduk-campus-field.jpg', 'Sân vận động và giảng đường trong khuôn viên Đại học Daeduk', 705, 470 ),
		),
	),
	'd2-1' => array(
		'hero' => array( 'daeduk-life-lab-practice.jpg', 'Sinh viên Daeduk thực hành trong phòng thí nghiệm chuyên ngành', 705, 470 ),
		'facts' => array( array( '2 – 3 năm', 'Tùy chương trình ngành' ), array( 'Bằng Cao đẳng', 'Khi đủ điều kiện tốt nghiệp' ) ),
		'gallery' => array(
			array( 'daeduk-company-ibtech-site.jpg', 'Gắn với thực hành', 'Hình ảnh minh họa môi trường làm việc', 548, 411 ),
			array( 'daeduk-life-entrance-ceremony.jpg', 'Ngày nhập học', 'Lễ nhập học tân sinh viên năm học 2025 tại Đại học Daeduk', 760, 520 ),
			array( 'daeduk-life-graduation.jpg', 'Nhận bằng Cao đẳng', 'Lễ trao bằng tốt nghiệp năm học 2024 tại Đại học Daeduk', 760, 570 ),
			array( 'daeduk-campus-engineering.jpg', 'Học chuyên ngành', 'Tòa Kỹ thuật trong khuôn viên Đại học Daeduk', 916, 1014 ),
			array( 'daeduk-campus-mechanical.jpg', 'Tòa Cơ khí', 'Tòa Cơ khí tại Đại học Daeduk', 916, 1014 ),
			array( 'daeduk-campus-student-hall.jpg', 'Cuộc sống trong trường', 'Tòa nhà sinh viên trong khuôn viên Đại học Daeduk', 916, 1014 ),
		),
		// One photo per step, in step order.
		'steps' => array(
			array( 'daeduk-campus-sign.jpg', 'Biển tên Đại học Daeduk trong khuôn viên', 705, 470 ),
			array( 'daeduk-mou-presentation.jpg', 'Đại học Daeduk giới thiệu chương trình tại lễ ký kết ở Hà Nội', 1400, 933 ),
			array( 'letco-korea-departure-2026-09.jpg', 'Học viên LETCO chuẩn bị khởi hành sang Hàn Quốc', 1200, 803 ),
			array( 'daeduk-company-seowon-site.jpg', 'Hình ảnh minh họa môi trường làm việc', 552, 414 ),
			array( 'daeduk-company-boeun-site.jpg', 'Hình ảnh minh họa môi trường làm việc', 552, 414 ),
		),
	),
	'd4-1' => array(
		'hero' => array( 'daeduk-letco-class-visit.jpg', 'Đại diện Daeduk gặp gỡ học viên tại lớp học LETCO ở Việt Nam', 1200, 898 ),
		'facts' => array( array( '6 – 12 tháng', 'Thời gian học tham khảo' ), array( 'Tiếng Hàn', 'Nền tảng để học chuyên ngành' ) ),
		'gallery' => array(
			array( 'daeduk-life-lunar-new-year.jpg', 'Đón Tết tại Hàn', 'Trò chơi truyền thống dịp Tết cùng học viên tiếng Hàn người Việt tại Daeduk', 760, 427 ),
			array( 'daeduk-life-language-graduation.jpg', 'Hoàn thành khóa tiếng', 'Học viên hoàn thành khóa tiếng tại Viện Giáo dục tiếng Hàn Daeduk', 637, 428 ),
			array( 'daeduk-campus-dorm-women.jpg', 'Ở ngay trong trường', 'Ký túc xá trong khuôn viên Đại học Daeduk', 916, 1014 ),
			array( 'daeduk-facility-dorm-cafeteria.jpg', 'Bữa ăn hằng ngày', 'Nhà ăn ký túc xá Đại học Daeduk', 518, 390 ),
			array( 'daeduk-facility-tennis.jpg', 'Nhịp sống sinh viên', 'Sân tennis trong khuôn viên Đại học Daeduk', 1000, 466 ),
			array( 'daeduk-campus-modern.jpg', 'Khám phá khuôn viên', 'Một tòa nhà hiện đại trong khuôn viên Đại học Daeduk', 705, 470 ),
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

	$configs[ 'daeduk-' . $slug ] = array_merge( $base, array(
		'layout' => 'daeduk-route',
		'name' => 'Đại học Daeduk · ' . strtoupper( $slug ),
		'route' => $route,
		'majors' => isset( $route['majors'] ) ? $route['majors'] : $base['majors'],
		'popup_delay' => 0,
		'popup_buttons' => false,
		'seo' => array_merge( $base['seo'], array( 'description' => $route['intro'] ) ),
		'lead' => $route['lead'],
	) );
}
