<?php 
    session_start();
    require_once('../model/userModel.php');
    if(isset($_REQUEST['submit'])){
        $title = trim($_REQUEST['title']);
        $blog = trim($_REQUEST['blog']);
        if($title == null || empty($blog)){
            echo "Can not submit empty form";
        }else{
            
            $status = addBlog($title, $blog);
            if($status){
                echo "Submitted!";
                header('location: ../view/home.php');
            } else{
                header('location: ../view/form.php');
            }
        }

    }else{
        header('location: ../view/form.php');
    }

?>