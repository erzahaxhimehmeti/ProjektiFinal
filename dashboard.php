<?php
require_once 'auth.php';
requireAdmin();
?>

<h1>Admin Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['email']; ?></p>

<a href="logout.php">Logout</a>
