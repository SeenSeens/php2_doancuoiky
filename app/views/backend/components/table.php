<?php
$categories = $this->data['sub_content']['categories'];
?>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Đường dẫn</th>
        <th>Mô tả</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ( $categories as $index => $category ) : ?>
        <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $category['name']; ?></td>
            <td class="col-2"><?= $category['slug']; ?></td>
            <td class="text-wrap"><?= $category['description']; ?></td>
            <td class="col-3">
                <a href="<?= __WEB_ROOT__ . '/admin/category/edit_id=' . $category['term_id']; ?>" class="btn btn-sm btn-warning ">Edit</a>
                <button ng-click="deleteCategory( category.term_id )" class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>