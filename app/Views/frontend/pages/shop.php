<?php
$title = $this->data['sub_content']['title'];
$categories = $this->data['sub_content']['category']; // Lấy ra tất cả các chuyên mục
$products = $this->data['sub_content']['products'];
?>
<!-- Breadcrumb Section Begin -->
<?php $this->render('frontend/component/breadcrumb') ?>
<!-- Breadcrumb Section End -->
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            <?php foreach ($categories as $category): ?>
                            <li><a href="#"><?= $category['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php $this->render('frontend/component/shop/sidebar_latest_product'); ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <?php foreach ($products as $product): ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?= __WEB_ROOT__ . '/public/uploads/' . $product['thumbnail'] ?>">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="<?= __WEB_ROOT__ . '/san-pham/' . $product['id']; ?>"><?= $product['title'] ?></a></h6>
                                <h5><?= $product['price'] ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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