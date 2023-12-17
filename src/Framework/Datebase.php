<?php

declare(strict_types=1);

namespace Framework;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private string $drive = "mysql";
    private string $username = "root";
    private string $password = "Anwar@123";
    private string $host = "localhost";
    private int $port = 3306;
    private string $dbname = "OPEP";
    private PDO $connection;
    private PDOStatement $stmt;

    public function __construct()
    {
        $dsn = "{$this->drive}:host={$this->host};port={$this->port};dbname={$this->dbname}";

        try {
            $this->connection = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Enable error reporting
            ]);
        } catch (PDOException $e) {
            throw new \Exception("Unable to connect to database: " . $e->getMessage());
        }
    }

    public function query(string $query, array $params = []): self
    {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }

    public function count()
    {
        return $this->stmt->fetchColumn();
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function id()
    {
        return $this->connection->lastInsertId();
    }

    public function findAll()
    {
        return $this->stmt->fetchAll();
    }
}
