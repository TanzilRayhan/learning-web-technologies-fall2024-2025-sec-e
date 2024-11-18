<?php
if (isset($_GET['submit'])) {
    $email = $_GET['email'];

    if ($email == null) {
        echo "No Input";
    } else {
        header('location: 2.html');
    }
} else {
    header('location: 2.html');
}
