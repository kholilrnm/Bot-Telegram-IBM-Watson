<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Bot-Telegram-IBM-Watson/vendor/autoload.php';


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
    $bot->reply("Willkommen $firstname 😊");
});

$botman->hears("/cek {url}", function (BotMan $bot, $url){
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Bot-Telegram-IBM-Watson/functions/IBM_API.php';

    $classification = classifyImage($url);

    $message = "";
    $message .= "Makanan tersebut adalah " . $classification->result . PHP_EOL;
    $message .= "Akurasi " . $classification->score*100 . "%";
    $bot->reply($message);
});

$botman->hears("/help", function (BotMan $bot) {
        $bot->reply("Bot ini mengklasifikasikan gambar kucing dan anjing" . PHP_EOL . "/start - untuk mendapat sapaan" . PHP_EOL . 
        "/cek {url} - untuk mengecek gambar" . PHP_EOL . "/help - untuk mendapatkan bantuan");
    });

$botman->listen();