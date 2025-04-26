<?php

require 'pdo_connect.php';
require 'classes/User.php';

$user = new User($conn);

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'], $token)) {
        echo "🚨 CSRF token invalid.";
        exit;
    }

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW); // Use stricter rules if needed
    
    if (!$email || empty($username) || empty($password)) {
        echo "❌ Invalid input. Please check your data.";
        exit;
    } else {
        $user->register($username, $email, $password);
        echo "<br>Registered! <a href='login.php'>Login</a>";
    }
}

?>

<form method="POST">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <input name="username" placeholder="Username"><br>
    <input name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Register</button>
</form>