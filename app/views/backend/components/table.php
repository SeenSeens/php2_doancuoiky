<?php
$categories = $this->data['sub_content']['categories'];
?>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Đường dẫn</th>
        <th>Mô tả</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ( $categories as $index => $category ) : ?>
        <tr id="row-<?= $category['term_id']; ?>">
            <td><?= $index + 1; ?></td>
            <td><?= $category['name']; ?></td>
            <td class="col-2"><?= $category['slug']; ?></td>
            <td class="text-wrap"><?= $category['description']; ?></td>
            <td class="col-3">
                <a href="<?= __WEB_ROOT__ . '/admin/category/edit_id=' . $category['term_id']; ?>" class="btn btn-sm btn-warning ">Edit</a>
                <button class="btn btn-sm btn-danger delete-term"  data-id="<?= $category['term_id']; ?>">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.delete-term').forEach(button => {
            button.addEventListener('click', function() {
                let termId = this.getAttribute('data-id');
                let url = '<?= __WEB_ROOT__ . '/admin/category/delete'; ?>'

                if (confirm("Bạn có chắc chắn muốn xóa term này?")) {
                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-Requested-With': 'XMLHttpRequest'  // Quan trọng để nhận diện đây là yêu cầu AJAX
                        },
                        body: 'id=' + termId
                    })
                        .then(response => response.text()) // Lấy text trước khi parse JSON
                        .then(text => {
                            try {
                                // Chỉ lấy phần JSON, bỏ HTML/script nếu có
                                let jsonStart = text.indexOf('{');
                                let jsonText = text.substring(jsonStart);
                                let data = JSON.parse(jsonText);
                                if (data.success) {
                                    document.getElementById('row-' + termId).remove();
                                } else {
                                    alert("Lỗi: " + data.message);
                                }
                            } catch (error) {
                                console.error("Không thể parse JSON:", text);
                                alert("Phản hồi từ server không hợp lệ!");
                            }
                        })
                        .catch(error => console.error('Lỗi:', error));

                }
            });
        });
    });
</script>
