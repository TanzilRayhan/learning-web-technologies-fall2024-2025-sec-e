<?php
if(isset($_GET['submit']))
{
    if(isset($_GET['degree']))
    {
        $deg=$_GET['degree'];
        if(count($deg)<2)
        {
            echo "Invalid!!! At least two of them must be selected.";
        }
        else
        {
            echo "Valid!!!";
        }
    }
    else
    {
        echo "No selection!!!";
    }
}
?>