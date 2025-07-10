<?php
class FlashMessage {
    public static function set($key, $message) {
        $_SESSION[$key] = $message;
    }

    public static function display() {
        foreach (['success', 'error'] as $type) {
            if (!empty($_SESSION[$type])) {
                $msg = addslashes($_SESSION[$type]);
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Lobibox.notify('$type', {
                            size: 'mini',
                            rounded: true,
                            delay: 3000,
                            sound: false,
                            title: '" . ($type === 'success' ? 'Thành công' : 'Lỗi') . "',
                            msg: \"$msg\"
                        });
                    });
                </script>";
                unset($_SESSION[$type]);
            }
        }
    }
}

