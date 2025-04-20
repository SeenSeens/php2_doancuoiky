<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--favicon-->
    <link rel="icon" href="<?= __WEB_ROOT__ . '/public/admin/assets/images/favicon-32x32.png'; ?>" type="image/png" />
    <!--plugins-->
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/simplebar/css/simplebar.css'; ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css'; ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/metismenu/css/metisMenu.min.css'; ?>" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/css/pace.min.css' ?>" rel="stylesheet" />
    <script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/pace.min.js' ?>"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/css/app.css' ?>" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ . '/public/admin/assets/css/icons.css' ?>" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/admin/assets/css/dark-theme.css' ?>" />
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/admin/assets/css/semi-dark.css' ?>" />
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/admin/assets/css/header-colors.css' ?>" />
    <script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/jquery.min.js' ?>"></script>
    <script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/angular.min.js' ?>"></script>
    <script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/notifications/js/lobibox.min.js'; ?>"></script>
    <title><?= $this->data['sub_content']['page_title']; ?></title>
</head>
<body>
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <?php $this->render('backend/layout/sidebar_wrapper') ?>
    <!--end sidebar wrapper -->
    <!--start header -->
    <?php $this->render('backend/layout/header') ?>
    <!--end header -->
    <!--start page wrapper -->
     <div class="page-wrapper">
        <div class="page-content">
            <?php $this->render($content, $sub_content); ?>
        </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © <?= date('Y') ?>. All right reserved.</p>
    </footer>
</div>
<!--end wrapper-->
<!--start switcher-->
<?php $this->render('backend/layout/switcher') ?>
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/bootstrap.bundle.min.js' ?>"></script>
<!--plugins-->
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/simplebar/js/simplebar.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/metismenu/js/metisMenu.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/tinymce/tinymce.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/tinymce-jquery.min.js' ?>"></script>
<!--app JS-->
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/tinymce.js' ?>"></script>
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

    function ChangeToSlug(text) {
        let slug = text.toLowerCase();

        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');

        slug = slug.replace(/[^a-z0-9\s-]/g, '');      // Xóa ký tự đặc biệt
        slug = slug.trim().replace(/\s+/g, '-');       // Đổi khoảng trắng thành dấu gạch ngang
        slug = slug.replace(/-+/g, '-');               // Gộp dấu gạch ngang

        return slug;
    }

    document.getElementById('title').addEventListener('input', function () {
        const title = this.value;
        const slug = ChangeToSlug(title);
        document.getElementById('slug').value = slug;
    });


</script>
</body>
</html>