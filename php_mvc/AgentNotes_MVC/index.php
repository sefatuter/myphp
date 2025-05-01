<?php
session_start();

// Load core and controllers
require_once 'pdo_connect.php';
require_once 'core/Middleware.php';
require_once 'controllers/NoteController.php';
require_once 'models/Note.php'; // Already autoloaded indirectly but safe to have here
require_once 'core/ErrorHandler.php';
require_once 'controllers/UploadController.php';
require_once 'core/helpers.php'; // comment

ErrorHandler::register();

// Initialize NoteController
$noteController = new NoteController($conn);
$upload = new UploadController();

// Basic router logic
$page = $_GET['page'] ?? 'notes';

switch ($page) {
    case 'notes':
        $noteController->index();
        // trigger_error("🔥 Test Error!", E_USER_WARNING); // Test error
        break;

    case 'notes_create':
        $noteController->create();
        break;

    case 'notes_edit':
        $noteController->edit();
        break;
    
    case 'upload':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $upload->handle();
        } else {
            $upload->showForm();
        }
        break;

    case 'notes_delete':
        $noteController->delete();
        break;

    case 'logout':
        session_unset();
        session_destroy();
        $_SESSION['flash'] = "✅ Logged out successfully.";
        header("Location: ?page=login");
        exit;
        break;

    default:
        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
        echo "<a href='?page=notes'>Go back to Notes</a>";
        break;
}
?>
