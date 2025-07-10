'use strict'
class DeleteHandler {
    constructor(selector, url, confirmMessage = "Bạn có chắc chắn muốn xóa mục này?") {
        this.selector = selector;
        this.url = url;
        this.confirmMessage = confirmMessage;
    }

    init() {
        document.querySelectorAll(this.selector).forEach(button => {
            button.addEventListener("click", () => {
                const id = button.getAttribute("data-id");
                if (!id) return;

                if (confirm(this.confirmMessage)) {
                    this.sendDeleteRequest(id);
                }
            });
        });
    }

    sendDeleteRequest(id) {
        fetch(this.url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: 'id=' + encodeURIComponent(id)
        })
            .then(response => response.text())
            .then(text => {
                try {
                    const jsonStart = text.indexOf('{');
                    const jsonText = text.substring(jsonStart);
                    const data = JSON.parse(jsonText);

                    if (data.success) {
                        const row = document.getElementById('row-' + id);
                        if (row) row.remove();
                    } else {
                        alert("Lỗi: " + data.message);
                    }
                } catch (error) {
                    console.error("Không thể parse JSON:", text);
                    alert("Phản hồi từ server không hợp lệ!");
                }
            })
            .catch(error => {
                console.error("Lỗi:", error);
                alert("Có lỗi xảy ra khi gửi yêu cầu.");
            });
    }
}
