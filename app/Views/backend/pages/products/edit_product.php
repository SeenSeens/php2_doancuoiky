<link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css' ?>" rel="stylesheet" />
<?php
$product = $this->data['sub_content']['product'];
$categories = $this->data['sub_content']['category'];
?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">Sản phẩm</li>
                <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Settings</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 ps-3 text-uppercase"><?= $page_title; ?></h6>
<hr/>
<div class="container-fluid">
    <form class="row" action="<?= __WEB_ROOT__ . '/admin/product/edit/' . $product['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="col-8">
            <div class="card">
                <div class="card-header">Tên sản</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Tên sản phẩm" name="title" value="<?= $product['title']; ?>">
                </div>
            </div>
            <div class="card">
                <div class="card-header">Mô tả sản phẩm</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Mô tả sản phẩm" name="description"><?= $product['description']; ?></textarea>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Mô tả ngắn của sản phẩm</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Mô tả ngắn của sản phẩm" name="excerpt"><?= $product['excerpt']; ?></textarea>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Dữ liệu sản phẩm</div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="btn btn-outline-primary mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Chung</button>
                            <button class="btn btn-outline-primary mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                            <button class="btn btn-outline-primary mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                            <button class="btn btn-outline-primary" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row row-cols-2 gy-3">
                                    <div class="col">Giá bán thường</div>
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="Giá bán thường" name="price" value="<?= $product['price'] ?>">
                                    </div>
                                    <div class="col">Giá khuyến mãi</div>
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="Giá khuyến mãi" name="discount" value="<?= $product['discount'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header fw-bold">Cập nhật</div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary" name="editProduct">Cập nhật</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Danh mục sản phẩm</div>
                <div class="card-body">
                    <select class="form-select" name="category">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id'] ?>" <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Ảnh sản phẩm</div>
                <div class="card-body">
                    <img src="<?= __WEB_ROOT__ . '/public/uploads/' . $product['thumbnail']; ?>" class="img-thumbnail">
                    <input type="file" class="form-control mt-2" name="thumbnail" value="<?= $product['thumbnail'] ?>">
                </div>
            </div>
            <div class="card">
                <div class="card-header">Album hinh ảnh sản phẩm</div>
                <div class="card-body"></div>
            </div>
        </div>
    </form>

</div>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/jquery.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/fancy-file-uploader/jquery.ui.widget.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/fancy-file-uploader/jquery.fileupload.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js' ?>"></script>
<script>
    $('#fancy-file-upload').FancyFileUpload({
        params: {
            action: 'fileuploader'
        },
        maxfilesize: 1000000
    });
</script>
<script>

    $(document).ready(function () {
        $('#image-uploadify').imageuploadify();
    })
</script>