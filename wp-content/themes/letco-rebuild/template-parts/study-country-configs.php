<?php
/**
 * Content for the country landing pages (Du học Hàn Quốc, Du học Nhật Bản), keyed by
 * country. The study-abroad overview page reads the same data.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
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
			'partners'  => 'Du học LETCO – Đại học Công nghiệp Hà Nội (HaUI)',
			'phones'    => array( '0989.086.386' ),
			'addresses' => array( 'Tòa nhà A5, Số 298 Đường Cầu Diễn, Phường Tây Tựu, Quận Bắc Từ Liêm, Hà Nội' ),
			'website'   => 'https://duhoc-hanquoc.edu.vn/',
		),
		'lead_extra'         => true,

	),
	// Taiwan and Germany appear only on the overview page. Figures come from the sources
	// listed with each country (checked 23/10/2026); 'estimate' is the adviser's own cost range.
	'taiwan'  => array(
		'flag'         => '🇹🇼',
		'name'         => 'Đài Loan',
		'eyebrow'      => 'Hệ 1+4 · Đại học · Đi làm',
		'description'  => 'Gần Việt Nam, chi phí vừa phải. Học hệ 1+4, đại học, thạc sĩ hoặc sang làm việc.',
		'estimate'     => '75 – 165 triệu VNĐ',
		'programs'     => array(
			array(
				'tag'   => 'Hệ 1+4',
				'title' => 'Vừa học vừa làm / dự bị đại học',
				'facts' => array(
					array( 'Lộ trình', '1 năm học tiếng Hoa dự bị, sau đó 4 năm đại học' ),
					array( 'Học vấn', 'Tốt nghiệp THPT' ),
					array( 'Làm thêm', 'Theo quy định của trường, cần giấy phép lao động' ),
				),
			),
			array(
				'tag'   => 'Cử nhân',
				'title' => 'Du học đại học',
				'facts' => array(
					array( 'Mục tiêu', 'Bằng cử nhân, học bằng tiếng Hoa hoặc tiếng Anh' ),
					array( 'Ngoại ngữ', 'TOCFL (tiếng Hoa) hoặc IELTS/TOEFL (tiếng Anh)' ),
					array( 'Làm thêm', 'Tối đa 20 giờ/tuần, cần giấy phép' ),
				),
			),
			array(
				'tag'   => 'Sau đại học',
				'title' => 'Du học thạc sĩ',
				'facts' => array(
					array( 'Mục tiêu', 'Bằng thạc sĩ cho người đã tốt nghiệp đại học' ),
					array( 'Làm thêm', 'Thường cần thư đồng ý của giáo sư' ),
					array( 'Học bổng', 'Có thể xin Học bổng Đài Loan của Bộ Giáo dục' ),
				),
			),
			array(
				'tag'   => 'Đi làm',
				'title' => 'Làm việc tại Đài Loan',
				'facts' => array(
					array( 'Hình thức', 'Hợp đồng với nhà máy, công ty' ),
					array( 'Lương tối thiểu 2026', '29.500 NT$/tháng (~23 triệu VNĐ)' ),
					array( 'Giấy phép', 'Công ty xin giấy phép cho em' ),
				),
			),
		),
		'scholarships' => array(
			array( 'title' => 'Học bổng Hoa ngữ', 'text' => '28.000 NT$/tháng (~22 triệu VNĐ) khi học tiếng Hoa 2 tháng đến 1 năm.' ),
			array( 'title' => 'Học bổng Đài Loan', 'text' => 'Trợ cấp sinh hoạt và học phí cho cử nhân, thạc sĩ, tiến sĩ.' ),
			array( 'title' => 'Học bổng của trường', 'text' => 'Xét theo thành tích và ngoại ngữ.' ),
		),
		'work'         => array(
			'rules' => array(
				array( 'Giờ làm thêm', 'Tối đa 20 giờ/tuần, cần giấy phép làm việc.' ),
				array( 'Lương tối thiểu 2026', '196 NT$/giờ (~155.000 VNĐ).' ),
				array( 'Làm không phép', 'Bị phạt và buộc rời Đài Loan.' ),
				array( 'Sau tốt nghiệp', 'Được ở lại tìm việc theo hệ thống tính điểm.' ),
			),
		),
		'sources'      => array(
			array( 'Luật Dịch vụ Việc làm Đài Loan', 'https://law.moj.gov.tw/ENG/LawClass/LawAll.aspx?pcode=N0090001' ),
			array( 'Học bổng Hoa ngữ 2026 (MOE)', 'https://www.roc-taiwan.org/uploads/sites/424/2026/05/HES-EN-Directions.pdf' ),
			array( 'Study in Taiwan', 'https://www.studyintaiwan.org/how-to-apply/scholarship' ),
			array( 'Lương tối thiểu 2026', 'https://www.taiwannews.com.tw/news/6208495' ),
		),
	),
	'germany' => array(
		'flag'        => '🇩🇪',
		'name'        => 'Đức',
		'eyebrow'     => 'Du học nghề · Chuyển đổi bằng',
		'description' => 'Hai hướng: du học nghề có lương ngay khi học, hoặc dùng bằng đã có để sang làm việc.',
		'estimate'    => '165 – 265 triệu VNĐ',
		'programs'    => array(
			array(
				'tag'   => 'Du học nghề',
				'title' => 'Học nghề kép (Ausbildung)',
				'facts' => array(
					array( 'Mục tiêu', 'Học ở trường nghề, thực hành có lương' ),
					array( 'Lương đào tạo', 'Từ 724 €/tháng năm đầu (2026)' ),
					array( 'Sau tốt nghiệp', 'Chuyển sang visa lao động chuyên môn' ),
				),
			),
			array(
				'tag'   => 'Visa 18a / 18b',
				'title' => 'Chuyển đổi bằng',
				'facts' => array(
					array( 'Đối tượng', 'Đã có bằng nghề hoặc đại học' ),
					array( 'Điều kiện', 'Bằng được Đức công nhận, có hợp đồng đúng ngành' ),
					array( 'Về lâu dài', 'Xin định cư sau 3 năm làm việc' ),
				),
			),
		),
		'work'        => array(
			'rules' => array(
				array( 'Học nghề', 'Lương từ 724 €/tháng, làm thêm 20 giờ/tuần.' ),
				array( 'Lương tối thiểu 2026', '13,90 €/giờ (~414.000 VNĐ).' ),
				array( 'Học nghề xong', 'Chuyển visa lao động khi có việc đúng nghề.' ),
				array( 'Định cư', 'Sau 2 năm làm việc đúng nghề.' ),
			),
		),
		'sources'     => array(
			array( 'Luật Cư trú §16a, §18a, §18b, §18c', 'https://www.gesetze-im-internet.de/aufenthg_2004/__18a.html' ),
			array( 'Lương học nghề tối thiểu 2026 (BIBB)', 'https://www.bibb.de/de/pressemitteilung_212952.php' ),
			array( 'Đại sứ quán Đức tại Việt Nam', 'https://vietnam.diplo.de/' ),
		),
	),
);
