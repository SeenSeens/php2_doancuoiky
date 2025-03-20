<!-- Hero Section Begin -->
<section class="hero" ng-controller="headerSearch">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->render('frontend/layout/header/hero__categories') ?>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form ng-submit="search()">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" ng-model="searchText" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0385 573 558</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="<?= __WEB_ROOT__ . '/public/uploads/638513562914241889_F-C1_1200x300.jpg' ?>">
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search Results</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div ng-if="filteredProducts.length === 0">
                    No results found.
                </div>
                <ul>
                    <li ng-repeat="product in filteredProducts">
                        {{ product.title }}
                    </li>
                </ul>
<!--                <div class="row">-->
<!--                    <div class="col-lg-4 col-md-6 col-sm-6" ng-repeat="product in filteredProducts">-->
<!--                        <div class="product__item">-->
<!--                            <div class="product__item__pic set-bg">-->
<!--                                <img src="--><?php //= __WEB_ROOT__ . '/public/uploads/{{ product.thumbnail }}' ?><!--" alt="" class="img-fluid">-->
<!--                                <ul class="product__item__pic__hover">-->
<!--                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                                    <li><a ng-click="addToCart(product)"><i class="fa fa-shopping-cart"></i></a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div class="product__item__text">-->
<!--                                <h6><a href="--><?php //= __WEB_ROOT__ . '/san-pham/{{ product.id }}'; ?><!--">{{ product.title }}</a></h6>-->
<!--                                <h5>{{ product.price | currency}}</h5>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
<!-- Hero Section End -->
<script>
    app.controller('headerSearch', ['$scope', '$http', function($scope, $http) {
        $scope.products = <?= json_encode($this->data['sub_content']['products']); ?>
        // Tạo một biến để lưu giá trị tìm kiếm
        $scope.searchText = '';
        // Tạo một biến để lưu kết quả tìm kiếm
        $scope.filteredProducts = [];
        // Hàm tìm kiếm
        $scope.search = function() {
            const searchText = $scope.searchText.toLowerCase();
            $scope.filteredProducts = $scope.products.filter(product => {
                const title = product.title ? product.title.toLowerCase() : '';
                return title.includes(searchText);
            });

            // Hiển thị modal sau khi tìm kiếm
            $('#searchModal').modal('show');
        };
    }]);
</script>