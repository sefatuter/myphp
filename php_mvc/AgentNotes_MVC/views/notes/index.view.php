<?php require 'views/layouts/header.php'; ?>

<h2>📝 Your Notes</h2>

<a href="?page=notes_create">➕ Create New Note</a>
<hr>

<?php foreach ($notes as $note): ?>
    <div>
        <h3><?= htmlspecialchars($note['title']) ?></h3>
        <p><?= nl2br(htmlspecialchars($note['body'])) ?></p>
        <a href="?page=notes_edit&id=<?= $note['id'] ?>">🖊 Edit</a>
        <a href="?page=notes_delete&id=<?= $note['id'] ?>" onclick="return confirm('Delete this note?')">❌ Delete</a>
        <hr>
    </div>
<?php endforeach; ?>

<?php require 'views/layouts/footer.php'; ?>
