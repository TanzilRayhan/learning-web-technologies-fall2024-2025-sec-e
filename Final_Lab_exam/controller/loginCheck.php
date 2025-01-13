<?php
session_start();
require_once('../model/db.php');

if (isset($_REQUEST['submit'])) {
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);

    if (empty($username) || empty($password)) {
        echo "Username and Password are required!";
        exit();
    }

    $conn = getConnection();
    $sql = "SELECT * FROM admins WHERE username = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        setcookie('admin_status', 'true', time() + 3600, '/');
        header("Location: ../view/adminDashboard.php");
        exit();
    } else {
        echo "Invalid Username or Password!";
        header("Refresh: 2; URL=../view/login.php");
        exit();
    }
} else {
    header("Location: ../view/login.php");
    exit();
}
?>
