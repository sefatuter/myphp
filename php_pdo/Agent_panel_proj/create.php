<?php
require 'pdo_connect.php';
require 'classes/Agent.php';

$agentManager = new Agent($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    $agentManager->create($username, $email, $password);
    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" href="style.css">

<h2>➕ Register Agent</h2>
<form method="POST">
    <input name="username" placeholder="Username" required>
    <input name="email" placeholder="Email" type="email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Save</button>
</form>
