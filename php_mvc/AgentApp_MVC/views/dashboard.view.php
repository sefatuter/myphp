<?php require 'views/layouts/header.php'; ?>

<h2>📡 Agent Dashboard</h2>
<p>Welcome back, <strong><?= htmlspecialchars($username) ?></strong></p>
<a href="?page=logout">Logout</a>

<?php require 'views/layouts/footer.php'; ?>