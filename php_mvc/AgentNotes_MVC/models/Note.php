<?php

require_once 'Model.php';

class Note extends Model {

    protected string $table = 'notes';

    public function create(string $title, string $body): bool {
        $stmt = $this->db->prepare("
            INSERT INTO {$this->table} (title, body)
            VALUES (:title, :body)
        ");
        return $stmt->execute([
            ':title' => $title,
            ':body' => $body
        ]);
    }

    public function update(int $id, string $title, string $body): bool {
        $stmt = $this->db->prepare("
            UPDATE {$this->table} SET title = :title, body = :body WHERE id = :id
        ");
        return $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':body' => $body
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}