<?php $categories = $this->data['sub_content']['category']; // Lấy ra tất cả các chuyên mục ?>
<div class="sidebar__item">
    <h4>Department</h4>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li><a href="<?= __WEB_ROOT__ . '/danh-muc-san-pham/'. $category['id'] ?>"><?= $category['name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>