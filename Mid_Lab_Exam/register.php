<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Both username and password are required.";
        exit();
    }
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = []; 
    }

    $_SESSION['users'][$username] = $password;

    header("Location: login.html");
}
?>
