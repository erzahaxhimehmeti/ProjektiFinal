<?php
require_once 'auth.php';
requireAdmin();
require_once 'classes/News.php';

$news = new News();
$allNews = $news->getAllNews();
?>

<h1>Admin Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['email']; ?></p>

<h2>Manage News</h2>

<a href="add_news.php">+ Add News</a>

<?php foreach ($allNews as $item): ?>
    <div style="border:1px solid black; margin:10px; padding:10px;">
        <h3><?= $item['title'] ?></h3>
        <p><?= $item['content'] ?></p>
        <small>By: <?= $item['email'] ?></small>
    </div>
<?php endforeach; ?>

<br>
<a href="logout.php">Logout</a>