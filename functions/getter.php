<?php

function getMessage($result, $score) {

    $message = "";
    $message .= "Makanan tersebut adalah " . $result . PHP_EOL;
    $message .= "Akurasi " . $score*100 . "%";
    
    
    return $message;
}