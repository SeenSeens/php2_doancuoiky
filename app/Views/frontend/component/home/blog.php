<?php
$posts = $this->data['sub_content']['posts'];
?>
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ( $posts as $post ) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="<?= __WEB_ROOT__ . '/public/images/' . $post['thumbnail']; ?>" alt="<?= $post['title']; ?>">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> <?= $post['updated_at']; ?></li>
<!--                            <li><i class="fa fa-comment-o"></i> 5</li>-->
                        </ul>
                        <h5><a href="#"><?= $post['title']; ?></a></h5>
                        <p><?= $post['excerpt']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>