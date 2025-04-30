<?php require 'views/layouts/header.php'; ?>

<h2>📤 Upload a File</h2>

<?php if (!empty($error)) : ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="upload" required>
    <button type="submit">Upload</button>
</form>

<?php require 'views/layouts/footer.php'; ?>
