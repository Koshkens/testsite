<?php
$sms_events = $_POST["sms_event_checked"];
$entrys_id = $_POST["id_for_sms_events"];
include("./get_catalog.php");
$res[1]["values"][4] = "ERA...";
// домен и авторизация
$domen = 'makiage.bpium.ru';
$user = 'makiagecentre@gmail.com';
$pass = '444111aF';

$data = $res;
$data_json = json_encode($data);
var_dump($data);
$catalog_id = 17;
// запрос
$ch = curl_init("https://$domen/api/v1/catalogs/$catalog_id/records/");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_json))
);
$result = curl_exec($ch);
echo curl_error($ch);
var_dump(curl_error($ch));
curl_close($ch);

// foreach ($entrys_id as $id) {
//     $values['10'] = array();
//     if(!($sms_events == "")){
//         foreach ($sms_events as $some) {
//             array_push($values['10'], array("recordId" => $some, "sectionId" => "2", "catalogId" => "27"));
//         }
//     }
//     // подготовка тела запроса
//     $data = array();
//     $data['values'] = $values;
//     $data_json = json_encode($data);
//     $entry_id = $id;
//     include('./update_entry.php');
//     echo".";
// }
?>
