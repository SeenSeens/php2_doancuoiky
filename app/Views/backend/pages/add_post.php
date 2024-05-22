<h6 class="mb-0 ps-3 text-uppercase">Thêm bài viết</h6>
<hr/>
<div class="container-fluid">
    <form class="row" action="<?= __WEB_ROOT__ . '/admin/post/add' ?>" method="POST" enctype="multipart/form-data">
        <div class="col-8">
            <div class="card">
                <div class="card-header">Tên bài viết</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Thêm tiêu đề" name="title" required>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Nội dung</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Thêm nội dung" name="description"></textarea>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Tóm tắt</div>
                <div class="card-body">
                    <textarea class="form-control" rows="10" placeholder="Thêm tóm tắt" name="excerpt"></textarea>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header fw-bold">Đăng</div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary" name="addPost">Đăng</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Chuyên mục</div>
            </div>
            <div class="card">
                <div class="card-header">Ảnh đại diện</div>
            </div>
        </div>
    </form>
</div>
