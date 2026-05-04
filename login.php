<<<<<<< HEAD
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
=======
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
>>>>>>> 66850989a5c0d6a826f44136005196a2ecf71d85
