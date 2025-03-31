<?php
$this->render('backend/components/breadcrumb');
?>
<div class="container-fluid">
    <div class="row g-3">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <?php
                    if (!empty($this->data['category'])) {
                        $this->render('backend/category/update');
                    } else {
                        $this->render('backend/category/create');
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <?php //$this->render($content, $sub_content); ?>
                    <?php $this->render('backend/components/table'); ?>
                </div>
            </div>
        </div>
    </div>
</div>