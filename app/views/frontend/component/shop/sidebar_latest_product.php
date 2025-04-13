<?php $latest_products = $this->data['sub_content']['latest-products']; ?>
<div class="sidebar__item">
    <div class="latest-product__text">
        <h4>Sản phẩm mới nhất</h4>
        <div class="latest-product__slider owl-carousel">
            <div class="latest-prdouct__slider__item">
                <?php foreach ($latest_products as $latest_product) : ?>
                    <a href="<?= __WEB_ROOT__ . '/san-pham/' . $latest_product['id']; ?>" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="<?= __WEB_ROOT__ . '/public/uploads/' . $latest_product['thumbnail'] ?>" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6><?= $latest_product['title']; ?></h6>
                            <span><?= $latest_product['price']; ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>