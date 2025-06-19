<section class="breadcrumb-section set-bg" data-setbg="<?= __WEB_ROOT__ . '/public/frontend/img/breadcrumb.jpg' ?>" style="background-image: url(<?= __WEB_ROOT__ .'/public/frontend/img/breadcrumb.jpg'; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= $this->data['sub_content']['page_title']; ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?= __WEB_ROOT__ ?>">Trang chủ</a>
                        <span><?= $this->data['sub_content']['page_title']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>