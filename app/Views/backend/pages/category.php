<?php $postCategories = $this->data['sub_content']['post_category']; ?>
<h6 class="mb-0 ps-3 text-uppercase">Chuyên mục</h6>
<hr/>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <form action="" class="row row-cols-1 gy-2">
                <div class="col fw-bold">Thêm chuyên mục</div>
                <div class="col">Tên</div>
                <div class="col"><input type="text" class="form-control" placeholder="Thêm tiêu đề"></div>
                <div class="col">Đường dẫn</div>
                <div class="col"><input type="text" class="form-control" placeholder="Thêm đường dẫn"></div>
                <div class="col">Chuyên mục cha</div>
                <div class="col">
                    <select class="form-select-sm">
                        <option value="">Trống</option>
                    </select>
                </div>
                <div class="col">Mô tả</div>
                <div class="col">
                    <textarea></textarea>
                </div>
            </form>
        </div>
        <div class="col-8 mt-4">
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
                        <tbody>
                            <?php foreach ($postCategories as $postCategory) : ?>
                            <tr>
                                <td><?= $postCategory['name'] ?></td>
                                <td class="text-wrap"><?= $postCategory['description'] ?></td>
                                <td class="col-2"><?= $postCategory['slug'] ?></td>
                                <td class="col-3">
                                    <a href="<?= __WEB_ROOT__ . '/admin/chuyen-muc/sua-chuyen-muc/' . $postCategory['id'] ?>" class="btn-sm btn-warning ">Edit</a>
                                    <a href="<?= __WEB_ROOT__ . '/admin/chuyen-muc/xoa-chuyen-muc/' . $postCategory['id'] ?>" class="btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>