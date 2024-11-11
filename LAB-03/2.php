<?php
    $amount = 150;
    $vat = ($amount * 0.15);
    $total = ($amount + $vat);
    echo "The Price = $amount\r<br>";
    echo "The VAT = $vat%\r<br>";
    echo "The Total amount = $total";
?>