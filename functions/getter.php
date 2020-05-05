<?php

function getMessage($food, $score) {

    $message = "";
    $message .= "Makanan tersebut adalah " . $food . PHP_EOL;
    $message .= "Akurasi " . $score*100 . "%";
    
    
    return $message;
}