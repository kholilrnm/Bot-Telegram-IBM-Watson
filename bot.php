<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

require_once $_SERVER['DOCUMENT_ROOT'] . '/BOT-Telegram-IBMWatson-Cat-Dog-Recognition/vendor/autoload.php';

date_default_timezone_set('Asia/Jakarta');

$configs = [
    "telegram" => [
        "token" => file_get_contents("private/TOKEN.txt")
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
    require_once $_SERVER['DOCUMENT_ROOT'] . '/BOT-Telegram-IBMWatson-Cat-Dog-Recognition/functions/IBM_API.php';

    $classification = classifyImage($url);
    include "functions/request.php"; 

    $message = getMessage($url);
    $bot->reply($message);
});

$botman->hears("/help", function (BotMan $bot) {
        $bot->reply("Bot ini mengklasifikasikan gambar kucing dan anjing" . PHP_EOL . "/start - untuk mendapat sapaan" . PHP_EOL . 
        "/cek {url} - untuk mengecek gambar" . PHP_EOL . "/help - untuk mendapatkan bantuan");
    });

$botman->listen();