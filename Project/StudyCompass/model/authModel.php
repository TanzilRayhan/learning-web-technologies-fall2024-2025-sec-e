<?php

require_once('../model/database.php');

function adminLogin($username, $password)
{
  $conn = getConnection();
  $sql = "SELECT * FROM admins WHERE username='{$username}' and password='{$password}'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    return true;
  }
  return false;
}
function userLogin($username, $password)
{
  $conn = getConnection();
  $sql = "SELECT * FROM users WHERE username='{$username}' and password='{$password}'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    return true;
  }
  return false;
}

function getAdmin($username) {
  $conn = getConnection();
  $sql = "SELECT * FROM admins WHERE username='{$username}'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
      return mysqli_fetch_assoc($result);
  }
  return false;
}

function getUser($username) {
  $conn = getConnection();
  $sql = "SELECT * FROM users WHERE username='{$username}'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
      return mysqli_fetch_assoc($result);
  }
  return false;
}


function addUser($name, $email, $username, $password, $age, $dob, $gender, $address)
{
  $conn = getConnection();
  $sql = "INSERT INTO users (name, email, username, password, age, dob, gender, address) 
          VALUES ('{$name}', '{$email}', '{$username}', '{$password}', {$age}, '{$dob}', '{$gender}', '{$address}')";
  if (mysqli_query($conn, $sql)) {
    return true;
  } else {
    error_log("MySQL Error: " . mysqli_error($conn));
    return false;
  }
}

?>