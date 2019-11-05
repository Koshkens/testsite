<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статистика</title>
</head>
<body>
    <h1>Вывод базы</h1>
<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'statistic';

    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
    $sql = mysqli_query($link, 'SELECT  f.date,
                                        f2.date, 
                                        f.working,
                                        f2.working,
                                        f.conversation,
                                        f2.conversation,
                                        (f2.working - f.working) AS difference,
                                        (f2.conversation - f.conversation) AS differ
                                FROM statistic f,
                                     statistic f2 
                                where f2.date = f.date+1;');
    
    mysqli_close($link);  
?>

<table width='1000' border='1'>
    <tr>
        <th>Дата</th>
        <th>Работаем</th>
        <th>Изменения</th>
        <th>Переговоры</th>
        <th>Изменения</th>
    </tr>
    <? $month = ""; 
       $first = true; 
    while ($result = mysqli_fetch_array($sql)): 
    
    if ($result['difference']>0) $result['difference'] = "+".$result['difference'];
    if ($result['differ']>0) $result['differ'] = "+".$result['differ'];?>
  
    <tr>
        <td><?=$result['date']?></td>
        <td><?=$result['working']?></td>
        <td><?=$result['difference']?></td>
        <td><?=$result['conversation']?></td>
        <td><?=$result['differ']?></td>
    </tr>
    <? endwhile; ?>

</table>
</body>
</html>