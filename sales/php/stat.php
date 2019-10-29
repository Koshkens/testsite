<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'stat';

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
$sql = mysqli_query($link, 'SELECT * FROM `tovars`');
while ($result = mysqli_fetch_array($sql)) {
    echo $result['id'].'<br>';
    echo $result['name'].'<br>';
    echo $result['company'].'<br>';
}
 
mysqli_close($link);
?>
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
</body>
</html>