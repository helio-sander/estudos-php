<?php

$host = 'localhost';
$banco = 'pousada';
$usuario = 'root';
$senha = '';


$dsn = "mysql:host={$host};dbname={$banco};charset=utf8mb4";

$pdo = new PDO($dsn,$usuario,$senha,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

