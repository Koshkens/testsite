<?php
// домен и авторизация
$domen = 'makiage.bpium.ru';
$user = 'makiagecentre@gmail.com';
$pass = '444111aF';

$catalog_id = 17;

// запрос
$ch = curl_init("https://$domen/api/v1/catalogs/$catalog_id/records?limit=10000");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
$result = curl_exec($ch);
$res = json_decode($result,true);
curl_close($ch);
//var_dump ($res[1]);
// $res = Array(
//     'huy' => $result
// );

// echo json_encode($res);

?>
