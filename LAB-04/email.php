<?php
if (isset($_GET['submit'])) {
    $name = $_GET['email'];

    if ($email == null) {
        echo "No Input";
    } else {
        header('location: 2.html');
    }
} else {
    header('location: 2.html');
}
