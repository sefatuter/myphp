<?php
class Agent {
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM agents");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM agents WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($username, $email, $password) {
        $stmt = $this->conn->prepare("INSERT INTO agents (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, $password]);
    }

    public function update($id, $username, $email) {
        $stmt = $this->conn->prepare("UPDATE agents SET username = ?, email = ? WHERE id = ?");
        return $stmt->execute([$username, $email, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM agents WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
