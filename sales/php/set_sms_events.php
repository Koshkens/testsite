<?php
include("./get_sms_events.php");
include("./get_catalog.php");

$pass = "41079887ce97b847bbd3c7d248e0c876800b0ec4";
$user = "makiagecrimea";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://smsc.ru/sys/jobs.php?get_all=1&login=$user&psw=$pass&charset=utf-8");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res_id = curl_exec($ch);
curl_close($ch);
$ids = array(); 
for ($i = 0; $i < strlen($res_id); $i++){
    if($i ==0){
        array_push($ids,substr($res_id, $i, 7));
    }elseif($i==(strlen($res_id)-1)){
        break;
    }elseif($res_id[$i]=="\n"){
        array_push($ids,substr($res_id, $i+1, 7));
    }
}
foreach($ids as $id){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://smsc.ru/sys/jobs.php?del=1&login=$user&psw=$pass&id=$id");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($ch);
    curl_close($ch);
}

foreach ($res_sms_events as $event) {
    $id_event = $event["id"];
    //название рассылки
    $name = $event["title"];
    //сообщение
    $message = $event["values"][2];
    //дата
    $YY = substr($event["values"][3], 2, 2);
    $MM = substr($event["values"][3], 5, 2);
    $DD = substr($event["values"][3], 8, 2);
    $hh = substr($event["values"][3], 11, 2);
    $mm = substr($event["values"][3], 14, 2);
    if ((substr($event["values"][3], 0, 19)) < date("Y-m-d\TH:i:s")) {
        $YY = substr(date("Y"), 2, 2) + 1;
    }
    $date = $DD . $MM .$YY . $hh . $mm  ;
    //номера

    $phones = "";
    
    foreach ($res as $entry_full) {
        $entry = $entry_full["values"];
        foreach ($entry[10] as $entry_event) {
            if ($id_event == $entry_event["recordId"]) {
                $phones = $phones .';'. $entry[6][0]["contact"];
            }
        }
    }

    echo '<br>'.$id_event.'<br>'.$name . '<br>' . $message . '<br>' . $date . '<br>' . $phones . '<br>';
    
    $pass = "41079887ce97b847bbd3c7d248e0c876800b0ec4";
    $user = "makiagecrimea";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://smsc.ru/sys/jobs.php?add=1&login=$user&psw=$pass&name=$name&phones=$phones&mes=$message&rpt=7&rptn=10&charset=utf-8&time=$date");
    curl_setopt($ch, CURLOPT_POST, 1);
    $result = curl_exec($ch);
    curl_close($ch);
}
