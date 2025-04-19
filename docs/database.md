# Cấu trúc Database CMS

## Bảng quản lý người dùng
- **users** – Quản lý tài khoản người dùng
- **user_meta** – Lưu thông tin bổ sung của người dùng

## Bảng quản lý nội dung
- **posts** – Lưu trữ bài viết, trang, media
- **post_meta** – Metadata của bài viết
- **comments** – Bình luận của người dùng
- **comment_meta** – Metadata của bình luận

## Bảng quản lý chuyên mục, thẻ
- **terms** – Quản lý chuyên mục, thẻ (taxonomy)
- **term_taxonomy** – Xác định loại taxonomy
- **term_relationships** – Liên kết bài viết với taxonomy

## Bảng cấu hình hệ thống
- **options** – Lưu trữ các cấu hình hệ thống

## Bảng quản lý sản phẩm
- **products** – Lưu thông tin sản phẩm
- **product_meta** – Metadata của sản phẩm
- **product_variations** – Các biến thể sản phẩm
## Bảng đơn hàng & khách hàng
- **orders** – Thông tin đơn hàng
- **order_items** – Danh sách sản phẩm trong đơn hàng
- **order_item_meta** – Metadata của từng sản phẩm trong đơn hàng
- **customers** – Thông tin khách hàng
- **shipping_methods** – Các phương thức vận chuyển
- **payment_methods** – Các phương thức thanh toán

## Bảng tính năng nâng cao
- **audit_logs** – Theo dõi lịch sử thay đổi các bảng `posts`, `products`, `orders`  
  Lưu các thao tác như tạo, chỉnh sửa, xóa kèm thông tin người thực hiện và dữ liệu trước/sau.
- **notifications** – Gửi thông báo hệ thống khi có sự kiện như:  
  Đơn hàng mới, bình luận mới, trạng thái đơn thay đổi, cảnh báo quản trị, v.v.
- **user_sessions** – Ghi nhận phiên đăng nhập người dùng  
  Bao gồm IP, user-agent, thiết bị sử dụng, thời gian bắt đầu và kết thúc phiên.
- **coupons** – Quản lý mã giảm giá  
  Hỗ trợ theo chiến dịch (campaign), loại giảm giá (phần trăm / số tiền), điều kiện sử dụng, giới hạn số lần hoặc người dùng.
- **coupon_usages** – Ghi lại lịch sử sử dụng mã giảm giá  
  Gắn liền với `orders` và `users`, giúp kiểm soát hiệu quả và giới hạn lạm dụng.
- **media** – Hệ thống quản lý media dùng chung cho toàn CMS  
  Quản lý file ảnh, video, audio… kèm metadata như alt text, caption, file type, dung lượng, người upload.
- **media_relationships** – Liên kết media với các thực thể như `posts`, `products`  
  Hỗ trợ gán media theo vai trò: `featured`, `gallery`, `thumbnail`, `attachment`, v.v.

## Bảng hỗ trợ AI Content Generation
- **ai_requests** – Lưu yêu cầu tạo nội dung AI  
  Chứa: loại nội dung (post, product, meta, v.v.), prompt, người yêu cầu, model (GPT-4, Claude, v.v.), thời gian yêu cầu
- **ai_results** – Kết quả trả về từ AI  
  Chứa: nội dung thô, bản tóm tắt, độ dài, trạng thái (draft, reviewed, approved), điểm đánh giá
- **ai_logs** – Nhật ký truy vấn AI  
  Dùng để debug: lưu thông tin token, thời gian phản hồi, lỗi nếu có, ID truy vấn
- **ai_review_queue** – Hàng chờ duyệt nội dung AI  
  Gán cho người review, kèm feedback nếu cần chỉnh sửa hoặc reject
- **ai_versions** – Các phiên bản nội dung AI  
  Giúp so sánh bản gốc AI, bản chỉnh sửa và bản xuất bản
- **ai_templates** – Các mẫu prompt AI  
  Lưu các template chuẩn hóa prompt ví dụ như mô tả sản phẩm, viết đoạn mở đầu hấp dẫn, meta SEO, v.v.

## Tính năng của Database CMS này
- **Hỗ trợ user roles:** Phân quyền Admin, Editor, Author, Subscriber
- **Hệ thống metadata:** Linh hoạt mở rộng thông tin người dùng, bài viết
- **Taxonomy linh hoạt:** Dùng được cho chuyên mục, thẻ như WordPress
- **Bình luận có metadata:** Hỗ trợ mở rộng thông tin bình luận
- **Bảng options:** Lưu cấu hình hệ thống như site title, theme, plugin

## Tích hợp AI Content
- **ai_requests** – Lưu yêu cầu sinh nội dung AI
- **ai_results** – Kết quả phản hồi từ AI (bản thô, tóm tắt, trạng thái)
- **ai_logs** – Nhật ký truy vấn API AI (debug, theo dõi)
- **ai_review_queue** – Hàng chờ duyệt nội dung do AI tạo
- **ai_versions** – Các phiên bản khác nhau của nội dung AI
- **ai_templates** – Prompt mẫu cho từng loại nội dung (SEO, mô tả sản phẩm, v.v.)



