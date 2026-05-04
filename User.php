
<?php
session_start();
require_once 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

<<<<<<< HEAD
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
=======
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $emailPattern = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
    $passwordPattern = "/^(?=.*\d)(?=.*[A-Z]).{8,}$/";

    if (!preg_match($emailPattern, $email)) {
        $_SESSION['error'] = "Invalid email format";
        header("Location: index.php");
>>>>>>> 66850989a5c0d6a826f44136005196a2ecf71d85
        exit;
    }

    if (!preg_match($passwordPattern, $password)) {
        $_SESSION['error'] = "Password must be 8+ chars, include 1 uppercase letter and 1 number";
        header("Location: index.php");
        exit;
    }

    $user = new User();
    $result = $user->register($email, $password);

    if (!$result) {
        $_SESSION['error'] = "Email already exists";
        header("Location: index.php");
        exit;
    }

    $_SESSION['success'] = "Registration successful!";
    header("Location: index.php");
    exit;
}
<<<<<<< HEAD

    

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
=======
?>
>>>>>>> 66850989a5c0d6a826f44136005196a2ecf71d85
