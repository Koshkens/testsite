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
            <a class="stat" href="./php/stat.php" target="_blank">Статистика</a>
            <span class="entry_amount" id="entry_amount"></span>
            <span id="datetime" class="datetime"></span>
    </span>
    <div class="filter">
        <div class="filter__status">
            <h3 class="filter__status_title">Статус</h3>
            <button class="filter__status_btn">Работаем</button>
            <button class="filter__status_btn">Переговоры</button>
            <button class="filter__status_btn">Холодный клиент</button>
            <button class="filter__status_btn">Не работаем</button>
        </div>
        <div class="filter__segment">
            <h3 class="filter__segment_title">Сегмент</h3>
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Партнер ЭРА на Карте</p>
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Визажист стилист</p>
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Магазин офлайн</p>           
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Группа ВК</p>          
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Insta Продажа косметики</p>           
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">300 руб</p>
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Сеть магазинов</p>
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Интернет магазин</p>
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Склад дистрибьютор</p>
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Потребитель</p>
            <input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Салон красоты</p>
        </div>
    </div>
    <div class="content">
        <ul  class="elastic">
                <?php
                    include ('php/get_catalog.php');
                    echo '<li class="sample">'.
                                                '<span class="id">ID</span>'.
                                                '<span class="title">Название</span>'.
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
                                $status = '<div>Работаем</div>';
                                $color = 'green';
                                break;
                            case '2':
                                $status = '<div>Переговоры</div>';
                                $color = 'yellow';
                                break;
                            case '3':
                                $status = '<div">Холодный клиент</div">';
                                $color = 'red';
                                break;
                            case '4':
                                $status = '<div>Не работаем</div>';
                                $color = 'gray';
                                break;
                            default:
                                $status = '<div>Не работаем</div>';
                                $color = 'gray';
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
                        <button class="button" name="entry" type="submit"><li class="entry '.$color.'">'.
                                                '<span class="id">'.$entry_full["id"].'</span>'.
                                                '<span class="title">'.$title.'</span>'.
                                                '<span class="contact">'.$contact.'</span>'.
                                                '<span class="LPR_name">'.$LPR_name.'</span>'.
                                                '<span class="segment">'.$segment.'</span>'.'</li></button></form>';
                        
                                                
                                                
                    }
                ?>
                
        </ul>
    </div>
    <script src="js/script.js"></script>
    <script src="js/live_search.js"></script>
    <script src="js/datetime.js"></script>
</body>
</html>