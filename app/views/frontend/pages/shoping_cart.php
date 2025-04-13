<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad" ng-controller="CartController">
    <div class="container" ng-controller="ClearCartController">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th ng-repeat="col in Columns">{{ col }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in cart track by $index">
                                <td class="shoping__cart__item">
                                    <img src="<?= __WEB_ROOT__ . '/public/uploads/{{item.thumbnail}}' ?>" alt="" class="w-25" >
                                    <h5>{{ item.title }} {{ $index }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{ item.price | currency }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <span class="dec qtybtn" ng-click="decreaseQuantity($index)">-</span>
                                            <input type="text" value="{{ item.quantity }}">
                                            <span class="inc qtybtn" ng-click="increaseQuantity($index)">+</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{ item.price * item.quantity | currency }}
                                </td>

                                <td class="shoping__cart__item__close" >
                                    <a ng-click="removeFromCart('cart', $index)"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?= __WEB_ROOT__ . '/cua-hang' ?>" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                    <a ng-click="clear()" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>Xóa giỏ hàng</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>{{ getTotal() | currency }}</span></li>
                        <li>Total <span>{{ getTotal() | currency }}</span></li>
                    </ul>
                    <a href="<?= __WEB_ROOT__ . '/thanh-toan' ?>" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
<script>
    app.controller('ClearCartController', ($scope, $window, $compile) => {
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
                    if (index < 0 || index >= $scope.cart.length) {
                        console.error('Invalid index');
                        return;
                    }
                    $scope.cart.splice(index, 1);
                    $scope.updateLocalStorage();
                }
            }
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
            $window.location.href = '<?= __WEB_ROOT__ . '/gio-hang' ?>';
        };
        // Clear the cart
       $scope.clear = () => {
            localStorage.removeItem('cart');
            $scope.cart = [];
            $window.location.href = '<?= __WEB_ROOT__ . '/gio-hang' ?>';
       };
    })
</script>