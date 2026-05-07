<?php
session_start();
require_once 'classes/User.php';

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

$user = new User();
$result = $user->login($email, $password);

if (!$result) {
    $_SESSION['error'] = "Invalid email or password";
    header("Location: index.php");
    exit;
}


$_SESSION['user_id'] = $result['id'];
$_SESSION['role'] = $result['role'];

$_SESSION['email'] = $result['email'];

if ($result['role'] === 'admin') {
    header("Location: dashboard.php");
} else {
    header("Location: index.php");
}
exit;
?>

