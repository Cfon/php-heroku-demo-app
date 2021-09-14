<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TelegramBot Webhook Demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
<?php

const TOKEN = '1769651257:AAH4C04zGbCtQwk1_wJrvj_geZsr2BKZJm4';
const BASE_URL = 'https://api.telegram.org/bot' . TOKEN;
const NGROK_URL = 'https://7881-213-230-112-143.ngrok.io/';
const WEBHOOK_URL = 'https://api.telegram.org/bot'.TOKEN.'/setwebhook?url='.NGROK_URL;

// https://api.telegram.org/bot1769651257:AAH4C04zGbCtQwk1_wJrvj_geZsr2BKZJm4/setwebhook?url=https://d1e8-213-230-112-143.ngrok.io
// https://d36fa284.ngrok.io/
// https://d1e8-213-230-112-143.ngrok.io

// https://php-heroku-demo-app.herokuapp.com/

$content = file_get_contents('php://input');

if ($content) {
    $token = TOKEN;
    $apiLink = "https://api.telegram.org/bot$token/";
    echo '<pre>content = '; print_r($content); echo '</pre>';

    
}
else {
    echo '<div class="subtitle">Only telegram can access this url.</div>';
}


?>
</body>
</html>