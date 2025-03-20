<?php $this->render('backend/components/breadcrumb'); ?>
<div class="card" ng-app="App" ng-controller="userController" ng-init="fetchData()">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th ng-repeat="col in Columns">{{ col }}</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="user in users">
                    <td class="col-2"><img ng-src="<?= __WEB_ROOT__ . '/public/uploads/{{ user.thumbnail }}'?>" alt="" class="img-fluid"></td>
                    <td>{{ user.title }}</td>
                    <td>{{ user.price }}</td>
                    <td>{{ user.discount }}</td>
                    <td>{{ user.category_name }}</td>
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
    app.controller('userController', ( $scope ) => {
        $scope.Columns = [ "Tên người dùng", "Tên", "Email", "Vai trò", "Bài viết"];
        $scope.init = () => {
            $scope.fetchData();
        }
        $scope.fetchData = () => {
            $scope.users = <?= json_encode($this->data['sub_content']['product']); ?>

        }
    });
</script>