<?php
    $number = rand(1, 100);

    $lowerBound = floor($number / 10) * 10;
    $upperBound = $lowerBound + 10;

    if ($number == 100) {
        $lowerBound = 90;
        $upperBound = 100;
    }

    
    $message = "The number lies between $lowerBound and $upperBound";

    $reversedMessage = strrev($message);

    echo $reversedMessage;
?>
