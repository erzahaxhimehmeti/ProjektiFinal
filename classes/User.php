<?php
require_once 'Database.php';

class User extends Database {

    /*public function register($email, $password) {
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
    } */

    /*public function register($email, $password) {

    echo "Inside register()<br>";

    $checkSql = "SELECT id FROM users WHERE email = :email";
    $checkStmt = $this->conn->prepare($checkSql);
    $checkStmt->execute([':email' => $email]);

    echo "Email check rows: " . $checkStmt->rowCount() . "<br>";

    if ($checkStmt->rowCount() > 0) {
        echo "Email already exists";
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $this->conn->prepare($sql);

    if ($stmt->execute([
        ':email' => $email,
        ':password' => $hashedPassword
    ])) {
        echo "Insert OK";
    } else {
        echo "Insert failed";
    }

    exit;
 } */

    public function register($email, $password) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password, role, created)
         VALUES (:email, :password, 'user', NOW())";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':email' => $email,
            ':password' => $hashedPassword
        ]);

    } catch (PDOException $e) {
        echo "DB ERROR: " . $e->getMessage();
        exit;
    }
}

    

    public function login($email, $password) {

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return false;
    }

    if (!password_verify($password, $user['password'])) {
        return false;
    }

    return $user;
}

}
