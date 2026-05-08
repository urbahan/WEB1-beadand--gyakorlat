<?php
require_once 'models/message.php';
global $pdo;
$messageModel = new Message($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name'] ?? '');
    $msg = trim($_POST['message'] ?? '');

    if (!empty($name) && !empty($msg)) {
        
        if (isset($_SESSION['user']['username'])) {
            
            $mentendoNev = $name; 
        } else {
            
            $mentendoNev = $name . " (Vendég)";
        }
        
        
        if ($messageModel->add($mentendoNev, $msg)) {
            echo "<div style='padding:20px; border:2px solid green; margin:20px; background: #f9f9f9;'>";
            echo "<h3>Üzenet elmentve!</h3>";
            echo "<p><strong>Küldő:</strong> " . htmlspecialchars($mentendoNev) . "</p>";
            echo "<p><strong>Üzenet:</strong> " . htmlspecialchars($msg) . "</p>";
            echo "<a href='index.php?page=contact'>Vissza a kapcsolathoz</a>";
            echo "</div>";
            return;
        }
    }
}
include 'views/contact.php';