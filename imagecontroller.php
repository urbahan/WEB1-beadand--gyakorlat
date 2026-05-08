<?php
require_once 'config/db.php';

$target_dir = "uploads/";


if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}
chmod($target_dir, 0777); 


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) && isset($_SESSION['user'])) {
    
    $file_name = time() . "_" . basename($_FILES["image"]["name"]); 
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $pdo->prepare("INSERT INTO images (filename) VALUES (?)");
        $stmt->execute([$file_name]);
        
        header("Location: index.php?page=images");
        exit(); 
    }
}


$stmt = $pdo->query("SELECT * FROM images ORDER BY id DESC");
$images = $stmt->fetchAll();

include 'views/images.php';