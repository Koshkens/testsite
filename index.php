<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель</title>
</head>
<body>
    <span class="nav">
            <input type="text" id="elastic" placeholder="Введите поисковый запрос" class="nav__input">
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

                        $status = $elem[3][0];

                        $title = $elem[4];

                        $description = $elem[5];

                        $LPR_name = $elem[7];

                        $segment = $elem[8];

                        echo '<li class="entry"><button type="submit">'.
                                                '<span class="">'.$entry["id"].'</span>'.
                                                '<span class="">'.$date.'</span>'.
                                                '<span class="">'.$date.'</span>'.
                                                '<span class="">'.$status.'</span>'.
                                                '<span class="">'.$title.'</span>'.
                                                '<span class="">'.$description.'</span>'.
                                                '<span class="">'.$contact.'</span>'.
                                                '<span class="">'.$LPR_name.'</span>'.
                                                '<span class="">'.$segment.'</span>'.'</button></li>';
                                                
                                                
                    }
                ?>
            </form>
        </ul>
    </div>
    <script src="js/live_search.js"></script>
</body>
</html>