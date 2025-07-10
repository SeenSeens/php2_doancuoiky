<?php
$this->render('backend/components/breadcrumb');
?>
<div class="container-fluid">
    <div class="row g-3">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <?php $this->render('backend/terms/form'); ?>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <?php $this->render('backend/terms/table'); ?>
                </div>
            </div>
        </div>
    </div>
</div>