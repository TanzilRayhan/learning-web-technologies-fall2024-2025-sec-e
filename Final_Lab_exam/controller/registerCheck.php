<?php
require_once('../model/db.php');

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "All fields are required!";
        exit();
    }

    $conn = getConnection();
    $sql = "SELECT * FROM admins WHERE username = '{$username}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists. Please choose a different username.";
        exit();
    }

    $sql = "INSERT INTO admins (username, password) VALUES ('{$username}', '{$password}')";
    if (mysqli_query($conn, $sql)) {
        echo "Admin registered successfully!";
        header("Location: ../view/login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: ../view/register.php");
    exit();
}
?>
