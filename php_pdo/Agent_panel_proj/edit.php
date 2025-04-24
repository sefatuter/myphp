<?php
require 'pdo_connect.php';
require 'classes/Agent.php';

$agentManager = new Agent($conn);
$id = $_GET["id"];
$agent = $agentManager->getById($id);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];

    $agentManager->update($id, $username, $email);
    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" href="style.css">

<h2>✏️ Edit Agent</h2>
<form method="POST">
    <input name="username" value="<?= htmlspecialchars($agent['username']) ?>" required>
    <input name="email" value="<?= htmlspecialchars($agent['email']) ?>" type="email" required>
    <button type="submit">Update</button>
</form>
