<?php
    
    include("./get_catalog.php");

    $working = 0;
    $conversation = 0;

    foreach($res as $entry) {
        $status = $entry["values"][3][0];
        if ($status == "2"){
            $conversation++;
        }elseif ($status == "1") {
            $working++;
        }
    }
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'statistic';

    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
    $sql = mysqli_query($link, 'INSERT INTO `statistic`(`date`, `working`, `conversation`) VALUES ("'.date("Y-m-d").'",'.$working.','.$conversation.')');
    
    // $sql = mysqli_query($link, 'ALTER IGNORE TABLE statistic ADD UNIQUE INDEX idx_name (date);');
    mysqli_close($link);
?>
