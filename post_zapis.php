<p>работает</p>
<?php
    echo "Your test function on button click is working";
    // домен и авторизация
    $domen = 'koshkens.bpium.ru';
    $user = 'cawa.kaka@mail.ru';
    $pass = '099777ka';

    $catalog_id = 11;

    // массив значений полей новой записи
    // ключи массива — идентификаторы полей
    $values = array();
    $values['7'] = 'работает1'; // строка для текстовых полей
    $values['3'] = ['1']; // строка для текстовых полей
    $values['4'] = ['5']; // строка для текстовых полей
    $values['2'] = array ([id=>1]);
    // подготовка тела запроса
    $data = array();
    $data['values'] = $values;
    $data_json = json_encode($data);
    echo $data_json;
    // запрос
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
    echo curl_error($ch); 
    echo $result;
?>
