<?php $users = $this->data['sub_content']['users'];?>
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
<!--                    <td class="col-2"><img ng-src="--><?php //= __WEB_ROOT__ . '/public/uploads/{{ user.thumbnail }}'?><!--" alt="" class="img-fluid"></td>-->
                    <td>{{ $index + 1; }}</td>
                    <td>{{ user.username }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.role }}</td>
                    <td>{{ user.status }}</td>
                    <td class="text-center">
                        <a href="<?= __WEB_ROOT__ . '/admin/user/profile/{{ user.id }}' ?>" class="btn-sm btn-primary">View</a>
                        <a href="<?= __WEB_ROOT__ . '/admin/user/sua-san-pham/{{ user.id }}' ?>" class="btn-sm btn-warning">Edit</a>
                        <a href="<?= __WEB_ROOT__ . '/admin/user/xoa-san-pham/{{ user.id }}' ?>" class="btn-sm btn-danger">Delete</a>
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
<script>
    const app = angular.module('App', []);
    app.controller('userController', ( $scope ) => {
        $scope.Columns = [ "STT", "Tên người dùng", "Email", "Vai trò", "Trạng thái"];
        $scope.init = () => {
            $scope.fetchData();
        }
        $scope.fetchData = () => {
            $scope.users = <?= json_encode($this->data['sub_content']['users']); ?>

        }
    });
</script>