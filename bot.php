<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    
<?php
if (empty($data['message']['chat']['id'])) {
	exit();
}

define('TOKEN', '1727319575:AAHi8f1hNrRXZDjRLTskuRvd5S8QF-7n5qM');

// Функция вызова методов API.
function sendTelegram($method, $response)
{
	$ch = curl_init('https://api.telegram.org/bot' . TOKEN . '/' . $method);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$res = curl_exec($ch);
	curl_close($ch);

	return $res;
}
// Ответ на текстовые сообщения.
if (!empty($data['message']['text'])) {
	$text = $data['message']['text'];

	if (mb_stripos($text, 'привет') !== false) {
		sendTelegram(
			'sendMessage',
			array(
				'chat_id' => $data['message']['chat']['id'],
				'text' => 'Хай!'
			)
		);

		exit();
	}
?>
  </body>
</html>
