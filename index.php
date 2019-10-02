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
            <button class="filter__status_btn" id="btn1">Работаем</button>
            <button class="filter__status_btn" id="btn2">Переговоры</button><br>
            <button class="filter__status_btn" id="btn3">Холодный клиент</button>
            <button class="filter__status_btn" id="btn4">Не работаем</button>
        </div>
        <div class="filter__segment">
            <h3 class="filter__segment_title">Сегмент</h3>
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Партнер ЭРА на Карте</p></label>
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Визажист стилист</p></label>
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Магазин офлайн</p></label>           
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Группа ВК Продажа косметики</p></label>          
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Insta Продажа косметики</p></label>           
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Аренда рабочего места - 300 руб</p></label>
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Сеть магазинов</p></label>
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Интернет магазин</p></label>
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Склад-дистрибьютор</p></label>
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Потребитель</p></label>
            <label><input class="filter__segment_box" type="checkbox"><p class="filter__segment_title">Салон красоты</p></label>
        </div>
    </div>
    <span class="content">
        <ul  class="elastic">
                <?php
                    include ('php/get_catalog.php');
                    echo '<li class="sample">'.
                                                '<span class="id">ID</span>'.
                                                '<span class="title">Название</span>'.
                                                '<span class="contact">Контакты</span>'.
                                                '<span class="LPR_name">ЛПР Имя</span>'.
                                                '<span class="segment_sample">Сегмент</span>'.'</li>';
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
                        
                        $segment = '';
                        
                        $LPR_name = $entry[7];
                        if(count($entry[8])==0){
                            $segment = '<span class="segment">Нет сегмента</<span>';
                        }
                        foreach($entry[8] as $num_of_segment){
                            switch ($num_of_segment){
                                case '1':
                                    $segment = $segment.'<span class="segment  segment1">Партнер ЭРА на Карте</span>';
                                    break;
                                case '2':
                                    $segment = $segment.'<span class="segment  segment2">Визажист стилист</span>';
                                    break;
                                case '3':
                                    $segment = $segment.'<span class="segment  segment3">Магазин офлайн</span>';
                                    break;
                                case '4':
                                    $segment = $segment.'<span class="segment  segment4">Группа ВК</span>';
                                    break;
                                case '5':
                                    $segment = $segment.'<span class="segment  segment5">Insta Продажа косметики</span>';
                                    break;
                                case '6':
                                    $segment = $segment.'<span class="segment  segment6">300 руб </span>';
                                    break;
                                case '7':
                                    $segment = $segment.'<span class="segment  segment7">Сеть магазинов </span>';
                                    break;
                                case '8':
                                    $segment = $segment.'<span class="segment  segment8">Интернет магазин </span>';
                                    break;
                                case '9':
                                    $segment = $segment.'<span class="segment  segment9">Склад дистрибьютор </span>';
                                    break;
                                case '10':
                                    $segment = $segment.'<span class="segment  segment10">Потребитель </span>';
                                    break;
                                case '11':
                                    $segment = $segment.'<span class="segment segment11">Салон красоты </span>';
                                    break;
                            }
                        }

                        echo '
                        <form method="get" action="php/entry.php">
                        <input type=hidden name="entry_id" value="'.$entry_full["id"].'">
                        <button class="button" name="entry" type="submit"><li class="entry '.$color.'">'.
                                                '<span class="id entry_element">'.$entry_full["id"].'</span>'.
                                                '<span class="title entry_element">'.$title.'</span>'.
                                                '<span class="contact entry_element">'.$contact.'</span>'.
                                                '<span class="LPR_name entry_element">'.$LPR_name.'</span>'.
                                                '<span class="segment_span entry_element">'.$segment.'</span>'.'</li></button></form>';
                        
                                                
                                                
                    }
                ?>
        </ul>
    </div>
    <script src="js/script.js"></script>
    <script src="js/live_search.js"></script>
    <script src="js/datetime.js"></script>
    <script src="js/filter.js"></script>
</body>
</html>