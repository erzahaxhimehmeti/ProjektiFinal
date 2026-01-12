<?php
session_start();
require_once 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $user = new User();
    $loggedInUser = $user->login($email, $password);

    if (!$loggedInUser) {
        $_SESSION['error'] = "Invalid email or password";
        header("Location: index.php");
        exit;
    }

    $_SESSION['user_id'] = $loggedInUser['id'];
    $_SESSION['email'] = $loggedInUser['email'];
    $_SESSION['role'] = $loggedInUser['role'];

    if ($loggedInUser['role'] === 'admin') {
        header("Location: dashboard.php");
    } else {
        header("Location: index.php");
    }
    exit;
}
