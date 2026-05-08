<?php
require_once 'models/user.php';


if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    if (session_status() == PHP_SESSION_NONE) session_start();
    session_unset();
    session_destroy();
    header("Location: index.php?page=home");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userModel = new User($pdo);

    
    if (isset($_POST['register'])) {
        $lastname  = $_POST['lastname'] ?? '';
        $firstname = $_POST['firstname'] ?? '';
        $username  = $_POST['username'] ?? '';
        $password  = $_POST['password'] ?? '';

        if (!empty($lastname) && !empty($firstname) && !empty($username) && !empty($password)) {
            if ($userModel->register($lastname, $firstname, $username, $password)) {
                header("Location: index.php?page=login&success=1");
                exit();
            } else {
                $error = "Hiba: A felhasználónév már foglalt!";
            }
        } else {
            $error = "Minden mezőt tölts ki!";
        }
    } 
    // BELÉPÉS
    elseif (isset($_POST['login'])) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $user = $userModel->login($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: index.php?page=home");
            exit();
        } else {
            $error = "Hibás felhasználónév vagy jelszó!";
        }
    }
}

include 'views/login.php';