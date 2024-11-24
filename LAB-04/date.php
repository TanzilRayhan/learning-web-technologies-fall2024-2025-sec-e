<?php
if (isset($_GET['submit'])) {
    $day = $_GET['day'];
    $month = $_GET['month'];
    $year = $_GET['year'];

    if ($day == null || $month == null || $year == null) {
        echo "Cannot be empty";
    } 
    elseif(!($day>='1' &&  $day<='31')){
        echo "Must be valid numbers (dd: 1-31)";
    }
    elseif(!($month>='1' &&  $month<='12')){
        echo "Must be valid numbers (mm: 1-12)";
    }
    elseif(!($year>='1953' &&  $year<='1998')){
        echo "Must be valid numbers (yyyy: 1953-1998)";
    }
    else {
        header('location: date.html');
    }
} else {
    header('location: date.html');
}
