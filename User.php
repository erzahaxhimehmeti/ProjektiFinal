<?php
require_once 'Database.php';

class User extends Database {

    public function register($email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT id FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);

        if ($stmt->rowCount() > 0) {
            return false;
        }


        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':email' => $email,
            ':password' => $hashedPassword
        ]);
    }
}
