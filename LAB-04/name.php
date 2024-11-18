<?php
    if(isset($_GET['submit'])){
        $name = $_GET['name'];

        if($name == null){
            echo "No Input";
        }
        elseif(strlen($name)<2){
            echo "input at least 2 characters";
        }
        elseif(!(($name[0]>='A' &&  $name <='Z') || ($name[0]>='a' && $name <='z'))){
            echo "Start with a Letter";
        }
        $valid = true;
            for($i=1; $i<strlen($name); $i++){
                $char = $name[$i];
                if(!(
                    ($char>='A' && $char <='Z') ||
                    ($char>='a' && $char <='z') ||
                    $char == '.' ||
                    $char == '-'
                )){
                    $valid = false;
                    break;
                }
                
            }
            if($valid){
                header('location: 1.html');
            }
            else{
                echo "Can contain a-z, A-Z, period, dash only";
            }
        
    }
    else{
        header('location: 1.html');
    }
?>
