<link href="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css' ?>" rel="stylesheet" />
<?php $categories =  $this->data['sub_content']['category']; ?>
<?php $this->render('backend/components/breadcrumb'); ?>
<div class="container-fluid" >
    <form class="row" action="<?= __WEB_ROOT__ . '/admin/product/add' ?>" method="POST" enctype="multipart/form-data" >
        <div class="col-8">
            <div class="card">
                <div class="card-header">Tên sản phẩm</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Tên sản phẩm" name="title">
                </div>
            </div>
            <div class="card">
                <div class="card-header">Mô tả sản phẩm</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Mô tả sản phẩm" name="description"></textarea>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Mô tả ngắn của sản phẩm</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Mô tả ngắn của sản phẩm" name="excerpt"></textarea>
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
                                        <input type="number" class="form-control" placeholder="Giá bán thường" name="price">
                                    </div>
                                    <div class="col">Giá khuyến mãi</div>
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="Giá khuyến mãi" name="discount">
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
                <div class="card-header fw-bold">Đăng</div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary" name="uploadProduct">Đăng</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Danh mục sản phẩm</div>
                <div class="card-body">
                    <select class="form-select" name="category">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Ảnh sản phẩm</div>
                <div class="card-body">
                    <input type="file" class="form-control mt-2" name="thumbnail">
                </div>
            </div>
            <div class="card">
                <div class="card-header">Album hinh ảnh sản phẩm</div>
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