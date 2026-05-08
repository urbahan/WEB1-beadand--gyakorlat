<?php

if (!isset($_SESSION['user']) && !isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}

require_once 'models/message.php';
global $pdo;
$messageModel = new Message($pdo);

$messages = $messageModel->getAll();
include 'views/messages.php';