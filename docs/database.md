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

## Tính năng của Database CMS này
- **Hỗ trợ user roles:** Phân quyền Admin, Editor, Author, Subscriber
- **Hệ thống metadata:** Linh hoạt mở rộng thông tin người dùng, bài viết
- **Taxonomy linh hoạt:** Dùng được cho chuyên mục, thẻ như WordPress
- **Bình luận có metadata:** Hỗ trợ mở rộng thông tin bình luận
- **Bảng options:** Lưu cấu hình hệ thống như site title, theme, plugin