<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/simplebar/css/simplebar.css' ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css' ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/metismenu/css/metisMenu.min.css' ?>" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/css/pace.min.css' ?>" rel="stylesheet" />
    <script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/pace.min.js' ?>"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/css/app.css' ?>" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/css/icons.css' ?>" rel="stylesheet">
    <script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/jquery.min.js' ?>"></script>
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/notifications/css/lobibox.min.css'; ?>" />
    <title><?= $this->data['sub_content']['page_title']; ?></title>
</head>

<body class="bg-login">
<?php $this->render($content, $sub_content); ?>
<!-- Bootstrap JS -->
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/bootstrap.bundle.min.js' ?>"></script>
<!--plugins-->
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/simplebar/js/simplebar.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/metismenu/js/metisMenu.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js' ?>"></script>
<!--notification js -->
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/notifications/js/lobibox.min.js'; ?>"></script>
<!--app JS-->
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/app.js' ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php if (!empty($_SESSION['error'])) : ?>
        Lobibox.notify('error', {
            size: 'mini',
            rounded: true,
            delay: 3000,
            sound: false,
            title: 'Lỗi',
            msg: "<?php echo $_SESSION['error']; ?>"
        });
        <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])) : ?>
        Lobibox.notify('success', {
            size: 'mini',
            rounded: true,
            delay: 3000,
            sound: false,
            title: 'Thành công',
            msg: "<?php echo $_SESSION['success']; ?>"
        });
        <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
    });
</script>

</body>

</html>