<?php
require 'pdo_connect.php';
require 'classes/User.php';
require 'classes/Auth.php';

session_start();

$user = new User($conn);
$auth = new Auth();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $loggedInUser = $user->login($_POST['email'], $_POST['password']);
    if ($loggedInUser) {
    
        echo "Old Session ID: " . session_id() . "<br>";
        session_regenerate_id(true);  // 🔒 Regenerate session ID
        echo "New Session ID: " . session_id() . "<br>";
    
        $auth->login($loggedInUser);
        header("Location: dashboard.php"); // to see echoes comment this.
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