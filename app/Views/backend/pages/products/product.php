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
<h6 class="mb-0 text-uppercase">Sản phẩm</h6>
<hr/>
<div class="card" ng-app="App" ng-controller="productController" ng-init="fetchData()">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th ng-repeat="col in Columns">{{ col }}</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="product in products">
                    <td><img ng-src="<?= __WEB_ROOT__ . '/public/uploads/'?>{{ product.thumbnail }}" alt="" class="img-fluid"></td>
                    <td>{{ product.title }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.discount }}</td>
                    <td>{{ product.category_name }}</td>
                    <td class="text-center">
                        <a href="<?= __WEB_ROOT__ . '/admin/san-pham/{{ product.id }}' ?>" class="btn-sm btn-primary">View</a>
                        <a href="<?= __WEB_ROOT__ . '/admin/san-pham/sua-san-pham/{{ product.id }}' ?>" class="btn-sm btn-warning">Edit</a>
                        <a href="<?= __WEB_ROOT__ . '/admin/san-pham/xoa-san-pham/{{ product.id }}' ?>" class="btn-sm btn-danger">Delete</a>
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
<script src="<?= __WEB_ROOT__ . '/public/js/angular.min.js' ?>"></script>
<script>
    const app = angular.module('App', []);
    app.controller('productController', ( $scope ) => {
        $scope.Columns = [ "Ảnh", "Tên", "Giá bán", "Giá giảm", "Danh mục"];
        $scope.init = () => {
            $scope.fetchData();
        }
        $scope.fetchData = () => {
            $scope.products = <?= json_encode($this->data['sub_content']['product']); ?>

        }
    });
</script>