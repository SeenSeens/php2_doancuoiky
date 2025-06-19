<?php
require_once __DIR_ROOT__ . '/helper/PostHelper.php'; // Gọi hàm lấy trạng thái
$this->render('backend/components/breadcrumb');
$posts = $this->data['sub_content']['posts'];
?>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $index => $post) : ?>
                <tr id="row-<?= $post['id'] ?>">
                    <td><?= $index + 1 ?></td>
                    <td><img src="<?= !empty($post['thumbnail']) ? __WEB_ROOT__ . '/public/uploads/' . $post['thumbnail'] : __WEB_ROOT__ . '/public/admin/images/no-image.png' ?>" alt="" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;"></td>
                    <td><?= $post['title']; ?></td>
                    <td><?= PostHelper::getStatusText($post['status']); ?></td>
                    <td>
                        <?php if( !empty( $post['type']  === 'post' )) : ?>
                            <div class="d-flex order-actions">
                                <a href="#" class="text-primary"><i class="lni lni-eye"></i></a>
                                <a href="<?= __WEB_ROOT__ . '/admin/post/edit_id=' . $post['id']; ?>" class="mx-2 text-warning"><i class="bx bxs-edit"></i></a>
                                <a class="text-danger delete-post"  data-id="<?= $post['id']; ?>"><i class="bx bxs-trash"></i></a>
                            </div>
                        <?php else: ?>
                            <div class="d-flex order-actions">
                                <a href="#" class="text-primary"><i class="lni lni-eye"></i></a>
                                <a href="<?= __WEB_ROOT__ . '/admin/page/edit_id=' . $post['id']; ?>" class="mx-2 text-warning"><i class="bx bxs-edit"></i></a>
                                <a class="text-danger delete-post"  data-id="<?= $post['id']; ?>"><i class="bx bxs-trash"></i></a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.delete-post').forEach(button => {
            button.addEventListener('click', function() {
                let postId = this.getAttribute('data-id');
                let url = '<?= __WEB_ROOT__ . '/admin/post/delete'; ?>'

                if (confirm("Bạn có chắc chắn muốn xóa bài viết này?")) {
                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-Requested-With': 'XMLHttpRequest'  // Quan trọng để nhận diện đây là yêu cầu AJAX
                        },
                        body: 'id=' + postId
                    })
                        .then(response => response.text()) // Lấy text trước khi parse JSON
                        .then(text => {
                            try {
                                // Chỉ lấy phần JSON, bỏ HTML/script nếu có
                                let jsonStart = text.indexOf('{');
                                let jsonText = text.substring(jsonStart);
                                let data = JSON.parse(jsonText);
                                if (data.success) {
                                    document.getElementById('row-' + postId).remove();
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