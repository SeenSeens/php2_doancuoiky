<!-- Spinner Start -->
<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">303/41 Tân Sơn Nhì, Tân Phú, TP.HCM</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">truongtuan829@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Chính sách bảo mật</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Điều khoản sử dụng</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Bán hàng và hoàn tiền</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="<?= __WEB_ROOT__ ?>" class="navbar-brand"><h1 class="text-primary display-6">Fruitables</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="<?= __WEB_ROOT__ . '/' ?>" class="nav-item nav-link <?= $_SERVER['REQUEST_URI'] == '/php2_doancuoiky/' ? 'active' : '' ?>">Trang chủ</a>
                    <a href="<?= __WEB_ROOT__ . '/cua-hang' ?>" class="nav-item nav-link <?= $_SERVER['REQUEST_URI'] == '/php2_doancuoiky/cua-hang' ? 'active' : '' ?>">Cửa hàng</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Danh mục sản phẩm</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="<?= __WEB_ROOT__ . '/danh-muc'; ?>" class="dropdown-item">Danh mục sản phẩm</a>
                            <a href="<?= __WEB_ROOT__ . '/san-pham'; ?>" class="dropdown-item">Chi tiết sản phẩm</a>
                        </div>
                    </div>
                    <a href="<?= __WEB_ROOT__ . '/lien-he'?>" class="nav-item nav-link <?= $_SERVER['REQUEST_URI'] == '/php2_doancuoiky/lien-he' ? 'active' : '' ?>">Liên hệ</a>
                    <a href="<?= __WEB_ROOT__ . '/gio-hang'?>" class="nav-item nav-link <?= $_SERVER['REQUEST_URI'] == '/php2_doancuoiky/gio-hang' ? 'active' : '' ?>">Giỏ hàng</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                    <a href="<?= __WEB_ROOT__ . '/gio-hang'?>" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                    </a>
                    <a href="#" class="my-auto">
                        <i class="fas fa-user fa-2x"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
<?php $this->render('frontend/search'); ?>
<!-- Modal Search End -->