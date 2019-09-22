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
    echo '<div class="entry">
        <form method="post" action="">
        <input type=hidden name="entry_id" value="">
        <div class="save_batton">
            <input class="submit__btn" type="submit" value="Добавить">
        </div>
        <div class="date">
            <span class="date__title, titleOf">Дата</span> <input class="date__input" type="date" name="date" value="">
            <input type=hidden name="time" value="">
        </div>
        <div class="status"><span class="status__title, titleOf">Статус</span>
            <span><input type="radio" name="status[]" value="1" class="status__button">Работаем</span>
            <span><input type="radio" name="status[]" value="2" class="status__button">Переговоры</span>
            <span><input type="radio" name="status[]" value="3" class="status__button">Холодный клиент</span>
        </div>
        <div class="segment">
            <span class="segment__title, titleOf">Сегмент</span>
            <input type="checkbox" name="segment[]" value="1">Партнер ЭРА
            <input type="checkbox" name="segment[]" value="2">Визажист
            <input type="checkbox" name="segment[]" value="3">Магазин офлайн
            <input type="checkbox" name="segment[]" value="4">ВК
            <input type="checkbox" name="segment[]" value="5">Insta
            <input type="checkbox" name="segment[]" value="6">300 руб
        </div>
        <div class="title">
            <span class="title__title, titleOf">Название</span>
            <input class="title__text" name="title" type="text" value="">
        </div>
        <div class="description">
            <span class="description__title, titleOf">Описание</span>
            <input class="description__text" name="description" type="text" value="">
        </div>
        <div class="LPR_name">
            <span class="LPR_name__title, titleOf">ЛПР Имя</span>
            <input class="LPR_name__text" name="LPR_name" type="text" value="">
        </div>
        <div class="contact">
            <span class="contact__title, titleOf">Контакты</span>
            <input class="contact_text" name="contact[]" type="text" value="" placeholder="Новый контакт">
        </div>
        </form>
    </div>';}
    ?>
</body>
</html>