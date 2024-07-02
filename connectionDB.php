<?php

$host = "localhost";
$dbName = "gsss_db";
$dbUser = "root";
$dbPassword = "";

$dsn = "mysql:host={$host};port=3306;dbname={$dbName}";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conneciton with success";
} catch (PDOException $e) {
    echo "Erron in connection {$e->getMessage()}";
}
