<?php
session_start();
session_destroy();
setcookie('admin_status', '', time() - 3600, '/');
header("Location: ../view/login.php");
exit();
?>
