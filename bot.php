<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

require_once 'vendor/autoload.php';


date_default_timezone_set('Asia/Jakarta');

$configs = [
    "telegram" => [
        "token" => file_get_contents("private/BOT_TOKEN.txt")
    ]
];


DriverManager::loadDriver(TelegramDriver::class);

$botman = BotManFactory::create($configs);

$botman->hears("/start", function (BotMan $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $bot->reply("Hi $firstname 😊, Makanan Apa Yang Ingin Diklasifikasi ?" . PHP_EOL . "/check {Isi URL} - Untuk Memulai Klasifikasi" . PHP_EOL . "\n*Pastikan /check {URL} -> pada alamat url mempunyai link berakhiran .jpg / .png. / .jpeg");
});

$botman->hears("/check {url}", function (BotMan $bot, $url){
    require_once 'functions/getter.php';
    require_once 'functions/IBM_API.php';

    $classification = classifyImage($url);

    $message = "";
    $message .= "Makanan tersebut adalah " . $classification->result . PHP_EOL;
    $message .= "Akurasi " . $classification->score*100 . "%";
    $bot->reply($message);
});

$botman->hears("/help", function (BotMan $bot) {
        $bot->reply("Bot Ini Digunakan Untuk Mengklasifikasikan Gambar Makanan" . PHP_EOL . 
        "/check {url} - Digunakan Untuk Mengklasifikasikan Gambar Makanan");
    });

$botman->fallback(function (BotMan $bot) {
    $message = $bot->getMessage()->getText();
    $bot->reply("Maaf, Perintah Ini '$message' Tidak Ada/Kurang 😥");
});


$botman->listen();