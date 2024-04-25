<?php
$categories = json_encode( $this->data['sub_content']['category'] );
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
<div class="container" ng-app="App" ng-controller="categoryController" ng-init="fetchData()">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="<?= __WEB_ROOT__ . '/admin/chuyen-muc/them-moi-chuyen-muc' ?>" method="POST" class="row row-cols-1 g-3" enctype="multipart/form-data">
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
                            <input type="file" accept="image/png, image/jpg" name="thumbnail" ng-model="thumbnail">
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <div class="col">
                            <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                            <button type="submit" class="btn btn-primary px-3 radius-30" name="saveCategory">Save</button>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="category in categories" ng-click="fillForm(category)">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ category.name }}</td>
                                    <td>{{ category.slug }}</td>
                                    <td>{{ category.description }}</td>
                                    <td class="col-1 text-center">
                                        <img ng-src="<?= __WEB_ROOT__ . '/public/images/'?>{{ category.thumbnail }}" alt="" class="img-fluid">
                                    </td>
                                    <td>
                                        <input type="hidden" name="id" value="{{ category.id }}">
                                        <button type="button" class="btn btn-warning btn-sm" name="editCategory" value="{{ category.id }}">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" name="deleteCategory" value="{{ category.id }}" ng-click="deleteCategory(category.id)">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th ng-repeat="col in Columns">{{ col }}</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= __WEB_ROOT__ . '/public/admin/assets/js/angular.min.js' ?>"></script>
<script>
    const app = angular.module('App', []);
    app.controller('categoryController', ( $scope, $http, $window ) => {
        $scope.Columns = [ "STT", "Tên chuyên mục", "Đường dẫn", "Mô tả", "Hình ảnh" ];
        $scope.selectedCategory = {};
        $scope.init = () => {
            $scope.fetchData();
        }
        $scope.fetchData = () => {
            $scope.categories = <?php echo $categories; ?>;
        }
        $scope.deleteCategory = (categoryId) => {
            // Confirm deletion with the user
            if (confirm('Are you sure you want to delete this category?')) {
                // Send AJAX request to delete the category
                $http({
                    method: 'POST',
                    url: '<?= __WEB_ROOT__ . '/admin/chuyen-muc/xoa-chuyen-muc' ?>', // Change the URL to your delete endpoint
                    data:{'id': categoryId, 'action':'delete'}
                }).then( res => {
                    $window.location.href = '<?= __WEB_ROOT__ . '/admin/chuyen-muc' ?>';
                }).catch( err => {
                    console.log('Lỗi: ', err);
                })
            }
        }
        $scope.fillForm = (category) => {
            $scope.id = category.id;
            $scope.name = category.name;
            $scope.slug = category.slug;
            $scope.description = category.description;
            $scope.thumbnail = category.thumbnail;
            $scope.parent_id = category.parent_id;
            // Cập nhật selectedStudent
            $scope.selectedCategory = category;
        }
    });
</script>