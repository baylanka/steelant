<?php

namespace model;
class Database
{
    private \PDO $connection;
    private \PDOStatement $statement;

    public function __construct($database, $host, $port, $username, $password, $dbname)
    {
        $config = [
            'host' => $host,
            'port' => $port,
            'dbname' => $dbname
        ];
        $dsn = "$database:" . http_build_query($config, '', ';');
        $this->connection = new \PDO($dsn, $username, $password);
    }

    public function query($sql, $values = [], $associated_object_name = null)
    {
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($values);
        if (!is_null($associated_object_name)) {
            $this->statement->setFetchMode(\PDO::FETCH_CLASS, $associated_object_name);
        } else {
            $this->statement->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
        }
        return $this;
    }

    public function insert($sql, $values = [], $associated_object_name = null)
    {
        $this->query($sql, $values);
        return $this->connection->lastInsertId();
    }

    public function first()
    {
        return $this->statement->fetch();
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }
}