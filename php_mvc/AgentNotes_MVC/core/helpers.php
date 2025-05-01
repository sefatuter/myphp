<?php

function redirect(string $url): void {
    header("Location: $url");
    exit;
}

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function is_post(): bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function flash(?string $key = null): ?string {
    if ($key && isset($_SESSION['flash'][$key])) {
        $msg = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $msg;
    }

    return null;
}

function set_flash(string $key, string $message): void {
    $_SESSION['flash'][$key] = $message;
}
