<?php
// домен и авторизация
$domen = 'makiage.bpium.ru';
$user = 'makiagecentre@gmail.com';
$pass = '444111aF';

$catalog_id = 11;

// запрос
$ch = curl_init("https://$domen/api/v1/catalogs/$catalog_id/records?limit=1000");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
$result = curl_exec($ch);
$entrys = json_decode($result,true);
var_dump(curl_error($ch));
var_dump($entrys);
curl_close($ch);
?>
