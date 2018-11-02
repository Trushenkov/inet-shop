<?php
$db_name = "all_notebooks";
$link = mysqli_connect("localhost", "root", "", $db_name);
/* Проверка подключения к базе данных */
if (mysqli_connect_errno()) {
    printf("Ошибка подключения к БД: %s\n", mysqli_connect_error());
    exit();
}
// Устанавливает базу данных для выполняемых запросов.
mysqli_select_db($link, $db_name) || exit("Нет подключения к БД" . mysqli_error($link));
//Выполняет запрос к базе данных
mysqli_query($link, "Set names UTF-8");
?>