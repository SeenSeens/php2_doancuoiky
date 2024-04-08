<?php
$category_json = json_encode($this->data['sub_content']['category']);

?>
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
<h6 class="mb-0 text-uppercase">Chuyên mục</h6>
<hr/>
<div class="container" ng-app="App" ng-controller="Controller">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="row row-cols-1 g-3" enctype="multipart/form-data" ng-submit="submitForm()">
                        <div class="col">
                            <label>Tên chuyên mục</label>
                            <input type="text" class="form-control" placeholder="Tên chuyên mục" name="name" ng-model="name">
                        </div>
                        <div class="col">
                            <label>Đường dẫn</label>
                            <input type="text" class="form-control" placeholder="Đường dẫn" name="slug" ng-model="slug">
                        </div>
                        <div class="col">
                            <label>Danh mục cha</label>
                            <select class="form-select" name="parent_id" ng-model="parent_id">
                                <option value="">Trống</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="10" placeholder="Mô tả chuyên mục" name="description" ng-model="description"></textarea>
                        </div>
                        <div class="col">
                            <label for="image" class="form-label">Ảnh đại diện chuyên mục</label>
                            <input type="file" accept="image/png, image/jpg" ng-model="thumbnail">
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <div class="col">
                            <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                            <button type="submit" class="btn btn-primary px-3 radius-30">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" >
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th ng-repeat="col in Columns">{{ col }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="category in categories">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ category.name}}</td>
                                    <td class="col-1 text-center">
                                        <img ng-src="<?= __WEB_ROOT__ . '/public/images/'?>{{ category.thumbnail }}" alt="" class="img-fluid">
                                    </td>
                                    <td>
                                        <button type="button" ng-click="deleteCategory(category.id)" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th ng-repeat="col in Columns">{{ col }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/datatable/js/jquery.dataTables.min.js' ?>"></script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js' ?>"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/angular.min.js' ?>"></script>
<script>
    const app = angular.module('App', []);
    const categories = <?php echo $category_json; ?>;
    app.controller('Controller', ( $scope, $http ) => {
        $scope.Columns = [ "STT", "Tên chuyên mục", "Hình ảnh", "Action" ];
        $scope.categories = categories;
        $scope.success = false;
        $scope.error = false;
        $scope.submit_button = "Insert";
        $scope.submitForm = () => {
            if ($scope.submit_button === 'Insert') {
                $http({
                    method: "POST",
                    url: "<?= __WEB_ROOT__ . '/admin/chuyen-muc/' ?>",
                    data: {
                        'id': $scope.hidden_id
                        'name': $scope.name,
                        'slug': $scope.slug,
                        'description': $scope.description,
                        'thumbnail': $scope.thumbnail,
                        'parent_id': $scope.parent_id,
                        'action': $scope.submit_button,
                    }
                }).then( (res) => {
                    $scope.success = true;
                    $scope.error = false;
                    $scope.successMessage = res.data.message;
                    $scope.form_data = {};
                    $scope.fetchData();
                    $scope.clear();
                }).catch(err => {
                    $scope.success = false;
                    $scope.error = true;
                    $scope.errorMessage = err.data.error;
                    console.log('Lỗi: ', err);
                });
            } /*else if ($scope.submit_button === 'Edit') {
                // Xử lý sửa dữ liệu
                $http({
                    method: "POST",
                    url: "Edit.php",
                    data: {
                        'first_name': $scope.first_name,
                        'last_name': $scope.last_name,
                        'action': 'Edit',
                        'id': $scope.hidden_id
                    }
                }).then( (res) => {
                    $scope.success = true;
                    $scope.error = false;
                    $scope.successMessage = res.data.message;
                    $scope.form_data = {};
                    $scope.fetchData();
                    $scope.clear();
                }).catch(err => {
                    $scope.success = false;
                    $scope.error = true;
                    $scope.errorMessage = err.data.error;
                    console.log('Lỗi: ', err);
                });
            }*/
        };

        $scope.deleteCategory = function(catId) {
            $http({
                method: "POST",
                url: "<?= __WEB_ROOT__ . '/admin/chuyen-muc/delete' ?>",
                data: { 'id': catId }
            }).then(function(response) {
                if (response.data.success) {
                    alert(response.data.message);
                    // Reload danh sách chuyên mục hoặc làm gì đó khác sau khi xóa thành công
                } else {
                    alert(response.data.message);
                    // Xử lý thông báo lỗi hoặc làm gì đó khi xóa không thành công
                }
            }, function(error) {
                console.log('Lỗi: ', error);
            });
        };
    });
</script>