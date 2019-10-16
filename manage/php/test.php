<?php
// домен и авторизация
$domen = 'makiage.bpium.ru';
$user = 'makiagecentre@gmail.com';
$pass = '444111aF';

$catalog_id = 11;
$i=0;
while ($i<300) {
    $ch = curl_init("https://$domen/api/v1/catalogs/$catalog_id/records/$i");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
    $result = curl_exec($ch);
    $entry = json_decode($result,true);
    var_dump($i);
    var_dump($entry);
    curl_close($ch);
    $i++;
}

?>
