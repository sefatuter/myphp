<?php require 'views/layouts/header.php'; ?>

<h2>➕ Create New Note</h2>

<?php if (!empty($error)) : ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST">
    <input type="text" name="title" placeholder="Note Title" required>
    <textarea name="body" placeholder="Note content..."></textarea>
    <button type="submit">Save</button>
</form>

<a href="?page=upload">Upload file</a>
<br><br>
<a href="?page=notes">← Back to Notes</a>

<?php require 'views/layouts/footer.php'; ?>
