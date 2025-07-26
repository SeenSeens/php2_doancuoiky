<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> truongtuan829@gmail.com</li>
                            <li>Miễn phí vận chuyển cho tất cả đơn hàng từ $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="#"><i class="fa fa-user"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="<?= __WEB_ROOT__ ?>"><img src="<?= __WEB_ROOT__ . '/public/frontend/img/logo.png' ?>" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="<?= __WEB_ROOT__ ?>">Trang chủ</a></li>
                        <li><a href="<?= __WEB_ROOT__ . '/cua-hang' ?>">Cửa hàng</a></li>
                        <li><a href="<?= __WEB_ROOT__ . '/tin-tuc' ?>">Tin tức</a></li>
                        <li><a href="<?= __WEB_ROOT__ . '/lien-he' ?>">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="<?= __WEB_ROOT__ . '/gio-hang'?>"><i class="fa fa-shopping-bag"></i> <span id="cart-count">0</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span id="cart-total">$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->