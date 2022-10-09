<?php
global $pdo;
$host = 'localhost'; // хост
$database = 'taskm';  // название БД
$charset = 'utf8'; // кодировка
$user = 'root'; // пользователь
$password = ''; // пароль

$pdo = new PDO("mysql:host=$host;dbname=$database; char-set=$charset ", $user, $password); //установка соединения