<?php
namespace app;

use \PDO;
use \PDOStatement;
class Database
{
    public PDO $connection;
    public PDOStatement $statement;

    private static ?Database $obj = null;
    private function __construct($db, $host, $port, $username, $password, $dbname)
    {
        $config = [
            'host' => $host,
            'port' => $port,
            'dbname' => $dbname
        ];
        $dsn = "{$db}:" . http_build_query($config,'',';');
        $this->connection = new PDO($dsn, $username, $password);
    }

    public static function getInstance($db, $host, $port, $username, $password, $dbname)
    {
        if(!is_null(self::$obj)){
            return self::$obj;
        }

        static::$obj = new self($db, $host, $port, $username, $password, $dbname);
        return static::$obj;
    }

    public static function getConnection($db, $host, $port, $username, $password, $dbname)
    {
        return new self($db, $host, $port, $username, $password, $dbname);
    }

    public function query($sql, $values = [], $associated_object_name=null)
    {
        $this->execute($sql, $values);
        if (!is_null($associated_object_name)) {
            $this->statement->setFetchMode(PDO::FETCH_CLASS, $associated_object_name);
        }else {
            $this->statement->setFetchMode(PDO::FETCH_CLASS, 'stdClass');
        }
        return $this;
    }

    public function queryAsArray($sql, $values = [])
    {
        $this->execute($sql, $values);
        $this->statement->setFetchMode(PDO::FETCH_ASSOC);
        return $this;
    }

    public function insert($sql, $values = [])
    {
        $this->execute($sql, $values);
        return $this->connection->lastInsertId();
    }

    public function execute($sql, $values=[]): bool
    {
        $this->statement = $this->connection->prepare($sql);
        return $this->statement->execute($values);
    }

    public function first()
    {
        return $this->statement->fetch();
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function count()
    {
        return sizeof($this->get());
    }

    public function beginTransaction()
    {
        $this->connection->beginTransaction();
    }

    public function commit()
    {
        $this->connection->commit();
    }

    public function rollBack()
    {
        $this->connection->rollBack();
    }
}