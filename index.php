<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель</title>
</head>
<body>
    <span class="nav">
            <input type="text" id="elastic" placeholder="Введите поисковый запрос" class="nav_input">
            <a class="new_element" href="./php/new_entry.php" target="_blank">Новая запись</a>
            <span class="entry_amount" id="entry_amount"></span>
            <span id="datetime" class="datetime"></span>
    </span>
    <div class="content">
        <ul  class="elastic">
                <?php
                    include ('php/get_catalog.php');
                    echo '<li class="sample">'.
                                                '<span class="id">ID</span>'.
                                                '<span class="date">Дата</span>'.
                                                '<span class="status">Статус</span>'.
                                                '<span class="title">Название</span>'.
                                                '<span class="description">Переговоры</span>'.
                                                '<span class="contact">Контакты</span>'.
                                                '<span class="LPR_name">ЛПР Имя</span>'.
                                                '<span class="segment">Сегмент</span>'.'</li>';
                    $res =  array_reverse($res);
                    foreach($res as $entry_full){
                        $entry = $entry_full["values"];

                        $day = substr (date('Y-m-d H:i:s', strtotime($entry[2])),8,2);
                        $month_num =  substr (date('Y-m-d H:i:s', strtotime($entry[2])),5,2);
                        switch($month_num){
                            case '01':
                                $month = ' Янв.';
                                break;
                            case '02':
                                $month = ' Фев.';
                                break;
                            case '03':
                                $month = ' Март';
                                break;
                            case '04':
                                $month = ' Апр.';
                                break;
                            case '05':
                                $month = ' Май';
                                break;
                            case '06':
                                $month = ' Июнь';
                                break;
                            case '07':
                                $month = ' Июль';
                                break;
                            case '08':
                                $month = ' Авг.';
                                break;
                            case '09':
                                $month = ' Сент.';
                                break;
                            case '10':
                                $month = ' Окт.';
                                break;
                            case '11':
                                $month = ' Нояб.';
                                break;
                            case '12':
                                $month = ' Дек.';
                                break;
                        }
                        $date = $day.$month;

                        $contact = '';
                        foreach($entry[6] as $temp){
                            $contact = $contact.$temp["contact"]."; "; 
                        }
                        if (!isset($entry[3][0])){
                            $entry[3]= array('5');
                        }
                        switch ($entry[3][0]) {
                            case '1':
                                $status = '<div class="green">Работаем</div>';
                                break;
                            case '2':
                                $status = '<div class="yellow">Переговоры</div>';
                                break;
                            case '3':
                                $status = '<div class="lite-red">Холодный клиент</div>';
                                break;
                            case '4':
                                $status = '<div class="red">Не работаем</div>';
                                break;
                            default:
                                $status = '<div class="red">Не работаем</div>';
                                break;
                        }
                        $title = $entry[4];

                        $description = $entry[5];

                        $LPR_name = $entry[7];
                        $segment = '';
                        foreach($entry[8] as $num_of_segment){
                            switch ($num_of_segment){
                                case '1':
                                    $segment = $segment.'<div class="ok"></div>Партнер ЭРА на Карте';
                                    break;
                                case '2':
                                    $segment = $segment.'<div class="ok"></div>Визажист стилист';
                                    break;
                                case '3':
                                    $segment = $segment.'<div class="ok"></div>Магазин офлайн ';
                                    break;
                                case '4':
                                    $segment = $segment.'<div class="ok"></div>Группа ВК';
                                    break;
                                case '5':
                                    $segment = $segment.'<div class="ok"></div>Insta Продажа косметики';
                                    break;
                                case '6':
                                    $segment = $segment.'<div class="ok"></div>300 руб ';
                                    break;
                                case '7':
                                    $segment = $segment.'<div class="ok"></div>Сеть магазинов ';
                                    break;
                                case '8':
                                    $segment = $segment.'<div class="ok"></div>Интернет магазин ';
                                    break;
                                case '9':
                                    $segment = $segment.'<div class="ok"></div>Склад дистрибьютор ';
                                    break;
                                case '10':
                                    $segment = $segment.'<div class="ok"></div>Потребитель ';
                                    break;
                                case '11':
                                    $segment = $segment.'<div class="ok"></div>Салон красоты ';
                                    break;
                            }
                        }

                        echo '
                        <form target="_blank" method="get" action="php/entry.php">
                        <input type=hidden name="entry_id" value="'.$entry_full["id"].'">
                        <li class="entry"><button class="button" type="submit">'.
                                                '<span class="id">'.$entry_full["id"].'</span>'.
                                                '<span class="date">'.$date.'</span>'.
                                                '<span class="status">'.$status.'</span>'.
                                                '<span class="title">'.$title.'</span>'.
                                                '<span class="description">'.$description.'</span>'.
                                                '<span class="contact">'.$contact.'</span>'.
                                                '<span class="LPR_name">'.$LPR_name.'</span>'.
                                                '<span class="segment">'.$segment.'</span>'.'</button></li></form>';
                        
                                                
                                                
                    }
                ?>
        </ul>
    </div>
    <script src="js/script.js"></script>
    <script src="js/live_search.js"></script>
    <script src="js/datetime.js"></script>
</body>
</html>