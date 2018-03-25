<?php


namespace App\Data;

use App\Data\PDODatabaseStatement;
use App\Data\DatabaseStatementInterface;
use App\Data\DatabaseInterface;

use PDO;

class PDODatabase implements DatabaseInterface
{
    /**
     * @var \PDO;
     */
    private $pdo;

    public function __construct(string $host,
                                string $dbName,
                                string $user,
                                string $pass)
    {
        $dsn = "mysql:host=" . $host . ";dbname=" . $dbName . ';charset=utf8';
        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function prepare($sql):DatabaseStatementInterface
    {
        return new PDODatabaseStatement($this->pdo->prepare($sql));
    }

    public function lastId()
    {
        return $this->pdo->lastInsertId();
    }

    public function errorInfo()
    {
        return $this->pdo->errorInfo();
    }
}