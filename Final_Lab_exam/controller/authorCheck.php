<?php
require_once('../model/db.php');

if (isset($_POST['submit'])) {
    $authorName = trim($_POST['author_name']);
    $contactNo = trim($_POST['contact_no']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($authorName) || empty($contactNo) || empty($username) || empty($password)) {
        echo "All fields are required!";
        exit();
    }

    $conn = getConnection();
    $sql = "INSERT INTO authors (author_name, contact_no, username, password) VALUES ('{$authorName}', '{$contactNo}', '{$username}', '{$password}')";

    if (mysqli_query($conn, $sql)) {
        echo "Author registered successfully!";
        header("Location: ../view/adminDashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    header("Location: ../view/register.php");
    exit();
}
?>
