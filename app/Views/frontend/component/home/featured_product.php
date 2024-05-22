<?php
// Lấy ra tất cả các chuyên mục
$categories = $this->data['sub_content']['category_menu'];
// Lấy ra tất cả sản phẩm
$products = $this->data['sub_content']['products'];
?>
<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <?php foreach ($categories as $category): ?>
                            <li data-filter=".<?= $category['slug']; ?>"><?= $category['name']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php foreach ($products as $product): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= __WEB_ROOT__ . '/public/uploads/' . $product['thumbnail'] ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?= __WEB_ROOT__ . '/san-pham/'. $product['id'] ?>"><?= $product['title'] ?></a></h6>
                        <h5><?= $product['price'] ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->