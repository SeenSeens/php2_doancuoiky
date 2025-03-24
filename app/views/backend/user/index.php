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
                        <a href="<?= __WEB_ROOT__ . '/admin/user/profile/{{ user.id }}' ?>" class="btn-sm btn-warning">Edit</a>
                        <a href="#" ng-click="deleteUser(user.id)" class="btn-sm btn-danger">Delete</a>
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
    app.controller('userController', ( $scope, $http ) => {
        $scope.Columns = [ "STT", "Tên người dùng", "Email", "Vai trò", "Trạng thái"];
        $scope.init = () => {
            $scope.fetchData();
        }
        $scope.fetchData = () => {
            $scope.users = <?= json_encode($this->data['sub_content']['users']); ?>

        }
        $scope.deleteUser = (id) => {
            // Confirm deletion with the user
            if (confirm('Bạn chắc chắn có muốn xóa user này không?')) {
                // Send AJAX request to delete the category
                $http({
                    method: 'DELETE',
                    url: '<?= __WEB_ROOT__ . '/admin/user/delete' ?>', // Change the URL to your delete endpoint
                    data:{'id': id, 'action':'delete'}
                }).then( res => {
                    $scope.message = "User đã được xóa thành công!";
                    // Xóa user khỏi danh sách sau khi xóa thành công
                    $scope.users = $scope.users.filter(function(user) {
                        return user.id !== id;
                    });
                }).catch( err => {
                    $scope.message = "Xóa user thất bại. Vui lòng thử lại!";
                    console.log('Lỗi: ', err);
                })
            }
        }
    });
</script>