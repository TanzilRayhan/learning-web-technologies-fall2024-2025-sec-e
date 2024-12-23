<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit();
}

include '../model/userModel.php';
$users = getAllUser();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
<a href="../view/home.php">Home</a>
    <h2>User List</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <a href="../controller/deleteUser.php?id=<?= $user['id'] ?>">Delete</a> |
                    <a href="../view/editUser.php?id=<?= $user['id'] ?>">Update</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
