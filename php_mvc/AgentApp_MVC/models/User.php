<?php
class User {
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function register(string $username, string $email, string $password): bool {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("
            INSERT INTO users (username, email, password)
            VALUES (:username, :email, :password)
        ");

        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hash
        ]);
    }

    public function login(string $email, string $password): array|false {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
