<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Notes App</title>
    <style>
        textarea { display: block; margin-bottom: 1rem; width: 100%; }
        body { font-family: monospace; background: white; color: black; padding: 2rem; }
        input, button { margin-bottom: 1rem; }
    </style>
</head>
<body>

<?php if (!empty($_SESSION['flash'])): ?>
    <p style="color: lime; font-weight: bold;">
        <?= htmlspecialchars($_SESSION['flash']) ?>
    </p>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<!-- helpers.php -->
<?php if ($msg = flash('success')): ?>
    <p style="color: lime"><?= e($msg) ?></p>
<?php endif; ?>
