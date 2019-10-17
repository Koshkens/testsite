<?php
    include_once "php/get_entrys.php";
    include_once "php/get_catalogs.php";
    $entrys =  array_reverse($entrys);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=10">
    <title>Менеджмент</title>    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content-wrapper">
        <header class="header">
            <div class="search_box">
                <div class="all_entrys">
                    <div class="all_entrys_text">Всего записей: XXX</div>
                </div>
                <div class="search">
                    <input type="text" class="search_input" placeholder="Поиск">
                </div>
            </div>
            <div class="date_box">
                <div class="date_conect">
                    <div class="date_conect_text">Дата контакта сегодня: XXX  Просрочено: XXX</div>
                </div>
                <div class="date_now">
                    <div class="date_now_text">Дата сегодня: XX месяца</div>
                </div>
            </div>
            <div class="function_box">
                <input type="button" class="add_entry" value="Добавить запись">
                
            </div>
        </header>
        <div class="container clearfix">
            <main class="content">
                <div class="grups_box">
                    <div class="grups">
                        <?php
                        foreach(array_reverse($catalogs) as $catalog){
                            echo('
                                <div class="catalog_name">'.$catalog["name"].'</div>
                            ');
                        }
                        
                        ?>
                    </div>
                    <div class="events">
                        события
                    </div>
                </div>
                <div class="entrys_box">
                    <div class="entrys">
                        <?php
                        foreach($entrys as $entry_full){
                            $entry=$entry_full["values"];
                            $id = '<div class="entry_elem entry_id">'.$entry_full["id"].'</div>';
                            $fio = '<div class="entry_elem entry_fio">'.$entry[3].'</div>';
                            $talk = '<div class="entry_elem entry_talk">'.$entry[20].'</div>';

                            $status_elements = '';
                            foreach($entry[21] as $status_item){
                                foreach($catalogs[0]["fields"][8]["config"]["items"] as $filter_status_item){   
                                    if($filter_status_item["id"] == $status_item){
                                        $status_elements = $status_elements.'<div class=status_elem>'.$filter_status_item["name"].'</div>';
                                        break;
                                    }
                                }
                            }
                            $status = '<div class="entry_elem entry_status">'.$status_elements.'</div>';

                            $services_elements = '';
                            foreach($entry[34] as $status_item){
                                foreach($catalogs[0]["fields"][9]["config"]["items"] as $filter_status_item){  
                                    if($filter_status_item["id"] == $status_item){
                                        $services_elements = $services_elements.'<div class=services_elem>'.$filter_status_item["name"].'</div>';
                                        break;
                                    }
                                }
                            }

                            $contact = 
                            $services = '<div class="entry_elem entry_services">'.$services_elements.'</div>';
                            echo('
                                <div class="entry">'.$id.$fio.$talk.$status.$services.'</div>
                            ');
                        }
                        
                        ?>
                    </div>
                </div>
            </main>
            <aside class="sidebar sidebar1">
                <div class="filter">
                    <div class="filter_status">
                        <div class="filter_status_name"><?php echo $catalogs[0]["fields"][9]["name"]?></div>
                        <?php
                        foreach ($catalogs[0]["fields"][9]["config"]["items"] as $filter_status_item) {
                            echo ('
                                <input type="button" class="filter_status_item" value="'.$filter_status_item["name"].'">
                                ');
                        }
                        ?>
                    </div>
                    <div class="filter_status">
                        <div class="filter_status_name"><?php echo $catalogs[0]["fields"][8]["name"]?></div>
                        <?php
                        foreach ($catalogs[0]["fields"][8]["config"]["items"] as $filter_status_item) {
                            echo ('
                                <input type="button" class="filter_status_item" value="'.$filter_status_item["name"].'">
                                ');
                        }
                        ?>
                    </div>
                </div>
            </aside>
        </div>
    </div>  
</body>
</html>