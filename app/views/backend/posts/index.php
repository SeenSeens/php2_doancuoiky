<?php
$this->render('backend/components/breadcrumb');
$posts = $this->data['sub_content']['posts'];
require_once __DIR_ROOT__ . '/helper/PostHelper.php'; // Gọi hàm lấy trạng

?>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Danh mục</th>
                <th>Thẻ</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $index => $post) : ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= $post['title']; ?></td>
                    <td><?= $post['username']; ?></td>
                    <td><?= $post['categories']; ?></td>
                    <td><?= $post['tags']; ?></td>
                    <td><?= PostHelper::getStatusText($post['status']); ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">View</a>
                        <a href="<?= __WEB_ROOT__ . '/admin/post/edit_id=' . $post['id']; ?>" class="btn btn-sm btn-warning ">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>