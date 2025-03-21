<?php
class AuthMiddleware {
    public static function checkLogin() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . __WEB_ROOT__ . '/admin/login');
            exit();
        }
    }

}