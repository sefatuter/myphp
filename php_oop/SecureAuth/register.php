<?php
session_start();
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

    // echo $_POST['username']; // <script>alert('Hacked')</script>

    $username = htmlspecialchars(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $email    = htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $password = htmlspecialchars(filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW)); // Use stricter rules if needed

    /* Example: Advanced Validation
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $age      = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, ["options" => ["min_range" => 18, "max_range" => 99]]);
        $terms    = filter_input(INPUT_POST, 'terms', FILTER_VALIDATE_BOOLEAN);
        $code = filter_input(INPUT_POST, 'code', FILTER_VALIDATE_REGEXP, [
            "options" => ["regexp" => "/^[A-Z]{3}\d{3}$/"] // e.g. ABC123
        ]);

        if (!$email || !$age || !$terms) {
            echo "❌ Invalid data";
            exit;
        }
    */
    
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