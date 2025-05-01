<?php
require_once 'models/User.php';
require_once 'core/Middleware.php';
require_once 'core/RateLimiter.php'; // IP based limit


class AuthController {
    private $conn;
    private $user;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->user = new User($conn);
    }

    public function login() {
        $error = null;

        Middleware::guestGuard(); 
        /*
            🧠 Static Method = No Instantiation Needed
            Normally to call a method, you'd do:

            $mw = new Middleware();
            $mw->guestGuard();
            But since guestGuard() is defined as static, you can directly call:

            Middleware::guestGuard();
        */
        /*
        // Check
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
            $_SESSION['last_attempt'] = time();
        }

        // Too many attempts?
        if ($_SESSION['login_attempts'] >= 5) {
            $wait = 60 - (time() - $_SESSION['last_attempt']);
            if ($wait > 0) {
                echo "⏳ Too many attempts. Please wait $wait seconds.";
                return;
            } else {
                $_SESSION['login_attempts'] = 0; // Reset after wait
            }
        }
        */
        
        // IP based limit
        if (RateLimiter::limit('login')) {
            http_response_code(429);
            echo "🚫 Too many login attempts. Try again later.";
            exit;
        }

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
                $_SESSION['flash'] = "👋 Welcome, Agent {$auth['username']}";
                $_SESSION['login_attempts'] = 0;
                header("Location: ?page=dashboard");
                exit;
            }else {
                $_SESSION['login_attempts']++;
                $_SESSION['last_attempt'] = time();
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
                $registered = $this->user->register($username, $email, $password);
                if ($registered) {
                    $_SESSION['flash'] = "✅ Registered successfully! Please login.";
                    header("Location: ?page=login");
                    exit;
                } else {
                    $error = "❌ Registration failed (email may already exist).";
                }
            }
        }

        require 'views/register.view.php';
    }

    public function dashboard() {
        
        Middleware::authGuard(); // Only logged users allowed
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?page=login");
            exit;
        }

        $username = $_SESSION['username'];
        require 'views/dashboard.view.php';
    }

    public function logout() {
        session_unset();
        $_SESSION['flash'] = "You have logged out successfully.";
        header("Location: ?page=login");
        exit;
    }
}
