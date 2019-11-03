<?php
$sms_events = $_POST["sms_event_checked"];
$entrys_id = $_POST["id_for_sms_events"];
$i = 0;
// домен и авторизация
$domen = 'makiage.bpium.ru';
$user = 'makiagecentre@gmail.com';
$pass = '444111aF';
$catalog_id = 17;
foreach ($entrys_id as $id) {
    $values['10'] = array();
    if(!($sms_events == "")){
        foreach ($sms_events as $some) {
            array_push($values['10'], array("recordId" => $some, "sectionId" => "2", "catalogId" => "27"));
        }
    }
    // подготовка тела запроса
    $data = array();
    $data['values'] = $values;
    $data_json = json_encode($data);
    $entry_id = $id;

    // запрос
    $ch = curl_init("https://$domen/api/v1/catalogs/$catalog_id/records/$entry_id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_json))
    );
    curl_exec($ch);
}
curl_close($ch);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление SMS Событий</title>
</head>
<body>
    <h1>События добавленны!</h1>
    <input type="button" id="close_btn" class="new_element" value="Закрыть"> 
</body>
<script>
    let btn = document.getElementById("close_btn");
    btn.addEventListener('click',function (btn) {
        close(); 
    });
</script>
</html>
