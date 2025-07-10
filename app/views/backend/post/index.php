<?php
require_once __DIR_ROOT__ . '/helper/PostHelper.php'; // Gọi hàm lấy trạng thái
$this->render('backend/components/breadcrumb');
?>
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 0;">STT</th>
                    <th style="width: 100px;">Hình ảnh</th>
                    <th>Tiêu đề</th>
                    <th style="width: 100px;">Trạng thái</th>
                    <th style="width: 0;"></th>
                </tr>
            </thead>
            <tbody>
            <?php $index = 0; foreach ($posts as $post) : ?>
                <tr id="row-<?= $post['id'] ?>">
                    <td><?= ++$index; ?></td>
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
<script src="<?= __WEB_ROOT__ . '/public/admin/js/delete.js' ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new DeleteHandler('.delete-post', '<?= __WEB_ROOT__ ?>/admin/post/delete', 'Bạn có chắc chắn muốn xóa bài viết này?').init();
    });
</script>