<?php

function getConnection()
{
    $con = mysqli_connect('localhost', 'root', '', 'study_compass');
    if (!$con) {
        die("Connection Failed!");
    }
    return $con;
}
