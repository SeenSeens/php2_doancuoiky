<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?= __WEB_ROOT__ . '/public/admin/assets/images/logo-icon.png' ?>" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?= __WEB_ROOT__ . '/admin' ?>">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Trang quản trị</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-signpost"></i></div>
                <div class="menu-title">Bài viết</div>
            </a>
            <ul>
                <li><a href="<?= __WEB_ROOT__ . '/admin/posts' ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả bài viết</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/post-new' ?>"><i class="bx bx-right-arrow-alt"></i>Thêm bài viết</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/category' ?>"><i class="bx bx-right-arrow-alt"></i>Danh mục</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/post-tag' ?>"><i class="bx bx-right-arrow-alt"></i>Thẻ</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-signpost"></i></div>
                <div class="menu-title">Media</div>
            </a>
            <ul>
                <li><a href="<?= __WEB_ROOT__ . '/admin/upload' ?>"><i class="bx bx-right-arrow-alt"></i>Thư viện</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/media-new' ?>"><i class="bx bx-right-arrow-alt"></i>Thêm tệp tin mới</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-file-earmark"></i></div>
                <div class="menu-title">Trang</div>
            </a>
            <ul>
                <li><a href="<?= __WEB_ROOT__ . '/admin/page' ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả các trang</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/page-new' ?>"><i class="bx bx-right-arrow-alt"></i>Thêm trang mới</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= __WEB_ROOT__ . '/admin/comments' ?>">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Bình luận</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i></div>
                <div class="menu-title">WooCommerce</div>
            </a>
            <ul>
                <li><a href="<?= __WEB_ROOT__ . '/admin/wc-admin' ?>"><i class="bx bx-right-arrow-alt"></i>Tổng quan</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/wc-orders' ?>"><i class="bx bx-right-arrow-alt"></i>Đơn hàng</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/wc-customers' ?>"><i class="bx bx-right-arrow-alt"></i>Khách hàng</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/wc-coupon' ?>"><i class="bx bx-right-arrow-alt"></i>Mã ưu đãi</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/wc-reports' ?>"><i class="bx bx-right-arrow-alt"></i>Báo cáo</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/wc-settings' ?>"><i class="bx bx-right-arrow-alt"></i>Cài đặt</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/wc-status' ?>"><i class="bx bx-right-arrow-alt"></i>Trạng thái</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/wc-extensions' ?>"><i class="bx bx-right-arrow-alt"></i>Mở rộng</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i></div>
                <div class="menu-title">Sản phẩm</div>
            </a>
            <ul>
                <li><a href="<?= __WEB_ROOT__ . '/admin/product' ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả sản phẩm</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/product-new' ?>"><i class="bx bx-right-arrow-alt"></i>Thêm sản phẩm mới</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/product-brand' ?>"><i class="bx bx-right-arrow-alt"></i>Thương hiệu</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/product-cat' ?>"><i class="bx bx-right-arrow-alt"></i>Danh mục</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/product-tag' ?>"><i class="bx bx-right-arrow-alt"></i>Thẻ</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/product-attributes' ?>"><i class="bx bx-right-arrow-alt"></i>Các thuộc tính</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/product-reviews' ?>"><i class="bx bx-right-arrow-alt"></i>Đánh giá</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user-circle"></i></div>
                <div class="menu-title">Thành viên</div>
            </a>
            <ul>
                <li><a href="<?= __WEB_ROOT__ . '/admin/user' ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả người dùng</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/user/add-user' ?>"><i class="bx bx-right-arrow-alt"></i>Thêm người dùng mới</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/user/profile'?>"><i class="bx bx-right-arrow-alt"></i>Hồ sơ</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user-circle"></i></div>
                <div class="menu-title">Công cụ</div>
            </a>
            <ul>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Các công cụ có sẵn</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Nhập dữ liệu</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Xuất dữ liệu</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Tình trạng website</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Xuất dữ liệu cá nhân</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Xóa dữ liệu cá nhân</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user-circle"></i></div>
                <div class="menu-title">Cài đặt</div>
            </a>
            <ul>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Tổng quan</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Viết</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Đọc</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Bình luận</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Media</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Đường dẫn cố định</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Riêng tư</a></li>
                <li><a href="#"><i class="bx bx-right-arrow-alt"></i>Mục lục</a></li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>