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
            <a class="nav_element" href="#">HR</a>
            <a class="nav_element" href="#">Мастера</a>
            <a class="nav_element" href="#">Продажи</a>
    </span>
    <div class="content">
        <ul  class="elastic">
            <form target="_blank" method="get" action="php/entry.php">
                <?php
                    include ('php/get_catalog.php');
                    foreach($res as $entry){
                        $elem = $entry["values"];

                        $date = date('Y-m-d H:i:s', strtotime($elem[2]));
                        
                        $contact = '';
                        foreach($elem[6] as $temp){
                            $contact = $contact.$temp["contact"]."; "; 
                        }

                        switch ($elem[3][0]) {
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
                        $title = $elem[4];

                        $description = $elem[5];

                        $LPR_name = $elem[7];
                        $segment = '';
                        foreach($elem[8] as $num_of_segment){
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

                        echo '<li class="entry"><button type="submit">'.
                                                '<span class="id">'.$entry["id"].'</span>'.
                                                '<span class="date">'.$date.'</span>'.
                                                '<span class="status">'.$status.'</span>'.
                                                '<span class="title">'.$title.'</span>'.
                                                '<span class="description">'.$description.'</span>'.
                                                '<span class="contact">'.$contact.'</span>'.
                                                '<span class="LPR_name">'.$LPR_name.'</span>'.
                                                '<span class="segment">'.$segment.'</span>'.'</button></li>';
                                                
                                                
                    }
                ?>
            </form>
        </ul>
    </div>
    <script src="js/live_search.js"></script>
</body>
</html>