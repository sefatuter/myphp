<?php
session_start();
if (!isset($_SESSION["agent_id"])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Welcome, <?= htmlspecialchars($_SESSION["agent_name"]) ?> 🧠</h2>
<a href="logout.php">Logout</a>
