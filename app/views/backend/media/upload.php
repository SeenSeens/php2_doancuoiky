<h3>Tải ảnh lên thư viện</h3>

<?php if (!empty($_SESSION['flash'])): ?>
    <div class="alert alert-success"><?= $_SESSION['flash'] ?></div>
    <?php unset($_SESSION['flash']); ?>
<?php elseif (!empty($_SESSION['flash_error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['flash_error'] ?></div>
    <?php unset($_SESSION['flash_error']); ?>
<?php endif; ?>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="file">Chọn ảnh:</label><br>
    <input type="file" name="file" id="file" required><br><br>
    <button type="submit">Tải lên</button>
</form>
