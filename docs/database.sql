/*Bảng quản lý người dùng*/
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'editor', 'author', 'subscriber') NOT NULL DEFAULT 'subscriber',
    status ENUM ('active', 'inactive', 'banned') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE user_meta (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED UNIQUE NOT NULL,
    meta_key VARCHAR(255)  UNIQUE NOT NULL,
    meta_value TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

/*Bảng quản lý nội dung*/
CREATE TABLE posts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    content LONGTEXT NOT NULL,
    excerpt TEXT NULL,
    status ENUM('publish', 'draft', 'pending', 'private', 'trash') NOT NULL DEFAULT 'draft',
    type ENUM('post', 'page', 'attachment') NOT NULL DEFAULT 'post',
    author_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE post_meta (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id BIGINT UNSIGNED NOT NULL,
    meta_key VARCHAR(255) NOT NULL,
    meta_value TEXT,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

/*Bảng quản lý sản phẩm*/
CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description LONGTEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock BIGINT UNSIGNED DEFAULT 0,
    status ENUM('in_stock', 'out_of_stock', 'pre_order') DEFAULT 'in_stock',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE product_images (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT UNSIGNED NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    position INT UNSIGNED DEFAULT 0,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

/*Metadata của sản phẩm*/
CREATE TABLE product_meta (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT UNSIGNED NOT NULL,
    meta_key VARCHAR(255) NOT NULL,
    meta_value TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE product_variations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT UNSIGNED NOT NULL,
    sku VARCHAR(100) UNIQUE,  -- 👈 SKU riêng biệt
    variation_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2),
    stock BIGINT UNSIGNED DEFAULT 0,
    attributes JSON,  -- Ví dụ: { "color": "red", "size": "M" }
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

/*Bảng quản lý bình luận*/
CREATE TABLE comments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id BIGINT UNSIGNED NOT NULL,
    user_id BIGINT UNSIGNED DEFAULT NULL,
    author_name VARCHAR(255),
    author_email VARCHAR(255),
    content TEXT NOT NULL,
    status ENUM('approved', 'pending', 'spam', 'trash') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE comment_meta (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    comment_id BIGINT UNSIGNED NOT NULL,
    meta_key VARCHAR(255) NOT NULL,
    meta_value TEXT,
    FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE
);

/*Bảng quản lý SEO*/
CREATE TABLE seo_meta (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    object_id BIGINT UNSIGNED NOT NULL,  -- ID của bài viết, sản phẩm, taxonomy
    object_type ENUM('post', 'product', 'term') NOT NULL, -- Loại đối tượng
    meta_title VARCHAR(255) NULL, -- Tiêu đề SEO
    meta_description TEXT NULL, -- Mô tả SEO
    meta_keywords TEXT NULL, -- Từ khóa SEO
    meta_robots ENUM('index, follow', 'noindex, nofollow') DEFAULT 'index, follow', -- Hướng dẫn index
    canonical_url VARCHAR(255) NULL, -- URL chính tắc
    og_title VARCHAR(255) NULL, -- Open Graph Title
    og_description TEXT NULL, -- Open Graph Description
    og_image VARCHAR(255) NULL, -- Open Graph Image
    twitter_title VARCHAR(255) NULL, -- Twitter Card Title
    twitter_description TEXT NULL, -- Twitter Card Description
    twitter_image VARCHAR(255) NULL, -- Twitter Card Image
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY `seo_unique` (object_id, object_type)
);

CREATE TABLE redirects (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    old_url VARCHAR(255) NOT NULL UNIQUE,
    new_url VARCHAR(255) NOT NULL,
    type ENUM('301', '302') DEFAULT '301',
    status ENUM('active', 'inactive') DEFAULT 'active'
);

CREATE TABLE sitemaps (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255) NOT NULL UNIQUE,
    priority DECIMAL(2,1) DEFAULT 0.5,
    change_frequency ENUM('always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never') DEFAULT 'weekly',
    last_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE sitemap_entries (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255) NOT NULL,
    changefreq ENUM('always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never') DEFAULT 'weekly',
    priority DECIMAL(2,1) DEFAULT 0.5,
    lastmod TIMESTAMP,  -- 👈 Ngày cập nhật cuối
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/*Bảng quản lý danh mục & thẻ*/
CREATE TABLE terms (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    description TEXT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE term_taxonomy (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    term_id BIGINT UNSIGNED NOT NULL,
    taxonomy ENUM('category', 'tag', 'product_cat', 'product_tag', 'product_brand') NOT NULL,
    parent BIGINT UNSIGNED DEFAULT NULL,
    count BIGINT UNSIGNED NOT NULL DEFAULT 0,
    FOREIGN KEY (term_id) REFERENCES terms(id) ON DELETE CASCADE,
    FOREIGN KEY (parent) REFERENCES term_taxonomy(id) ON DELETE SET NULL
);

/*Liên kết bài viết taxonomy*/
CREATE TABLE post_term_relationships (
    object_id BIGINT UNSIGNED NOT NULL,
    term_taxonomy_id BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (object_id, term_taxonomy_id),
    FOREIGN KEY (object_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (term_taxonomy_id) REFERENCES term_taxonomy(id) ON DELETE CASCADE
);

/*Liên kết sản phẩm taxonomy*/
CREATE TABLE product_term_relationships (
    object_id BIGINT UNSIGNED NOT NULL,
    term_taxonomy_id BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (object_id, term_taxonomy_id),
    FOREIGN KEY (object_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (term_taxonomy_id) REFERENCES term_taxonomy(id) ON DELETE CASCADE
);

/*Bảng cấu hình hệ thống*/
CREATE TABLE options (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    option_key VARCHAR(255) UNIQUE NOT NULL,
    option_value TEXT NOT NULL
);

CREATE TABLE customers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

/*Bảng đơn hàng & khách hàng*/
CREATE TABLE orders (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NULL,  -- nếu có user đã login
    customer_id BIGINT UNSIGNED NULL, -- nếu là khách vãng lai
    total DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'paid', 'failed', 'refunded') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);

/*Sản phẩm trong đơn hàng*/
CREATE TABLE order_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    quantity BIGINT UNSIGNED NOT NULL DEFAULT 1,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE order_item_meta (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_item_id BIGINT UNSIGNED NOT NULL,
    meta_key VARCHAR(255) NOT NULL,
    meta_value TEXT,
    FOREIGN KEY (order_item_id) REFERENCES order_items(id) ON DELETE CASCADE
);

CREATE TABLE order_status_history (
      id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      order_id BIGINT UNSIGNED NOT NULL,
      status ENUM('pending', 'processing', 'completed', 'cancelled') NOT NULL,
      changed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      changed_by BIGINT UNSIGNED NULL, -- Người thay đổi trạng thái (admin hoặc hệ thống)
      FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
      FOREIGN KEY (changed_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE shipping_methods (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    cost DECIMAL(10,2) NOT NULL
);

CREATE TABLE payment_methods (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    details TEXT
);

/*Audit Log – theo dõi thay đổi của bảng posts, products, orders*/
CREATE TABLE audit_logs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    object_id BIGINT UNSIGNED NOT NULL,
    object_type ENUM('post', 'product', 'order') NOT NULL,
    action ENUM('create', 'update', 'delete') NOT NULL,
    changed_by BIGINT UNSIGNED, -- NULL nếu hệ thống tự động
    changes JSON, -- ghi nhận diff hoặc trạng thái cũ
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (changed_by) REFERENCES users(id) ON DELETE SET NULL
);

/*Notification System – gửi thông báo khi có sự kiện (đơn mới, bình luận, v.v.)*/
CREATE TABLE notifications (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL, -- người nhận
    type ENUM('order', 'comment', 'system') NOT NULL,
    content TEXT NOT NULL,
    icon VARCHAR(100),  -- 👈 e.g. 'order', 'comment', 'warning'
    action_url VARCHAR(255),  -- 👈 link đi kèm
    related_type VARCHAR(50),  -- 👈 e.g. 'order', 'comment'
    related_id BIGINT,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

/*Activity Log / Session Table – theo dõi đăng nhập, IP, thiết bị*/
CREATE TABLE user_sessions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    ip_address VARCHAR(45),
    user_agent TEXT,
    session_token VARCHAR(255) NOT NULL UNIQUE,
    is_active BOOLEAN DEFAULT TRUE,
    expired_at DATETIME,
    login_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    logout_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

/*Coupon / Discount Table – mã giảm giá, phân loại theo campaign*/
CREATE TABLE coupons (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE NOT NULL,
    discount_type ENUM('percent', 'fixed') DEFAULT 'fixed',
    discount_value DECIMAL(10,2),
    campaign VARCHAR(100),
    usage_limit INT DEFAULT NULL,
    usage_count INT DEFAULT 0,
    minimum_order_amount DECIMAL(10,2),
    start_date DATETIME,
    end_date DATETIME,
    is_active BOOLEAN DEFAULT TRUE,
    status ENUM('active', 'inactive') DEFAULT 'active',
    campaign_name VARCHAR(100),  -- tên chiến dịch nếu có
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

/*coupon_usages – theo dõi lượt sử dụng*/
CREATE TABLE coupon_usages (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    coupon_id BIGINT UNSIGNED NOT NULL,
    order_id BIGINT UNSIGNED NOT NULL,
    user_id BIGINT UNSIGNED,
    used_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (coupon_id) REFERENCES coupons(id) ON DELETE CASCADE,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

/*media – quản lý file media (ảnh, video, audio, tài liệu…)*/
CREATE TABLE media (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    slug VARCHAR(255) UNIQUE,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    file_type VARCHAR(100),  -- image/jpeg, video/mp4, application/pdf, v.v.
    mime_type VARCHAR(100),
    extension VARCHAR(20),
    size BIGINT UNSIGNED,  -- tính theo byte
    width INT UNSIGNED,  -- chỉ áp dụng cho ảnh/video
    height INT UNSIGNED,
    alt_text VARCHAR(255),
    description TEXT,
    uploaded_by BIGINT UNSIGNED,  -- user_id
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE SET NULL
);

/*media_metadata – lưu metadata dạng key-value (EXIF, custom tags, v.v.)*/
CREATE TABLE media_metadata (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    media_id BIGINT UNSIGNED NOT NULL,
    meta_key VARCHAR(100),
    meta_value TEXT,
    FOREIGN KEY (media_id) REFERENCES media(id) ON DELETE CASCADE
);

/*media_relationships – liên kết media với post/product/order/etc*/
CREATE TABLE media_relationships (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    media_id BIGINT UNSIGNED NOT NULL,
    object_id BIGINT UNSIGNED NOT NULL,
    object_type ENUM('post', 'product', 'page') NOT NULL,
    relation_type ENUM('featured', 'gallery', 'thumbnail') DEFAULT 'gallery',
    FOREIGN KEY (media_id) REFERENCES media(id) ON DELETE CASCADE
);

/*Media Library Table*/
CREATE TABLE media_library (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(255) NOT NULL,
    file_type ENUM('image', 'audio', 'video', 'document', 'other') NOT NULL,
    file_size BIGINT UNSIGNED NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    uploaded_by BIGINT UNSIGNED,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE SET NULL
);
/*Yêu cầu tạo nội dung AI*/
CREATE TABLE ai_requests (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    content_type VARCHAR(50), -- post, product, etc.
    target_id BIGINT, -- ID của bài viết/sản phẩm
    prompt TEXT,
    model VARCHAR(100), -- GPT-4, Claude, v.v.
    status VARCHAR(20) DEFAULT 'pending', -- pending, processing, done, failed
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

/*Kết quả phản hồi từ AI*/
CREATE TABLE ai_results (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    request_id BIGINT UNSIGNED,
    raw_content LONGTEXT,
    summary TEXT,
    status VARCHAR(20) DEFAULT 'draft', -- draft, reviewed, approved
    word_count BIGINT,
    score DECIMAL(5,2), -- đánh giá chất lượng nếu có
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (request_id) REFERENCES ai_requests(id)
);

/*Log truy vấn AI*/
CREATE TABLE ai_logs (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    request_id BIGINT UNSIGNED,
    prompt TEXT,
    response_time_ms BIGINT,
    token_usage BIGINT,
    error_message TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (request_id) REFERENCES ai_requests(id)
);

/*Hàng chờ duyệt nội dung do AI sinh*/
CREATE TABLE ai_review_queue (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    result_id BIGINT UNSIGNED,
    reviewer_id BIGINT UNSIGNED,
    review_status VARCHAR(20) DEFAULT 'pending', -- pending, approved, rejected
    feedback TEXT,
    reviewed_at DATETIME,
    FOREIGN KEY (result_id) REFERENCES ai_results(id),
    FOREIGN KEY (reviewer_id) REFERENCES users(id)
);

/*Các phiên bản nội dung do AI tạo*/
CREATE TABLE ai_versions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    result_id BIGINT UNSIGNED,
    version_number BIGINT,
    content LONGTEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (result_id) REFERENCES ai_results(id)
);

/*Mẫu prompt AI*/
CREATE TABLE ai_templates (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    content_type VARCHAR(50),
    template TEXT,
    description TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO terms (name, slug, description)
VALUES ('Chưa phân loại', 'chua-phan-loai', 'Danh mục mặc định cho các bài viết chưa phân loại');

-- Liên kết "Chưa phân loại" với 'category'
INSERT INTO term_taxonomy (term_id, taxonomy)
VALUES
    ((SELECT id FROM terms WHERE slug = 'chua-phan-loai'), 'category');

-- Liên kết "Chưa phân loại" với 'product_cat'
INSERT INTO term_taxonomy (term_id, taxonomy)
VALUES
    ((SELECT id FROM terms WHERE slug = 'chua-phan-loai'), 'product_cat');

