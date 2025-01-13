<?php
function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function addUser($employer_name, $company_name, $contact_no, $username, $password)
{
    $conn = getConnection();
    $sql = "INSERT INTO employers (employer_name, company_name, contact_no, username, password)
            VALUES ('{$employer_name}', '{$company_name}', '{$contact_no}', '{$username}', '{$password}')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    };
}
