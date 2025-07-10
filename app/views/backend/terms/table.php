<?php $terms = $this->data['sub_content']['terms']; ?>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th style="width: 0;">STT</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th style="width: 0"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ( $terms as $index => $term ) : ?>
        <tr id="row-<?= $term['term_id']; ?>">
            <td><?= $index + 1; ?></td>
            <td><?= $term['name']; ?></td>
            <td class="text-wrap"><?= $term['description']; ?></td>
            <td >
                <div class="d-flex order-actions">
                    <a href="#" class="text-primary"><i class="lni lni-eye"></i></a>
                    <a href="<?= __WEB_ROOT__ . '/admin/' . $this->data['taxonomy'] .'/edit_id=' . $term['term_id']; ?>" class="mx-2 text-warning"><i class="bx bxs-edit"></i></a>
                    <a class="text-danger delete-term"  data-id="<?= $term['term_id']; ?>"><i class="bx bxs-trash"></i></a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script src="<?= __WEB_ROOT__ . '/public/admin/js/delete.js' ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new DeleteHandler('.delete-term', '<?= __WEB_ROOT__ ?>/admin/<?= $this->data['taxonomy'] ?>/delete', 'Bạn có chắc chắn muốn xóa term này?').init();
    });
</script>
