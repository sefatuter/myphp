<?php
class Auth {
    public function login($userData) {
        $_SESSION["user_id"] = $userData["id"];
        $_SESSION["username"] = $userData["username"];
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function isAuthenticated() {
        return isset($_SESSION["user_id"]);
    }

    public function user() {
        return [
            "id" => $_SESSION["user_id"] ?? null,
            "username" => $_SESSION["username"] ?? null
        ];
    }
}
