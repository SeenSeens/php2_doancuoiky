<?php
$text = $this->data['text-form'];
?>
<form method="POST" action="<?= __WEB_ROOT__ . '/admin/' . $this->data['routes-new']; ?>" class="row row-cols-1 gy-2">
    <div class="col fw-bold"><?= $text['title']; ?></div>
    <div class="col">Tên</div>
    <div class="col"><input type="text" class="form-control" placeholder="Thêm tiêu đề" name="name"></div>
    <div class="col">Đường dẫn</div>
    <div class="col"><input type="text" class="form-control" placeholder="Đường dẫn" name="slug"></div>
    <div class="col">Mô tả</div>
    <div class="col">
        <textarea class="form-control" rows="10" placeholder="Thêm nội dung" name="description"></textarea>
    </div>
    <div class="col">
        <button type="submit" class="btn btn-primary px-5" name="submit"><?= $text['button']; ?></button>
    </div>
</form>