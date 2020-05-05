<?php

namespace ImageTele;

require_once $_SERVER['DOCUMENT_ROOT'] . '/BOT-Telegram-IBMWatson-Cat-Dog-Recognition/database/config.php';


function getImageData($url)
{
    global $connection;

    $querySelectData    = "SELECT * FROM image WHERE url = '$url' LIMIT 1";
    $resultQuery        = mysqli_query($connection, $querySelectData);

    return (object) mysqli_fetch_assoc($resultQuery);
}

function dataDefault($animal, $score, $url) {
    $data   = [
        "animal"    => $animal,
        "score"     => $score,
        "url"       => $url
    ];

    return (object) $data;
}

function insertNewRow($dataImage)
{
    global $connection;

    $queryInsertImage    = "INSERT INTO image (animal, score,url)
                            VALUES ('$dataImage->animal', $dataImage->score,'$dataImage->url')";

    mysqli_query($connection, $queryInsertImage);
}