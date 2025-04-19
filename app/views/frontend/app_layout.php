<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= (!empty( $this->data['sub_content']['page_title'] )) ? $this->data['sub_content']['page_title'] : '' ?></title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= __WEB_ROOT__ . '/public/frontend/assets/img/favicon.png'; ?>">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/assets/css/all.min.css'; ?>">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/assets/bootstrap/css/bootstrap.min.css'; ?>">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/assets/css/owl.carousel.css'; ?>">
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/assets/css/magnific-popup.css'; ?>">
    <!-- animate css -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/assets/css/animate.css'; ?>">
    <!-- mean menu css -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/assets/css/meanmenu.min.css'; ?>">
    <!-- main style -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/assets/css/main.css'; ?>">
    <!-- responsive -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/assets/css/responsive.css'; ?>">
</head>
<body>
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<?php $this->render('frontend/layout/header'); ?>
<!-- end header -->

<!-- search area -->
<?php $this->render('frontend/components/search_area'); ?>
<!-- end search area -->

<?php $this->render($content, $sub_content); ?>

<!-- footer -->
<?php $this->render('frontend/layout/footer'); ?>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
                    Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                </p>
            </div>
            <div class="col-lg-6 text-right col-md-12">
                <div class="social-icons">
                    <ul>
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end copyright -->
<!-- jquery -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/js/jquery-1.11.3.min.js'; ?>"></script>
<!-- bootstrap -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
<!-- count down -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/js/jquery.countdown.js'; ?>"></script>
<!-- isotope -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/js/jquery.isotope-3.0.6.min.js'; ?>"></script>
<!-- waypoints -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/js/waypoints.js';?>"></script>
<!-- owl carousel -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/js/owl.carousel.min.js'; ?>"></script>
<!-- magnific popup -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/js/jquery.magnific-popup.min.js'; ?>"></script>
<!-- mean menu -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/js/jquery.meanmenu.min.js'; ?>"></script>
<!-- sticker js -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/js/sticker.js'; ?>"></script>
<!-- main js -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/assets/js/main.js'; ?>"></script>
</body>
</html>