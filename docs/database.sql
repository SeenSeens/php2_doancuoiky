-- Bảng quản lý người dùng
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'editor', 'author', 'subscriber') NOT NULL DEFAULT 'subscriber',
    status ENUM ('active', 'inactive', 'banned') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_meta (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED UNIQUE NOT NULL,
    meta_key VARCHAR(255)  UNIQUE NOT NULL,
    meta_value TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Bảng quản lý nội dung
CREATE TABLE posts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    content LONGTEXT NOT NULL,
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

-- Bảng quản lý bình luận
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

-- Bảng quản lý SEO
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
    UNIQUE KEY `seo_unique` (object_id, object_type),
    FOREIGN KEY (object_id) REFERENCES posts(id) ON DELETE CASCADE
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

-- Bảng quản lý danh mục & thẻ
CREATE TABLE terms (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
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

-- Liên kết bài viết/sản phẩm với taxonomy
CREATE TABLE term_relationships (
    post_id BIGINT UNSIGNED NOT NULL,
    term_taxonomy_id BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (post_id, term_taxonomy_id),
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (term_taxonomy_id) REFERENCES term_taxonomy(id) ON DELETE CASCADE
);

-- Bảng cấu hình hệ thống
CREATE TABLE options (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    option_key VARCHAR(255) UNIQUE NOT NULL,
    option_value TEXT NOT NULL
);

-- Bảng quản lý sản phẩm
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

-- Metadata của sản phẩm
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
    variation_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2),
    stock BIGINT UNSIGNED DEFAULT 0,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Bảng đơn hàng & khách hàng
CREATE TABLE orders (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id BIGINT UNSIGNED NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'paid', 'failed', 'refunded') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Sản phẩm trong đơn hàng
CREATE TABLE order_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    quantity BIGINT  UNSIGNED NOT NULL DEFAULT 1,
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

CREATE TABLE customers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
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
