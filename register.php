<?php
session_start();
require_once 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
        $_SESSION['error'] = "Password must be 8+ chars, contain 1 uppercase letter and 1 number";
          header("Location: index.php");
        exit;
    }

    $user = new User();
    $user->register($email, $password);

    if (!$result) {
        $_SESSION['error'] = "Email already registered";
        header("Location: index.php");
        exit;
    }

    $_SESSION['success'] = "Registration successful!";

    header("Location: index.php");
    exit;
}

