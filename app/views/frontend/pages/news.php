<!-- breadcrumb-section -->
<?php $this->render('frontend/components/breadcrumb'); ?>
<!-- end breadcrumb section -->

<?php
$posts = $this->data['sub_content']['posts'];

?>
<!-- latest news -->
<div class="latest-news mt-150 mb-150">
    <div class="container">
        <div class="row">
            <?php foreach ($posts as $post) : ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="<?= __WEB_ROOT__ . '/tin-tuc/' . $post['slug']; ?>"><div class="latest-news-bg news-bg-1"></div></a>
                    <div class="news-text-box">
                        <h3><a href="<?= __WEB_ROOT__ . '/tin-tuc/' . $post['slug']; ?>"><?= $post['title']; ?></a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i><?= $post['username']; ?></span>
                            <span class="date"><i class="fas fa-calendar"></i><?= date('d/m/Y', strtotime($post['updated_at'])) ?></span>
                        </p>
                        <p class="excerpt"><?= $post['excerpt']; ?></p>
                        <a href="<?= __WEB_ROOT__ . '/tin-tuc/' . $post['slug']; ?>" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="pagination-wrap">
                            <ul>
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li><a class="active" href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end latest news -->

<!-- logo carousel -->
<?php $this->render('frontend/components/logo_carousel'); ?>
<!-- end logo carousel -->