
<?php
// домен и авторизация
$domen = 'makiage.bpium.ru';
$user = 'makiagecentre@gmail.com';
$pass = '444111aF';

$catalog_id = 17;
// запрос
$ch = curl_init("https://$domen/api/v1/catalogs/$catalog_id/records/$entry_id");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
$result = curl_exec($ch);
curl_close($ch);
$res = json_decode($result,true);
?>
