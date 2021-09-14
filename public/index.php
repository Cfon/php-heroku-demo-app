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
const BASE_URL = 'https://api.telegram.org/bot'.TOKEN;
const URL = 'https://php-heroku-demo-app.herokuapp.com';
const WEBHOOK_URL = 'https://api.telegram.org/bot'.TOKEN.'/setwebhook?url='.URL;

// WEBHOOK URL
// https://api.telegram.org/bot1769651257:AAH4C04zGbCtQwk1_wJrvj_geZsr2BKZJm4/setwebhook?url=https://php-heroku-demo-app.herokuapp.com

// https://2930-213-230-112-143.ngrok.io
// https://php-heroku-demo-app.herokuapp.com

function makeRequest(string $method, array $params = []): mixed
{
	$url = BASE_URL.'/'.$method;

	if ($params) {
		$url .= '?'.http_build_query($params);
	}	

	$content = file_get_contents($url);
	$json = json_decode($content);
	return $json;
}

$content = file_get_contents('php://input');

if ($content) {       
    $update = json_decode($content);

    // if(!@$update->message) {
    //     $update = $update->callback_query;
    // }    
    
    makeRequest('sendMessage', [
        'chat_id' => $update->message->chat->id,
        'text' => "You just sent {$update->message->text}"
    ]);
?>    
    <div class="subtitle">Response sent.</div>
    <br><br>
<? }
else { ?>
    <div class="subtitle">Only telegram can access this url.</div>
<? } ?>

</body>
</html>