<h6 class="mb-0 ps-3 text-uppercase">Thêm trang mới</h6>
<hr/>
<div class="container-fluid">
    <form class="row" action="" method="POST" enctype="multipart/form-data">
        <div class="col-8">
            <div class="card">
                <div class="card-header">Tên trang</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Thêm tiêu đề" name="title">
                </div>
            </div>
            <div class="card">
                <div class="card-header">Đường dẫn</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Đường dẫn" name="slug">
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
                    <button type="submit" class="btn btn-primary" name="uploadProduct">Đăng</button>
                </div>
            </div>
            <div class="card accordion accordion-flush">
                <div class="card-body accordion-item p-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-thumbnail" aria-expanded="false" aria-controls="flush-thumbnail">
                            Ảnh đại diện
                        </button>
                    </h2>
                    <div id="flush-thumbnail" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <input id="image-uploadify" name="thumbnail" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
