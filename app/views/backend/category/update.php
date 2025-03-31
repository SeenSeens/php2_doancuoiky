<?php
$category = $this->data['category'];
?>
<form method="POST" action="<?= __WEB_ROOT__ . '/admin/category/edit_id=' . $category['id']; ?>" class="row row-cols-1 gy-2">
    <input type="hidden" name="id" value="<?= $category['id'];  ?>">
    <div class="col fw-bold">Thêm chuyên mục</div>
    <div class="col">Tên</div>
    <div class="col"><input type="text" class="form-control" placeholder="Thêm tiêu đề" name="name" value="<?= $category['name']; ?>"></div>
    <div class="col">Đường dẫn</div>
    <div class="col"><input type="text" class="form-control" placeholder="Đường dẫn" name="slug" value="<?= $category['slug']; ?>"></div>
    <div class="col">Mô tả</div>
    <div class="col">
        <textarea class="form-control" rows="10" placeholder="Thêm nội dung" name="description"><?= $category['description']; ?></textarea>
    </div>
    <div class="col">
        <button type="submit" class="btn btn-primary px-5" name="submit">Sửa danh mục</button>
    </div>
</form>