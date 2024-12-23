<?php
session_start();
require_once('../model/userModel.php');

$id = $_REQUEST['id'];
$con = getConnection();
$sql = "SELECT * FROM users WHERE id='{$id}'";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post" action="../controller/updateUser.php" enctype=""> 
            Name: <input type="text" name="username" value="<?=$user['username']?>" /> <br>
            password: <input type="password" name="password" value="<?=$user['password']?>" /><br>
            Email: <input type="email" name="email" value="<?=$user['email']?>" /><br>
            <input type="submit" name="submit" value="Submit" />
        </form>
</body>
</html>
