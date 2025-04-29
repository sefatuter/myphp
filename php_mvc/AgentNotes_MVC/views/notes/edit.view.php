<?php require 'views/layouts/header.php'; ?>

<h2>🖊 Edit Note</h2>

<?php if (!empty($error)) : ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($note['title']) ?>" required>
    <textarea name="body"><?= htmlspecialchars($note['body']) ?></textarea>
    <button type="submit">Update</button>
</form>

<a href="?page=notes">← Back to Notes</a>

<?php require 'views/layouts/footer.php'; ?>
