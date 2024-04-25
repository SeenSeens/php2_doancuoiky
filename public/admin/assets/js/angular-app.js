const app = angular.module('App', []);


app.controller('productController', ( $scope ) => {
    $scope.Columns = [ "STT", "Tên sản phẩm", "Hình ảnh", "Giá bán", "Giá giảm", "Chuyên mục"];
});