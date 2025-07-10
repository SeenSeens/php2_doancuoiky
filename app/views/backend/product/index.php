<?php $this->render('backend/components/breadcrumb'); ?>
<div class="card">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th style="width: 100px">Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá bán</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <?php $index = 0; foreach ($products as $product): ?>
                <tr id="row-<?= $product['id'] ?>">
                    <td><?= ++$index; ?></td>
                    <td><img src="<?= !empty($product['thumbnail']) ? __WEB_ROOT__ . '/public/uploads/' . $product['thumbnail'] : __WEB_ROOT__ . '/public/admin/images/no-image.png' ?>" alt="<?= $product['title'] ?>" class="img-fluid" style="width: 100px; height: 100px;"></td>
                    <td><?= $product['title'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= isset($product['price']) ? number_format($product['price'] , 0, ',', '.') . ' VND' : 'Liên hệ' ?></td>
                    <td>
                        <div class="d-flex order-actions">
                            <a href="<?= __WEB_ROOT__ . '/admin/product/view=' . $product['id'] ?>" class="text-primary"><i class="lni lni-eye"></i></a>
                            <a href="<?= __WEB_ROOT__ . '/admin/product/edit_id=' . $product['id'] ?>" class="mx-2 text-warning"><i class="bx bxs-edit"></i></a>
                            <a class="text-danger delete-product" data-id="<?= $product['id'] ?>"><i class="bx bxs-trash"></i></a>
                        </div>
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
        new DeleteHandler('.delete-product', '<?= __WEB_ROOT__ ?>/admin/product/delete', 'Bạn có chắc chắn muốn xóa sản phẩm này?').init();
    });
</script>