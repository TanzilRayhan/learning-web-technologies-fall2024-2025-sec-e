<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $con;
}

function login($username, $password)
{
    $con = getConnection();
    $sql = "select * from users where username='{$username}' and password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return true;
    } else {
        return false;
    }
}

function addUser($username, $password, $email)
{
    $con = getConnection();
    $sql = "insert into users VALUES('', '{$username}', '{$email}', '{$password}')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function addBlog($title, $blog)
{
    $con = getConnection();
    $sql = "insert into blogs VALUES( '{$title}', '{$blog}')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function deleteUser($id)
{
    $con = getConnection();
    $sql = "DELETE FROM users WHERE id='{$id}'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function updateUser($id, $username, $password, $email)
{
    $con = getConnection();
    $sql = "UPDATE users SET username='{$username}', password='{$password}', email='{$email}' WHERE id='{$id}'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getUser($id)
{
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return null;
    }
}

function getAllUser()
{
    $con = getConnection();
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    return $users;
}
