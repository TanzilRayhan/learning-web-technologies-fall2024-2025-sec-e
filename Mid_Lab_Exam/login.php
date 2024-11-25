<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (isset($_SESSION['users'])) {
        if (isset($_SESSION['users'][$username])) {
            if ($_SESSION['users'][$username] === $password) {
                $_SESSION['username'] = $username;
                header("Location: home.php"); 
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "Username not found.";
        }
    } else {
        echo "No users are registered yet.";
    }
}
?>
