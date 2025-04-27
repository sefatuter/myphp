<?php

/*
🧱 Middleware Concept in Simple PHP
A middleware is a small reusable function or class that runs before a controller executes.

Think of it like a checkpoint for access control.

*/

class Middleware
{
    public static function authGuard(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?page=login");
            exit;
        }
    }    
    // If there is no session set for user_id, that means the user is not logged in, so it redirects them to the login page

    public static function guestGuard(): void
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: ?page=dashboard");
            exit;
        }
    }    
    /*
        - If a user is already logged in (i.e., user_id exists in session), prevent access to login or register pages
        - Immediately redirect to the dashboard, ⚔️ This is your "if you're logged in, stay out of guest pages" guard
    */
}
