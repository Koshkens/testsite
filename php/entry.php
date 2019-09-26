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
        if(isset($_POST["status"])||isset($_POST["segment"])||isset($_POST["date"])||isset($_POST["title"])||isset($_POST["description"])||isset($_POST["LPR_name"])||isset($_POST["contact"])){
            $values = array();
            $values['2'] = $_POST["date"].$_POST["time"];
            $values['3'] = $_POST["status"];
            if(!isset($_POST["title"])) $_POST["title"]='';
            $values['4'] = $_POST["title"]; 
            if(!isset($_POST["description"])) $_POST["description"]='';
            $values['5'] = $_POST["description"];
            if(!isset($_POST["LPR_name"])) $_POST["LPR_name"]='';
            $values['6'] = array();
            $_POST["contact"] = array_filter($_POST["contact"]);
            foreach($_POST["contact"] as $contact){
                array_push($values['6'], array("contact" => $contact));
            }
            $values['7'] = $_POST["LPR_name"];
            if(!isset($_POST["segment"])) $_POST["segment"]=array();
            $values['8'] = $_POST["segment"];
            // подготовка тела запроса
            $data = array();
            $data['values'] = $values;
            $data_json = json_encode($data);
            $entry_id = $_POST['entry_id'];
            include ('./update_entry.php');
        }else{$entry_id = $_GET['entry_id'];}
        include ('./get_entry.php');
        $entry=$res["values"];
        $date = substr (date('Y-m-d H:i:s', strtotime($entry[2])),0,10);
        $time = substr (($entry[2]),10);
                        
        $contact = '';
        foreach($entry[6] as $temp){
            $contact = $contact.'<input class="contact_text" name="contact[]" type="text" value="'.$temp["contact"].'">';
        }
        $status = array_fill(0,4,'');
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
            case '4':
                $status[3] = "checked";
                break;
            default:
                $status[3] = "checked";
                break;
        }
        $title = $entry[4];

        $talk = $entry[5];

        $LPR_name = $entry[7];
        $segment = array_fill(0,11,'');
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
                case '7':
                    $segment[6]="checked";
                    break;
                case '8':
                    $segment[7] = "checked";
                    break;
                case '9':
                    $segment[8] = "checked";
                    break;
                case '10':
                    $segment[9] = "checked";
                    break;
                case '11':
                    $segment[10] = "checked";
                    break;
                
            }
        }
       
    ?>
    <!-- <div class="entry">
        <form method='post' action="./entry.php">
        <input type=hidden name="entry_id" value="<?php echo $entry_id?>">
        <div class="battons">
            <input class="submit__btn" type="submit" id="save" value="Сохранить">
            <span class="id">ID: <?php echo $entry_id ?></span>
        </div>
        <div class="date">
            <span class="date__title, titleOf">Дата</span> <input class="date__input" readonly type="date" name="date" value="<?php echo $date?>">
            <input type=hidden name="time" value="<?php echo $time ?>">
        </div>
        <div class="status"><span class="status__title, titleOf">Статус</span>
            <span><input type="radio" name="status[]" value="1" class="status__button" checked <?php echo $status[0]?>>Работаем</span>
            <label for="Работаем"></label>
            <span><input type="radio" name="status[]" value="2" class="status__button" <?php echo $status[1]?> >Переговоры</span>
            <label for="Переговоры"></label>
            <span><input type="radio" name="status[]" value="3" class="status__button" <?php echo $status[2]?> >Холодный клиент</span>
            <label for="Холодный клиент"></label>
            <span><input type="radio" name="status[]" value="4" class="status__button" <?php echo $status[3]?> >Не работаем</span>
            <label for="Не работаем"></label>
        </div>
        <div class="segment">
            <span class="segment__title, titleOf">Сегмент</span>
            <div><input type="checkbox" name="segment[]" value="1" <?php echo $segment[0] ?>>Партнер ЭРА на Карте
            <span><input type="checkbox" name="segment[]" value="2"<?php echo $segment[1] ?>>Визажист Стилист</span>
            <span><input type="checkbox" name="segment[]" value="3"<?php echo $segment[2] ?>>Магазин офлайн</span>
            <span><input type="checkbox" name="segment[]" value="4"<?php echo $segment[3] ?>>Группа ВК Продажа Косметики</span>
            <span><input type="checkbox" name="segment[]" value="5"<?php echo $segment[4] ?>>Insta Продажа Косметики</span>
            <span><input type="checkbox" name="segment[]" value="6"<?php echo $segment[5] ?>>Аренда рабочего места - 300 руб</span>
            <span><input type="checkbox" name="segment[]" value="7"<?php echo $segment[6] ?>>Сеть магазинов <br></span>
            <span><input type="checkbox" name="segment[]" value="8"<?php echo $segment[7] ?>>Интернет магазин</span>
            <span><input type="checkbox" name="segment[]" value="9"<?php echo $segment[8] ?>>Склад-Дистрибьютор</span>
            <span><input type="checkbox" name="segment[]" value="10"<?php echo $segment[9] ?>>Потребитель</span>
            <span><input type="checkbox" name="segment[]" value="11"<?php echo $segment[10] ?>>Салон красоты</span>
        </div>
        <div class="title">
            <span class="title__title, titleOf">Название</span>
            <textarea class="title__text" name="title"  type="text"><?php echo $title?></textarea>
        </div>
        <div class="description">
            <span class="description__title, titleOf">Переговоры</span>
            <textarea class="description__text" name="description"  type="text"><?php echo $talk?></textarea>
        </div>
        <div class="LPR_name">
            <span class="LPR_name__title, titleOf">ЛПР Имя</span>
            <textarea class="LPR_name__text" name="LPR_name"  type="text"><?php echo $LPR_name?></textarea>
        </div>
        <div class="contact">
            <span class="contact__title, titleOf">Контакты</span>
            <?php echo $contact?><input class="contact_text" name="contact[]" type="text" value="" placeholder="Новый контакт">
        </div>
        </form>
    </div> -->
    <div class="entry">
        <form method='post' action="./entry.php">
        <input type=hidden name="entry_id" value="<?php echo $entry_id?>">
            <div class="block left">
                <div class="status">
                    <p>Статус:</p>
                    <label><div><input type="radio" name="status[]" value="1" class="status__button" checked <?php echo $status[0]?>>Работаем</div></label>
                    <label><div><input type="radio" name="status[]" value="2" class="status__button" <?php echo $status[1]?> >Переговоры</div></label>
                    <label><div><input type="radio" name="status[]" value="3" class="status__button" <?php echo $status[2]?> >Холодный клиент</div></label>
                <label> <div><input type="radio" name="status[]" value="4" class="status__button" <?php echo $status[3]?> >Не работаем</div></label>
                </div>
                <div class="talk">
                    <p>Переговоры:</p>
                    <textarea class="auto_size talk__text" name="talk"  type="text"></textarea>
                </div>
            </div>
            <div class="block center">
                <div class="date"> 
                    <p>Дата:</p>
                    <input class="date__input" readonly type="date" name="date" value="<?php echo $date?>">
                    <input type=hidden name="time" value="<?php echo $time ?>">
                </div> 
                <div class="LPR">
                    <p>LPR Имя:</p>
                    <input type="text"  class="LPR_name__text" name="LPR_name" value="<?php echo $LPR_name?>">
                </div>
                <div class="contact">
                    <p>Контакты:</p>
                    <?php echo $contact?><input class="contact_text" name="contact[]" type="text" value="" placeholder="Новый контакт">
                </div>
                <div class="segments">
                    <p>Сегмент:</p>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="1" <?php echo $segment[0] ?>>Партнер ЭРА на Карте</div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="2"<?php echo $segment[1] ?>>Визажист Стилист</div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="3"<?php echo $segment[2] ?>>Магазин офлайн</div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="4"<?php echo $segment[3] ?>>Группа ВК Продажа Косметики</div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="5"<?php echo $segment[4] ?>>Insta Продажа Косметики</div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="6"<?php echo $segment[5] ?>>Аренда рабочего места - 300 руб</div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="7"<?php echo $segment[6] ?>>Сеть магазинов <br></div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="8"<?php echo $segment[7] ?>>Интернет магазин</div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="9"<?php echo $segment[8] ?>>Склад-Дистрибьютор</div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="10"<?php echo $segment[9] ?>>Потребитель</div>
                    <div><input type="checkbox" class="segment_checkbox" name="segment[]" value="11"<?php echo $segment[10] ?>>Салон красоты</div>
                </div> 
            </div>
            <div class="block rigth">
                <div class="title">
                    <p>Название:</p>
                    <input type="text"  class="title__text" name="title" value="<?php echo $title?>">
                </div>
                <div class="description">
                    <p>Описание:</p>
                    <textarea class="auto_size description__text" name="description"  type="text"><?php echo $talk?></textarea>
                </div>
            </div>
            <div class="block function">
                <input class="save__btn" type="submit" id="save" value="Сохранить">
                <div class="sms">
                    <textarea class="auto_size sms__text" name="sms"  type="text" placeholder="Текст sms сообщения"></textarea>
                    <button class="sms__btn" id="sms_btn">SMS</button>
                </div>
                <div class="documents">
                    <button class="link_on_doc" onClick="window.open('../php_doc_page/document_1.php','Документ 1','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,Width=550,Height=400');">Документ 1</button>
                    <button class="link_on_doc" onClick="window.open('../php_doc_page/document_2.php','Документ 2','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,Width=550,Height=400');">Документ 2</button>
                    <button class="link_on_doc" onClick="window.open('../php_doc_page/document_3.php','Документ 3','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,Width=550,Height=400');">Документ 3</button>
                    <button class="link_on_doc" onClick="window.open('../php_doc_page/document_4.php','Документ 4','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,Width=550,Height=400');">Документ 4</button>
                    <button class="link_on_doc" onClick="window.open('../php_doc_page/document_5.php','Документ 5','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,Width=550,Height=400');">Документ 5</button>
                </div>
            </div>
        </form>
    </div>
    <script src="../js/auto_size.js"></script>
</body>
</html>