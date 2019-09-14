<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/entry.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель</title>
</head>
<body>
    <?php
        $entry_id = $_GET['entry_id'];
        include ('../php/get_entry.php');
        $entry=$res["values"];
        
        $date = substr (date('Y-m-d H:i:s', strtotime($entry[2])),0,10);
                        
        $contact = '';
        foreach($entry[6] as $temp){
            $contact = $contact.$temp["contact"]."; "; 
        }

        switch ($entry[3][0]) {
            case '1':
                $status[0] = "checked";
                break;
            case '2':
                $status[1] = "checked";
                break;
            case '3':
                $status[2] = "checked";
                break;
        }
        $title = $entry[4];

        $description = $entry[5];

        $LPR_name = $entry[7];

        foreach($entry[8] as $num_of_segment){
            switch ($num_of_segment){
                case '1':
                    $segment[0]="checked";
                    break;
                case '2':
                    $segment[1] = "checked";
                    break;
                case '3':
                    $segment[2] = "checked";
                    break;
                case '4':
                    $segment[3] = "checked";
                    break;
                case '5':
                    $segment[4] = "checked";
                    break;
                case '6':
                    $segment[5] = "checked";
                    break;
                
            }
        }
    ?>
    <div class="entry">
        <div class="date">
            <span class="date__title, titleOf">Дата</span> <input class="date__input" type="date" name="date" value="<?php echo $date?>">
        </div>
        <div class="status"><span class="status__title, titleOf">Статус</span>
            <span><input type="radio" name="status" value="Холодный клиент" class="status__button" <?php echo $status[0]?>>Работаем</span>
            <span><input type="radio" name="status" value="Переговоры" class="status__button" <?php echo $status[1]?> >Переговоры</span>
            <span><input type="radio" name="status" value="Работаем" class="status__button" <?php echo $status[2]?> >Холодный клиент</span>
        </div>
        <div class="segment">
            <span class="segment__title, titleOf">Сегмент</span>
            <input type="checkbox" name="segment" <?php echo $segment[0] ?>>Партнер ЭРА
            <input type="checkbox" name="segment" <?php echo $segment[1] ?>>Визажист
            <input type="checkbox" name="segment" <?php echo $segment[2] ?>>Магазин офлайн
            <input type="checkbox" name="segment" <?php echo $segment[3] ?>>ВК
            <input type="checkbox" name="segment" <?php echo $segment[4] ?>>Insta
            <input type="checkbox" name="segment" <?php echo $segment[5] ?>>300 руб
        </div>
        <div class="title">
            <span class="title__title, titleOf">Название</span>
            <input class="title__text" type="text" value="<?php echo $title?>">
        </div>
        <div class="description">
            <span class="description__title, titleOf">Описание</span>
            <input class="description__text" type="text" value="<?php echo $description?>">
        </div>
        <div class="LPR_name">
            <span class="LPR_name__title, titleOf">ЛПР Имя</span>
            <input class="LPR_name__text" type="text" value="<?php echo $LPR_name?>">
        </div>
        <div class="contact">
            <span class="contact__title, titleOf">Контакты</span>
            <input class="contact_text" type="text" value="<?php echo $contact?>">
        </div>
    </div>
    <script src="../js/status.js"></script>
</body>
</html>