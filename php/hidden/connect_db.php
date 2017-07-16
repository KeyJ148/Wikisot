<?php
function connect_db(){
    // Хост
    $db_host = "localhost";
    // Имя базы данных
    $db_name = "wikisot";
    // Логин для подключения к базе данных
    $db_user = "root";
    // Пароль для подключения к базе данных
    $db_pass = "123456";

    $db = mysqli_connect("p:" . $db_host, $db_user, $db_pass, $db_name);
    if (!$db) {
        echo "<br>Ошибка: Невозможно установить соединение с MySQL.<br>";
        exit;
    }

    return $db;
}