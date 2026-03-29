<?php
require_once 'auth.php';
requireAdmin();
require_once 'classes/News.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $news = new News();
    $news->addNews($title, $content, null, $_SESSION['user_id']);

    header("Location: dashboard.php");
    exit;
}
?>

<h2>Add News</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" required></textarea>
    <button type="submit">Add News</button>
</form>