<?php

require_once 'models/Note.php';
require_once 'core/Middleware.php';

class NoteController {
    private Note $note;

    public function __construct($conn) {
        $this->note = new Note($conn);
    }

    public function index() {
        $notes = $this->note->getAll();
        require 'views/notes/index.view.php';
    }
    

    public function create() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($title) {
                $this->note->create($title, $body);
                $_SESSION['flash'] = "✅ Note created successfully.";
                header("Location: ?page=notes");
                exit;
            } else {
                $error = "❌ Title is required.";
            }
        }

        require 'views/notes/create.view.php';
    }
    
    public function edit() {
        $id = (int) $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($title) {
                $this->note->update($id, $title, $body);
                $_SESSION['flash'] = "✅ Note updated successfully.";
                header("Location: ?page=notes");
                exit;
            } else {
                $error = "❌ Title is required.";
            }
        }

        $note = $this->note->find($id);

        require 'views/notes/edit.view.php';
    }

    public function delete() {
        $id = (int) $_GET['id'];

        $this->note->delete($id);
        $_SESSION['flash'] = "✅ Note deleted successfully.";
        header("Location: ?page=notes");
        exit;
    }
}
