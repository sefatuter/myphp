<?php
require 'pdo_connect.php';
require 'classes/Agent.php';

$agentManager = new Agent($conn);
$agents = $agentManager->getAll();
?>
<link rel="stylesheet" href="style.css">

<h2>🧠 Agent Directory</h2>
<a href="create.php">➕ Add New Agent</a>
<hr>

<?php foreach ($agents as $agent): ?>
    <p>
        👤 <?= htmlspecialchars($agent['username']) ?> |
        📧 <?= htmlspecialchars($agent['email']) ?> |
        <a href="edit.php?id=<?= $agent['id'] ?>">✏️ Edit</a> |
        <a href="delete.php?id=<?= $agent['id'] ?>" onclick="return confirm('Delete agent?')">🗑️ Delete</a>
    </p>
<?php endforeach ?>
