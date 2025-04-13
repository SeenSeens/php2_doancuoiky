<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Data Table</li>
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
<h6 class="mb-0 text-uppercase">Sửa chuyên mục</h6>
<hr/>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="row g-3" ng-submit="submitForm()" enctype="multipart/form-data">
                        <div class="col-4"><label>Tên chuyên mục</label></div>
                        <div class="col-8">
                            <input type="text" class="form-control" placeholder="Tên chuyên mục" name="name" ng-model="name">
                        </div>
                        <div class="col-4"><label>Đường dẫn</label></div>
                        <div class="col-8">
                            <input type="text" class="form-control" placeholder="Đường dẫn" name="slug" ng-model="slug">
                        </div>
                        <div class="col-4"><label>Danh mục cha</label></div>
                        <div class="col-8">
                            <select class="form-select" name="parent_id" ng-model="parent_id">
                                <option value="">Trống</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-4"><label>Mô tả</label></div>
                        <div class="col-8">
                            <textarea class="form-control" rows="10" placeholder="Mô tả chuyên mục" name="description" ng-model="description"></textarea>
                        </div>
                        <div class="col-4"><label for="image" class="form-label">Ảnh đại diện chuyên mục</label></div>
                        <div class="col-8">
                            <input type="file" accept="image/png, image/jpg" name="thumbnail" ng-model="thumbnail">
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <div class="col-12 text-end">
                            <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                            <button type="submit" class="btn btn-primary px-3 radius-30" name="editCategory">Cập nhật</button>
<!--                            <button type="submit" class="btn btn-warning px-3 radius-30" name="submit">{{ submit_button_title }}</button>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/angular.min.js' ?>"></script>
<script>
    // const app = angular.module('App', []);
    // app.controller('categoryController', ( $scope, $http ) => {
    //
    // }
</script>