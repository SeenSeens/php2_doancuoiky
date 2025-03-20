<?php $this->render('backend/components/breadcrumb'); ?>
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
                    <td class="col-2"><img ng-src="<?= __WEB_ROOT__ . '/public/uploads/{{ product.thumbnail }}'?>" alt="" class="img-fluid"></td>
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