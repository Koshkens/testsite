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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $time="T09:05:51.019Z";
            $values = array();
            if($_POST["date"]=="") $_POST["date"]=date('Y-m-d');
            $values['2'] = $_POST["date"].$_POST["time"];
            $values['3'] = $_POST["status"];
            if(!isset($_POST["title"])) $_POST["title"]='';
            $values['4'] = $_POST["title"]; 
            if(!isset($_POST["description"])) $_POST["description"]='';
            $values['5'] = $_POST["description"];
            if(!isset($_POST["LPR_name"])) $_POST["LPR_name"]='';
            $values['6'] = array();
            if ($_POST["contact"][0] == "") {
                $empty = "";
            }
            $_POST["contact"] = array_filter($_POST["contact"]);
            if(isset($empty)) array_unshift($_POST["contact"], $empty);
            foreach($_POST["contact"] as $contact){
                array_push($values['6'], array("contact" => $contact));
            }
            $values['7'] = $_POST["LPR_name"];
            if(!isset($_POST["segment"])) $_POST["segment"]=array();
            $values['8'] = $_POST["segment"];
            // подготовка тела запроса
            $data = array();
            $data['values'] = $values;
            $data_json = json_encode($data);
            include ('./add_entry.php');
            echo    'Добавление записи...'.
                    '<script type="text/javascript">'.
                        'window.location.replace("./entry.php?entry_id='.$res["id"].'&entry=");'.
                    '</script>';
        }else{
    $date = date('Y-m-d');
    echo '<div class="entry">
            <form method="post" name="form" id="new_entry_form" action="">
                <div class="footer">
                    <input class="save__btn btn_off" type="submit" id="save__btn" value="Добавить">
                    <input type="button" id="back__btn" class="back__btn" value="На главную"/>
                </div>
                <div class="block left">
                    <div class="status">
                        <p>* Статус:</p>
                        <label><input type="radio" name="status[]" value="3" class="status__button3">
                        <span  class="status__label">Холодный клиент</span></label>
                        <label><input type="radio" name="status[]" value="2" class="status__button2">
                        <span  class="status__label">Переговоры</span></label><br>
                        <label><input type="radio" name="status[]" value="1" class="status__button1">
                        <span  class="status__label">Работаем</span></label>
                        <label><input type="radio" name="status[]" value="4" class="status__button4">
                        <span  class="status__label">Не работаем</span></label> 
                    </div>
                    <div class="description">
                        <p>Описание:</p>
                        <textarea rows="20" id=textArea class="auto_size description__text" name="description"  type="text" placeholder="Описание"></textarea>
                    </div>
                </div>
                <div class="block center">
                    <div class="date"> 
                        <span>Дата:</span>
                        <input class="date__input" readonly type="date" name="date" value="'.$date.'">
                        <input type=hidden name="time" value="">
                    </div>
                    <div class="title">
                        Название:
                        <input type="text"  class="title__text" name="title" value="" placeholder="Название">
                    </div><br> 
                    <div class="LPR">
                        LPR Имя:
                        <input type="text"  class="LPR_name__text" name="LPR_name" value="" placeholder="LPR Имя">
                    </div>
                    <div class="contact">
                        <p>Контакты:</p>
                        <input class="contact_text" name="contact[]" type="tel" pattern="[+][7][0-9]{10}" title="Номер должен содержать 11 цифр и начинаться с +7" maxlength="12" minlength="11" placeholder="Номер" aria-invalid="false" aria-required="true">
                        <input class="contact_text" name="contact[]" type="text" value="" placeholder="Другой контакт">
                    </div>
                    <div class="segments">
                        <p>* Сегмент:</p>
                        <input type="checkbox"class="segment_checkbox"  id="segment1" name="segment[]" value="1">
                        <label for="segment1" class="segment_first_click ">1 Партнер ЭРА на Карте</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment2" name="segment[]" value="2">
                        <label for="segment2" class="segment_first_click ">2 Визажист Стилист</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment3" name="segment[]" value="3">
                        <label for="segment3" class="segment_first_click ">3 Магазин офлайн</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment4" name="segment[]" value="4">
                        <label for="segment4" class="segment_first_click ">4 Группа ВК Продажа Косметики</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment5" name="segment[]" value="5">
                        <label for="segment5" class="segment_first_click ">5 Insta Продажа Косметики</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment6" name="segment[]" value="6">
                        <label for="segment6" class="segment_first_click ">6 Аренда рабочего места - 300 руб</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment7" name="segment[]" value="7">
                        <label for="segment7" class="segment_first_click ">7 Сеть магазинов</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment8" name="segment[]" value="8">
                        <label for="segment8" class="segment_first_click ">8 Интернет магазин</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment9" name="segment[]" value="9">
                        <label for="segment9" class="segment_first_click ">9 Склад-Дистрибьютор</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment10" name="segment[]" value="10">
                        <label for="segment10" class="segment_first_click ">10 Потребитель</label><br>
                        <input type="checkbox"class="segment_checkbox"  id="segment11" name="segment[]" value="11">
                        <label for="segment11" class="segment_first_click ">11 Салон красоты</label><br>
                    </div> 
                </div>
                <div class="block rigth">
                </div>
            </form>
        </div>
        <script src="../js/script_new_entry.js"></script>';
    }
    ?>
</body>
</html>