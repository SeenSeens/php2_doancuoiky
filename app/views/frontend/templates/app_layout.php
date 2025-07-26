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
    <link rel="stylesheet" href="<?= __WEB_ROOT__ . '/public/frontend/css/toastify.min.css'; ?>" type="text/css">
    <script src="<?= __WEB_ROOT__ . '/public/frontend/js/jquery-3.3.1.min.js'; ?>"></script>
</head>
<body>
<?php $this->render('frontend/header'); ?>

<?php $this->render($content, $sub_content); ?>

<?php $this->render('frontend/footer'); ?>

<script>
    const BASE_URL = '<?= __WEB_ROOT__ ?>';
</script>
<!-- Js Plugins -->

<script src="<?= __WEB_ROOT__ . '/public/frontend/js/bootstrap.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/jquery.nice-select.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/jquery-ui.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/jquery.slicknav.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/mixitup.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/owl.carousel.min.js'; ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/main.js'; ?>"></script>
<!--notification js -->
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/notifications/js/lobibox.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/frontend/js/toastify-js.js'; ?>"></script>
<script>
    function updateCartUI() {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];

        const totalQty = cart.reduce((sum, item) => sum + item.quantity, 0);
        const totalPrice = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);

        const cartCountEl = document.getElementById("cart-count");
        const cartTotalEl = document.getElementById("cart-total");

        if (cartCountEl) cartCountEl.textContent = totalQty;
        if (cartTotalEl) cartTotalEl.textContent = totalPrice.toLocaleString('vi-VN') + " VND";
    }

    // Gọi hàm khi trang được tải
    document.addEventListener("DOMContentLoaded", updateCartUI);
</script>
<?php
require_once __DIR_ROOT__ . '/helper/FlashMessage.php';
FlashMessage::display('toastify');
?>
<?php if (FlashMessage::has('success')): ?>
    <script>
        // Xóa giỏ hàng
        localStorage.removeItem("cart")
        Toastify({
            text: "<?= FlashMessage::get('success') ?>",
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "#28a745"
        }).showToast();
    </script>
<?php elseif (FlashMessage::has('danger')): ?>
    <script>
        Toastify({
            text: "<?= FlashMessage::get('danger') ?>",
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "#dc3545"
        }).showToast();
    </script>
<?php endif; ?>

</body>
</html>