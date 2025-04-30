<?php

class ErrorHandler
{
    public static function register(): void
    {
        // Tell PHP to use our custom error + exception handlers
        set_error_handler([self::class, 'handleError']);
        set_exception_handler([self::class, 'handleException']);
    }

    public static function handleError(int $errno, string $errstr, string $errfile, int $errline): void
    {
        echo "<h2>💥 Error!</h2>";
        echo "<p><strong>$errstr</strong></p>";
        echo "<p>File: $errfile (line $errline)</p>";
        exit;
    }

    public static function handleException(Throwable $e): void
    {
        echo "<h2>🔥 Exception!</h2>";
        echo "<p><strong>" . $e->getMessage() . "</strong></p>";
        echo "<p>File: " . $e->getFile() . " (line " . $e->getLine() . ")</p>";
        exit;
    }
}
