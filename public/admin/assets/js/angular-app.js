const app = angular.module('App', []);
app.controller('Controller', ( $scope ) => {
    $scope.Columns = [ "STT", "Tên chuyên mục", "Hình ảnh" ]
});