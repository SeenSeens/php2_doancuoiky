<?php $categories = $this->data['sub_content']['category_menu']; ?>
<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All departments</span>
    </div>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li><a href="<?= __WEB_ROOT__ . '/danh-muc-san-pham/' . $category['id'] ?>"><?= $category['name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>