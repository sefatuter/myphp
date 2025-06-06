<?php

// Centralize common DB operations like: find(id), all(), delete(id), create(), update()

abstract class Model {
    protected PDO $db;
    protected string $table;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function find(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function all(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}

/* USAGE ANYWHERE

    $userModel = new User($conn);

    // Get all users
    $users = $userModel->all();

    // Get one
    $me = $userModel->find(1);

    // Delete one
    $userModel->delete(3);

*/