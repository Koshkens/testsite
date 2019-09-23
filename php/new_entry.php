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
        if(isset($_POST["status"])||isset($_POST["segment"])||isset($_POST["date"])||isset($_POST["title"])||isset($_POST["description"])||isset($_POST["LPR_name"])||isset($_POST["contact"])){
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
            $_POST["contact"] = array_filter($_POST["contact"]);
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
            $entry_id = $_POST['entry_id'];
            include ('./add_entry.php');
            echo '
                <span class="added">Запись добавлена!</span>    
            ';
        }else{
    $date = date('Y-m-d');
    echo '<div class="entry">
        <form method="post" action="">
        <div class="save_batton">
            <input class="submit__btn" type="submit" value="Добавить">
        </div>
        <div class="date">
            <span class="date__title, titleOf">Дата</span> <input class="date__input" readonly type="date" name="date" value="'.$date.'">
            <input type=hidden name="time" value="">
        </div>
        <div class="status"><span class="status__title, titleOf">Статус</span>
        <span><input type="radio" name="status[]" value="1" class="status__button">Работаем</span>
        <label for="Работаем"></label>
        <span><input type="radio" name="status[]" value="2" class="status__button">Переговоры</span>
        <label for="Переговоры"></label>
        <span><input type="radio" name="status[]" value="3" class="status__button">Холодный клиент</span>
        <label for="Холодный клиент"></label>
        <span><input type="radio" name="status[]" value="4" class="status__button" checked>Не работаем</span>
        <label for="Не работаем"></label>
        </div>
        <div class="segment">
            <span class="segment__title, titleOf">Сегмент</span>
            <span><input type="checkbox" name="segment[]" value="1">Партнер ЭРА на Карте
            <span><input type="checkbox" name="segment[]" value="2">Визажист Стилист</span>
            <span><input type="checkbox" name="segment[]" value="3">Магазин офлайн</span>
            <span><input type="checkbox" name="segment[]" value="4">Группа ВК Продажа Косметики</span>
            <span><input type="checkbox" name="segment[]" value="5">Insta Продажа Косметики</span>
            <span><input type="checkbox" name="segment[]" value="6">Аренда рабочего места - 300 руб</span>
            <span><input type="checkbox" name="segment[]" value="7">Сеть магазинов <br></span>
            <span><input type="checkbox" name="segment[]" value="8">Интернет магазин</span>
            <span><input type="checkbox" name="segment[]" value="9">Склад-Дистрибьютор</span>
            <span><input type="checkbox" name="segment[]" value="10">Потребитель</span>
            <span><input type="checkbox" name="segment[]" value="11">Салон красоты</span>
        </div>
        <div class="title">
            <span class="title__title, titleOf">Название</span>
            <textarea class="title__text" name="title"  type="text"></textarea>
        </div>
        <div class="description">
            <span class="description__title, titleOf">Переговоры</span>
            <textarea class="description__text" name="description"  type="text"></textarea>
        </div>
        <div class="LPR_name">
            <span class="LPR_name__title, titleOf">ЛПР Имя</span>
            <textarea class="LPR_name__text" name="LPR_name" type="text"></textarea>
        </div>
        <div class="contact">
            <span class="contact__title, titleOf">Контакты</span>
            <input class="contact_text" name="contact[]" type="text" value="" placeholder="Новый контакт">
        </div>
        </form>
    </div>
    <script src="../js/auto_size.js"></script>';}
    ?>
</body>
</html>