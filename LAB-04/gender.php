<?php 
if (isset($_GET['submit'])) 
{
    if (isset($_GET['gender'])) 
    {  
        $gender = $_GET['gender'];
        if (strlen($gender) === 0) 
        {
            echo "Cannot be empty!!! Select Any Gender";
        } else {
            echo "Gender: " . $gender;
        }
    }
    else
    {
        echo "Cannot be empty!!! Select Any Gender";
    }
}
?>
