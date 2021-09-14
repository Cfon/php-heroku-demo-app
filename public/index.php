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

// setWebhook 
// https://api.telegram.org/bot1769651257:AAH4C04zGbCtQwk1_wJrvj_geZsr2BKZJm4/setwebhook?url=https://php-heroku-demo-app.herokuapp.com

// https://2930-213-230-112-143.ngrok.io

// https://php-heroku-demo-app.herokuapp.com

/**
* heroku[router]: at=info method=POST path="/" host=php-heroku-demo-app.herokuapp.com request_id=ce8c17b1-fab2-41d3-aef5-93670e1d67f4 fwd="213.230.112.143" dyno=web.1 connect=0ms service=2ms status=200 bytes=595 protocol=https
* app[web.1]: 10.1.1.14 - - [14/Sep/2021:18:43:47 +0000] "POST / HTTP/1.1" 200 424 "-" 

* heroku[router]: at=info method=POST path="/" host=php-heroku-demo-app.herokuapp.com request_id=02b05063-5b17-479d-86e6-14119f0b5484 fwd="91.108.6.68" dyno=web.1 connect=0ms service=2ms status=200 bytes=857 protocol=https
* app[web.1]: 10.1.18.165 - - [14/Sep/2021:18:51:47 +0000] "POST / HTTP/1.1" 200 686 "-" "-
*/

$content = file_get_contents('php://input');

if ($content) {
    $token = TOKEN;
    $apiLink = "https://api.telegram.org/bot$token";
    
    echo '<pre>content: '; 
    var_dump($content); 
    echo '</pre>';        

    $update = json_decode($content, true);

    if(!@$update["message"]) {
        $val = $update['callback_query'];
    } 
    else {
        $val = $update;
    }
    
    $chat_id = $val['message']['chat']['id'];
    $text = $val['message']['text'];
    $update_id = $val['update_id'];
    $sender = $val['message']['from'];
?> 
    
    <b>There is a message :</b>
    <br><br>    
    <b>Username: </b> <?= $sender['username'] ?> <br>
    <b>Sender's Name: </b> <?= $sender['first_name'].' '.$sender['last_name'] ?> <br>
    <b>Text Message: </b> <?= $text ?> <br><br>

<?php     
    // file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=You just sent ".$text);
    file_get_contents("$apiLink/sendmessage?chat_id=$chat_id&text=You just sent $text");
    echo '<div class="subtitle">Response sent.</div><br><br>';
}
else {
    echo '<div class="subtitle">Only telegram can access this url.</div>';
}

?>
</body>
</html>