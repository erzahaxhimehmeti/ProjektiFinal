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
        error_log($e->getMessage());
        return false;
    }
}

public function login($email, $password) {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) return false;

    if (!password_verify($password, $user['password'])) return false;

    return $user;
}