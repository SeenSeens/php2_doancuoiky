<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?= __WEB_ROOT__ . '/public/admin/assets/images/logo-icon.png' ?>" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-signpost"></i></div>
                <div class="menu-title">Bài viết</div>
            </a>
            <ul>
                <li><a href="<?= __WEB_ROOT__ . '/admin/bai-viet' ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả bài viết</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/bai-viet/them-moi' ?>"><i class="bx bx-right-arrow-alt"></i>Thêm bài viết</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/chuyen-muc' ?>"><i class="bx bx-right-arrow-alt"></i>Chuyên mục</a></li>
<!--                <li> <a href="--><?php //= __WEB_ROOT__ . '/' ?><!--"><i class="bx bx-right-arrow-alt"></i>Thẻ</a></li>-->
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-file-earmark"></i></div>
                <div class="menu-title">Trang</div>
            </a>
            <ul>
                <li><a href="<?= __WEB_ROOT__ . '/admin/trang' ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả các trang</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/trang/them-moi' ?>"><i class="bx bx-right-arrow-alt"></i>Thêm trang mới</a></li>
            </ul>
        </li>
        <!--<li>
            <a href="<?php /*= __WEB_ROOT__ */?>">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Phản hồi</div>
            </a>
        </li>-->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i></div>
                <div class="menu-title">Sản phẩm</div>
            </a>
            <ul>
                <li><a href="<?= __WEB_ROOT__ . '/admin/san-pham' ?>"><i class="bx bx-right-arrow-alt"></i>Tất cả sản phẩm</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/admin/san-pham/them-moi' ?>"><i class="bx bx-right-arrow-alt"></i>Thêm mới</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/chuyen-muc-san-pham' ?>"><i class="bx bx-right-arrow-alt"></i>Danh mục</a></li>
                <li> <a href="<?= __WEB_ROOT__ . '/admin/don-hang' ?>"><i class="bx bx-right-arrow-alt"></i>Đơn hàng</a></li>
            </ul>
        </li>
        <!--<li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user-circle"></i></div>
                <div class="menu-title">Thành viên</div>
            </a>
            <ul>
                <li><a href="<?php /*= __WEB_ROOT__ */?>"><i class="bx bx-right-arrow-alt"></i>Tất cả người dùng</a></li>
                <li><a href="<?php /*= __WEB_ROOT__ */?>"><i class="bx bx-right-arrow-alt"></i>Thêm người dùng mới</a></li>
                <li> <a href="<?php /*= __WEB_ROOT__ */?>"><i class="bx bx-right-arrow-alt"></i>Hồ sơ</a></li>
            </ul>
        </li>-->
    </ul>
    <!--end navigation-->
</div>