<?php
$product = $this->data['sub_content']['product-content'];

$title = $this->data['sub_content']['title'];
$cat_title = $this->data['sub_content']['cat_title'];
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= __WEB_ROOT__ . '/public/img/breadcrumb.jpg' ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= $title; ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?= __WEB_ROOT__ ?>">Trang chủ</a>
                        <a href="<?= __WEB_ROOT__ ?>"><?= $cat_title['name'] ?></a>
                        <span><?= $title ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container" ng-app="shoppingCart" ng-controller="CartController">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?= __WEB_ROOT__ . '/public/uploads/' . $product['thumbnail']; ?>" alt="<?= $product['title'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $product['title'] ?></h3>
                    <div class="product__details__price">Giá bán <?= $product['price'] ?></div>
                    <p><?= $product['excerpt'] ?></p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="number" value="1" ng-model="product.quantity">
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn primary-btn" ng-click="addToCart()">ADD TO CARD</button>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Chuyên mục</b> <span><?= $cat_title['name']; ?></span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active">Mô tả</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="product__details__tab__desc">
                                <?= $product['description']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<?php $this->render('frontend/component/products/related_product'); ?>
<!-- Related Product Section End -->

<script src="<?= __WEB_ROOT__ . '/public/js/angular.min.js' ?>"></script>
<script>
    const app = angular.module('shoppingCart', []);

    app.controller('CartController', function($scope, $http) {
        // Tải giỏ hàng từ Local Storage khi trang được tải
        $scope.cart = JSON.parse(localStorage.getItem('cart')) || [];
        $scope.addToCart = (product) => {
            $http.post( '<?= __WEB_ROOT__ . '/add-to-cart' ?>', {
                id: '<?= $product['id'] ?>',
                title: '<?= $product['title'] ?>',
                price: '<?= $product['price'] ?>',
                cart: JSON.stringify($scope.cart)
            }).then( res => {
                // Xử lý phản hồi từ server
                // Ví dụ cập nhật giỏ hàng trên giao diện người dùng
                $scope.cart = res.data;
                localStorage.setItem('cart', JSON.stringify(res.data));
            }).catch( err => {
                console.error('Error adding to cart: ', err);
            })
        }
    });
</script>