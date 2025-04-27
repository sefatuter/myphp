<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agent App</title>
    <style>
        body { font-family: monospace; background: white; color: black; padding: 2rem; }
        input, button { margin-bottom: 1rem; }
    </style>
</head>
<body>

<?php if (!empty($_SESSION['flash'])): ?>
    <p style="color: red; font-weight: bold;">
        <?= htmlspecialchars($_SESSION['flash']) ?>
    </p>
    <?php 
    unset($_SESSION['flash']); 
    session_destroy();
    ?>
<?php endif; ?>

