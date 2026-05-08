<?php
class Message {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function getAll() {
        // Fordított időrend: a legfrissebb legyen elöl
        $sql = "SELECT * FROM messages ORDER BY created_at DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($name, $message) {
        $sql = "INSERT INTO messages (name, message, created_at) VALUES (?, ?, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $message]);
    }
}