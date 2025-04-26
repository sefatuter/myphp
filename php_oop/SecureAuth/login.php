<?php
session_start();
require 'pdo_connect.php';
require 'classes/User.php';
require 'classes/Auth.php';

$user = new User($conn);
$auth = new Auth();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $loggedInUser = $user->login($_POST['email'], $_POST['password']);
    if ($loggedInUser) {
        $auth->login($loggedInUser);
        header("Location: dashboard.php");
        exit;
    } else {
        echo "❌ Invalid credentials";
    }
}

?>

<form method="POST">
    <input name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>