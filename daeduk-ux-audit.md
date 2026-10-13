# Audit UX & content — landing page Đại học Daeduk

Ngày audit: 12/10/2026  
Phạm vi: landing page Daeduk, cấu hình nội dung, template dùng chung, form tư vấn và bản static preview.

## 1. Trạng thái bằng chứng

### Đã có căn cứ trong dự án

- Chương trình, điều kiện, học phí, lịch tuyển sinh, thực tập, học bổng và chính sách hoàn khoản nộp cho trường đã có dữ liệu chi tiết trong `study-school-configs.php` và tài liệu `daeduk-landing-page.md`.
- Quan hệ hợp tác HaUI – Đại học Daeduk có ảnh thật, ngày, địa điểm và liên kết đến bài công bố trên website HaUI.
- Vai trò tuyển sinh của LETCO, địa chỉ, số điện thoại và thành tích có liên kết đến trang giới thiệu LETCO.
- Luồng form đang hoạt động: kiểm tra nonce, honeypot, bắt buộc họ tên/số điện thoại, lưu lead riêng tư trong WordPress và trả trạng thái thành công/lỗi.
- Static preview không giả vờ nhận lead: exporter thay form bằng nút gọi điện và Zalo.

Các dữ liệu trên được xem là “đã có căn cứ trong bộ tài liệu dự án”, không đồng nghĩa đã được đối soát độc lập với bản hợp đồng hoặc chính sách mới nhất của từng bên.

### Suy luận chiến lược, chưa phải kết quả nghiên cứu người dùng

- Người ra quyết định gồm học sinh và phụ huynh; phụ huynh ưu tiên Security/Control/Power, học sinh ưu tiên Vitality/Recognition/Belonging.
- Đối tượng chính đang ở giai đoạn so sánh chương trình và cần đủ căn cứ để quyết định có nên trao đổi với LETCO.
- CTA “Nhận tư vấn lộ trình phù hợp” có khả năng khớp nhu cầu hơn CTA chung “Đăng ký tư vấn”.
- Thứ tự phù hợp → học gì → hành trình → điều kiện → ngân sách → trách nhiệm được giả định là giảm tải nhận thức tốt hơn thứ tự cũ.

Chưa có analytics, heatmap, phỏng vấn hoặc dữ liệu lead để kết luận thay đổi sẽ tăng chuyển đổi.

### Cần đơn vị phụ trách xác nhận/bổ sung

- Bản gốc hoặc liên kết công khai của bảng phí K-Tech Bridge, danh sách doanh nghiệp tiếp nhận và mức trợ cấp thực tập.
- Cách tính trợ cấp, các khoản khấu trừ thuế/bảo hiểm, phí quản lý ký túc xá doanh nghiệp và điều kiện được bố trí tăng ca.
- Hợp đồng dịch vụ LETCO hiện hành: phạm vi dịch vụ, lịch thanh toán và điều khoản hoàn từng đợt.
- Văn bản phân định trách nhiệm giữa LETCO, Hoàng Phát ICI, Đại học Daeduk và doanh nghiệp tiếp nhận.
- Điều kiện chính xác để chuyển E-7-1/F-2/F-5 tại thời điểm tư vấn; không nên trình bày như kết quả mặc định.
- Ảnh thật tại lớp chuyên ngành, ký túc xá và doanh nghiệp ở Hàn Quốc; câu chuyện học viên Daeduk có danh tính và sự đồng ý sử dụng.
- SLA sau khi gửi form: ai gọi, qua kênh nào và trong bao lâu. Bản hiện tại chỉ hứa đúng phần chắc chắn: LETCO liên hệ để đối chiếu hồ sơ và gửi dự toán.
- Tỷ giá và các mốc tuyển sinh cần được cập nhật khi trang tiếp tục dùng sau kỳ tháng 3/2027.

## 2. Audit theo 4 nhóm câu hỏi

### Tôi đang nói với ai?

Điểm cần giữ: trang có dữ liệu phù hợp cho cả học sinh và phụ huynh, đặc biệt là ngành học, thực tập, chi phí và điều kiện.  
Điểm cần sửa trước thay đổi: lợi ích nghề nghiệp nổi quá sớm, trong khi điều kiện tham gia, ngân sách đầu kỳ và giới hạn thu nhập nằm xa hơn; phụ huynh phải tự ghép dữ liệu.  
Giải pháp: thêm checkpoint “phù hợp với ai” gồm một vế cho học sinh và một vế cho gia đình, không bắt người đọc chọn persona.

### Họ đang ở đâu trong quyết định?

Điểm cần giữ: trang đủ sâu cho người đang cân nhắc và có FAQ/form cho người sẵn sàng trao đổi.  
Điểm cần sửa trước thay đổi: thứ tự cũ đưa chi phí và CTA trước khi giải thích đầy đủ hành trình học–thực tập–tốt nghiệp; ngành học và năng lực ở khá xa phần đầu.  
Giải pháp: sắp xếp lại theo hành trình ra quyết định và đặt thông tin cốt lõi ngoài accordion.

### Muốn họ biết, nghĩ và làm gì?

- Biết: đây là hệ Cao đẳng D-2-1 2–3 năm; ai có thể tham gia; học gì; khi nào có thể thực tập; cần chuẩn bị bao nhiêu; ai chịu trách nhiệm việc gì.
- Nghĩ: cơ hội nghề nghiệp có điều kiện rõ, gia đình có thể kiểm tra được ngân sách và rủi ro trước khi cam kết.
- Làm: yêu cầu LETCO đối chiếu hồ sơ và lập lộ trình/dự toán theo trường hợp thật.

Điểm sửa chính: toàn bộ CTA trọng yếu của Daeduk dùng cùng nhãn “Nhận tư vấn lộ trình phù hợp”, và copy form nói rõ trải nghiệm sau khi gửi.

### Nên nói gì?

Thông điệp chốt: “Một lộ trình học nghề rõ ràng, từ lớp học đến doanh nghiệp.”  
Thông điệp được bảo vệ bằng bốn lớp thông tin gần nhau: đối tượng/điều kiện, nội dung học, hành trình có mốc thời gian, và giới hạn của thực tập/visa/việc làm.

## 3. Audit theo 8 vùng động cơ

| Động cơ | Trạng thái trước thay đổi | Cách xử lý |
|---|---|---|
| Power | Có bằng, thu nhập và visa nhưng dễ bị hiểu thành lời hứa | Gắn nghề nghiệp với năng lực học được; nhắc rõ việc làm và visa có điều kiện |
| Vitality | Có lộ trình và Daejeon nhưng nằm rời rạc | Đưa ngành học và hành trình lên trước chi phí |
| Enjoyment | Có tiện ích/campus, ít ảnh thật tại Hàn Quốc | Giữ nội dung ở mức phụ; ghi vào danh sách cần bổ sung ảnh thật |
| Conviviality | Chưa có bằng chứng đủ mạnh | Không tạo lời chứng/cộng đồng giả; chờ tư liệu có thể xác minh |
| Belonging | Có hỗ trợ sinh viên quốc tế, chưa rõ đầu mối | Thêm phần phân vai và đầu mối hỗ trợ |
| Security | Có hoàn phí, ký túc xá, hỗ trợ, nhưng phân tán | Đưa giới hạn cạnh lợi ích; làm rõ khoản hoàn/không hoàn và trách nhiệm |
| Control | Dữ liệu chi phí/điều kiện tốt | Đưa 4 thông tin chính lên đầu, giữ bảng dễ tra cứu, tách khoản chi và chứng minh tài chính |
| Recognition | Có học bổng/chứng chỉ nhưng thiếu câu chuyện thật | Giữ chính sách có dữ liệu; không thêm testimonial khi chưa có bằng chứng |

## 4. Brief đã chốt

- Đối tượng chính: học sinh tốt nghiệp THPT và phụ huynh đã quan tâm du học Hàn Quốc, đang so sánh Daeduk/K-Tech Bridge với lựa chọn khác.
- Thông điệp: lộ trình Cao đẳng thực hành có các mốc, điều kiện và trách nhiệm có thể kiểm tra.
- Chuyển đổi chính: “Nhận tư vấn lộ trình phù hợp”.
- Chuyển đổi phụ: xem chi phí và điều kiện, gọi/Zalo trong static preview.
- Thứ tự nội dung: hero → tóm tắt → mức độ phù hợp → hệ học → ngành/năng lực → hành trình → thực tập → điều kiện → kỳ tuyển sinh → ngân sách/hoàn phí → trách nhiệm → bằng chứng tổ chức → đời sống/hỏi đáp → form.
- Nguyên tắc: lợi ích phải đi cùng điều kiện; không bổ sung số liệu, đối tác, testimonial hoặc cam kết mới; không kết luận tăng chuyển đổi khi chưa đo.

## 5. Thay đổi đã triển khai

- Viết lại hero để giải thích ngay chương trình là gì, dành cho ai và điều kiện để bắt đầu thực tập.
- Đưa ba tín hiệu ra quyết định `D-2-1`, `2–3 năm` và `từ học kỳ 2` lên ngay hero; chuyển bốn thông tin cần biết thành cụm thẻ dễ quét ở đầu trang.
- Thêm section kiểm tra mức độ phù hợp cho cả học sinh và gia đình, dùng ảnh lớp học thật của LETCO.
- Mở rộng bảng ngành học thành “nội dung học” và “năng lực hướng tới”, kèm lưu ý đây không phải cam kết việc làm.
- Sắp xếp lại section theo hành trình cân nhắc; các khối chi phí, điều kiện và lịch tuyển sinh vẫn giữ cấu trúc tra cứu.
- Thêm section trách nhiệm của học sinh/gia đình, LETCO – HaUI, Daeduk/doanh nghiệp; ghi rõ phần văn bản còn cần bổ sung.
- Chuẩn hóa CTA Daeduk trên hero, header, các khối giữa trang, form và mobile bar.
- Rút gọn bốn section trùng lặp hoặc ít hỗ trợ quyết định (CTA giữa trang, lợi ích chung, khuôn viên và thành phố); giữ một form cuối trang bên cạnh form popup.
- Thêm popup tư vấn hai trường, xuất hiện sau 4,5 giây với focus trap, đóng bằng nền/nút/Escape và trạng thái thành công hoặc lỗi rõ ràng.
- Giữ nguyên action, nonce, field name và handler của form; không thay đổi luồng lưu lead.
- Bổ sung CSS responsive trong design system hiện có, không thêm thư viện hoặc ảnh tạo mới.

## 6. Kết quả kiểm tra kỹ thuật

- PHP lint: đạt cho config, template landing, header landing và footer.
- Render WordPress: URL local trực tiếp trả HTTP 200; 18 section nội dung và 1 dialog dùng thẻ section; 2 form (1 cuối trang, 1 popup); dùng đúng landing header và không có lỗi PHP.
- Desktop 1440×1000: không tràn ngang, một H1, không có ảnh thiếu `alt`.
- Mobile 390×844: không tràn ngang, nội dung một cột, bảng/khối quyết định chuyển layout đúng.
- Mobile CTA: hiển thị ở đầu hành trình và tự ẩn khi CTA hero hoặc form đi vào vùng nhìn, tránh hai CTA chồng lên nhau.
- Thứ tự DOM đã kiểm tra: phù hợp → hệ học → ngành → hành trình → doanh nghiệp → điều kiện → tuyển sinh → chi phí → trách nhiệm → FAQ → form.
- CTA: chỉ còn một nhãn CTA chính trên trang Daeduk.
- Form: field/action/nonce/handler giữ nguyên; static exporter vẫn thay form bằng số điện thoại và Zalo.

Kết quả trên chỉ xác nhận chất lượng triển khai kỹ thuật. Hiệu quả chuyển đổi cần đo bằng dữ liệu thật sau phát hành.
