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
		'image'       => 'hero-japan-tokyo.jpg',
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
			array( 'type' => 'Trường Nhật ngữ', 'name' => 'Waseda Edu – Tokyo', 'text' => 'Đối tác tiếp nhận và phỏng vấn du học sinh LETCO tại Tokyo.', 'image' => 'school-waseda-edu.jpg' ),
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
		'class'              => 'study-korea',
		'flag'               => '🇰🇷',
		'name'               => 'Hàn Quốc',
		'eyebrow'            => 'Du học Hàn Quốc 2026 cùng LETCO – HaUI',
		'title'              => 'Ước mơ vươn ra thế giới bắt đầu từ một lộ trình vững chắc',
		'description'        => 'LETCO – đơn vị trực thuộc Đại học Công nghiệp Hà Nội (HaUI) đồng hành cùng học sinh và phụ huynh từ khâu định hướng, đào tạo tiếng Hàn, xử lý hồ sơ visa D-4, D-2 đến khi nhập học và tạo dựng sự nghiệp lâu dài tại Hàn Quốc.',
		'image'              => 'hero-korea-palace.jpg',
		'hotline'            => '0989.086.386',
		'trust'              => array( '25 năm', 'Kinh nghiệm tư vấn du học và hợp tác quốc tế' ),
		'highlights'         => array( '100% vốn Nhà nước', 'Hợp đồng rõ ràng, có hóa đơn', 'Học tiếng ngay tại HaUI', 'Đồng hành trọn vẹn tại Hàn' ),
		'benefits_eyebrow'   => 'Vì sao chọn LETCO',
		'benefits_title'     => 'Vì sao hơn 10.000+ học viên lựa chọn LETCO?',
		'benefits_intro'     => 'Lộ trình toàn diện, chi phí minh bạch, doanh nghiệp 100% vốn Nhà nước.',
		'benefits'           => array(
			array( 'icon' => 'HaUI', 'title' => 'Trực thuộc Đại học Công nghiệp Hà Nội', 'text' => 'Doanh nghiệp nhà nước với 25 năm kinh nghiệm tư vấn du học và hợp tác quốc tế, không phải trung tâm môi giới tự phát.' ),
			array( 'icon' => '100%', 'title' => 'Minh bạch tài chính', 'text' => 'Bảng dự trù chi phí lập chi tiết theo từng trường và thành phố; mọi khoản thu ghi rõ trong hợp đồng và xuất hóa đơn đỏ.' ),
			array( 'icon' => '한', 'title' => 'Đào tạo tiếng Hàn chuẩn quốc tế', 'text' => 'Trung tâm đặt trong khuôn viên HaUI, giúp học viên có nền tảng TOPIK vững chắc, giảm áp lực thích nghi năm đầu.' ),
			array( 'icon' => '20+', 'title' => 'Đối tác của 20+ đại học top đầu', 'text' => 'Tuyển sinh trực tiếp cho các trường quốc gia và tư thục uy tín tại Seoul, Busan, Daegu, Incheon, Daejeon.' ),
			array( 'icon' => 'ARC', 'title' => 'Hỗ trợ du học sinh tại Hàn', 'text' => 'Hướng dẫn làm thẻ cư trú ARC, bảo hiểm y tế NHIS, giấy phép làm thêm đúng luật và kết nối cộng đồng sinh viên Việt Nam.' ),
		),
		'visas_title'        => 'Các hệ du học phổ biến & bảng so sánh visa',
		'visas_intro'        => 'Chọn đúng hệ du học là quyết định chiến lược giúp tối ưu thời gian, chi phí và nâng cao tỷ lệ đậu visa.',
		'visas'              => array(
			array(
				'tag'   => 'D-4-1',
				'title' => 'Du học tiếng Hàn',
				'rows'  => array(
					array( 'Mục tiêu', 'Học tiếng Hàn nâng cao (6 tháng – 2 năm)' ),
					array( 'Ngoại ngữ tại Việt Nam', 'Không bắt buộc (khuyến khích có TOPIK 1-2)' ),
					array( 'Học vấn & GPA', 'Bằng THPT, GPA từ 6.5 trở lên' ),
					array( 'Sổ tiết kiệm', 'Tối thiểu 10,000 USD (gửi trước 6 tháng)' ),
					array( 'Làm thêm', 'Sau 6 tháng nhập cảnh (20–25 giờ/tuần)' ),
					array( 'Bảo lãnh người thân', 'Không' ),
					array( 'Lộ trình tương lai', 'Chuyển sang Visa D-2 để học chuyên ngành' ),
				),
			),
			array(
				'tag'   => 'D-4-6',
				'title' => 'Du học nghề',
				'rows'  => array(
					array( 'Mục tiêu', 'Đào tạo kỹ năng nghề thực tiễn' ),
					array( 'Ngoại ngữ tại Việt Nam', 'Bắt buộc TOPIK 2 trở lên' ),
					array( 'Học vấn & GPA', 'Bằng THPT/Thợ' ),
					array( 'Sổ tiết kiệm', 'Tối thiểu 10,000 USD (gửi trước 6 tháng)' ),
					array( 'Làm thêm', 'Thực tập hưởng lương theo chương trình' ),
					array( 'Bảo lãnh người thân', 'Không' ),
					array( 'Lộ trình tương lai', 'Tốt nghiệp chuyển sang Visa Lao động E-7' ),
				),
			),
			array(
				'tag'      => 'D-2',
				'title'    => 'Du học chuyên ngành',
				'featured' => true,
				'rows'     => array(
					array( 'Mục tiêu', 'Lấy bằng Cao đẳng, Cử nhân, Thạc sĩ, Tiến sĩ' ),
					array( 'Ngoại ngữ tại Việt Nam', 'Bắt buộc TOPIK 3+ hoặc IELTS 5.5+' ),
					array( 'Học vấn & GPA', 'Bằng THPT/Đại học, GPA từ 6.5 – 7.0+' ),
					array( 'Sổ tiết kiệm', 'Tối thiểu 20,000 USD (gửi trước 3 tháng)' ),
					array( 'Làm thêm', 'Ngay sau khi nhập học (25–35 giờ/tuần)' ),
					array( 'Bảo lãnh người thân', 'Có (bảo lãnh vợ/chồng, con)' ),
					array( 'Lộ trình tương lai', 'Visa D-10 (tìm việc) → E-7 → F-2/F-5' ),
				),
			),
		),
		'regions_title'      => 'Danh sách các trường đại học đối tác hàng đầu',
		'regions_intro'      => 'LETCO đại diện tuyển sinh cho hơn 20 trường đại học danh tiếng trải dài khắp các thành phố lớn tại Hàn Quốc.',
		'regions'            => array(
			array(
				'title'   => 'Khu vực Thủ đô Seoul & Gyeonggi',
				'schools' => array(
					array( 'name' => 'Đại học Quốc gia Seoul (SNU)', 'image' => 'school-snu-building.jpg', 'text' => 'Đại học số 1 Hàn Quốc, đa ngành nghiên cứu, học phí công lập từ 1,7 – 4 triệu KRW/học kỳ.' ),
					array( 'name' => 'Đại học Yonsei & Đại học Korea (Khối SKY)', 'image' => 'school-yonsei-2.jpg', 'text' => 'Top trường tư thục danh giá hàng đầu về Kinh doanh, Y khoa, Luật và Quan hệ quốc tế.' ),
					array( 'name' => 'Đại học Hanyang', 'image' => 'school-hanyang-2.jpg', 'text' => 'Thế mạnh vượt trội về Kỹ thuật, Kiến trúc, CNTT và liên kết R&D với tập đoàn Hyundai.' ),
					array( 'name' => 'Đại học Chung-Ang & Đại học Dongguk', 'image' => 'school-dongguk-2.jpg', 'text' => 'Dẫn đầu về Truyền thông, Nghệ thuật, Dược và Điện ảnh.' ),
					array( 'name' => 'Đại học Sejong, Sungkyunkwan (SKKU), Sogang, Konkuk, Nữ Ewha', 'image' => 'school-konkuk-2.jpg', 'text' => 'Đa dạng ngành học từ Bán dẫn, Du lịch Khách sạn đến Ngôn ngữ.' ),
					array( 'name' => 'Đại học Ajou (Suwon) & Đại học Inha (Incheon)', 'image' => 'school-ajou-night.jpg', 'text' => 'Trung tâm công nghệ, Kỹ thuật, Y khoa và Logistics hàng đầu vùng thủ đô.', 'url' => '/du-hoc/du-hoc-han-quoc/dai-hoc-ajou/' ),
				),
			),
			array(
				'title'   => 'Khu vực miền Trung & miền Nam (Daejeon, Daegu, Busan, Gwangju)',
				'schools' => array(
					array( 'name' => 'Viện Khoa học & Công nghệ Tiên tiến Hàn Quốc (KAIST – Daejeon)', 'image' => 'school-kaist-2.jpg', 'text' => 'Trường đào tạo STEM top đầu châu Á, miễn 100% học phí và cấp trợ cấp hàng tháng cho sinh viên quốc tế.' ),
					array( 'name' => 'Đại học Quốc gia Pusan (PNU – Busan) & Đại học Quốc gia Kyungpook (KNU – Daegu)', 'image' => 'school-pnu-2.jpg', 'text' => 'Các đại học quốc lập trọng điểm miền Nam với chi phí hợp lý (1,7 – 4 triệu KRW/kỳ) và học bổng cao.' ),
					array( 'name' => 'Đại học Keimyung (Daegu) & Đại học Hannam (Daejeon)', 'image' => 'school-hannam-2.jpg', 'text' => 'Môi trường học tập năng động, chi phí sinh hoạt thấp hơn 30–40% so với Seoul.' ),
				),
			),
		),
		'costs'              => array(
			'title'       => 'Chi phí du học Hàn Quốc năm đầu',
			'items_title' => 'Bảng dự trù tổng chi phí trọn gói năm đầu',
			'items'       => array(
				array( 'label' => 'Học phí năm đầu', 'amount' => '80 – 150 triệu VNĐ', 'note' => '~3 – 6 triệu KRW/kỳ. Trường quốc lập rẻ hơn trường tư thục.' ),
				array( 'label' => 'Chỗ ở (KTX/Oneroom)', 'amount' => '30 – 70 triệu VNĐ/năm', 'note' => 'KTX trường tiết kiệm nhất; thuê ngoài cần đặt cọc.' ),
				array( 'label' => 'Sinh hoạt phí (ăn uống, đi lại)', 'amount' => '60 – 100 triệu VNĐ/năm', 'note' => 'Tự nấu ăn và đi tàu điện/xe buýt bằng thẻ T-money giúp giảm 50% chi phí.' ),
				array( 'label' => 'Bảo hiểm y tế quốc gia (NHIS)', 'amount' => '~12 – 14 triệu VNĐ/năm', 'note' => '~60,000–70,000 KRW/tháng. Bắt buộc với du học sinh, được chính phủ giảm 50% phí.' ),
				array( 'label' => 'Vé máy bay & thủ tục nhập cảnh', 'amount' => '5 – 15 triệu VNĐ', 'note' => 'Mua sớm trước kỳ nhập học để có giá ưu đãi.' ),
				array( 'label' => 'Phí dịch vụ xử lý hồ sơ LETCO', 'amount' => 'Ghi rõ trong hợp đồng', 'note' => 'Xuất hóa đơn; bao gồm dịch thuật, công chứng, hợp pháp hóa lãnh sự, luyện phỏng vấn.' ),
			),
			'total_label' => 'Tổng chi phí năm đầu (tùy hệ học, loại trường và thành phố)',
			'total'       => '180 – 400 triệu VNĐ',
			'tip'         => 'Lựa chọn các trường đại học quốc lập hoặc trường tại các thành phố ngoài Seoul (như Busan, Daegu, Daejeon) giúp tiết kiệm từ 30% – 50% tổng chi phí sinh hoạt mà chất lượng giáo dục vẫn đảm bảo.',
		),
		'scholarships_title' => 'Các chương trình học bổng hấp dẫn',
		'scholarships'       => array(
			array( 'icon' => 'GKS', 'title' => 'Học bổng Chính phủ Hàn Quốc', 'text' => 'Toàn phần 100% học phí, trợ cấp sinh hoạt ~1,000,000 KRW/tháng, vé máy bay khứ hồi, bảo hiểm y tế và khóa học tiếng 1 năm.' ),
			array( 'icon' => '20%+', 'title' => 'Học bổng nhập học', 'text' => 'Giảm 20% – 100% học phí kỳ đầu tiên dựa trên TOPIK 3–6 hoặc IELTS 5.5–7.0+ nộp từ Việt Nam.' ),
			array( 'icon' => 'GPA', 'title' => 'Học bổng thành tích', 'text' => 'Duy trì giảm 30% – 100% học phí các kỳ tiếp theo dựa vào điểm GPA tích lũy của kỳ trước.' ),
			array( 'icon' => 'RA', 'title' => 'Học bổng Giáo sư (STEM)', 'text' => 'Trợ cấp nghiên cứu RA/TA cho bậc Thạc sĩ, Tiến sĩ, hỗ trợ toàn bộ học phí và sinh hoạt phí từ quỹ nghiên cứu.' ),
		),
		'steps_intro'        => 'Quy trình làm việc chuẩn hóa giúp phụ huynh và học sinh hoàn toàn an tâm.',
		'steps'              => array(
			array( 'Đánh giá hồ sơ miễn phí', 'Kiểm tra GPA, số buổi nghỉ học THPT, năm trống và năng lực tài chính gia đình để tư vấn hướng đi phù hợp.' ),
			array( 'Chọn trường & hệ học', 'Định hướng hệ tiếng (D-4), hệ nghề (D-4-6) hay chuyên ngành (D-2); chọn Seoul hay các tỉnh theo ngân sách.' ),
			array( 'Học tiếng tại HaUI', 'Học tiếng Hàn giao tiếp và luyện thi TOPIK tại Trung tâm tiếng Hàn LETCO trong khuôn viên HaUI.' ),
			array( 'Hồ sơ & visa', 'Trọn gói dịch thuật công chứng, hợp pháp hóa lãnh sự (Tem Vàng & Dấu Tím ĐSQ), chứng minh tài chính, luyện phỏng vấn.' ),
			array( 'Nhập cảnh & đồng hành', 'Đón sân bay, sắp xếp KTX/nhà ở, làm thẻ ARC, mở tài khoản ngân hàng, đăng ký NHIS và xin phép làm thêm hợp pháp.' ),
		),
		'work'               => array(
			'eyebrow'      => 'Làm thêm, việc làm & định cư',
			'title'        => 'Làm thêm hợp pháp, lộ trình định cư lâu dài',
			'rules'        => array(
				array( 'Visa D-4 (hệ tiếng):', 'làm thêm sau 6 tháng nhập cảnh, chuyên cần trên 90% và có TOPIK 2 (tối đa 20–25 giờ/tuần).' ),
				array( 'Visa D-2 (đại học/thạc sĩ):', 'làm thêm ngay sau khi nhập học, tối đa 25–35 giờ/tuần trong kỳ học, không giới hạn giờ trong kỳ nghỉ hè và đông.' ),
				array( 'Mức lương:', 'lương tối thiểu theo luật Hàn Quốc là 9,860 KRW/giờ (~180.000 VNĐ/giờ); gia sư, phiên dịch Việt – Hàn có thể đạt 25,000+ KRW/giờ.' ),
			),
			'stages'       => array(
				array( 'Giai đoạn 1 · D-2', 'Tốt nghiệp Cử nhân / Thạc sĩ.' ),
				array( 'Giai đoạn 2 · D-10', 'Gia hạn 1 – 2 năm visa tìm việc sau tốt nghiệp, được miễn xét điểm lần đầu cho du học sinh tại Hàn.' ),
				array( 'Giai đoạn 3 · E-7', 'Visa lao động chuyên môn khi có hợp đồng đúng chuyên ngành, lương từ 80% GNI (~35 triệu KRW/năm); du học sinh được miễn 1 năm kinh nghiệm.' ),
				array( 'Giai đoạn 4 · F-2 / F-5', 'Đạt 80 điểm hệ thống F-2-7 (tuổi, học vấn STEM, TOPIK 5-6/KIIP, thu nhập) để nhận cư trú dài hạn F-2 và hướng tới thường trú F-5.' ),
			),
			'career_title' => 'Cơ hội sự nghiệp khi trở về Việt Nam',
			'career'       => 'Du học sinh Hàn Quốc được săn đón tại các tập đoàn FDI như Samsung, LG, Lotte, CJ, Hyosung, Hyundai, Shinhan Bank, Woori Bank với mức lương khởi điểm 12.000.000 – 25.000.000+ VNĐ/tháng.',
		),
		'partners_title'     => 'Tìm hiểu chi tiết từng trường',
		'partners_intro'     => 'Học phí, học bổng, ngành học và điều kiện tuyển sinh của các trường và chương trình LETCO đang tuyển sinh.',
		'partners'           => array(
			array( 'type' => 'Đại học đối tác', 'name' => 'Đại học Pyeongtaek (PTU)', 'text' => 'Thế mạnh Kinh doanh, Logistics, ICT, truyền thông; học bổng 20% – 100% theo TOPIK.', 'image' => 'school-pyeongtaek-campus.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/dai-hoc-pyeongtaek/' ),
			array( 'type' => 'Đại học công lập', 'name' => 'Đại học Quốc gia Changwon', 'text' => 'Nổi bật về cơ khí, điện – điện tử, máy tính, công nghệ thông tin và hàng hải.', 'image' => 'school-changwon.jpg' ),
			array( 'type' => 'Đại học nghề', 'name' => 'Kunjang University College', 'text' => 'Hệ D2-1 ngành nông nghiệp công nghệ cao, điều dưỡng, ẩm thực; học bổng 20% – 50%.', 'image' => 'school-kunjang.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/dai-hoc-kunjang/' ),
			array( 'type' => 'Đại học nghề', 'name' => 'Daewon University College', 'text' => 'Lộ trình D4-1 → D2-1 cho hồ sơ GDTX, GPA thấp; ngành ô tô, điện – điện tử, kiến trúc, kinh doanh, du lịch.', 'image' => 'school-jecheon.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/dai-hoc-daewon/' ),
			array( 'type' => 'Đại học & doanh nghiệp', 'name' => 'Đại học Daeduk – K‑TECH Bridge', 'text' => 'Du học song hành và chương trình K‑TECH Bridge cùng IBTech: học tại Daeduk, thực tập hưởng lương tại doanh nghiệp Hàn Quốc.', 'image' => 'school-daeduk-ktech-mou.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/dai-hoc-daeduk/' ),
			array( 'type' => 'Chương trình D2-1', 'name' => 'Học bổng Kunjang & Daewon', 'text' => 'Lộ trình tuyển sinh và học bổng được áp dụng theo điều kiện của từng kỳ.', 'image' => 'school-kunjang-mou.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/dai-hoc-kunjang/' ),
			array( 'type' => 'Cao đẳng nghề ô tô', 'name' => 'Cao đẳng Ô tô Ajou', 'text' => 'Trường duy nhất tại Hàn Quốc đào tạo chuyên sâu ô tô: Hybrid, EV, sửa chữa và thiết kế ô tô.', 'image' => 'school-ajou-motor-interview.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/cao-dang-o-to-ajou/' ),
			array( 'type' => 'Đại học top 10', 'name' => 'Đại học Ajou', 'text' => 'Hạng 11 tại Hàn Quốc, mạnh về điện tử, công nghệ thông tin; cách Seoul 50 km.', 'image' => 'school-ajou-campus.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/dai-hoc-ajou/' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Gachon', 'text' => 'Thế mạnh y dược, kỹ thuật y sinh; học bổng hệ tiếng Hàn đến 90%.', 'image' => 'school-gachon-gate.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/dai-hoc-gachon/' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Catholic', 'text' => 'Thành lập năm 1855, top 10 ngành Y, 7 bệnh viện liên kết.', 'image' => 'school-catholic-campus.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/dai-hoc-catholic/' ),
			array( 'type' => 'Cao đẳng nghề', 'name' => 'Cao đẳng Koje', 'text' => 'Tại Geoje – thủ phủ đóng tàu; ngành đóng tàu có cơ hội Visa E7.', 'image' => 'school-koje-interview.jpg', 'url' => '/du-hoc/du-hoc-han-quoc/cao-dang-koje/' ),
			array( 'type' => 'Đại học quốc gia', 'name' => 'Đại học Quốc gia Seoul (SNU)', 'text' => 'Đại học số 1 Hàn Quốc, đa ngành nghiên cứu, học phí công lập từ 1,7 – 4 triệu KRW/học kỳ.', 'image' => 'school-snu.jpg' ),
			array( 'type' => 'Khối SKY', 'name' => 'Đại học Yonsei', 'text' => 'Top trường tư thục danh giá hàng đầu về Kinh doanh, Y khoa, Luật và Quan hệ quốc tế.', 'image' => 'school-yonsei.jpg' ),
			array( 'type' => 'Khối SKY', 'name' => 'Đại học Korea', 'text' => 'Top trường tư thục danh giá hàng đầu về Kinh doanh, Y khoa, Luật và Quan hệ quốc tế.', 'image' => 'school-korea.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Hanyang', 'text' => 'Thế mạnh Kỹ thuật, Kiến trúc, CNTT và liên kết R&D với tập đoàn Hyundai.', 'image' => 'school-hanyang.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Chung-Ang', 'text' => 'Dẫn đầu về Truyền thông, Nghệ thuật, Dược và Điện ảnh.', 'image' => 'school-chungang.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Dongguk', 'text' => 'Dẫn đầu về Truyền thông, Nghệ thuật, Dược và Điện ảnh.', 'image' => 'school-dongguk.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Sejong', 'text' => 'Đa dạng ngành học từ Bán dẫn, Du lịch Khách sạn đến Ngôn ngữ.', 'image' => 'school-sejong.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Sungkyunkwan (SKKU)', 'text' => 'Đa dạng ngành học từ Bán dẫn, Du lịch Khách sạn đến Ngôn ngữ.', 'image' => 'school-skku.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Sogang', 'text' => 'Đa dạng ngành học từ Bán dẫn, Du lịch Khách sạn đến Ngôn ngữ.', 'image' => 'school-sogang.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Konkuk', 'text' => 'Đa dạng ngành học từ Bán dẫn, Du lịch Khách sạn đến Ngôn ngữ.', 'image' => 'school-konkuk.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Nữ Ewha', 'text' => 'Đa dạng ngành học từ Bán dẫn, Du lịch Khách sạn đến Ngôn ngữ.', 'image' => 'school-ewha.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Inha (Incheon)', 'text' => 'Trung tâm công nghệ, Kỹ thuật, Y khoa và Logistics hàng đầu vùng thủ đô.', 'image' => 'school-inha.jpg' ),
			array( 'type' => 'Viện khoa học', 'name' => 'KAIST (Daejeon)', 'text' => 'Đào tạo STEM top đầu châu Á, miễn 100% học phí và cấp trợ cấp hàng tháng cho sinh viên quốc tế.', 'image' => 'school-kaist.jpg' ),
			array( 'type' => 'Đại học quốc lập', 'name' => 'Đại học Quốc gia Pusan (PNU)', 'text' => 'Đại học quốc lập trọng điểm tại Busan, chi phí hợp lý (1,7 – 4 triệu KRW/kỳ) và học bổng cao.', 'image' => 'school-pnu.jpg' ),
			array( 'type' => 'Đại học quốc lập', 'name' => 'Đại học Quốc gia Kyungpook (KNU)', 'text' => 'Đại học quốc lập trọng điểm tại Daegu, chi phí hợp lý (1,7 – 4 triệu KRW/kỳ) và học bổng cao.', 'image' => 'school-knu.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Keimyung (Daegu)', 'text' => 'Môi trường năng động, chi phí sinh hoạt thấp hơn 30–40% so với Seoul.', 'image' => 'school-keimyung.jpg' ),
			array( 'type' => 'Đại học tư thục', 'name' => 'Đại học Hannam (Daejeon)', 'text' => 'Môi trường năng động, chi phí sinh hoạt thấp hơn 30–40% so với Seoul.', 'image' => 'school-hannam.jpg' ),
		),
		'faq'                => array(
			array( 'q' => 'Học lực trung bình (GPA 6.5), tài chính không quá dư dả có đi du học Hàn Quốc được không?', 'a' => 'Hoàn toàn được! Nhiều trường đại học Hàn Quốc chấp nhận học sinh có GPA từ 6.5 trở lên. Bạn có thể chọn các trường vùng ngoài Seoul với học phí và chi phí sinh hoạt rẻ. Sau 6 tháng học tiếng (hoặc ngay khi vào chuyên ngành), bạn có thể làm thêm hợp pháp để tự trang trải sinh hoạt phí.' ),
			array( 'q' => 'Làm sao để phân biệt trung tâm du học uy tín?', 'a' => 'Hãy kiểm tra 3 tiêu chí pháp lý: (1) đơn vị thuộc cơ quan Nhà nước hoặc có Giấy phép tư vấn du học do Sở GD&ĐT cấp; (2) hợp đồng dịch vụ ghi rõ từng khoản chi phí, có hóa đơn đỏ và điều khoản hoàn phí minh bạch; (3) có địa chỉ văn phòng thật để đến làm việc trực tiếp. LETCO là doanh nghiệp 100% vốn nhà nước thuộc Đại học Công nghiệp Hà Nội, đặt tại Tòa nhà A5 – 298 Cầu Diễn.' ),
			array( 'q' => 'Trượt visa du học Hàn Quốc 1 lần rồi thì có nộp lại được không?', 'a' => 'Được! Rất nhiều học viên đã đậu visa ở lần nộp thứ hai. Điều quan trọng là tìm chính xác lý do từ chối (thường do hồ sơ tài chính chưa logic, năm trống chưa giải trình rõ hoặc thông tin mâu thuẫn) để bổ sung giấy tờ giải trình chuẩn xác trước khi nộp lại.' ),
		),
		'lead'               => array(
			'title'   => 'Đăng ký nhận tư vấn & bảng dự trù chi phí miễn phí',
			'intro'   => 'Để lại thông tin để chuyên viên LETCO – Đại học Công nghiệp Hà Nội đánh giá hồ sơ và lập lộ trình du học cá nhân hóa.',
			'bullets' => array( 'Đánh giá tỷ lệ đỗ visa dựa trên GPA, tuổi và học bạ THPT', 'Gợi ý danh sách 3–5 trường vừa sức, đúng định hướng ngành nghề', 'Nhận bảng dự trù chi phí chi tiết cho cả năm đầu tiên', 'Danh sách các suất học bổng còn chỉ tiêu cho kỳ nhập học gần nhất' ),
		),
		'contact'            => array(
			'label'     => 'Đơn vị tư vấn',
			'partners'  => 'Trung tâm Du học LETCO – Đại học Công nghiệp Hà Nội (HaUI)',
			'phones'    => array( '0989.086.386' ),
			'addresses' => array( 'Tòa nhà A5, Số 298 Đường Cầu Diễn, Phường Tây Tựu, Quận Bắc Từ Liêm, Hà Nội' ),
			'website'   => 'https://duhoc-hanquoc.edu.vn/',
		),
		'lead_extra'         => true,

	),
);

$configs     += require __DIR__ . '/study-school-configs.php';
$data        = isset( $configs[ $country ] ) ? $configs[ $country ] : $configs['korea'];
$lead_status = isset( $_GET['lead'] ) ? sanitize_key( wp_unslash( $_GET['lead'] ) ) : '';
// Pages with their own zoned layout render it in full and skip the generic sections.
if ( isset( $data['layout'] ) && 'zones' === $data['layout'] ) {
	get_template_part( 'template-parts/daeduk', 'landing', array( 'data' => $data, 'lead_status' => $lead_status ) );
	return;
}
// Named step sets follow the visa routes in the Korea brief.
$step_sets   = array(
	'd2-1' => array(
		array( 'Chuẩn bị hồ sơ', 'Chuẩn bị hồ sơ và đăng ký chương trình.' ),
		array( 'Nhập cảnh Visa D4-1', 'Sang Hàn Quốc theo diện du học tiếng.' ),
		array( 'Học tiếng Hàn', 'Học tiếng Hàn từ 6 đến 10 tháng.' ),
		array( 'Đạt yêu cầu', 'TOPIK 2 trở lên và điều kiện riêng của trường.' ),
		array( 'Chuyển Visa D2-1', 'Chuyển sang học chuyên ngành cao đẳng.' ),
		array( 'Học tập & làm việc', 'Học tập, thực hành, phát triển nghề nghiệp và làm việc tại Hàn Quốc sau tốt nghiệp.' ),
	),
	'd2-2' => array(
		array( 'Chuẩn bị hồ sơ THPT', 'Độ tuổi 18 – 25, GPA THPT từ 6.0 – 7.5+ tùy trường.' ),
		array( 'Nhập cảnh hệ D4-1', 'Học tiếng Hàn 1 – 2 năm, nâng cao TOPIK.' ),
		array( 'Đạt TOPIK 3+', 'Hoặc IELTS/TOEFL đối với hệ tiếng Anh.' ),
		array( 'Chuyển tiếp D2-2', 'Học chuyên ngành cử nhân 4 năm.' ),
		array( 'Tốt nghiệp & làm việc', 'Định hướng làm việc hoặc chuyển visa D-10, E-7.' ),
	),
);
if ( ! empty( $data['steps'] ) && is_string( $data['steps'] ) ) {
	$data['steps'] = $step_sets[ $data['steps'] ];
}
$trust       = isset( $data['trust'] ) ? $data['trust'] : array( '26 năm', 'Kinh nghiệm đào tạo và hội nhập quốc tế' );
$steps       = ! empty( $data['steps'] ) ? $data['steps'] : array(
	array( 'Tư vấn', 'Đánh giá học lực, tài chính và mục tiêu.' ),
	array( 'Chọn trường', 'Xây dựng danh sách trường và kỳ nhập học.' ),
	array( 'Đào tạo tiếng', 'Học ngôn ngữ và kỹ năng hội nhập.' ),
	array( 'Hoàn thiện hồ sơ', 'Chuẩn hóa giấy tờ, hồ sơ trường và visa.' ),
	array( 'Phỏng vấn & visa', 'Luyện phỏng vấn và theo dõi kết quả.' ),
	array( 'Xuất cảnh', 'Định hướng trước bay và hỗ trợ giai đoạn đầu.' ),
);

// Optional sections only get a nav link when the config provides their data.
$anchors = array_filter(
	array(
		'phu-hop'      => empty( $data['fit'] ) ? '' : 'Phù hợp với ai',
		'tong-quan'    => empty( $data['overview'] ) ? '' : 'Tổng quan',
		'loi-ich'      => 'Lợi ích',
		'chuong-trinh' => empty( $data['visas'] ) ? 'Chương trình' : 'Hệ du học',
		'truong'       => empty( $data['regions'] ) ? '' : 'Trường đối tác',
		'nganh-hoc'    => empty( $data['majors'] ) ? '' : 'Ngành học',
		'chi-phi'      => empty( $data['costs'] ) && empty( $data['budget'] ) ? '' : 'Chi phí',
		'hoc-bong'     => empty( $data['scholarships'] ) ? '' : 'Học bổng',
		'dieu-kien'    => empty( $data['conditions'] ) ? '' : 'Điều kiện',
		'doanh-nghiep' => empty( $data['companies'] ) ? '' : 'Doanh nghiệp',
		'tuyen-sinh'   => empty( $data['schedule'] ) ? '' : 'Kỳ tuyển sinh',
		'ho-tro'       => empty( $data['responsibilities'] ) ? '' : 'Trách nhiệm',
		'lo-trinh'     => 'Lộ trình',
		'lam-them'     => empty( $data['work'] ) ? '' : 'Làm thêm & visa',
		'doi-tac'      => empty( $data['partners'] ) ? '' : ( empty( $data['regions'] ) ? 'Đối tác' : 'Chi tiết trường' ),
		'faq'          => empty( $data['faq'] ) ? '' : 'Hỏi đáp',
	)
);
?>

<?php
// Landing pages link only to each other; other site pages stay reachable by URL only.
$landing_urls = array( '/du-hoc/du-hoc-han-quoc/', '/du-hoc/du-hoc-nhat-ban/', '/du-hoc/du-hoc-han-quoc/dai-hoc-daeduk/' );
$header_ids   = isset( $data['header_links'] ) ? $data['header_links'] : array( 'doanh-nghiep', 'chuong-trinh', 'nganh-hoc', 'chi-phi', 'dieu-kien', 'lo-trinh', 'faq' );
$header_links = array();
foreach ( $header_ids as $header_id ) {
	if ( isset( $anchors[ $header_id ] ) && count( $header_links ) < 4 ) {
		$header_links[ $header_id ] = $anchors[ $header_id ];
	}
}
$hotline      = ! empty( $data['hotline'] ) ? $data['hotline'] : ( ! empty( $data['contact']['phones'][0] ) ? $data['contact']['phones'][0] : '024 3763 8154' );
?>
<?php
get_template_part(
	'template-parts/landing',
	'header',
	array(
		'links'   => $header_links,
		'hotline' => $hotline,
		'button'  => isset( $data['primary_cta'] ) ? $data['primary_cta'] : 'Đăng ký tư vấn',
	)
);
?>

<div class="study-landing <?php echo esc_attr( $data['class'] ); ?>">
<?php ob_start(); ?>
	<?php if ( ! empty( $data['hero_form'] ) ) : ?>
	<section class="lp-hero lp-hero--lead">
		<div class="container lp-hero-grid">
			<div class="lp-hero-copy">
				<p class="lp-kicker"><?php echo esc_html( $data['eyebrow'] ); ?></p>
				<h1><?php echo esc_html( $data['title'] ); ?></h1>
				<p class="lp-lede"><?php echo esc_html( $data['description'] ); ?></p>
				<ul class="lp-hero-points">
					<?php foreach ( $data['hero_form']['points'] as $point ) : ?><li><?php echo esc_html( $point ); ?></li><?php endforeach; ?>
				</ul>
			</div>
			<div class="lp-hero-form">
				<?php if ( 'success' === $lead_status ) : ?><div class="form-notice form-success">Cảm ơn bạn! LETCO đã nhận được thông tin và sẽ sớm liên hệ.</div><?php endif; ?>
				<?php if ( 'error' === $lead_status ) : ?><div class="form-notice form-error">Vui lòng nhập đầy đủ họ tên và số điện thoại.</div><?php endif; ?>
				<h2><?php echo esc_html( $data['hero_form']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['hero_form']['intro'] ); ?></p>
				<?php get_template_part( 'template-parts/quick', 'form', array( 'program' => 'Du học ' . $data['name'], 'button' => 'Đăng ký tư vấn', 'note' => $data['hero_form']['note'] ) ); ?>
				<?php if ( ! empty( $data['zalo'] ) ) : ?>
					<p class="lp-alt-contact">Hoặc liên hệ ngay: <a href="https://zalo.me/<?php echo esc_attr( $data['zalo'] ); ?>" rel="noopener" target="_blank">Nhắn Zalo</a> · <a href="tel:<?php echo esc_attr( preg_replace( '/\D+/', '', $hotline ) ); ?>">Gọi <?php echo esc_html( $hotline ); ?></a></p>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php else : ?>
	<?php
	// The headline may highlight one phrase, e.g. the headline figure.
	$title_html = esc_html( $data['title'] );
	if ( ! empty( $data['title_accent'] ) ) {
		$title_html = str_replace( esc_html( $data['title_accent'] ), '<em>' . esc_html( $data['title_accent'] ) . '</em>', $title_html );
	}
	?>
	<section class="lp-hero<?php echo empty( $data['hero_photo'] ) ? '' : ' lp-hero--photo'; ?><?php echo empty( $data['hero_backdrop'] ) ? '' : ' lp-hero--cinema'; ?>">
		<div class="container lp-hero-grid">
			<div class="lp-hero-copy">
				<p class="lp-kicker"><?php echo esc_html( $data['eyebrow'] ); ?></p>
				<h1><?php echo $title_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?></h1>
				<p class="lp-lede"><?php echo esc_html( $data['description'] ); ?></p>
				<?php if ( ! empty( $data['hero_signals'] ) ) : ?>
					<dl class="lp-hero-signals" aria-label="Thông tin nhanh về chương trình">
						<?php foreach ( $data['hero_signals'] as $signal ) : ?>
							<div><dt><?php echo esc_html( $signal[0] ); ?></dt><dd><?php echo esc_html( $signal[1] ); ?></dd></div>
						<?php endforeach; ?>
					</dl>
				<?php endif; ?>
				<?php if ( ! empty( $data['hero_note'] ) ) : ?><p class="lp-hero-note"><?php echo esc_html( $data['hero_note'] ); ?></p><?php endif; ?>
				<div class="lp-actions">
					<a class="lp-button" href="#dang-ky"><?php echo esc_html( isset( $data['hero_button'] ) ? $data['hero_button'] : 'Đăng ký tư vấn' ); ?></a>
					<a class="lp-link" href="<?php echo esc_attr( isset( $data['hero_link'][1] ) ? $data['hero_link'][1] : '#chuong-trinh' ); ?>"><?php echo esc_html( isset( $data['hero_link'][0] ) ? $data['hero_link'][0] : 'Xem chương trình' ); ?></a>
				</div>
			</div>
			<figure class="lp-hero-media">
				<img src="<?php echo letco_asset( $data['image'] ); ?>" alt="<?php echo esc_attr( isset( $data['image_alt'] ) ? $data['image_alt'] : 'Du học ' . $data['name'] . ' cùng LETCO' ); ?>" fetchpriority="high">
				<?php if ( ! empty( $data['image_caption'] ) ) : ?><figcaption><?php echo esc_html( $data['image_caption'] ); ?></figcaption><?php endif; ?>
			</figure>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['summary'] ) ) : ?>
	<section class="lp-summary" id="tom-tat">
		<div class="container">
			<h2><?php echo esc_html( $data['summary']['title'] ); ?></h2>
			<dl class="lp-summary-list">
				<?php foreach ( $data['summary']['items'] as $item ) : ?>
					<div>
						<dt><?php echo esc_html( $item[0] ); ?></dt>
						<dd>
							<strong><?php echo esc_html( $item[1] ); ?></strong>
							<span><?php echo esc_html( $item[2] ); ?></span>
							<a href="<?php echo esc_attr( $item[4] ); ?>"><?php echo esc_html( $item[3] ); ?></a>
						</dd>
					</div>
				<?php endforeach; ?>
			</dl>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['fit'] ) ) : ?>
	<section class="section lp-fit" id="phu-hop">
		<div class="container lp-fit-layout">
			<div class="lp-fit-intro">
				<span class="eyebrow"><?php echo esc_html( $data['fit']['eyebrow'] ); ?></span>
				<h2><?php echo esc_html( $data['fit']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['fit']['intro'] ); ?></p>
				<?php if ( ! empty( $data['fit']['photo'] ) ) : ?>
					<figure>
						<img src="<?php echo letco_asset( $data['fit']['photo'][0] ); ?>" alt="<?php echo esc_attr( $data['fit']['photo'][1] ); ?>" loading="lazy">
						<figcaption><?php echo esc_html( $data['fit']['photo'][1] ); ?></figcaption>
					</figure>
				<?php endif; ?>
			</div>
			<div class="lp-fit-groups">
				<?php foreach ( $data['fit']['groups'] as $index => $group ) : ?>
					<article<?php echo 0 === $index ? ' class="is-primary"' : ''; ?>>
						<p class="lp-fit-number" aria-hidden="true">0<?php echo esc_html( $index + 1 ); ?></p>
						<h3><?php echo esc_html( $group[0] ); ?></h3>
						<ul><?php foreach ( $group[1] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
					</article>
				<?php endforeach; ?>
				<?php if ( ! empty( $data['fit']['note'] ) ) : ?><p class="lp-fit-note"><?php echo esc_html( $data['fit']['note'] ); ?></p><?php endif; ?>
				<a class="lp-button" href="#dang-ky"><?php echo esc_html( isset( $data['primary_cta'] ) ? $data['primary_cta'] : 'Đăng ký tư vấn' ); ?></a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['parents'] ) ) : ?>
	<section class="section lp-parents" id="phu-huynh">
		<div class="container">
			<div class="section-heading">
				<h2><?php echo esc_html( $data['parents']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['parents']['intro'] ); ?></p>
			</div>
			<ol class="lp-parents-list">
				<?php foreach ( $data['parents']['items'] as $item ) : ?>
					<li>
						<?php letco_fold_open( $item[0] ); ?>
							<p><?php echo esc_html( $item[1] ); ?></p>
							<a href="<?php echo esc_attr( $item[3] ); ?>"><?php echo esc_html( $item[2] ); ?></a>
						<?php letco_fold_close(); ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['payments'] ) ) : ?>
	<section class="section lp-payments" id="lich-dong-tien">
		<div class="container">
			<div class="section-heading">
				<h2><?php echo esc_html( $data['payments']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['payments']['intro'] ); ?></p>
			</div>
			<ul class="lp-payee-legend" aria-label="Đơn vị nhận tiền">
				<?php foreach ( $data['payments']['payees'] as $payee_key => $payee_label ) : ?><li class="is-<?php echo esc_attr( $payee_key ); ?>"><?php echo esc_html( $payee_label ); ?></li><?php endforeach; ?>
			</ul>
			<ol class="lp-paytrack">
				<?php foreach ( $data['payments']['stages'] as $index => $stage ) : ?>
					<li>
						<span class="lp-paytrack-step"><?php echo esc_html( $index + 1 ); ?></span>
						<p class="lp-paytrack-when"><?php echo esc_html( $stage['when'] ); ?></p>
						<h3><?php echo esc_html( $stage['title'] ); ?></h3>
						<ul>
							<?php foreach ( $stage['items'] as $pay ) : ?>
								<li class="is-<?php echo esc_attr( $pay[0] ); ?>"><span><?php echo esc_html( $pay[1] ); ?></span><strong><?php echo esc_html( $pay[2] ); ?></strong></li>
							<?php endforeach; ?>
						</ul>
					</li>
				<?php endforeach; ?>
			</ol>
			<p class="lp-block-note"><?php echo esc_html( $data['payments']['note'] ); ?></p>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['stats'] ) ) : ?>
	<section class="lp-stats" aria-label="Số liệu nổi bật">
		<div class="container">
			<dl class="lp-stats-list">
				<?php foreach ( $data['stats'] as $stat ) : ?>
					<div><dt data-countup><?php echo esc_html( $stat[0] ); ?></dt><dd><?php echo esc_html( $stat[1] ); ?></dd></div>
				<?php endforeach; ?>
			</dl>
		</div>
	</section>
	<?php elseif ( empty( $data['summary'] ) ) : ?>
	<section class="lp-facts" aria-label="Điểm nổi bật">
		<div class="container">
			<ul class="lp-facts-list">
				<li><strong><?php echo esc_html( $trust[0] ); ?></strong><span><?php echo esc_html( $trust[1] ); ?></span></li>
				<?php foreach ( array_slice( $data['highlights'], 0, 3 ) as $highlight ) : ?>
					<li><span><?php echo esc_html( $highlight ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['bridge'] ) ) : ?>
	<section class="section lp-bridge" id="cau-noi">
		<div class="container">
			<div class="section-heading">
				<h2><?php echo esc_html( $data['bridge']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['bridge']['intro'] ); ?></p>
			</div>
			<div class="lp-bridge-figure">
				<svg class="lp-bridge-arch" viewBox="0 0 1200 230" preserveAspectRatio="none" aria-hidden="true" focusable="false">
					<path class="lp-bridge-arch-b" d="M20 205 Q600 -105 1180 205" pathLength="1"/>
					<path class="lp-bridge-arch-a" d="M20 205 Q600 -165 1180 205" pathLength="1"/>
					<line class="lp-bridge-deck" x1="0" y1="205" x2="1200" y2="205"/>
				</svg>
				<ol class="lp-bridge-stops">
					<?php foreach ( $data['bridge']['stops'] as $stop ) : ?>
						<li>
							<span class="lp-bridge-dot" aria-hidden="true"></span>
							<small><?php echo esc_html( $stop[0] ); ?></small>
							<strong><?php echo esc_html( $stop[1] ); ?></strong>
							<p><?php echo esc_html( $stop[2] ); ?></p>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['overview'] ) ) : ?>
		<section class="section study-overview" id="tong-quan">
			<div class="container study-overview-layout">
				<div class="study-overview-copy">
					<span class="eyebrow">Tổng quan về trường</span>
					<h2><?php echo esc_html( $data['overview']['title'] ); ?></h2>
					<?php foreach ( $data['overview']['text'] as $paragraph ) : ?>
						<p><?php echo esc_html( $paragraph ); ?></p>
					<?php endforeach; ?>
				</div>
				<dl class="study-overview-facts">
					<?php foreach ( $data['overview']['facts'] as $fact ) : ?>
						<div><dt><?php echo esc_html( $fact['value'] ); ?></dt><dd><?php echo esc_html( $fact['label'] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
			</div>
		</section>
	<?php endif; ?>

	<section class="section study-benefits" id="loi-ich">
		<div class="container">
			<div class="section-heading section-heading-center">
				<span class="eyebrow"><?php echo esc_html( isset( $data['benefits_eyebrow'] ) ? $data['benefits_eyebrow'] : 'Vì sao chọn ' . $data['name'] ); ?></span>
				<h2><?php echo esc_html( isset( $data['benefits_title'] ) ? $data['benefits_title'] : 'Một hành trình học tập, nhiều giá trị dài hạn' ); ?></h2>
				<p><?php echo esc_html( isset( $data['benefits_intro'] ) ? $data['benefits_intro'] : 'Không chỉ là một tấm bằng, đây còn là cơ hội phát triển ngôn ngữ, kỹ năng và tư duy hội nhập.' ); ?></p>
				<p class="section-heading-action"><a class="lp-button" href="#dang-ky"><?php echo esc_html( isset( $data['primary_cta'] ) ? $data['primary_cta'] : 'Đăng ký tư vấn' ); ?></a></p>
			</div>
			<div class="study-benefit-grid<?php echo 4 === count( $data['benefits'] ) ? ' study-benefit-grid--four' : ''; ?>">
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

	<?php if ( ! empty( $data['companies'] ) ) : ?>
		<section class="section lp-companies" id="doanh-nghiep">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $data['companies']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['companies']['intro'] ); ?></p>
				</div>
				<dl class="lp-figures">
					<?php foreach ( $data['companies']['figures'] as $figure ) : ?>
						<div><dt><?php echo esc_html( $figure[0] ); ?></dt><dd><?php echo esc_html( $figure[1] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
				<?php if ( ! empty( $data['companies']['note'] ) ) : ?><p class="lp-note"><?php echo esc_html( $data['companies']['note'] ); ?></p><?php endif; ?>
				<?php if ( ! empty( $data['companies']['list_summary'] ) ) : ?><details class="lp-details lp-details--wide"><summary><?php echo esc_html( $data['companies']['list_summary'] ); ?></summary><?php endif; ?>
				<div class="lp-ledger-wrap lp-ledger-wrap--always">
					<table class="lp-ledger lp-ledger--list">
						<thead><tr><th scope="col">Doanh nghiệp</th><th scope="col">Địa điểm</th><th scope="col">Lĩnh vực</th></tr></thead>
						<tbody>
							<?php foreach ( $data['companies']['list'] as $company ) : ?>
								<tr><th scope="row"><?php echo esc_html( $company[0] ); ?></th><td data-label="Địa điểm"><?php echo esc_html( $company[1] ); ?></td><td data-label="Lĩnh vực"><?php echo esc_html( $company[2] ); ?></td></tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php if ( ! empty( $data['companies']['list_summary'] ) ) : ?></details><?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['cta_band'] ) ) : ?>
		<section class="lp-band" aria-label="Đăng ký tư vấn">
			<div class="container lp-band-inner">
				<div>
					<h2><?php echo esc_html( $data['cta_band']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['cta_band']['text'] ); ?></p>
				</div>
				<?php get_template_part( 'template-parts/quick', 'form', array( 'program' => 'Du học ' . $data['name'], 'button' => isset( $data['cta_band']['button'] ) ? $data['cta_band']['button'] : 'Đăng ký tư vấn', 'note' => '' ) ); ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['focus'] ) ) : ?>
		<section class="section lp-focus" id="chuong-trinh">
			<div class="container lp-focus-layout">
				<div class="lp-focus-main">
					<p class="lp-focus-tag"><?php echo esc_html( $data['focus']['tag'] ); ?></p>
					<h2><?php echo esc_html( $data['focus']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['focus']['intro'] ); ?></p>
					<dl class="lp-focus-facts">
						<?php foreach ( $data['focus']['facts'] as $fact ) : ?>
							<div><dt><?php echo esc_html( $fact[0] ); ?></dt><dd><?php echo esc_html( $fact[1] ); ?></dd></div>
						<?php endforeach; ?>
					</dl>
				</div>
				<div class="lp-focus-other">
					<h3><?php echo esc_html( $data['focus']['other_title'] ); ?></h3>
					<?php foreach ( $data['focus']['other'] as $option ) : ?>
						<details class="lp-details">
							<summary><?php echo esc_html( $option[0] ); ?></summary>
							<p><?php echo esc_html( $option[1] ); ?></p>
							<ul><?php foreach ( $option[2] as $line ) : ?><li><?php echo esc_html( $line ); ?></li><?php endforeach; ?></ul>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php elseif ( ! empty( $data['visas'] ) ) : ?>
		<section class="section study-program-section" id="chuong-trinh">
			<div class="container">
				<div class="section-heading section-heading-center">
					<span class="eyebrow">Chọn đúng hướng đi</span>
					<h2><?php echo esc_html( $data['visas_title'] ); ?></h2>
					<p><?php echo esc_html( $data['visas_intro'] ); ?></p>
				</div>
				<div class="lp-ledger-wrap<?php echo empty( $data['visas_pair'] ) ? '' : ' lp-ledger-wrap--pair'; ?>">
					<table class="lp-ledger<?php echo empty( $data['visas_pair'] ) ? '' : ' lp-ledger--pair'; ?>">
						<thead>
							<tr>
								<th scope="col"><span class="screen-reader-text">Tiêu chí</span></th>
								<?php foreach ( $data['visas'] as $visa ) : ?>
									<th scope="col"<?php echo empty( $visa['featured'] ) ? '' : ' class="is-featured"'; ?>><span><?php echo esc_html( $visa['tag'] ); ?></span><?php echo esc_html( $visa['title'] ); ?></th>
								<?php endforeach; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $data['visas'][0]['rows'] as $row_index => $row ) : ?>
								<tr>
									<th scope="row"><?php echo esc_html( $row[0] ); ?></th>
									<?php foreach ( $data['visas'] as $visa ) : ?>
										<td<?php echo empty( $visa['featured'] ) ? '' : ' class="is-featured"'; ?> data-label="<?php echo esc_attr( $visa['tag'] ); ?>"><?php echo esc_html( $visa['rows'][ $row_index ][1] ); ?></td>
									<?php endforeach; ?>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="study-visa-grid"<?php echo empty( $data['visas_pair'] ) ? '' : ' hidden'; ?>>
					<?php foreach ( $data['visas'] as $visa ) : ?>
						<article class="study-visa-card<?php echo empty( $visa['featured'] ) ? '' : ' is-featured'; ?>">
							<span class="study-program-tag"><?php echo esc_html( $visa['tag'] ); ?></span>
							<h3><?php echo esc_html( $visa['title'] ); ?></h3>
							<dl>
								<?php foreach ( $visa['rows'] as $row ) : ?>
									<div><dt><?php echo esc_html( $row[0] ); ?></dt><dd><?php echo esc_html( $row[1] ); ?></dd></div>
								<?php endforeach; ?>
							</dl>
						</article>
					<?php endforeach; ?>
				</div>
				<?php if ( ! empty( $data['visas_note'] ) ) : ?><p class="lp-block-note"><?php echo esc_html( $data['visas_note'] ); ?></p><?php endif; ?>
			</div>
		</section>
	<?php else : ?>
	<section class="section study-program-section" id="chuong-trinh">
		<div class="container">
			<div class="section-heading heading-row">
				<div><span class="eyebrow">Chọn đúng hướng đi</span><h2>Chương trình nổi bật</h2></div>
				<p><?php echo esc_html( isset( $data['programs_intro'] ) ? $data['programs_intro'] : 'Mỗi hồ sơ được đánh giá riêng để lựa chọn bậc học, trường và kỳ nhập học phù hợp.' ); ?></p>
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
	<?php endif; ?>

	<?php if ( ! empty( $data['regions'] ) ) : ?>
		<section class="section study-regions" id="truong">
			<div class="container">
				<div class="section-heading section-heading-center">
					<span class="eyebrow">Mạng lưới trường đối tác</span>
					<h2><?php echo esc_html( $data['regions_title'] ); ?></h2>
					<p><?php echo esc_html( $data['regions_intro'] ); ?></p>
				</div>
				<div class="study-region-grid">
					<?php foreach ( $data['regions'] as $region ) : ?>
						<article class="study-region">
							<h3><?php echo esc_html( $region['title'] ); ?></h3>
							<ul>
								<?php foreach ( $region['schools'] as $school ) : ?>
									<li<?php echo empty( $school['image'] ) ? '' : ' class="has-image"'; ?>>
										<?php if ( ! empty( $school['image'] ) ) : ?><img src="<?php echo letco_asset( $school['image'] ); ?>" alt="<?php echo esc_attr( $school['name'] ); ?>" loading="lazy"><?php endif; ?>
										<div>
										<strong><?php if ( ! empty( $school['url'] ) && in_array( $school['url'], $landing_urls, true ) ) : ?><a href="<?php echo esc_url( home_url( $school['url'] ) ); ?>"><?php echo esc_html( $school['name'] ); ?> <span aria-hidden="true">→</span></a><?php else : ?><?php echo esc_html( $school['name'] ); ?><?php endif; ?></strong>
										<p><?php echo esc_html( $school['text'] ); ?></p>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['majors'] ) ) : ?>
		<section class="section study-majors" id="nganh-hoc">
			<div class="container">
			<div class="section-heading section-heading-center">
				<span class="eyebrow">Ngành đào tạo mũi nhọn</span>
				<h2><?php echo esc_html( isset( $data['majors_title'] ) ? $data['majors_title'] : 'Chọn ngành theo định hướng việc làm' ); ?></h2>
				<?php if ( ! empty( $data['majors_intro'] ) ) : ?><p><?php echo esc_html( $data['majors_intro'] ); ?></p><?php endif; ?>
				</div>
				<?php if ( empty( $data['majors'][0]['duration'] ) ) : ?>
					<ul class="study-major-chips">
						<?php foreach ( $data['majors'] as $major ) : ?><li><?php echo esc_html( $major['name'] ); ?></li><?php endforeach; ?>
					</ul>
				<?php else : ?>
				<div class="study-major-table<?php echo empty( $data['majors'][0]['career'] ) ? ' study-major-table--compact' : ''; ?>" role="table" aria-label="Danh mục ngành đào tạo">
					<div class="study-major-row study-major-head" role="row">
					<span role="columnheader">Khoa / khối ngành</span><span role="columnheader"><?php echo esc_html( isset( $data['majors_duration_label'] ) ? $data['majors_duration_label'] : 'Thời gian' ); ?></span><span role="columnheader"><?php echo esc_html( isset( $data['majors_detail_label'] ) ? $data['majors_detail_label'] : 'Chuyên ngành chi tiết' ); ?></span><span role="columnheader"><?php echo esc_html( isset( $data['majors_career_label'] ) ? $data['majors_career_label'] : 'Định hướng việc làm' ); ?></span>
					</div>
					<?php foreach ( $data['majors'] as $major ) : ?>
						<div class="study-major-row" role="row">
							<strong role="cell"><?php echo esc_html( $major['name'] ); ?></strong>
							<span role="cell" class="study-major-duration"><?php echo esc_html( $major['duration'] ); ?></span>
							<p role="cell" data-label="Chuyên ngành"><?php echo esc_html( $major['detail'] ); ?></p>
							<?php if ( ! empty( $major['career'] ) ) : ?><p role="cell" data-label="Việc làm"><?php echo esc_html( $major['career'] ); ?></p><?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
				<?php if ( ! empty( $data['majors_note'] ) ) : ?><p class="lp-block-note"><?php echo esc_html( $data['majors_note'] ); ?></p><?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['budget'] ) ) : ?>
		<section class="section lp-budget" id="chi-phi">
			<div class="container">
				<div class="lp-budget-head">
					<div class="section-heading">
						<h2><?php echo esc_html( $data['budget']['title'] ); ?></h2>
						<p><?php echo esc_html( $data['budget']['intro'] ); ?></p>
					</div>
					<p class="lp-budget-total"><span><?php echo esc_html( $data['budget']['total_label'] ); ?></span><strong><?php echo esc_html( $data['budget']['total'] ); ?></strong><span class="lp-budget-lines"><?php foreach ( $data['budget']['groups'] as $group ) : ?><span><span><?php echo esc_html( $group['title'] ); ?></span><b><?php echo esc_html( $group['amount'] ); ?></b></span><?php endforeach; ?></span><small><?php echo esc_html( $data['budget']['total_note'] ); ?><?php if ( ! empty( $data['budget']['total_source'] ) ) : ?> <a href="<?php echo esc_url( $data['budget']['total_source'][1] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $data['budget']['total_source'][0] ); ?></a><?php endif; ?></small></p>
				</div>
				<div class="lp-budget-body">
					<div class="lp-budget-groups">
						<?php foreach ( $data['budget']['groups'] as $group ) : ?>
							<details class="lp-budget-group">
								<summary><span><?php echo esc_html( $group['title'] ); ?></span><strong><?php echo esc_html( $group['amount'] ); ?></strong></summary>
								<div class="lp-budget-group-panel">
									<ul>
										<?php foreach ( $group['rows'] as $row ) : ?>
											<li><span><?php echo esc_html( $row[0] ); ?><?php if ( ! empty( $row[2] ) ) : ?><small><?php echo esc_html( $row[2] ); ?></small><?php endif; ?></span><span><?php echo esc_html( $row[1] ); ?></span></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</details>
						<?php endforeach; ?>
					</div>
					<aside class="lp-budget-aside">
						<?php foreach ( $data['budget']['scope'] as $scope ) : ?>
							<h3><?php echo esc_html( $scope[0] ); ?></h3>
							<ul><?php foreach ( $scope[1] as $line ) : ?><li><?php echo esc_html( $line ); ?></li><?php endforeach; ?></ul>
						<?php endforeach; ?>
						<a class="lp-button lp-button--block" href="#dang-ky"><?php echo esc_html( $data['budget']['button'] ); ?></a>
					</aside>
				</div>
				<?php foreach ( $data['budget']['reference'] as $reference ) : ?>
					<details class="lp-details lp-details--wide">
						<summary><?php echo esc_html( $reference['title'] ); ?></summary>
						<?php if ( ! empty( $reference['intro'] ) ) : ?><p><?php echo esc_html( $reference['intro'] ); ?></p><?php endif; ?>
						<ul class="lp-ref-list">
							<?php foreach ( $reference['rows'] as $row ) : ?>
								<li><span><?php echo esc_html( $row[0] ); ?><?php if ( ! empty( $row[2] ) ) : ?><small><?php echo esc_html( $row[2] ); ?></small><?php endif; ?></span><span><?php echo esc_html( $row[1] ); ?></span></li>
							<?php endforeach; ?>
						</ul>
					</details>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['costs'] ) ) : ?>
		<section class="section study-costs" id="chi-phi">
			<div class="container">
				<div class="section-heading section-heading-center">
					<span class="eyebrow">Biểu phí & dự toán tài chính</span>
					<h2><?php echo esc_html( isset( $data['costs']['title'] ) ? $data['costs']['title'] : 'Học phí & học bổng tham khảo' ); ?></h2>
				</div>
				<div class="study-cost-layout<?php echo empty( $data['costs']['projection'] ) ? ' study-cost-layout--single' : ''; ?>">
					<article class="study-cost-card">
						<h3><?php echo esc_html( $data['costs']['items_title'] ); ?></h3>
						<ul>
							<?php foreach ( $data['costs']['items'] as $cost ) : ?>
								<li>
									<div><strong><?php echo esc_html( $cost['label'] ); ?></strong><?php if ( $cost['note'] ) : ?><small><?php echo esc_html( $cost['note'] ); ?></small><?php endif; ?></div>
									<span><?php echo esc_html( $cost['amount'] ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php if ( ! empty( $data['costs']['total'] ) ) : ?>
							<p class="study-cost-total"><span><?php echo esc_html( $data['costs']['total_label'] ); ?></span><strong><?php echo esc_html( $data['costs']['total'] ); ?></strong></p>
						<?php endif; ?>
					</article>
					<?php if ( ! empty( $data['costs']['projection'] ) ) : ?>
					<article class="study-cost-card study-cost-projection">
						<h3><?php echo esc_html( $data['costs']['projection_title'] ); ?></h3>
						<ul>
							<?php foreach ( $data['costs']['projection'] as $row ) : ?>
								<li><div><strong><?php echo esc_html( $row['label'] ); ?></strong><?php if ( ! empty( $row['note'] ) ) : ?><small><?php echo esc_html( $row['note'] ); ?></small><?php endif; ?></div><span><?php echo esc_html( $row['amount'] ); ?></span></li>
							<?php endforeach; ?>
						</ul>
						<?php if ( ! empty( $data['costs']['net'] ) ) : ?>
							<p class="study-cost-total"><span><?php echo esc_html( $data['costs']['net_label'] ); ?></span><strong><?php echo esc_html( $data['costs']['net'] ); ?></strong></p>
							<?php if ( ! empty( $data['costs']['net_note'] ) ) : ?><p class="study-cost-total-note"><?php echo esc_html( $data['costs']['net_note'] ); ?></p><?php endif; ?>
						<?php endif; ?>
					</article>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $data['costs']['tip'] ) ) : ?>
					<p class="study-cost-tip"><strong>Chiến lược tối ưu chi phí:</strong> <?php echo esc_html( $data['costs']['tip'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $data['costs']['notes'] ) ) : ?>
					<ul class="lp-cost-notes">
						<?php foreach ( $data['costs']['notes'] as $cost_note ) : ?>
							<li><strong><?php echo esc_html( $cost_note[0] ); ?></strong><?php echo esc_html( $cost_note[1] ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if ( ! empty( $data['costs']['note'] ) ) : ?>
					<p class="study-cost-note"><?php echo esc_html( $data['costs']['note'] ); ?></p>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['scholarships'] ) ) : ?>
		<section class="section study-benefits study-scholarships" id="hoc-bong">
			<div class="container">
				<div class="section-heading section-heading-center">
					<span class="eyebrow">Chính sách học bổng</span>
					<h2><?php echo esc_html( $data['scholarships_title'] ); ?></h2>
				</div>
				<?php if ( ! empty( $data['scholarships_compact'] ) ) : ?>
				<dl class="lp-deflist">
					<?php foreach ( $data['scholarships'] as $scholarship ) : ?>
						<div><dt><?php echo esc_html( $scholarship['title'] ); ?></dt><dd><?php echo esc_html( $scholarship['text'] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
				<?php else : ?>
				<div class="study-benefit-grid<?php echo 4 === count( $data['scholarships'] ) ? ' study-benefit-grid--four' : ''; ?>">
					<?php foreach ( $data['scholarships'] as $scholarship ) : ?>
						<article>
							<span class="study-icon"><?php echo esc_html( $scholarship['icon'] ); ?></span>
							<h3><?php echo esc_html( $scholarship['title'] ); ?></h3>
							<p><?php echo esc_html( $scholarship['text'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['conditions'] ) ) : ?>
	<section class="section study-conditions" id="dieu-kien">
		<div class="container study-split">
			<div class="study-split-copy">
				<span class="eyebrow eyebrow-light"><?php echo esc_html( isset( $data['conditions_eyebrow'] ) ? $data['conditions_eyebrow'] : 'Điều kiện tham khảo' ); ?></span>
				<h2><?php echo esc_html( isset( $data['conditions_title'] ) ? $data['conditions_title'] : 'Bạn đã sẵn sàng cho hành trình du học?' ); ?></h2>
				<p><?php echo esc_html( isset( $data['conditions_intro'] ) ? $data['conditions_intro'] : 'Điều kiện chính thức thay đổi theo trường, chương trình và từng thời điểm. LETCO sẽ kiểm tra hồ sơ trước khi đưa ra lộ trình.' ); ?></p>
				<?php if ( ! empty( $data['documents'] ) ) : ?>
					<?php if ( ! empty( $data['documents_collapsed'] ) ) : ?>
					<details class="study-documents study-documents--details">
						<summary>Hồ sơ cần chuẩn bị (<?php echo esc_html( count( $data['documents'] ) ); ?> mục)</summary>
						<ol>
							<?php foreach ( $data['documents'] as $document ) : ?><li><?php echo esc_html( $document ); ?></li><?php endforeach; ?>
						</ol>
					</details>
					<?php else : ?>
					<div class="study-documents">
						<h3>Hồ sơ cần chuẩn bị</h3>
						<ol>
							<?php foreach ( $data['documents'] as $document ) : ?><li><?php echo esc_html( $document ); ?></li><?php endforeach; ?>
						</ol>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<a class="lp-button lp-button--light" href="#dang-ky"><?php echo esc_html( isset( $data['conditions_button'] ) ? $data['conditions_button'] : 'Đăng ký tư vấn' ); ?></a>
			</div>
			<div class="study-condition-list">
				<?php foreach ( $data['conditions'] as $index => $condition ) : ?>
					<div><span>0<?php echo esc_html( $index + 1 ); ?></span><p><?php echo esc_html( $condition ); ?></p></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['responsibilities'] ) ) : ?>
	<section class="section lp-responsibilities" id="ho-tro">
		<div class="container">
			<div class="section-heading">
				<span class="eyebrow"><?php echo esc_html( $data['responsibilities']['eyebrow'] ); ?></span>
				<h2><?php echo esc_html( $data['responsibilities']['title'] ); ?></h2>
				<p><?php echo esc_html( $data['responsibilities']['intro'] ); ?></p>
			</div>
			<div class="lp-responsibility-grid">
				<?php foreach ( $data['responsibilities']['groups'] as $group ) : ?>
					<article>
						<?php letco_fold_open( $group[0] ); ?>
							<ul><?php foreach ( $group[1] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
						<?php letco_fold_close(); ?>
					</article>
				<?php endforeach; ?>
			</div>
			<?php if ( ! empty( $data['responsibilities']['note'] ) ) : ?><p class="lp-block-note"><?php echo esc_html( $data['responsibilities']['note'] ); ?></p><?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<section class="section study-roadmap" id="lo-trinh">
		<div class="container">
			<div class="section-heading section-heading-center">
				<span class="eyebrow">Quy trình đồng hành</span>
				<h2><?php echo esc_html( count( $steps ) ); ?> bước cùng LETCO</h2>
				<?php if ( ! empty( $data['steps_intro'] ) ) : ?><p><?php echo esc_html( $data['steps_intro'] ); ?></p><?php endif; ?>
			</div>
			<div class="study-timeline study-timeline--<?php echo esc_attr( count( $steps ) ); ?>">
				<?php foreach ( $steps as $index => $step ) : ?>
					<article><span><?php echo esc_html( $index + 1 ); ?></span><h3><?php echo esc_html( $step[0] ); ?></h3><p><?php echo esc_html( $step[1] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $data['organizer'] ) ) : ?>
		<section class="section lp-organizer" id="don-vi">
			<div class="container">
				<div class="lp-organizer-layout">
					<div class="lp-organizer-copy">
						<h2><?php echo esc_html( $data['organizer']['title'] ); ?></h2>
						<p><?php echo esc_html( $data['organizer']['intro'] ); ?></p>
						<dl>
							<?php foreach ( $data['organizer']['points'] as $point ) : ?>
								<div><dt><?php echo esc_html( $point[0] ); ?></dt><dd><?php echo esc_html( $point[1] ); ?></dd></div>
							<?php endforeach; ?>
						</dl>
						<?php if ( ! empty( $data['organizer']['source'] ) ) : ?><p class="lp-source">Nguồn: <a href="<?php echo esc_url( $data['organizer']['source'][1] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $data['organizer']['source'][0] ); ?></a></p><?php endif; ?>
					</div>
					<div class="lp-organizer-photos">
						<?php foreach ( $data['organizer']['photos'] as $photo ) : ?>
							<figure>
								<img src="<?php echo letco_asset( $photo[0] ); ?>" alt="<?php echo esc_attr( $photo[1] ); ?>" loading="lazy">
								<figcaption><?php echo esc_html( $photo[1] ); ?></figcaption>
							</figure>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['schedule'] ) ) : ?>
		<section class="section lp-schedule" id="tuyen-sinh">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $data['schedule']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['schedule']['intro'] ); ?></p>
				</div>
				<div class="lp-ledger-wrap lp-ledger-wrap--always">
					<table class="lp-ledger lp-ledger--list">
						<thead><tr><?php foreach ( $data['schedule']['head'] as $cell ) : ?><th scope="col"><?php echo esc_html( $cell ); ?></th><?php endforeach; ?></tr></thead>
						<tbody>
							<?php foreach ( $data['schedule']['rows'] as $row ) : ?>
								<tr><th scope="row"><?php echo esc_html( $row[0] ); ?></th><td data-label="<?php echo esc_attr( $data['schedule']['head'][1] ); ?>"><?php echo esc_html( $row[1] ); ?></td><td data-label="<?php echo esc_attr( $data['schedule']['head'][2] ); ?>"><?php echo esc_html( $row[2] ); ?></td></tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<ul class="lp-plain-list">
					<?php foreach ( $data['schedule']['notes'] as $note ) : ?><li><?php echo esc_html( $note ); ?></li><?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php foreach ( isset( $data['blocks'] ) ? $data['blocks'] : array() as $block_id => $block ) : ?>
		<section class="section lp-campus lp-block" id="<?php echo esc_attr( $block_id ); ?>">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $block['title'] ); ?></h2>
					<?php if ( ! empty( $block['intro'] ) ) : ?><p><?php echo esc_html( $block['intro'] ); ?></p><?php endif; ?>
				</div>
				<div class="lp-campus-grid lp-campus-grid--<?php echo esc_attr( count( $block['groups'] ) ); ?>">
					<?php foreach ( $block['groups'] as $group ) : ?>
						<div>
							<h3><?php echo esc_html( $group[0] ); ?></h3>
							<p><?php echo esc_html( $group[1] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
				<?php if ( ! empty( $block['note'] ) ) : ?><p class="lp-block-note"><?php echo esc_html( $block['note'] ); ?></p><?php endif; ?>
				<?php if ( ! empty( $block['button'] ) ) : ?><p class="lp-block-action"><a class="lp-button" href="#dang-ky"><?php echo esc_html( $block['button'] ); ?></a></p><?php endif; ?>
			</div>
		</section>
	<?php endforeach; ?>

	<?php if ( ! empty( $data['quotes'] ) ) : ?>
		<section class="section lp-quotes" id="cam-nhan">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $data['quotes']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['quotes']['intro'] ); ?></p>
				</div>
				<?php if ( empty( $data['quotes']['image'] ) ) : ?>
				<div class="lp-comment">
					<?php foreach ( $data['quotes']['list'] as $quote ) : ?>
						<blockquote><p><?php echo esc_html( $quote ); ?></p></blockquote>
					<?php endforeach; ?>
					<p class="lp-story-by"><?php echo esc_html( $data['quotes']['by'] ); ?></p>
					<?php if ( ! empty( $data['quotes']['note'] ) ) : ?><p class="lp-comment-note"><?php echo esc_html( $data['quotes']['note'] ); ?></p><?php endif; ?>
				</div>
				<?php else : ?>
				<div class="lp-story">
					<figure class="lp-story-media">
						<img src="<?php echo letco_asset( $data['quotes']['image'] ); ?>" alt="<?php echo esc_attr( $data['quotes']['caption'] ); ?>" loading="lazy">
						<figcaption><?php echo esc_html( $data['quotes']['caption'] ); ?></figcaption>
					</figure>
					<div class="lp-story-copy">
						<?php foreach ( $data['quotes']['list'] as $quote ) : ?>
							<blockquote><p><?php echo esc_html( $quote ); ?></p></blockquote>
						<?php endforeach; ?>
						<p class="lp-story-by"><?php echo esc_html( $data['quotes']['by'] ); ?></p>
						<?php if ( ! empty( $data['quotes']['results'] ) ) : ?>
						<dl class="lp-story-results">
							<?php foreach ( $data['quotes']['results'] as $result ) : ?>
								<div><dt><?php echo esc_html( $result[0] ); ?></dt><dd><?php echo esc_html( $result[1] ); ?></dd></div>
							<?php endforeach; ?>
						</dl>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['campus'] ) ) : ?>
		<section class="section lp-campus" id="khuon-vien">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $data['campus']['title'] ); ?></h2>
					<p><?php echo esc_html( $data['campus']['intro'] ); ?></p>
				</div>
				<?php if ( ! empty( $data['campus']['collapsed'] ) ) : ?>
					<?php foreach ( $data['campus']['groups'] as $group ) : ?>
						<details class="lp-details lp-details--wide"><summary><?php echo esc_html( $group[0] ); ?></summary><p><?php echo esc_html( $group[1] ); ?></p></details>
					<?php endforeach; ?>
				<?php else : ?>
				<div class="lp-campus-grid">
					<?php foreach ( $data['campus']['groups'] as $group ) : ?>
						<div>
							<h3><?php echo esc_html( $group[0] ); ?></h3>
							<p><?php echo esc_html( $group[1] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php foreach ( isset( $data['galleries'] ) ? $data['galleries'] : array() as $gallery_id => $gallery ) : ?>
		<section class="section lp-gallery<?php echo empty( $gallery['compact'] ) ? '' : ' lp-gallery--compact'; ?>" id="<?php echo esc_attr( $gallery_id ); ?>">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo esc_html( $gallery['title'] ); ?></h2>
					<p><?php echo esc_html( $gallery['intro'] ); ?></p>
					<?php if ( ! empty( $gallery['source'] ) ) : ?><p class="lp-source">Nguồn: <a href="<?php echo esc_url( $gallery['source'][1] ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $gallery['source'][0] ); ?></a></p><?php endif; ?>
				</div>
				<div class="<?php echo empty( $gallery['compact'] ) ? 'lp-mosaic lp-mosaic--' . esc_attr( count( $gallery['photos'] ) ) : 'lp-photo-pair'; ?>">
					<?php foreach ( $gallery['photos'] as $photo ) : ?>
						<figure>
							<img src="<?php echo letco_asset( $photo['image'] ); ?>" alt="<?php echo esc_attr( $photo['caption'] ); ?>" loading="lazy">
							<figcaption><?php echo esc_html( $photo['caption'] ); ?></figcaption>
						</figure>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endforeach; ?>

	<?php if ( ! empty( $data['work'] ) ) : ?>
		<section class="section study-conditions study-work" id="lam-them">
			<div class="container study-split">
				<div class="study-split-copy">
					<span class="eyebrow eyebrow-light"><?php echo esc_html( $data['work']['eyebrow'] ); ?></span>
					<h2><?php echo esc_html( $data['work']['title'] ); ?></h2>
					<ul class="study-work-rules">
						<?php foreach ( $data['work']['rules'] as $rule ) : ?>
							<li><strong><?php echo esc_html( $rule[0] ); ?></strong> <?php echo esc_html( $rule[1] ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php if ( ! empty( $data['work']['career'] ) ) : ?>
						<div class="study-documents">
							<h3><?php echo esc_html( $data['work']['career_title'] ); ?></h3>
							<p><?php echo esc_html( $data['work']['career'] ); ?></p>
						</div>
					<?php endif; ?>
				</div>
				<div class="study-condition-list">
					<?php foreach ( $data['work']['stages'] as $stage ) : ?>
						<div><span><?php echo esc_html( $stage[0] ); ?></span><p><?php echo esc_html( $stage[1] ); ?></p></div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $data['partners'] ) ) : ?>
	<section class="section study-partners" id="doi-tac">
		<div class="container study-partner-layout">
			<div class="study-partner-copy">
				<span class="eyebrow">Mạng lưới giáo dục</span>
				<h2><?php echo esc_html( isset( $data['partners_title'] ) ? $data['partners_title'] : 'Trường và chương trình đối tác' ); ?></h2>
				<p><?php echo esc_html( isset( $data['partners_intro'] ) ? $data['partners_intro'] : 'LETCO kết nối người học với các trường và chương trình phù hợp, ưu tiên chất lượng đào tạo, trải nghiệm thực tế và lộ trình phát triển sau tốt nghiệp.' ); ?></p>
				<div class="study-partner-count"><strong><?php echo esc_html( count( $data['partners'] ) ); ?></strong><span>lựa chọn trường & chương trình tiêu biểu</span></div>
			</div>
			<div class="content-carousel content-carousel--study-partners study-partner-carousel" data-content-carousel data-interval="3000">
				<div class="content-carousel-viewport" role="region" aria-label="Trường và chương trình đối tác">
					<div class="study-partner-list content-carousel-track" data-carousel-track>
						<?php foreach ( $data['partners'] as $partner ) : ?>
							<article>
								<div class="study-partner-image"><img src="<?php echo letco_asset( $partner['image'] ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>"><span class="study-partner-flag"><?php echo esc_html( $data['flag'] ); ?></span></div>
								<div class="study-partner-card-copy"><small><?php echo esc_html( $partner['type'] ); ?></small><strong><?php echo esc_html( $partner['name'] ); ?></strong><p><?php echo esc_html( $partner['text'] ); ?></p><?php if ( ! empty( $partner['url'] ) && in_array( $partner['url'], $landing_urls, true ) ) : ?><a class="study-partner-link" href="<?php echo esc_url( home_url( $partner['url'] ) ); ?>">Xem chương trình</a><?php endif; ?></div>
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
	<?php endif; ?>

	<?php if ( ! empty( $data['faq'] ) ) : ?>
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
	<?php endif; ?>

	<?php
	get_template_part(
		'template-parts/lead',
		'form',
		array(
			'lead'       => isset( $data['lead'] ) ? $data['lead'] : array(
				'title'   => 'Nhận lộ trình du học ' . $data['name'] . ' phù hợp với bạn',
				'intro'   => 'Để lại thông tin cơ bản. LETCO sẽ liên hệ để đánh giá hồ sơ, giải đáp chi phí và gợi ý kỳ nhập học phù hợp.',
				'bullets' => array( 'Kiểm tra hồ sơ ban đầu miễn phí', 'Thông tin rõ ràng, không cam kết quá mức', 'Bảo mật thông tin người đăng ký' ),
			),
			'contact'    => isset( $data['contact'] ) ? $data['contact'] : array(),
			'zalo'       => isset( $data['zalo'] ) ? $data['zalo'] : '',
			'contact_in_footer' => 'dai-hoc-daeduk' === $country,
			'compact'    => ! empty( $data['lead_compact'] ),
			'button'     => isset( $data['lead_button'] ) ? $data['lead_button'] : 'Gửi đăng ký',
			'lead_extra' => ! empty( $data['lead_extra'] ),
			'program'    => 'Du học ' . $data['name'],
			'major_choices' => ! empty( $data['majors'] ) ? wp_list_pluck( $data['majors'], 'name' ) : array(),
		)
	);
	?>
<?php
// Print the sections in the page's own order when it sets one; the rest keep
// their template order. Sections are never nested, so a flat match is safe.
$sections_html = ob_get_clean();
if ( ! empty( $data['order'] ) && preg_match_all( '/<section\b[^>]*>.*?<\/section>/s', $sections_html, $matches ) ) {
	$sections = array();
	foreach ( $matches[0] as $section_html ) {
		// Key by id, or by the first class for sections without one (hero, facts, band).
		if ( preg_match( '/^<section\b[^>]*\bid="([^"]+)"/', $section_html, $key ) || preg_match( '/^<section\b[^>]*\bclass="([\w-]+)/', $section_html, $key ) ) {
			$section_key = $key[1];
		} else {
			$section_key = 'section-' . count( $sections );
		}
		if ( ! empty( $data['omit_sections'] ) && in_array( $section_key, $data['omit_sections'], true ) ) {
			continue;
		}
		$sections[ $section_key ] = $section_html;
	}
	$ordered = array();
	foreach ( $data['order'] as $section_key ) {
		if ( isset( $sections[ $section_key ] ) ) {
			$ordered[] = $sections[ $section_key ];
			unset( $sections[ $section_key ] );
		}
	}
	$sections_html = implode( "\n\n", array_merge( $ordered, $sections ) );
}
echo $sections_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped where it was built.
?>

<?php if ( 'dai-hoc-daeduk' === $country ) : ?>
	<?php get_template_part( 'template-parts/consult', 'modal', array( 'data' => $data, 'lead_status' => $lead_status ) ); ?>
<?php endif; ?>
</div>
