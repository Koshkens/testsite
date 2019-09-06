<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Popkens</title>
</head>
<body>
    <div class="nav">
        <input type="text" placeholder="   Введите поисковый запрос" class="nav__input">
        <button class="nav__button">поиск</button>
    </div>
        <ul class="">
        <?php
            include ('get_zapis.php');
            foreach($res as $zapis_full){
                $zapis = $zapis_full["values"];
                echo '<li class="zapis">'.'<span class="name_sotrudnik">'.$zapis[2][0][title].'</span>'.
                                          '<span class="status">'.$zapis[3][0].'</span>'.
                                          '<span class="otcenka">'.$zapis[4].'</span>'.
                                          '<span class="text">'.$zapis[7].'</span>'.'</li>';
            }
        ?>
        </ul>
</body>
</html>