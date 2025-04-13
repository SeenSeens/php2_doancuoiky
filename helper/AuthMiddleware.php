<?php
class AuthMiddleware {
    public static function checkLogin() {
        // Tự động chuyển hướng nếu truy cập /admin mà chưa đăng nhập
        if ( !isset($_SESSION['user_id'])) {
            header("Location: " . __WEB_ROOT__. "/admin/login");
            exit();
        }
    }

}