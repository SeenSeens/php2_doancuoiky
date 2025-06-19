<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= (!empty( $this->data['sub_content']['page_title'] )) ? $this->data['sub_content']['page_title'] : '' ?></title>
    <!-- Google Web Fonts -->
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/css/bootstrap.min.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/css/font-awesome.min.css' ?>" type="text/css">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/css/elegant-icons.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/css/nice-select.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/css/jquery-ui.min.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/css/owl.carousel.min.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/css/slicknav.min.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/css/style.css'; ?>" type="text/css">
</head>
<body>
<?php $this->render('frontend/header'); ?>

<?php $this->render($content); ?>

<?php $this->render('frontend/footer'); ?>

<!-- Js Plugins -->
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/bootstrap.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/jquery.nice-select.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/jquery-ui.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/jquery.slicknav.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/mixitup.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/owl.carousel.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/main.js'; ?>"></script>
</body>
</html>