<?php
session_start();
require_once('../model/userModel.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $status = deleteUser($id);
    if ($status) {
        echo "User Deleted Successfully!";
        header('location: ../view/userlist.php'); 
        exit();
    } else {
        echo "Failed to Delete User.";
    }
} else {
    echo "Invalid Request!";
    header('location: ../view/home.php');
}
?>
