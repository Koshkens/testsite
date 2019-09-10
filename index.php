<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/style.css">
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
                        echo '<li class="entry"><button type="submit">'.'<span class="name_sotrudnik">'.$elem[2][0][title].'</span>'.
                                                '<span class="status">'.$elem[3][0].'</span>'.
                                                '<span class="otcenka">'.$elem[4].'</span>'.
                                                '<span class="text">'.$elem[7].'</span>'.'</button></li>';
                    }
                ?>
            </form>
        </ul>
    </div>
    <script src="js/live_search.js"></script>
</body>
</html>