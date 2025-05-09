<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?= __WEB_ROOT__ ?>/">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <title><?= (!empty($page_title)) ? $page_title : 'Đồ án cuối kỳ' ?></title>
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/css/elegant-icons.css' ?>">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/css/nice-select.css' ?>">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/css/jquery-ui.min.css' ?>">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/css/owl.carousel.min.css' ?>">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/css/slicknav.min.css' ?>">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/css/style.css' ?>">
    <script src="<?= __WEB_ROOT__ . '/public/js/jquery-3.3.1.min.js' ?>"></script>
    <script src="<?= __WEB_ROOT__ . '/public/js/angular.min.js' ?>"></script>
    <script src="<?= __WEB_ROOT__ . '/public/js/app.js' ?>"></script>
</head>
<body ng-app="App">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="<?= __WEB_ROOT__ . '/public/img/logo.png' ?>" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="<?= __WEB_ROOT__ . '/public/img/language.png' ?>" alt="">
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
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="<?= __WEB_ROOT__ ?>">Trang chủ</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/cua-hang' ?>">Cửa hàng</a></li>
                <li><a href="<?= __WEB_ROOT__ ?>">Blog</a></li>
                <li><a href="<?= __WEB_ROOT__ . '/lien-he' ?>">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> truongtuan829@gmail.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header" ng-controller="CartController">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> truongtuan829@gmail.com</li>
                                <li>Free Shipping for all Order of $99</li>
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
                                <img src="<?= __WEB_ROOT__ . '/public/img/language.png' ?>" alt="">
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
                        <a href="<?= __WEB_ROOT__ ?>"><img src="<?= __WEB_ROOT__ . '/public/img/logo.png' ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="<?= __WEB_ROOT__ ?>">Trang chủ</a></li>
                            <li><a href="<?= __WEB_ROOT__ . '/cua-hang' ?>">Cửa hàng</a></li>
                            <li><a href="<?= __WEB_ROOT__ ?>">Blog</a></li>
                            <li><a href="<?= __WEB_ROOT__ . '/lien-he' ?>">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart" ng-init="getTotalItems()">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                            <li><a href="<?= __WEB_ROOT__ . '/gio-hang' ?>"><i class="fa fa-shopping-bag"></i> <span>{{ getTotalItems() }}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>{{ getTotalItems() }}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->