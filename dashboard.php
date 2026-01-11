<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}
?>

<h1>Admin Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['email']; ?></p>

<a href="logout.php">Logout</a>
