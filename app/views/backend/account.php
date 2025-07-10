<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?= __WEB_ROOT__ . '/public/admin/images/favicon-32x32.png' ?>" type="image/png" />
    <!--plugins-->
    <link href="<?= __WEB_ROOT__ . '/public/admin/plugins/simplebar/css/simplebar.css' ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css' ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/plugins/metismenu/css/metisMenu.min.css' ?>" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= __WEB_ROOT__ . '/public/admin/css/pace.min.css' ?>" rel="stylesheet" />
    <script src="<?= __WEB_ROOT__ . '/public/admin/js/pace.min.js' ?>"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= __WEB_ROOT__ . '/public/admin/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ . '/public/admin/css/app.css' ?>" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ . '/public/admin/css/icons.css' ?>" rel="stylesheet">
    <script src="<?= __WEB_ROOT__ . '/public/admin/js/jquery.min.js' ?>"></script>
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/admin/plugins/notifications/css/lobibox.min.css'; ?>" />
    <title><?= $this->data['sub_content']['page_title']; ?></title>
</head>

<body class="bg-login">
<?php $this->render($content, $sub_content); ?>
<!-- Bootstrap JS -->
<script src="<?= __WEB_ROOT__ . '/public/admin/js/bootstrap.bundle.min.js' ?>"></script>
<!--plugins-->
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/simplebar/js/simplebar.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/metismenu/js/metisMenu.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js' ?>"></script>
<!--notification js -->
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/notifications/js/lobibox.min.js'; ?>"></script>
<!--app JS-->
<script src="<?= __WEB_ROOT__ . '/public/admin/js/app.js' ?>"></script>

<?php
require_once __DIR_ROOT__ . '/helper/FlashMessage.php';
FlashMessage::display();
?>
</body>

</html>