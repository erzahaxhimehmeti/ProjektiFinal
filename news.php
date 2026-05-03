<?php
require_once 'classes/News.php';
$news = new News();
$allNews = $news->getAllNews();
?>

<h1>Latest News</h1>

<?php foreach ($allNews as $item): ?>
    <div>
        <h3><?= htmlspecialchars($item['title']) ?></h3>
        <p><?= htmlspecialchars($item['content']) ?></p>
        <small>
            Added by: <?= htmlspecialchars($item['email']) ?>
        </small>
    </div>
<?php endforeach; ?>
