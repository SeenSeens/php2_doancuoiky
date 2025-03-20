<?php $this->render('backend/components/breadcrumb'); ?>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Chuyên mục</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <td><?= $post['title'] ?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>