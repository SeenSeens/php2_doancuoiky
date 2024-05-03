<?php
$latestProducts = $this->data['sub_content']['latest_products'];
?>
<div class="col-lg-4 col-md-6">
    <div class="latest-product__text">
        <h4>Latest Products</h4>
        <div class="latest-product__slider owl-carousel">
            <div class="latest-prdouct__slider__item">
                <?php foreach ($latestProducts as $latestProduct) : ?>
                <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                        <img src="<?= __WEB_ROOT__ . '/public/images/' . $latestProduct['thumbnail'] ?>" alt="">
                    </div>
                    <div class="latest-product__item__text">
                        <h6><?= $latestProduct['title'] ?></h6>
                        <span><?= $latestProduct['price'] ?></span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                        <img src="<?= __WEB_ROOT__ ?>/public/img/latest-product/lp-1.jpg" alt="">
                    </div>
                    <div class="latest-product__item__text">
                        <h6>Crab Pool Security</h6>
                        <span>$30.00</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>