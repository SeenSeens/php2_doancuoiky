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
<div class="container-fluid" ng-app="App" ng-controller="categoryController" ng-init="fetchData()">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="row row-cols-1 g-3" ng-submit="submitForm()" enctype="multipart/form-data">
                        <div class="col">
                            <label>Tên chuyên mục</label>
                            <input type="text" class="form-control" placeholder="Tên chuyên mục" name="name" ng-model="name" required>
                        </div>
                        <div class="col">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="10" placeholder="Mô tả chuyên mục" name="description" ng-model="description"></textarea>
                        </div>
                        <div class="col">
                            <label for="image" class="form-label">Ảnh đại diện chuyên mục</label>
                            <input type="file" accept="image/png, image/jpg" name="thumbnail" file-input="file" ng-model="thumbnail">
                            <img class="img-fluid" ng-src="{{thumbnailPreview}}" alt="" ng-if="thumbnailPreview">
                        </div>
                        <div class="col">
                            <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
<!--                            <button type="submit" class="btn btn-primary px-3 radius-30" name="saveCategory">Save</button>-->
                            <button class="btn btn-warning px-3 radius-30">{{ submit_button_title }}</button>
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
                                    <td><img ng-src="<?= __WEB_ROOT__ . '/public/images/'?>{{ category.thumbnail }}" alt="" class="img-fluid"></td>
                                    <td>{{ category.name }}</td>
                                    <td class="text-wrap">{{ category.description }}</td>
                                    <td>
                                        <input type="hidden" name="id" value="{{ category.id }}">
<!--                                        <a href="--><?php //= __WEB_ROOT__ . '/admin/chuyen-muc/sua-chuyen-muc' ?><!--" class="btn btn-warning btn-sm" ng-click="updateCategory(category.id)">Edit</a>-->
                                        <button type="button" class="btn btn-sm btn-warning" name="editCategory" value="{{ category.id }}" ng-click="updateCategory(category.id)">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" name="deleteCategory" value="{{ category.id }}" ng-click="deleteCategory(category.id)">Delete</button>
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
<script src="<?= __WEB_ROOT__ . '/public/js/angular.min.js' ?>"></script>
<script>
    const app = angular.module('App', []);
    app.directive('fileInput', ['$parse', function($parse) {
        return {
            restrict: 'A',
            link: function(scope, element, attrs) {
                element.bind('change', function() {
                    $parse(attrs.fileInput).assign(scope, element[0].files[0]);
                    scope.$apply();
                });
            }
        };
    }]);
    app.controller('categoryController', ( $scope, $http, $window ) => {
        $scope.Columns = [ "Ảnh", "Tên", "Mô tả" ];
        $scope.selectedCategory = {};
        // $scope.submit_button = "insert";
        $scope.submit_button_title = "Add";
        $scope.success = false;
        $scope.error = false;
        $scope.init = () => {
            $scope.fetchData();
        }
        $scope.fetchData = () => {
            $scope.categories = <?= json_encode( $this->data['sub_content']['category'] ); ?>;
        }
        $scope.submitForm = () => {
            let formData = new FormData();
            formData.append('name', $scope.name);
            formData.append('description', $scope.description);
            formData.append('thumbnail', $scope.thumbnail);
            $http.post('<?= __WEB_ROOT__ . '/admin/chuyen-muc-san-pham/them-moi' ?>', formData, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined}
            }).then(response => {
                if(response.data.error) {
                    alert(response.data.error);
                } else {
                    alert('Chuyên mục đã được thêm thành công!');
                    $window.location.reload();
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        }
        $scope.deleteCategory = (categoryId) => {
            // Confirm deletion with the user
            if (confirm('Are you sure you want to delete this category?')) {
                // Send AJAX request to delete the category
                $http({
                    method: 'POST',
                    url: '<?= __WEB_ROOT__ . '/admin/chuyen-muc-san-pham/xoa-chuyen-muc' ?>', // Change the URL to your delete endpoint
                    data:{'id': categoryId, 'action':'delete'}
                }).then( res => {
                    $window.location.href = '<?= __WEB_ROOT__ . '/admin/chuyen-muc-san-pham' ?>';
                }).catch( err => {
                    console.log('Lỗi: ', err);
                })
            }
        }
        /*$scope.submitForm = () => {
            if($scope.submit_button === 'insert') {
                $http({
                    method: 'POST',
                    url: '<?= __WEB_ROOT__ . '/admin/chuyen-muc-san-pham/them-moi' ?>',
                    data: {
                        'name': $scope.name,
                        'description': $scope.description,
                        'thumbnail': $scope.thumbnail,
                        /!*'action': $scope.submit_button,
                        'id': $scope.hidden_id*!/
                    }
                }).then( res => {
                    $scope.success = true;
                    $scope.error = false;
                    $scope.successMessage = res.data.message;
                    $scope.form_data = {};
                    $scope.fetchData();
                    $window.location.href = '<?= __WEB_ROOT__ . '/admin/chuyen-muc-san-pham' ?>';
                    $scope.clear();
                }).catch( err => {
                    $scope.success = false;
                    $scope.error = true;
                    $scope.errorMessage = err.data.error;
                    console.log('Loi: ' + err);
                })
            }
            /!*if($scope.submit_button === 'update') {
                $http({
                    method: 'POST',
                    url: '<?= __WEB_ROOT__ . '/admin/chuyen-muc-san-pham/sua-chuyen-muc' ?>',
                    data: {
                        'name': $scope.name,
                        'description': $scope.description,
                        'thumbnail': $scope.thumbnail,
                        'action': 'update',
                        'id': $scope.hidden_id
                    }
                }).then( res => {
                    $scope.success = true;
                    $scope.error = false;
                    $scope.fetchData();
                    $window.location.href = '<?= __WEB_ROOT__ . '/admin/chuyen-muc-san-pham' ?>';
                    $scope.clear();
                }).catch( err => {
                    console.log('Loi: ' + err);
                })
            }*!/
        }*/
        $scope.updateCategory = async (categoryId) => {
            const requestData = {
                id: categoryId,
                name: $scope.name,
                description: $scope.description,
                thumbnail: $scope.thumbnail,
                action: 'update'
            };
            console.log(requestData);
            try {
                const response = await $http({
                    method: 'POST',
                    url: '<?= __WEB_ROOT__ . '/admin/chuyen-muc-san-pham/sua-chuyen-muc' ?>',
                    data: requestData
                });
                console.log(response);
                const data = response.data;
                console.log(data);
                $scope.id = categoryId;
                // $scope.name = data.name;
                $scope.hidden_id = categoryId;
                $scope.submit_button = 'update';
                $scope.submit_button_title = 'Edit';
            } catch (error) {
                console.error('Error:', error);
            }
        }
        /**
         * Hàm này được chạy khi click vào từng fill trên table
         * @param category
         */
        $scope.fillForm = (category) => {
            $scope.id = category.id;
            $scope.name = category.name;
            $scope.description = category.description;
            $scope.thumbnail = category.thumbnail;
            // Cập nhật selectedStudent
            $scope.selectedCategory = category;
        }
        /**
         * Clear input
         */
        $scope.clear = () => {
            $scope.id = "";
            $scope.name = "";
            $scope.hidden_id = "";
            $scope.description = "";
            $scope.thumbnail = null;
            $scope.thumbnailPreview = "";
        }

        $scope.$watch('thumbnail', function(newVal) {
            if(newVal) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $scope.thumbnailPreview = e.target.result;
                    $scope.$apply();
                }
                reader.readAsDataURL(newVal);
            }
        });
    });
</script>