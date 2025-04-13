const app = angular.module('App', []);
app.controller('appCrtl', ($scope) => {
    // Khởi tạo giỏ hàng từ local storage
    $scope.cart = JSON.parse(localStorage.getItem('cart')) || [];
});

app.controller('CartController', ($scope, $http, $window) => {
    const webRoot = $window.data.__WEB_ROOT__;
    $scope.Columns = [ 'Products', 'Price', 'Quantity', 'Total', '' ];
    // Khởi tạo giỏ hàng từ local storage
    $scope.cart = JSON.parse(localStorage.getItem('cart')) || [];
    // Hàm thêm sản phẩm vào giỏ hàng
    $scope.addToCart = function(product) {
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        var existingItem = $scope.cart.find(item => item.id === product.id);
        if (existingItem) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng
            existingItem.quantity++;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
            $scope.cart.push({
                id: product.id,
                title: product.title,
                price: product.price,
                thumbnail: product.thumbnail,
                quantity: 1
            });
            alert('Thêm thành công')
        }
        // Lưu giỏ hàng mới vào local storage
        localStorage.setItem('cart', JSON.stringify($scope.cart));
    };
    // Xóa một mặt hàng khỏi giỏ hàng
    $scope.removeFromCart = function(card, index) {
        // Lấy mảng từ localStorag
        let array = localStorage.getItem(card);
        if (array) {
            array = JSON.parse(array);
        } else {
            console.error('Array not found in localStorage');
            return;
        }
        // Kiểm tra chỉ mục hợp lệ
        if (index < 0 || index >= array.length) {
            console.error('Invalid index');
            return;
        }
        // Bước 2: Xóa item khỏi mảng
        array.splice(index, 1);  // splice(x, 1) sẽ xóa 1 phần tử tại vị trí x
        // Bước 3: Cập nhật mảng trong localStorage
        localStorage.setItem(card, JSON.stringify(array));
        // Optional: Hiển thị mảng đã cập nhật
        $window.location.href = '';
    };
    // Clear the cart
    $scope.clear = () => {
        localStorage.removeItem('cart');
        $scope.cart = [];
    };
    // Hàm tính tổng giá trị giỏ hàng
    $scope.getTotal = function() {
        return $scope.cart.reduce((total, item) => {
            return total + (item.price * item.quantity);
        }, 0);
    };
    // Hàm tính tổng số lượng sản phẩm
    $scope.getTotalItems = function() {
        return $scope.cart.reduce((total, item) => {
            return total + item.quantity;
        }, 0);
    };

    // Hàm cập nhật localStorage
    $scope.updateLocalStorage = function() {
        localStorage.setItem('cart', JSON.stringify($scope.cart));
    };
    // Hàm tăng số lượng sản phẩm
    $scope.increaseQuantity = function(index) {
        if (index >= 0 && index < $scope.cart.length) {
            $scope.cart[index].quantity++;
            $scope.updateLocalStorage();
        }
    };
    // Hàm giảm số lượng sản phẩm
    $scope.decreaseQuantity = function(index) {
        if (index >= 0 && index < $scope.cart.length) {
            if ($scope.cart[index].quantity > 1) {
                $scope.cart[index].quantity--;
                $scope.updateLocalStorage();
            } else {
                // Nếu số lượng là 1 và người dùng muốn giảm nữa, thì xóa mặt hàng khỏi giỏ hàng
                $scope.removeFromCart(index);
            }
        }
    };

    // Phần xử lý trang đặt hàng
    $scope.submitForm = () => {
        $http({
            method: 'POST',
            url: webRoot + '/thanh-toan',
            data: {
                'buyername': $scope.buyername,
                'address': $scope.address,
                'phone': $scope.phone,
                'email': $scope.email,
                'products': $scope.cart,
                'subtotal': $scope.getTotal(),
                'total': $scope.getTotal(),
                'notes': $scope.notes,
            }
        }).then( res => {
            $scope.successMessage = res.data.message;
            $window.location.href = webRoot + '/thanh-toan';
            $scope.clear();
        }).catch( err => {
            $scope.errorMessage = err.data.error;
            console.log('Loi: ' + err);
        })
    }
    // Clear input & cart
    $scope.clear = () => {
        $scope.buyername = "";
        $scope.address = "";
        $scope.phone = "";
        $scope.email = "";
        // localStorage.removeItem('cart');
        // $scope.cart = [];
    }

    $scope.init = () => {
        $scope.getTotalItems();
    }
});