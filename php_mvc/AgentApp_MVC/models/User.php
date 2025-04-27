<?php

require_once 'Model.php';

class User extends Model{
    // private PDO $conn; // After Model we don't need that
    protected string $table = 'users';

    public function register(string $username, string $email, string $password): bool {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare(" 
            INSERT INTO {$this->table} (username, email, password)
            VALUES (:username, :email, :password)
        ");
        // $this->db is from model's db

        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hash
        ]);
    }

    public function login(string $email, string $password): array|false {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}

/*
    Question 2: Why NOT put register() and login() in the base Model?
        ⚠️ Answer: They are application-specific, not generic

      '''
        public function login() { ... }
        public function register() { ... }
      '''
    These methods are:

    - Specific only to User authentication
    - Not relevant for models like Post, Comment, Product
    - Mixing app logic with generic CRUD breaks separation of concerns
*/