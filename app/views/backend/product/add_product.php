<link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css' ?>" rel="stylesheet" />
<?php $this->render('backend/components/breadcrumb'); ?>
<?php
if( !empty( $product ) ) :
    $text = $this->data['text-edit-form'];
else:
    $text = $this->data['text-add-form'];
endif;
?>

<div class="container-fluid" >
    <form class="row" action="<?= empty( $product ) ? __WEB_ROOT__ . '/admin/' . $text['routes'] : __WEB_ROOT__ . '/admin/' .  $text['routes'] ?>" method="POST" enctype="multipart/form-data" >
        <div class="col-8">
            <div class="card">
                <div class="card-header fw-bold">Tên sản phẩm</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Tên sản phẩm" name="title" id="title" value="<?= empty( $product ) ? '' : $product['title'] ?>" required>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Đường dẫn</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Thêm đường dẫn" name="slug" id="slug" value="<?= empty( $product ) ? '' : $product['slug'] ?>" required>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Mô tả sản phẩm</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Mô tả sản phẩm" name="description"><?= empty( $product ) ? '' : $product['description'] ?></textarea>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Mô tả ngắn của sản phẩm</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Mô tả ngắn của sản phẩm" name="excerpt"><?= empty( $product ) ? '' : $product['excerpt'] ?></textarea>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Dữ liệu sản phẩm</div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3">
                            <button class="btn btn-sm btn-outline-primary mb-1 active" data-bs-toggle="pill" data-bs-target="#v-pills-overview">Tổng quan</button>
                            <button class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="pill" data-bs-target="#v-pills-inventory">Kiểm kê kho hàng</button>
                            <button class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="pill" data-bs-target="#v-pills-delivery">Giao hàng</button>
                            <button class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="pill" data-bs-target="#v-pills-linked-products">Sản phẩm được liên kết</button>
                            <button class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="pill" data-bs-target="#v-pills-attributes">Các thuộc tính</button>
                            <button class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="pill" data-bs-target="#v-pills-advanced">Nâng cao</button>
                        </div>
                        <div class="tab-content w-100">
                            <div class="tab-pane fade show active" id="v-pills-overview" aria-labelledby="v-pills-overview">
                                <div class="row gy-3">
                                    <div class="col-md-4">Giá bán thường</div>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" placeholder="Giá bán thường" name="price" value="<?= empty( $product ) ? '' : $product['price'] ?>">
                                    </div>
                                    <div class="col-md-4">Giá khuyến mãi</div>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" placeholder="Giá khuyến mãi" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-inventory" aria-labelledby="v-pills-inventory">
                                <div class="row gy-3">
                                    <div class="col-md-4">Mã sản phẩm</div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="">
                                    </div>
                                    <div class="col-md-4">GTIN, UPC, EAN, hoặc ISBN</div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="">
                                    </div>
                                    <div class="col-md-4">Quản lý kho</div>
                                    <div class="col-md-8">
                                        <input type="checkbox" class="form-check-inline" name="" id="" value=""> Theo dõi số lượng hàng tồn kho cho sản phẩm này
                                    </div>
                                    <div class="col-md-4">Trạng thái kho hàng</div>
                                    <div class="col-md-8">
                                        <input type="radio" class="form-check-inline" name="inventory-status" id=""> Còn hàng <br/>
                                        <input type="radio" class="form-check-inline" name="inventory-status" id=""> Hết hàng <br/>
                                        <input type="radio" class="form-check-inline" name="inventory-status" id=""> Chờ hàng <br/>
                                    </div>
                                    <div class="col-md-4">Bán riêng lẻ</div>
                                    <div class="col-md-8">
                                        <input type="checkbox" class="form-check-inline" name="" id="" value=""> Giới hạn mua hàng 1 mặt hàng mỗi đơn hàng
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-delivery" aria-labelledby="v-pills-delivery">
                                <div class="row gy-3">
                                    <div class="col-md-4">Cân nặng (kg)</div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="">
                                    </div>
                                    <div class="col-md-4">Kích thước (cm)</div>
                                    <div class="col-md-8">
                                        <div class="row row-cols-md-3">
                                            <label class="col">
                                                <input type="text" class="form-control" placeholder="" name="">
                                            </label>
                                            <label class="col">
                                                <input type="text" class="form-control" placeholder="" name="">
                                            </label>
                                            <label class="col">
                                                <input type="text" class="form-control" placeholder="" name="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">Loại hình giao hàng</div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="" id="">
                                            <option value="">Không có loại hình giao hàng</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-linked-products" aria-labelledby="v-pills-linked-products">
                                <div class="row gy-3">
                                    <div class="col-md-4">Bán thêm</div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="" id="">
                                            <option value="">Chọn giá trị</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">Bán chéo</div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="" id="">
                                            <option value="">Chọn giá trị</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-attributes" aria-labelledby="v-pills-attributes">
                                <div class="row">
                                    <small>Thêm các thông tin mô tả mà khách hàng có thể sử dụng để tìm kiếm sản phẩm này trên cửa hàng của bạn, chẳng hạn như “Chất liệu” hoặc “Kích thước”.</small>
                                    <div>
                                        <button class="btn btn-outline-primary">Thêm mới</button>
                                        <select class="form-select" name="" id="">
                                            <option value="">Chọn giá trị</option>
                                        </select>
                                    </div>
                                    <div>
                                        <small>Thuộc tính mới</small>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-advanced" aria-labelledby="v-pills-advanced">
                                <div class="row gy-3">
                                    <div class="col-md-4">Ghi chú thanh toán</div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Ghi chú thanh toán" name="">
                                    </div>
                                    <div class="col-md-4">Menu đơn hàng</div>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" placeholder="Menu đơn hàng" name="">
                                    </div>
                                    <div class="col-md-4">Cho phép đánh giá</div>
                                    <div class="col-md-8">
                                        <input type="checkbox" class="form-check-inline" name="" id="" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <button type="submit" class="btn btn-sm btn-primary float-end" name="uploadProduct"><?= $text['button']; ?></button>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Danh mục sản phẩm</div>
                <div class="card-body">
                    <select class="form-select multiple-select" name="category[]" multiple>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id'] ?>"
                                <?= in_array($category['id'], $selected_category_ids ?? [], true) ? 'selected' : '' ?>>
                                <?= $category['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Ảnh sản phẩm</div>
                <div class="card-body">
                    <input type="file" class="form-control mt-2" name="thumbnail">
                </div>
            </div>
            <div class="card">
                <div class="card-header fw-bold">Album hinh ảnh sản phẩm</div>
            </div>
        </div>
    </form>
</div>
<script src="<?= __WEB_ROOT__ . '/public/admin/plugins/select2/js/select2.min.js' ?>"></script>
<script>
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>