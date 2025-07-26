<!-- Hero Section Begin -->
<?php $this->render('frontend/template-parts/hero__categories'); ?>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<?php $this->render('frontend/template-parts/breadcrumb'); ?>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?= __WEB_ROOT__ . '/public/uploads/' . $product['thumbnail'] ?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="<?= __WEB_ROOT__ . '/public/frontend/img/product/details/product-details-2.jpg' ?>"
                             src="<?= __WEB_ROOT__ . '/public/frontend/img/product/details/thumb-1.jpg' ?>" alt="">
                        <img data-imgbigurl="<?= __WEB_ROOT__ . '/public/frontend/img/product/details/product-details-3.jpg' ?>"
                             src="<?= __WEB_ROOT__ . '/public/frontend/img/product/details/thumb-2.jpg' ?>" alt="">
                        <img data-imgbigurl="<?= __WEB_ROOT__ . '/public/frontend/img/product/details/product-details-5.jpg' ?>"
                             src="<?= __WEB_ROOT__ . '/public/frontend/img/product/details/thumb-3.jpg' ?>" alt="">
                        <img data-imgbigurl="<?= __WEB_ROOT__ . '/public/frontend/img/product/details/product-details-4.jpg' ?>"
                             src="<?= __WEB_ROOT__ . '/public/frontend/img/product/details/thumb-4.jpg' ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $product['title'] ?></h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price"><?= isset($product['price']) ? number_format($product['price'] , 0, ',', '.') . ' VND' : 'Liên hệ' ?></div>
                    <p><?= $product['excerpt'] ?></p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <button class="primary-btn add-to-cart-btn"
                            data-id="<?= $product['id'] ?>"
                            data-name="<?= $product['title'] ?>"
                            data-price="<?= $product['price'] ?>"
                            data-image="<?= $product['thumbnail'] ?>">
                        🛒 Thêm vào giỏ
                    </button>

                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
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
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                               aria-selected="true">Description</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <?= $product['description'] ?>
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
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($related_products as $relatedProduct) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?= !empty($relatedProduct['thumbnail']) ? __WEB_ROOT__ . '/public/uploads/' . $relatedProduct['thumbnail'] : __WEB_ROOT__ . '/public/admin/images/no-image.png' ?>">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="<?= __WEB_ROOT__ . '/san-pham/' . $product['slug'] ?>"><?= $product['title'] ?></a></h6>
                        <h5><?= isset($product['price']) ? number_format($product['price'] , 0, ',', '.') . ' VND' : 'Liên hệ' ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btn = document.querySelector(".add-to-cart-btn");
        const qtyInput = document.querySelector(".pro-qty input");

        if (!btn) return;

        btn.addEventListener("click", function () {
            const product = {
                id: parseInt(this.dataset.id),
                name: this.dataset.name,
                price: parseInt(this.dataset.price),
                image: this.dataset.image,
                quantity: parseInt(qtyInput.value) || 1
            };

            // Load cart from localStorage
            const cart = JSON.parse(localStorage.getItem("cart")) || [];

            const index = cart.findIndex(item => item.id === product.id);
            if (index !== -1) {
                cart[index].quantity += product.quantity;
            } else {
                cart.push(product);
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            alert("✅ Đã thêm vào giỏ hàng!");
        });
    });
</script>

