<?php

class ConnectionDB
{

    private string $host = "localhost";
    private string $dbName = "gsss_db";
    private string $dbUser = "root";
    private string $dbPassword = "1234";
    private string $dsn;

    public function __construct()
    {
        $this->dsn = "mysql:host={$this->host};port=3306;dbname={$this->dbName}";
    }

    public function connect()
    {
        try {
            $pdo = new PDO($this->dsn, $this->dbUser, $this->dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
