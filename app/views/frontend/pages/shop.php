<?php
$title = $this->data['sub_content']['title'];
//$products = $this->data['sub_content']['products'];
?>
<!-- Breadcrumb Section Begin -->
<?php $this->render('frontend/layout/breadcrumb') ?>
<!-- Breadcrumb Section End -->
<!-- Product Section Begin -->
<section class="product spad" ng-controller="shopController">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <?php $this->render('frontend/layout/shop/department_sidebar__item') ?>
                    <?php $this->render('frontend/layout/shop/sidebar_latest_product'); ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-7" ng-controller="CartController" ng-init="fetchData()">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6" ng-repeat="product in products">
                        <div class="product__item">
                            <div class="product__item__pic set-bg">
                                <img src="<?= __WEB_ROOT__ . '/public/uploads/{{ product.thumbnail }}' ?>" alt="" class="img-fluid">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a ng-click="addToCart(product)"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="<?= __WEB_ROOT__ . '/san-pham/{{ product.id }}'; ?>">{{ product.title }}</a></h6>
                                <h5>{{ product.price | currency}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hiển thị liên kết phân trang -->
                <div class="pagination">
                    <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                        <a href="/shop/index/<?php echo $i; ?>"<?php if ($i == $pagination['current_page']) echo ' class="active"'; ?>><?php echo $i; ?></a>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<script>
    app.controller('shopController', function($scope, $http) {
        $scope.init = () => {
            $scope.fetchData();
        }
        $scope.fetchData = () => {
            $scope.products = <?= json_encode($this->data['sub_content']['products']); ?>
        }

    });
</script>