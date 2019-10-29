<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/entry.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель</title>
</head>

<body>
    <?php
    if (isset($_POST["sms_btn"])) {
        include "smsc_api.php";
        send_sms($_POST["sms_number"], $_POST["sms_text"]);
    }
    if (isset($_POST["status"]) || isset($_POST["segment"]) || isset($_POST["date"]) || isset($_POST["title"]) || isset($_POST["description"]) || isset($_POST["LPR_name"]) || isset($_POST["contact"])) {
        $values = array();
        $values['2'] = $_POST["date"] . $_POST["time"];
        $values['3'] = $_POST["status"];
        if (!isset($_POST["title"])) $_POST["title"] = '';
        $values['4'] = $_POST["title"];
        if (!isset($_POST["description"])) $_POST["description"] = '';
        $values['5'] = $_POST["description"];
        if (!isset($_POST["LPR_name"])) $_POST["LPR_name"] = '';
        $values['6'] = array();
        if ($_POST["contact"][0] == "") {
            $empty = "";
        }
        $_POST["contact"] = array_filter($_POST["contact"]);
        if(isset($empty)) array_unshift($_POST["contact"], $empty);
        foreach ($_POST["contact"] as $contact) {
            array_push($values['6'], array("contact" => $contact));
        }
        $values['7'] = $_POST["LPR_name"];
        if (!isset($_POST["segment"])) $_POST["segment"] = array();
        $values['8'] = $_POST["segment"];
        // подготовка тела запроса
        $data = array();
        $data['values'] = $values;
        $data_json = json_encode($data);
        $entry_id = $_POST['entry_id'];
        include('./update_entry.php');
    } else {
        $entry_id = $_GET['entry_id'];
    }
    include('./get_entry.php');
    $entry = $res["values"];
    $date = substr(date('Y-m-d H:i:s', strtotime($entry[2])), 0, 10);
    $time = substr(($entry[2]), 10);

    $contact = '';
    $contact_number = '<input class="contact_text" name="contact[]" type="tel" value="" pattern="[+][7][(][0-9]{3}[)][-][0-9]{3}[-][0-9]{2}[-][0-9]{2}" title="Пример номера: +7(xxx)xxx-xx-xx" maxlength="17" minlength="11" aria-invalid="false" aria-required="true" placeholder="Номер" onkeydown="return event.key != \'Enter\';"><br>';
    if (isset($entry[6][0])) {
        $number = $entry[6][0]['contact'];
        $contact_number = '<input class="contact_text" name="contact[]" type="tel" value="' . $entry[6][0]['contact'] . '" pattern="[+][7][(][0-9]{3}[)][-][0-9]{3}[-][0-9]{2}[-][0-9]{2}" title="Пример номера: +7(xxx)xxx-xx-xx" maxlength="17" minlength="11" aria-invalid="false" aria-required="true" placeholder="Номер" onkeydown="return event.key != \'Enter\';"><br>';
    }
    $not_first = false;
    foreach ($entry[6] as $temp) {
        if ($not_first == true) {
            $contact = $contact . '<input class="contact_text" name="contact[]" type="text" value="' . $temp["contact"] . '" onkeydown="return event.key != \'Enter\';"><br>';
        }
        $not_first = true;
    }
    $status = array_fill(0, 4, '');
    switch ($entry[3][0]) {
        case '1':
            $status[0] = "checked";
            break;
        case '2':
            $status[1] = "checked";
            break;
        case '3':
            $status[2] = "checked";
            break;
        case '4':
            $status[3] = "checked";
            break;
        default:
            $status[3] = "checked";
            break;
    }
    $title = $entry[4];

    $talk = $entry[5];

    $LPR_name = $entry[7];
    $segment = array_fill(0, 11, '');
    foreach ($entry[8] as $num_of_segment) {
        switch ($num_of_segment) {
            case '1':
                $segment[0] = "checked";
                break;
            case '2':
                $segment[1] = "checked";
                break;
            case '3':
                $segment[2] = "checked";
                break;
            case '4':
                $segment[3] = "checked";
                break;
            case '5':
                $segment[4] = "checked";
                break;
            case '6':
                $segment[5] = "checked";
                break;
            case '7':
                $segment[6] = "checked";
                break;
            case '8':
                $segment[7] = "checked";
                break;
            case '9':
                $segment[8] = "checked";
                break;
            case '10':
                $segment[9] = "checked";
                break;
            case '11':
                $segment[10] = "checked";
                break;
        }
    }
    ?>
                <div class="entry">
                <form method='post' action="./entry.php">
                <input type=hidden name="entry_id" value="<?php echo $entry_id ?>">
                    <div class="footer">
                        <input class="save__btn btn_off" id="save__btn" type="submit" onclick="return confirm('Вы действительно хотите сохранить запись?'); this.parentNode.submit();" value="Сохранить">
                        <input type="button" id="back__btn" class="back__btn" value="На главную" />
                        <!-- <input type="button" id="close__btn" class="back__btn" value="Закрыть" /> -->
                        <div id="datetime" class="datetime"></div>
                    </div>
                    <div class="block left">
                        <div class="id">
                            ID Записи : <span id="id"><?php echo $entry_id ?></span>
                        </div>
                        <div class="status">
                            <p>* Статус:</p>
                            <label><input type="radio" name="status[]" value="3" class="status__button3" <?php echo $status[2] ?>>
                                <span class="status__label">Холодный клиент</span></label>
                            <label><input type="radio" name="status[]" value="2" class="status__button2" <?php echo $status[1] ?>>
                                <span class="status__label">Переговоры</span></label><br>
                            <label><input type="radio" name="status[]" value="1" class="status__button1" <?php echo $status[0] ?>>
                                <span class="status__label">Работаем</span></label>
                            <label><input type="radio" name="status[]" value="4" class="status__button4" <?php echo $status[3] ?>>
                                <span class="status__label">Не работаем</span></label>
                        </div>
                        <div class="description">
                            <p>Описание:</p>
                            <textarea rows="20" class="auto_size description__text" name="description" id="textArea" type="text" placeholder="Описание"><?php echo $talk ?></textarea>
                        </div>
                    </div>
                    <div class="block center">
                        <div class="date">
                            <span>Дата:</span>
                            <input class="date__input" readonly type="date" name="date" value="<?php echo $date ?>">
                            <input type=hidden name="time" value="<?php echo $time ?>">
                        </div>

                        <div class="title">
                            Название:
                            <input type="text" class="title__text" name="title" value="<?php echo $title ?>" onkeydown="return event.key != 'Enter';" placeholder="Название">
                        </div><br>
                        <div class="LPR">
                            LPR Имя:
                            <input type="text" class="LPR_name__text" name="LPR_name" value="<?php echo $LPR_name ?>" onkeydown="return event.key != 'Enter';" placeholder="LPR Имя">
                        </div>
                        <div class="contact">
                            <p>Контакты:</p>
                            <?php echo $contact_number . $contact ?><input class="contact_text" name="contact[]" type="text" value="" onkeydown="return event.key != 'Enter';" placeholder="Новый контакт">
                        </div>
                        <div class="segments">
                            <p>* Сегмент:</p>
                            <input type="checkbox" class="segment_checkbox" id="segment10" name="segment[]" value="10" <?php echo $segment[9] ?>>
                            <label for="segment10" class="segment_label">1 Потребитель</label><br style="line-height:25px">
                            <input type="checkbox" class="segment_checkbox" id="segment2" name="segment[]" value="2" <?php echo $segment[1] ?>>
                            <label for="segment2" class="segment_label">2 Визажист Стилист</label><br>
                            <input type="checkbox" class="segment_checkbox" id="segment11" name="segment[]" value="11" <?php echo $segment[10] ?>>
                            <label for="segment11" class="segment_label">3 Салон красоты / Школа</label><br style="line-height:25px">
                            <input type="checkbox" class="segment_checkbox" id="segment3" name="segment[]" value="3" <?php echo $segment[2] ?>>
                            <label for="segment3" class="segment_label">4 Магазин офлайн</label><br>
                            <input type="checkbox" class="segment_checkbox" id="segment7" name="segment[]" value="7" <?php echo $segment[6] ?>>
                            <label for="segment7" class="segment_label">5 Сеть магазинов</label><br>
                            <input type="checkbox" class="segment_checkbox" id="segment9" name="segment[]" value="9" <?php echo $segment[8] ?>>
                            <label for="segment9" class="segment_label">6 Склад-дистрибьютор</label><br style="line-height:25px">
                            <input type="checkbox" class="segment_checkbox" id="segment8" name="segment[]" value="8" <?php echo $segment[7] ?>>
                            <label for="segment8" class="segment_label">7 Интернет магазин</label><br>
                            <input type="checkbox" class="segment_checkbox" id="segment4" name="segment[]" value="4" <?php echo $segment[3] ?>>
                            <label for="segment4" class="segment_label">8 Группа ВК Продажа Косметики</label><br>
                            <input type="checkbox" class="segment_checkbox" id="segment5" name="segment[]" value="5" <?php echo $segment[4] ?>>
                            <label for="segment5" class="segment_label">9 Insta Продажа Косметики</label><br style="line-height:25px">
                            <input type="checkbox" class="segment_checkbox" id="segment1" name="segment[]" value="1" <?php echo $segment[0] ?>>
                            <label for="segment1" class="segment_label">10 Партнер ЭРА на Карте</label><br style="line-height:25px">
                            <input type="checkbox" class="segment_checkbox" id="segment6" name="segment[]" value="6" <?php echo $segment[5] ?>>
                            <label for="segment6" class="segment_label">11 Аренда рабочего места - 300 руб</label><br>
                        </div>
                    </div>
                    <div class="block rigth"></label>

                        <div class="sms">
                            <form method="post" action="./entry.php">
                                <input type="text" name="sms_number" class="hide" value="<?php echo $number ?>">
                                <textarea rows="10" class="auto_size sms__text" id="sms__text" name="sms_text" type="text" placeholder="Текст sms сообщения"></textarea>
                                <input type="submit" onclick="return confirm('Отправить SMS?'); this.parentNode.submit();" name="sms_btn" class="sms__btn btn_off" id="sms__btn" value="Отправить SMS">
                            </form>
                        </div>
                        <div class="documents">
                            <form method="post" target="_blank" action="../php_doc_page/document_1.php">
                                <input type="text" class="hide" name="number" value="<?php echo $number ?>">
                                <input type="text" class="hide" name="name" value="<?php echo $LPR_name ?>">
                                <input type="submit" name="doc1" class="doc" id="doc1" value="Шаблон №1">
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <script src="../js/script_entry.js"></script>
            <script src="../js/datetime.js"></script>
</body>

</html>