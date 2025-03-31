<?php
$this->render('backend/components/breadcrumb');

?>
<div class="container-fluid">
    <div class="row g-3">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="" class="row row-cols-1 gy-2">
                        <div class="col fw-bold">Thêm thẻ</div>
                        <div class="col">Tên</div>
                        <div class="col"><input type="text" class="form-control" placeholder="Thêm tiêu đề"></div>
                        <div class="col">Đường dẫn</div>
                        <div class="col"><input type="text" class="form-control" placeholder="Đường dẫn"></div>
                        <div class="col">Mô tả</div>
                        <div class="col">
                            <textarea class="form-control" rows="10" placeholder="Thêm nội dung" name="description"></textarea>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary px-5" name="submit"><?= $this->data['sub_content']['button_title']; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Đường dẫn</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
