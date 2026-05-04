<?php
require_once 'auth.php';
requireAdmin();
?>

<h1>Admin Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['email']; ?></p>

<ul>
    <li><a href="add_news.php">Add News</a></li>
    <li><a href="news.php">View News</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
