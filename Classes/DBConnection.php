<?php

declare(strict_types=1);

namespace Classes;

class DBConnection
{
    public $pdo;

    private static $dbConnection;

    private $host;
    private $port;
    private $dbName;
    private $user;
    private $password;
    private $dbDriver;

    private function __construct()
    {
        $this->setDatabaseSettings();

        $this->pdo = new \PDO(
            "$this->dbDriver:host=$this->host:$this->port;dbname=$this->dbName;charset=UTF8",
            $this->user,
            $this->password,
        );
    }

    public static function getConnection(): DBConnection
    {
        if (empty(self::$dbConnection)) {
            self::$dbConnection = new DBConnection();
        }

        return self::$dbConnection;
    }

    private function setDatabaseSettings()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->port = $_ENV['DB_PORT'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->dbName = $_ENV['DB_NAME'];
        $this->dbDriver = $_ENV['DB_DRIVER'];
    }
}
