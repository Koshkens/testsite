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
                echo '<li>'.'<div class="name_sotrudnik">'.$zapis[2][0][title].'</div>'.'<div class="status">'.$zapis[3][0].'</div>'.'<div class="otcenka">'.$zapis[4].'</div>'.'<div class="text">'.$zapis[7].'</div>'.'</li>';
            }
        ?>
        </ul>
</body>
</html>