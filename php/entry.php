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
        $entry_id = $_GET['entry_id'];
        if(isset($_POST["status"])||isset($_POST["segment"])||isset($_POST["date"])||isset($_POST["title"])||isset($_POST["description"])||isset($_POST["LPR_name"])||isset($_POST["contact"])){
            $values = array();
            $values['2'] = $_POST["date"].$_POST["time"];
            $values['3'] = $_POST["status"];
            $values['4'] = $_POST["title"]; 
            $values['5'] = $_POST["description"];
            $values['6'] = array();
            $_POST["contact"] = array_filter($_POST["contact"]);
            foreach($_POST["contact"] as $contact){
                array_push($values['6'], array("contact" => $contact));
            }
            $values['7'] = $_POST["LPR_name"];
            $values['8'] = $_POST["segment"];
            $values = array_filter($values);
            
            // подготовка тела запроса
            $data = array();
            $data['values'] = $values;
            $data_json = json_encode($data);
            $entry_id = $_POST['entry_id'];
            include ('./update_entry.php');
        }
        include ('./get_entry.php');
        $entry=$res["values"];
        $date = substr (date('Y-m-d H:i:s', strtotime($entry[2])),0,10);
        $time = substr (($entry[2]),10);
                        
        $contact = '';
        foreach($entry[6] as $temp){
            $contact = $contact.'<input class="contact_text" name="contact[]" type="text" value="'.$temp["contact"].'">';
        }

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
        }
        $title = $entry[4];

        $description = $entry[5];

        $LPR_name = $entry[7];

        foreach($entry[8] as $num_of_segment){
            switch ($num_of_segment){
                case '1':
                    $segment[0]="checked";
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
                
            }
        }
       
    ?>
    <div class="entry">
        <form method='post' action="./entry.php">
        <input type=hidden name="entry_id" value="<?php echo $entry_id?>">
        <div class="battons">
            <input class="submit__btn" type="submit" value="Сохранить">
            <input class="submit__btn" type="submit" value="Удалить">
        </div>
        <div class="date">
            <span class="date__title, titleOf">Дата</span> <input class="date__input" type="date" name="date" value="<?php echo $date?>">
            <input type=hidden name="time" value="<?php echo $time ?>">
        </div>
        <div class="status"><span class="status__title, titleOf">Статус</span>
            <span><input type="radio" name="status[]" value="1" class="status__button" <?php echo $status[0]?>>Работаем</span>
            <span><input type="radio" name="status[]" value="2" class="status__button" <?php echo $status[1]?> >Переговоры</span>
            <span><input type="radio" name="status[]" value="3" class="status__button" <?php echo $status[2]?> >Холодный клиент</span>
        </div>
        <div class="segment">
            <span class="segment__title, titleOf">Сегмент</span>
            <input type="checkbox" name="segment[]" value="1" <?php echo $segment[0] ?>>Партнер ЭРА
            <input type="checkbox" name="segment[]" value="2"<?php echo $segment[1] ?>>Визажист
            <input type="checkbox" name="segment[]" value="3"<?php echo $segment[2] ?>>Магазин офлайн
            <input type="checkbox" name="segment[]" value="4"<?php echo $segment[3] ?>>ВК
            <input type="checkbox" name="segment[]" value="5"<?php echo $segment[4] ?>>Insta
            <input type="checkbox" name="segment[]" value="6"<?php echo $segment[5] ?>>300 руб
        </div>
        <div class="title">
            <span class="title__title, titleOf">Название</span>
            <input class="title__text" name="title" type="text" value="<?php echo $title?>">
        </div>
        <div class="description">
            <span class="description__title, titleOf">Описание</span>
            <input class="description__text" name="description" type="text" value="<?php echo $description?>">
        </div>
        <div class="LPR_name">
            <span class="LPR_name__title, titleOf">ЛПР Имя</span>
            <input class="LPR_name__text" name="LPR_name" type="text" value="<?php echo $LPR_name?>">
        </div>
        <div class="contact">
            <span class="contact__title, titleOf">Контакты</span>
            <?php echo $contact?><input class="contact_text" name="contact[]" type="text" value="" placeholder="Новый контакт">
        </div>
        </form>
    </div>
</body>
</html>