<?php

namespace configs;
use PDO, PDOException;

class ConnectionDB
{

    private string $host = "localhost";
    private string $dbName = "gsss";
    private string $dbUser = "root";
    private string $dbPassword = "";
    private string $dsn;

    public function __construct(
        string|null $host = null,
        string|null $dbName = null,
        string|null $dbUser = null,
        string|null $dbPassword = null
    ) {
        if (!$host == null) {
            $this->host = $host;
        }
        if (!$dbName == null) {
            $this->dbName = $dbName;
        }
        if (!$dbUser == null) {
            $this->dbUser = $dbUser;
        }
        if (!$dbPassword == null) {
            $this->dbPassword = $dbPassword;
        }

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
