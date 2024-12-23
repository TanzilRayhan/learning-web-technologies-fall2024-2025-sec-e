<?php 
    session_start();
    require_once('../model/userModel.php');
    if(isset($_REQUEST['submit'])){
        $username = trim($_REQUEST['username']);
        $email = trim($_REQUEST['email']);
        $password = trim($_REQUEST['password']);

        if($username == null || empty($password || empty($email))){
            echo "Null username/password/email";
        }else{
            
            $status = addUser($username, $email, $password);
            if($status){
                header('location: ../view/login.html');
            } else{
                header('location: ../view/signup.html');
            }
        }

    }else{
        header('location: ../view/signup.html');
    }

?>