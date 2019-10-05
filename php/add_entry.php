<?php
$domen = 'makiage.bpium.ru';
$user = 'makiagecentre@gmail.com';
$pass = '444111aF';

$catalog_id = 17;

$ch = curl_init("https://$domen/api/v1/catalogs/$catalog_id/records");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_json))
);
$result = curl_exec($ch);
$res = (array) json_decode($result);
curl_close($ch);
?>