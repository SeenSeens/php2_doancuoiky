class NotificationAccount {
    constructor() {
        this.webRoot = window.data.__WEB_ROOT__; // Định nghĩa webRoot từ PHP
        this.registerFormEvent();                // Khởi tạo sự kiện khi form submit
    }

    // Phương thức hiển thị thông báo
    showNotification(type, message) {
        Lobibox.notify(type, {
            size: 'mini',
            rounded: true,
            delay: 3000,
            sound: false,
            title: type === 'success' ? 'Thành công' : 'Lỗi',
            msg: message
        });
    }

    // Xử lý sự kiện submit form đăng ký
    registerFormEvent() {
        $("#registerForm").submit((e) => {
            e.preventDefault(); // Ngăn chặn reload trang

            $.ajax({
                url: this.webRoot + '/admin/register', // URL động từ webRoot
                type: "POST",
                data: $("#registerForm").serialize(),  // Serialize dữ liệu form
                dataType: "json",
                success: (response) => {
                    if (response.status === "success") {
                        this.showNotification('success', response.message); // Thông báo thành công
                        setTimeout(() => {
                            window.location.href = this.webRoot + '/admin/login';
                        }, 3000);
                    } else {
                        this.showNotification('error', response.message); // Thông báo lỗi
                    }
                },
                error: () => {
                    this.showNotification('error', 'Đã xảy ra lỗi, vui lòng thử lại.');
                }
            });
        });
    }
}

// Khi DOM sẵn sàng, khởi tạo class NotificationAccount
jQuery(document).ready( ($) => {
    new NotificationAccount(); // Tạo instance và tự động chạy các event
});
