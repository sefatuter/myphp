<?php

class Middleware
{
    public static function authGuard(): void
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['flash'] = "❌ Please login first.";
            header("Location: ?page=login");
            exit;
        }
    }

    public static function guestGuard(): void
    {
        if (isset($_SESSION['user_id'])) {
            $_SESSION['flash'] = "❗ You are already logged in.";
            header("Location: ?page=notes");
            exit;
        }
    }
}
