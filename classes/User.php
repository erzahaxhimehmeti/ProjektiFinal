<?php
require_once 'Database.php';

class User extends Database {

    public function register($email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':email' => $email,
            ':password' => $hashedPassword
        ]);
    }
}
