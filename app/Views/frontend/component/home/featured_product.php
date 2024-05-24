<?php
// Lấy ra tất cả các chuyên mục
$categories = $this->data['sub_content']['category_menu'];
// Lấy ra tất cả sản phẩm
$products = $this->data['sub_content']['products'];
?>
<!-- Featured Section Begin -->
<section class="featured spad" ng-controller="isotopeCtrl">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul id="filters">
                        <li class="active" data-filter="*">All</li>
                        <?php foreach ($categories as $category): ?>
                            <li data-filter=".<?= $category['id']; ?>"><?= $category['name']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter" ng-controller="CartController" ng-init="fetchData()">
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ product.category_id }}" ng-repeat="product in products">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg">
                        <img src="<?= __WEB_ROOT__ . '/public/uploads/{{ product.thumbnail }}' ?>" alt="" class="img-fluid">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a ng-click="addToCart(product)"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?= __WEB_ROOT__ . '/san-pham/{{ product.id }}'?>">{{ product.title }}</a></h6>
                        <h5>{{ product.price | currency }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Section End -->
<script>
    app.controller('isotopeCtrl', function($scope, $http) {
        $scope.init = () => {
            $scope.fetchData();
        }
        $scope.fetchData = () => {
            $scope.products = <?= json_encode($this->data['sub_content']['products']); ?>
        }

    });
</script>
<script>
    $(document).ready(function(){
        // Initialize Isotope
        var $grid = $('.featured__filter').isotope({
            itemSelector: '.mix',
            layoutMode: 'fitRows'
        });

        // Filter items on button click
        $('#filters').on('click', 'li', function(){
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });

            // Add 'active' class to the clicked filter button
            $('#filters li').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>