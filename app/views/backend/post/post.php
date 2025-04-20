<link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/select2/css/select2.min.css'; ?>" rel="stylesheet" />
<link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/select2/css/select2-bootstrap4.css'; ?>" rel="stylesheet" />
<?php
require_once __DIR_ROOT__ . '/helper/PostHelper.php'; // Gọi hàm lấy trạng thái
$this->render('backend/components/breadcrumb');
$categories = $this->data['categories'];
$tags = $this->data['tags'];
if( !empty( $this->data['post'] ) ) :
    $text = $this->data['text-edit-form'];
    $post = $this->data['post'];
    $post = $post[0];
    $status = PostHelper::getStatusText( $post['status'] );
    $category = $post['categories'];
    $tag = $post['tags'];
else:
    $text = $this->data['text-add-form'];
endif;
?>
<div class="container-fluid">
    <form class="row" action="<?= __WEB_ROOT__ . '/admin/' . $text['routes']; ?>" method="POST" enctype="multipart/form-data">
        <div class="col-8">
            <div class="card">
                <div class="card-header fw-bold">Tên bài viết</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Thêm tiêu đề" id="title" name="title" value="<?= $post['title'] ?? ''; ?>" required>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Đường dẫn</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Thêm đường dẫn" id="slug" name="slug" value="<?= $post['slug'] ?? ''; ?>">
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
                <div class="card-header fw-bold">Danh mục</div>
                <div class="card-body">
                    <select class="form-select multiple-select" name="category" multiple="multiple" data-placeholder="Choose anything">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id'] ?>" <?= $category['name'] == $category ? 'selected' : '' ?>><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Thẻ</div>
                <div class="card-body">
                    <select class="form-select" name="tag">
                        <?php foreach ($tags as $tag) : ?>
                            <option value="<?= $tag['id'] ?>" <?= $tag['name'] == $tag ? 'selected' : '' ?>><?= $tag['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Ảnh đại diện</div>
            </div>
        </div>
    </form>
</div>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/select2/js/select2.min.js'; ?>"></script>
<script>
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>