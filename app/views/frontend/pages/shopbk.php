<div class="col-lg-9 col-md-7">
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?= __WEB_ROOT__ . '/public/uploads/' . $product['thumbnail'] ?>">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a ng-click="addToCart(product)"><i class="fa fa-shopping-cart"></i></a></li>
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