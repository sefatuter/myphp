<?php
session_start();
require 'classes/Auth.php';
$auth = new Auth();

if (!$auth->isAuthenticated()) {
    header("Location: login.php");
    exit;
}

$user = $auth->user();
echo "🔓 Welcome back, " . htmlspecialchars($user["username"]);
?>
<a href="logout.php">Logout</a>
