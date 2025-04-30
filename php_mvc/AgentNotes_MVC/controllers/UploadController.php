<?php

class UploadController {
    public function showForm() {
        require 'views/notes/upload.view.php';
    }

    public function handle() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['upload'])) {
            $file = $_FILES['upload'];

            // 1. Check for errors
            if ($file['error'] !== UPLOAD_ERR_OK) {
                $error = "❌ Upload error.";
                require 'views/notes/upload.view.php';
                return;
            }

            // 2. Validate file type (e.g. image or PDF)
            $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($file['tmp_name']);

            if (!in_array($mime, $allowedTypes)) {
                $error = "❌ Invalid file type.";
                require 'views/notes/upload.view.php';
                return;
            }

            // 3. Limit file size (2MB)
            if ($file['size'] > 2 * 1024 * 1024) {
                $error = "❌ File too large (max 2MB).";
                require 'views/notes/upload.view.php';
                return;
            }

            // 4. Move file to uploads folder
            $filename = basename($file['name']);
            $destination = "uploads/" . uniqid() . "_" . $filename;

            if (!move_uploaded_file($file['tmp_name'], $destination)) {
                $error = "❌ Failed to save file.";
                require 'views/notes/upload.view.php';
                return;
            }

            $_SESSION['flash'] = "✅ File uploaded successfully.";
            header("Location: ?page=upload");
            exit;
        }

        $error = "❌ No file selected.";
        require 'views/notes/upload.view.php';
    }
}
