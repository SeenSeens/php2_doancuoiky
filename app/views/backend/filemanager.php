<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->data['sub_content']['page_title']; ?></title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?= __WEB_ROOT__ . '/public/admin/plugins/elFinder/css/elfinder.min.css' ?>">
    <script src="<?= __WEB_ROOT__ . '/public/admin/plugins/tinymce/tinymce.min.js' ?>"></script>
    <script src="<?= __WEB_ROOT__ . '/public/admin/js/tinymce-jquery.min.js' ?>"></script>
    <script src="<?= __WEB_ROOT__ . '/public/admin/js/tinymce.js' ?>"></script>
    <script src="<?= __WEB_ROOT__ . '/public/admin/plugins/elFinder/js/elfinder.min.js' ?>"></script>

</head>
<body>
<div id="elfinder"></div>

<script>
    const BASE_URL = '<?= __WEB_ROOT__ ?>';
    document.addEventListener("DOMContentLoaded", function () {
        $('#elfinder').elfinder({
            // ✅ Đảm bảo đây là endpoint PHP chạy connector
            url: BASE_URL + '/elfinder',
            getFileCallback: function (file) {
                // ✅ Insert ảnh vào TinyMCE
                window.opener.tinymce.activeEditor.insertContent('<img src="' + file.url + '"/>');
                window.close();
            }
        });
    });
</script>



</body>
</html>