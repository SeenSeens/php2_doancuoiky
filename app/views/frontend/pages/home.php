<?php

$product_categories = $this->data['sub_content']['pro_cats'];
?>
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục</span>
                    </div>
                    <ul>
                        <?php
                        foreach ($categories as $category) :
                            if ( $category['slug'] !== 'chua-phan-loai') :
                        ?>
                            <li><a href="<?= __WEB_ROOT__ . '/danh-muc-san-pham/'. $category['slug']; ?>"><?= $category['name'] ?></a></li>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" placeholder="Bạn cần gì?">
                            <button type="submit" class="site-btn">TÌM KIẾM</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0385 573 558</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="background-image: url( <?= __WEB_ROOT__ . '/public/frontend/img/hero/banner.jpg' ?>) " style="background-image: url( <?= __WEB_ROOT__ . '/public/frontend/img/hero/banner.jpg' ?>) ">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php
                foreach ($categories as $category) :
                    if ( $category['slug'] !== 'chua-phan-loai') :
                ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg img-fluid" data-setbg="<?= __WEB_ROOT__ . '/public/uploads/' . $category['thumbnail'] ?>">
                                <h5><a href="#"><?= $category['name'] ?></a></h5>
                            </div>
                        </div>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <?php
                        foreach ($categories as $category) :
                            if ( $category['slug'] !== 'chua-phan-loai') :
                        ?>
                        <li data-filter=".<?= $category['slug'] ?>"><?= $category['name'] ?></li>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php
            foreach ($products as $product) :
                if ( $category['slug'] !== 'chua-phan-loai') :
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $product['term_slug'] ?>">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= __WEB_ROOT__ . '/public/uploads/' . $product['thumbnail'] ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?= __WEB_ROOT__ . '/san-pham/' . $product['slug'] ?>"><?= $product['title'] ?></a></h6>
                        <h5><?= isset($product['price']) ? number_format($product['price'] , 0, ',', '.') . ' VND' : 'Liên hệ' ?></h5>
                    </div>
                </div>
            </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/832579c2124e299add4f74bad36d4300.png' ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/e46831b09c5ba4ecb1edf3faf92a176c.png' ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm mới nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-1.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-2.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-3.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-1.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-2.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-3.jpg' ?>" alt="">
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
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-1.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-2.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-3.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-1.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-2.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-3.jpg' ?>" alt="">
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
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-product__item__pic">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-1.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-2.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-3.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-1.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-2.jpg' ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= __WEB_ROOT__ . '/public/frontend/img/latest-product/lp-3.jpg' ?>" alt="">
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
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Tin tức</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($news as $new): ?>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <?php if ( !empty($new['thumbnail'])) : ?>
                            <img src="<?= __WEB_ROOT__ . '/public/uploads/' . $new['thumbnail']; ?>" alt="">
                        <?php else: ?>
                            <img src="<?= __WEB_ROOT__ ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#"><?= $new['title']; ?></a></h5>
                        <p><?= $new['excerpt'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Blog Section End -->

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