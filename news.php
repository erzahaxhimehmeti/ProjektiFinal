<?php
require_once 'Database.php';

class News extends Database {

    public function addNews($title, $content, $image, $userId) {
        $sql = "INSERT INTO news (title, content, image, created_by)
                VALUES (:title, :content, :image, :userId)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':image' => $image,
            ':userId' => $userId
        ]);
    }

    public function getAllNews() {
        $sql = "SELECT news.*, users.email 
                FROM news 
                JOIN users ON news.created_by = users.id
                ORDER BY news.created_at DESC";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}