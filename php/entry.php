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
        include ('../php/get_entry.php');
        $entry=$res["values"];
        //var_dump($entry);
        
        $date = substr (date('Y-m-d H:i:s', strtotime($entry[2])),0,10);
                        
        $contact = '';
        foreach($entry[6] as $temp){
            $contact = $contact.$temp["contact"]."; "; 
        }

        switch ($entry[3][0]) {
            case '1':
                $status = '<div class="green">Работаем</div>';
                break;
            case '2':
                $status = '<div class="yellow">Переговоры</div>';
                break;
            case '3':
                $status = '<div class="red">Холодный клиент</div>';
                break;
        }
        $title = $entry[4];

        $description = $entry[5];

        $LPR_name = $entry[7];
        $segment = '';
        foreach($entry[8] as $num_of_segment){
            switch ($num_of_segment){
                case '1':
                    $segment = $segment.'<div class="ok"></div>Партнер ЭРА ';
                    break;
                case '2':
                    $segment = $segment.'<div class="ok"></div>Визажист ';
                    break;
                case '3':
                    $segment = $segment.'<div class="ok"></div>Магазин офлайн ';
                    break;
                case '4':
                    $segment = $segment.'<div class="ok"></div>ВК ';
                    break;
                case '5':
                    $segment = $segment.'<div class="ok"></div>Insta ';
                    break;
                case '6':
                    $segment = $segment.'<div class="ok"></div>300 руб ';
                    break;
                
            }
        } 
    ?>
    <div class="entry">
        <div class="date">
            <span class="date__title, titleOf">Дата</span> <input class="date__input" type="date" name="date" value="<?php echo $date?>">
        </div>
        <div class="status"><span class="status__title, titleOf">Статус</span>
            <input type="button" value="Холодный клиент" class="status__button">
            <input type="button" value="Переговоры" class="status__button">
            <input type="button" value="Работаем" class="status__button">
        </div>
        <div class="segment">
            <span class="segment__title, titleOf">Сегмент</span>
            <input type="checkbox" name="segment">Партнер ЭРА
            <input type="checkbox" name="segment">Визажист
            <input type="checkbox" name="segment">Магазин офлайн
            <input type="checkbox" name="segment">ВК
            <input type="checkbox" name="segment">Insta
            <input type="checkbox" name="segment">300 руб
        </div>
        <div class="title">
            <span class="title__title, titleOf">Название</span>
            <input class="title__text" type="text" value="<?php echo $title?>">
        </div>
        <div class="description">
            <span class="description__title, titleOf">Описание</span>
            <input class="description__text" type="text" value="<?php echo $description?>">
        </div>
        <div class="LPR_name">
            <span class="LPR_name__title, titleOf">ЛПР Имя</span>
            <input class="LPR_name__text" type="text" value="<?php echo $LPR_name?>">
        </div>
        <div class="contact">
            <span class="contact__title, titleOf">Контакты</span>
            <input class="contact_text" type="text" value="<?php echo $contact?>">
        </div>
    </div>
    <script src="../js/status.js"></script>
</body>
</html>