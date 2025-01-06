<?php
session_start();
require_once('../model/authModel.php');

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and Password cannot be empty!";
        header('location: ../view/login.php');
        exit();
    } else {
        $admin = getAdmin($username);
        $user = getUser($username);

        if ($admin && $password === $admin['password']) {
            $_SESSION['username'] = $username;
            setcookie('admin', 'true', time() + 10000, '/');
            header('location: ../view/adminDashboard.php');
            exit();
        } elseif ($user && $password === $user['password']) {
            $_SESSION['username'] = $username;
            setcookie('user', 'true', time() + 10000, '/');
            header('location: ../view/userDashboard.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid username or password!";
            header('location: ../view/login.php');
            exit();
        }
    }
} else {
    header('location: ../view/login.php');
    exit();
}
