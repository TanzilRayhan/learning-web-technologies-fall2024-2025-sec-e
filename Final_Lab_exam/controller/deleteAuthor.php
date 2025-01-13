<?php
require_once('../model/db.php');
$conn = getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteSql = "DELETE FROM authors WHERE id = $id";

    if (mysqli_query($conn, $deleteSql)) {
        header('Location: ../view/adminDashboard.php');
        exit();
    } else {
        echo "Failed to delete author.";
    }
}
?>
