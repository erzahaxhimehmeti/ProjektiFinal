<?php
session_start();
require_once 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    /*var_dump($email, $password); i was debugging
    exit; */
} 

$user = new User();
$result = $user->register($email, $password);

/*var_dump($result); e kom perdor per debug
exit; */

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $emailPattern = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
    $passwordPattern = "/^(?=.*\d)(?=.*[A-Z]).{8,}$/";

    if (!preg_match($emailPattern, $email)) {
        $_SESSION['error'] = "Invalid email format";
        header("Location: index.php");
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

echo "User inserted!";
exit;
?>

