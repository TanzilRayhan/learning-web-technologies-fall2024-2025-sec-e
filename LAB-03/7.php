<?php
    $stars = '*';
    for($i=0;$i<=3;$i++){
        for($j=0; $j<$i;$j++){
            echo"$stars";
        }
        echo"\r<br>";
    }
    echo"\r<br>";
    for($i=4;$i>0;$i--){
        for($j=1; $j<$i;$j++){
            echo"$j";
        }
        echo"\r<br>";
    }
    $c = 'A';
    for($i=0;$i<=3;$i++){
        for($j=0; $j<$i;$j++){
            echo"$c";
            $c++;
        }
        echo"\r<br>";
    }

?>