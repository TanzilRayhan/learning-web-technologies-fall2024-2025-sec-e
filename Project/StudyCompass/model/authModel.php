<?php

require_once 'database.php';

function login($username, $password)
{
  $conn = getConnection();
  $sql_stmt = "SELECT * FROM admin WHERE username='{$username}' and password='{$password}'";
  $result = mysqli_query($conn, $sql_stmt);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    return true;
  }
  return false;
}

?>