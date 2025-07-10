<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--favicon-->
    <link rel="icon" href="<?= __WEB_ROOT__ . '/public/admin/images/favicon-32x32.png'; ?>" type="image/png" />
    <!--plugins-->
    <link href="<?= __WEB_ROOT__ . '/public/admin/plugins/simplebar/css/simplebar.css'; ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css'; ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/plugins/metismenu/css/metisMenu.min.css'; ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/plugins/select2/css/select2.min.css'; ?>" rel="stylesheet" />
    <link href="<?= __WEB_ROOT__ . '/public/admin/plugins/select2/css/select2-bootstrap4.css'; ?>" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= __WEB_ROOT__ . '/public/admin/css/pace.min.css' ?>" rel="stylesheet" />
    <script src="<?= __WEB_ROOT__ . '/public/admin/js/pace.min.js' ?>"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= __WEB_ROOT__ . '/public/admin/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="<?= __WEB_ROOT__ . '/public/admin/css/app.css' ?>" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ . '/public/admin/css/icons.css' ?>" rel="stylesheet">
    <!-- Theme Style CSS -->
    <script src="<?= __WEB_ROOT__ . '/public/admin/js/jquery-3.7.1.min.js' ?>"></script>
    <script src="<?= __WEB_ROOT__ . '/public/admin/js/angular.min.js' ?>"></script>
    <script src="<?= __WEB_ROOT__ . '/public/admin/plugins/notifications/js/lobibox.min.js'; ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?= __WEB_ROOT__ . '/public/admin/plugins/elFinder/css/elfinder.min.css' ?>">
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

<!-- Bootstrap JS -->
<script>
    const BASE_URL = '<?= __WEB_ROOT__ ?>';
</script>
<script src="<?= __WEB_ROOT__ . '/public/admin/js/bootstrap.bundle.min.js' ?>"></script>
<!--plugins-->
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/simplebar/js/simplebar.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/metismenu/js/metisMenu.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/tinymce/tinymce.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/js/tinymce-jquery.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/js/tinymce.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/js/axios.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/elFinder/js/elfinder.min.js' ?>"></script>

<!--notification js -->
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/notifications/js/lobibox.min.js' ?>"></script>
<!--app JS-->
<script src="<?= __WEB_ROOT__ . '/public/admin/js/app.js' ?>"></script>


<script>

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
<?php
require_once __DIR_ROOT__ . '/helper/FlashMessage.php';
FlashMessage::display();
?>
</body>
</html>
