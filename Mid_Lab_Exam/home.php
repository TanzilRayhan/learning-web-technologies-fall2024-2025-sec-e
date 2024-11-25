<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>
    <h1>Welcome, <?=$_SESSION['username']?>!</h1>
    <p>You are logged in.</p>
    <a href="logout.php">Log out</a> 
</body>
</html>
