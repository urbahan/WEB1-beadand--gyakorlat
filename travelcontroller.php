<?php
require_once 'models/travel.php';

$travelModel = new Travel($pdo);
$editData = null;




if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $travelModel->delete($_GET['id']);
    header("Location: index.php?page=travel");
    exit();
}


if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $editData = $travelModel->getById($_GET['id']);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sz_az = $_POST['szalloda_az'] ?? '';
    $ind = $_POST['indulas'] ?? '';
    $ido = (int)($_POST['idotartam'] ?? 0);
    $ar = (int)($_POST['ar'] ?? 0);

    if (isset($_POST['update_travel'])) {
        
        $travelModel->update($_POST['id'], $sz_az, $ind, $ido, $ar);
    } elseif (isset($_POST['add_new'])) {
        // Új felvétel
        $travelModel->add($sz_az, $ind, $ido, $ar);
    }
    
    header("Location: index.php?page=travel");
    exit();
}


$trips = $travelModel->getAll();


include 'views/travel.php';