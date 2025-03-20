<?php $this->render('frontend/layout/breadcrumb') ?>
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
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{ totalProducts }}</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<script>
    app.controller('shopController', ['$scope', '$http', function($scope, $http) {
        $scope.init = () => {
            $scope.fetchData();
        }
        $scope.fetchData = () => {
            $scope.products = <?= json_encode($this->data['sub_content']['products']); ?>;
            $scope.totalProducts = $scope.products.length; // Tính tổng số lượng phần tử
        }
        // Khởi tạo controller
        $scope.init();
    }]);
</script>