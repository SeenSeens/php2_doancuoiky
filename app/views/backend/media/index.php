<?php $this->render('backend/components/breadcrumb'); ?>
<?php
$medias = $this->data['sub_content']['media'];
?>
<div id="elfinder"></div>
<div class="container">
    <h3>Thư viện Media</h3>

</div>

<script>
    window.ELFINDER_CONNECTOR_URL = "<?= __WEB_ROOT__ . '/admin/media/connector'?>";
</script>
<script src="<?= __WEB_ROOT__ . '/public/admin/js/elfinder-init.js' ?>"></script>