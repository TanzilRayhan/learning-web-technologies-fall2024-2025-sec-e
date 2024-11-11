<?php
    $a=5;
    $b=9;
    $c=6;
    echo "A = $a\r<br>";
    echo "B = $b\r<br>";
    echo "C = $c\r<br><br>";
    if($a>$b && $a>$c)
    {
        echo "A is the Largest Number";
    }
    elseif($b>$a && $b>$c)
    {
        echo "B is the Largest Number";
    }
    else {
        echo "C is the Largest Number";
    }
?>