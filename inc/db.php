<?php

$dsn = 'mysql:dbname=todolist;host=localhost;charset=UTF8';
$username = 'todolist';
$password = 'todolist';

$pdo = new PDO(
    $dsn,
    $username,
    $password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ]
);