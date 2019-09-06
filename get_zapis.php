<?php
    // домен и авторизация
$domen = 'koshkens.bpium.ru';
$user = 'cawa.kaka@mail.ru';
$pass = '099777ka';

$catalog_id = 11;

// запрос
$ch = curl_init("https://$domen/api/v1/catalogs/$catalog_id/records");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_json))
);
$result = curl_exec($ch);
$res = json_decode($result,true);
?>
