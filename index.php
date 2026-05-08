<?php
session_start();
require_once 'config/db.php'; 

$page = $_GET['page'] ?? 'home';


ob_start();


global $pdo;

switch ($page) {
    case 'login':    require 'controllers/authcontroller.php'; break;
    case 'contact':  require 'controllers/contactcontroller.php'; break;
    case 'travel':   require 'controllers/travelcontroller.php'; break;
    case 'images':   require 'controllers/imagecontroller.php'; break;
    case 'messages': require 'controllers/messagecontroller.php'; break;
    default:         require 'controllers/homecontroller.php'; break;
}

$content = ob_get_clean();
include 'views/layout.php';
