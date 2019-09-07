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
        <form method="post" action="">
            <input type="text" name="search" placeholder="   Введите поисковый запрос" class="nav__input">
            <input type="submit" class="nav__button" value="Поиск">
        </form>
    </div>
        <ul class="">
        <?php
            include ('get_zapis.php');
            $status =0;
            foreach($res as $zapis_full){
                $zapis = $zapis_full["values"];
                $status =0;
                if($zapis[4]==htmlspecialchars($_POST["search"])){
                    echo '<li class="zapis">'.'<span class="name_sotrudnik">'.$zapis[2][0][title].'</span>'.
                                            '<span class="status">'.$zapis[3][0].'</span>'.
                                            '<span class="otcenka">'.$zapis[4].'</span>'.
                                            '<span class="text">'.$zapis[7].'</span>'.'</li>';
                    $status++;
                }elseif(htmlspecialchars($_POST["search"])==""){
                    echo '<li class="zapis">'.'<span class="name_sotrudnik">'.$zapis[2][0][title].'</span>'.
                                            '<span class="status">'.$zapis[3][0].'</span>'.
                                            '<span class="otcenka">'.$zapis[4].'</span>'.
                                            '<span class="text">'.$zapis[7].'</span>'.'</li>';
                    $status++;
                }
            }
            if($status==0){
               echo '<h2>Ничего не найденно</h2>';
            }
        ?>
        </ul>
</body>
</html>