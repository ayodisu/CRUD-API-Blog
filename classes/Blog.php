<?php
class Blog {

    private $conn;

    public function __construct($db) {

        $this->conn = $db;
    }

    public function addBlog($title, $content) {

        $query = "INSERT INTO blog (title, content, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$title, $content]);
        return $stmt->rowCount();
    }

    public function getBlog($id) {

        $query = "SELECT * FROM blog WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllBlogs() {

        $query = "SELECT * FROM blog";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateBlog($id, $title, $content) {

        $query = "UPDATE blog SET title = ?, content = ?, updated_at = NOW() WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$title, $content, $id]);
        return $stmt->rowCount();
    }

    public function deleteBlog($id) {

        $query = "DELETE FROM blog WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
}
?>
