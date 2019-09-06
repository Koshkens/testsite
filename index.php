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
    <div class="list">
        <ul>
        <?php
            include ('get_zapis.php');
            foreach($res as $zapis){
                echo "<li>".$zapis["id"]."  ".$zapis["title"]."  ".$zapis["values"][2][0][title]."  ".$zapis["values"][3][0]."  ".$zapis["values"][4]."  ".$zapis["values"][7]."</li>";
            }
        ?>
        </ul>
    </div>
</body>
</html>