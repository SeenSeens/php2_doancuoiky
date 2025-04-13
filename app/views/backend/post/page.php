<?php
require_once __DIR_ROOT__ . '/helper/PostHelper.php'; // Gọi hàm lấy trạng thái
$this->render('backend/components/breadcrumb');
if( !empty( $this->data['post'] ) ) :
    $text = $this->data['text-edit-form'];
    $post = $this->data['post'];
    $post = $post[0];
    $status = PostHelper::getStatusText( $post['status'] );
else:
    $text = $this->data['text-add-form'];
endif;
?>
<div class="container-fluid">
    <form class="row" action="" method="POST" enctype="multipart/form-data">
        <div class="col-8">
            <div class="card">
                <div class="card-header fw-bold">Tên bài viết</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Thêm tiêu đề" name="title" value="<?= $post['title'] ?? ''; ?>" required>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Đường dẫn</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Thêm đường dẫn" name="slug" value="<?= $post['slug'] ?? ''; ?>" required>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Nội dung</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Thêm nội dung" name="content"><?= $post['content'] ?? ''; ?></textarea>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Tóm tắt</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Thêm tóm tắt" name="excerpt"><?= $post['excerpt'] ?? ''; ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header fw-bold">Xuất bản</div>
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between mb-2">
                        <button type="submit" class="btn btn-sm btn-outline-primary" name="draftPost">Lưu nháp</button>
                        <button class="btn btn-sm btn-outline-primary">Xem trước</button>
                    </div>
                    <ul class="list-inline">
                        <li class="list-inline-item mb-2">
                            Trạng thái:
                            <strong><?= $status ?? ''; ?></strong>
                            <a href=""> Chỉnh sửa</a>
                        </li>
                        <li class="list-inline-item mb-2">
                            Hiển thị:
                            <strong>Công khai</strong>
                            <a href=""> Chỉnh sửa</a>
                        </li>
                        <li class="list-inline-item mb-2">
                            Xuất bản
                            <strong>Ngay lập tức</strong>
                            <a href=""> Chỉnh sửa</a>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-sm btn-primary float-end" name="savePost"><?= $text['button']; ?></button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Ảnh đại diện</div>
            </div>
        </div>
    </form>
</div>
