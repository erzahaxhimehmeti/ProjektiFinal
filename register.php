<?php
session_start();
require_once 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $user->register($email, $password);

    header("Location: index.php");
    exit;
}
