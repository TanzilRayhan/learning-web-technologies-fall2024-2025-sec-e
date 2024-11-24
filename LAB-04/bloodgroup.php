<?php
if (isset($_GET['submit'])) {
    $bg = $_GET['blood'];

    if ($bg == null) {
        echo "No Blood Group Selected";
    } 
    else {
        echo "Selected Blood Group: " . $bg;
    }
} else {
    header('location: bloodgroup.html');
}
