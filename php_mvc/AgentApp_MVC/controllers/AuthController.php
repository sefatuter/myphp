<?php
require_once 'models/User.php';

class AuthController {
    private $conn;
    private $user;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->user = new User($conn);
    }

    public function login() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("❌ Invalid email format.");
            }

            $auth = $this->user->login($email, $password);
            if ($auth) {
                session_regenerate_id(true);
                $_SESSION['username'] = $auth['username'];
                $_SESSION['user_id'] = $auth['id'];
                header("Location: ?page=dashboard");
                exit;
            }
            $error = "❌ Login failed.";
        }

        require 'views/login.view.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $email_raw = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $email = filter_var($email_raw, FILTER_VALIDATE_EMAIL);
            $password = htmlspecialchars(filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW));

            if (!$email || empty($username) || empty($password)) {
                echo "❌ Invalid input. Please check your data.";
                exit;
            } else {
                $this->user->register($username, $email, $password);
                header("Location: ?page=login");
                exit;
            }
        }

        require 'views/register.view.php';
    }

    public function dashboard() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?page=login");
            exit;
        }

        $username = $_SESSION['username'];
        require 'views/dashboard.view.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ?page=login");
        exit;
    }
}
