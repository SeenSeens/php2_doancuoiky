<?php
class FlashMessage {
    // Đặt flash message
    public static function set($key, $message) {
        $_SESSION['flash'][$key] = $message;
    }

    // Kiểm tra có tồn tại message không
    public static function has($key) {
        return isset($_SESSION['flash'][$key]);
    }

    // Lấy message & xóa sau khi lấy
    public static function get($key) {
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]); // Chỉ hiển thị 1 lần
            return $message;
        }
        return null;
    }

    // Xoá toàn bộ
    public static function clear() {
        unset($_SESSION['flash']);
    }

    // Hiển thị bằng Lobibox hoặc Toastify
    public static function display($use = 'lobibox') {
        if (!isset($_SESSION['flash'])) return;

        foreach ($_SESSION['flash'] as $type => $message) {
            $msg = addslashes($message);
            $title = ($type === 'success') ? 'Thành công' : 'Lỗi';

            if ($use === 'lobibox') {
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Lobibox.notify('$type', {
                            size: 'mini',
                            rounded: true,
                            delay: 3000,
                            sound: false,
                            title: '$title',
                            msg: \"$msg\"
                        });
                    });
                </script>";
            } elseif ($use === 'toastify') {
                $color = ($type === 'success') ? '#28a745' : '#dc3545';
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Toastify({
                            text: \"$msg\",
                            duration: 3000,
                            close: true,
                            gravity: 'top',
                            position: 'right',
                            backgroundColor: '$color',
                            stopOnFocus: true
                        }).showToast();
                    });
                </script>";
            }
        }

        // Xoá sau khi hiển thị
        self::clear();
    }
}
