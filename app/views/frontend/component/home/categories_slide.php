<?php
// Lấy ra tất cả các chuyên mục
$categories = $this->data['sub_content']['category_menu'];
?>
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php foreach ($categories as $category): ?>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?= __WEB_ROOT__ . '/public/uploads/' . $category['thumbnail']; ?>">
                        <h5><a href="<?= __WEB_ROOT__ . '/danh-muc-san-pham/' . $category['id'] ?>"><?= $category['name']; ?></a></h5>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->