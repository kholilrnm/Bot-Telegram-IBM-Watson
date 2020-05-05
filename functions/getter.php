<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/BOT-Telegram-IBMWatson-Cat-Dog-Recognition/database/config.php';

function getMessage($url) {
    global $connection;

    $querySelectLastData    = "SELECT * FROM image WHERE url = '$url'";
    $resultQuery            = mysqli_query($connection, $querySelectLastData);
    $resultImage            = (object) mysqli_fetch_assoc($resultQuery);

    $message = "";
    if ($resultImage->animal == "dog") {
        $resultImage->animal = "Anjing";
        $message .= "Hewan tersebut adalah " . $resultImage->animal . PHP_EOL;
        $message .= "Akurasi " . $resultImage->score*100 . "%";
    } elseif ($resultImage->animal == "cat") {
        $resultImage->animal = "Kucing";
        $message .= "Hewan tersebut adalah " . $resultImage->animal . PHP_EOL;
        $message .= "Akurasi " . $resultImage->score*100 . "%";
    } else {
        $resultImage->animal = "tidak berhasil dikenali oleh Watson";
        $message .= "Hewan tersebut adalah " . $resultImage->animal . PHP_EOL;
    }
    
    
    return $message;
}