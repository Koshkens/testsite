<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'stat';

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
 
$query ="CREATE Table tovars
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    company VARCHAR(200) NOT NULL
)";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    echo "Создание таблицы прошло успешно";
}
 
mysqli_close($link);
?>