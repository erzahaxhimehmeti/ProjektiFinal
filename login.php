<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'classes/User.php';

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

var_dump($email, $password);

$user = new User();
$result = $user->login($email, $password);

var_dump($result);
exit;
