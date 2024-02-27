<?php

namespace model;

use app\Database;
use helpers\utilities\DateTimeUtility;

class BaseModel
{
    protected string $table;
    /*
     * method for store data into a table
     * table attribute name = $data key
     * value of the attributes = $data value
     */
    public static function insert(array $data)
    {
        global $container;
        $tableName = static::getTableName();

        $columns = implode(", ", array_keys($data));
        $valueClausePlaceHolders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$valueClausePlaceHolders}) ;";
        $db = $container->resolve('DB');
        $lastInsertedId =  $db->insert($sql, $data);
        if(empty($lastInsertedId)){
            return null;
        }

        $data['id'] = $lastInsertedId;
        return static::getObjectFromArray($data);
    }

    /*
     * method is used for UPDATE, DELETE, CREATE, ALTER queries.
     */
    public static function execute(string $sql, array $value=[]): bool
    {
        global $container;
        $db = $container->resolve('DB');
        return $db->execute($sql, $value);
    }

    /*
     * This method use to fetch data from database
     * returns `Database` obj
     *
     * Note: from returned value has to call first() or get() method to get data
     *        can get respectively Obj or Array of Obj
     */
    public static function query(string $sql, array $values=[]): Database
    {
        global $container;
        $class = static::class;
        $db = $container->resolve('DB');
        return $db->query($sql, $values, $class);
    }

    /*
    * This method use to fetch data from database
    * returns `Database` obj
    *
    * Note: from returned value has to call first() or get() method to get data
     *      can get array of content
    */
    public static function queryAsArray(string $sql, array $values=[])
    {
        global $container;
        $class = static::class;
        $db = $container->resolve('DB');
        return $db->queryAsArray($sql, $values, $class);
    }

    public static function getById(int $id, array $columns = [])
    {
        $tableName = self::getTableName();
        $columns = empty($columns) ? "*" : " ( " .  implode(",", $columns) . " ) ";
        $sql = "SELECT {$columns} FROM {$tableName} WHERE id = :id ; ";
        $queryValues = ['id'=>$id];
        return self::query($sql, $queryValues)->first();
    }

    public static function getAll(array $columns = [])
    {
        $tableName = self::getTableName();
        $columns = empty($columns) ? "*" : " ( " .  implode(",", $columns) . " ) ";
        $sql = "SELECT {$columns} FROM {$tableName} ; ";
        return self::query($sql)->get();
    }

    public static function getAllBy(array $conditions,array $columns = [])
    {
        $sql = self::getBySql($conditions, $columns);
        return self::query($sql, $conditions)->get();
    }

    public static function getFirstBy(array $conditions,array $columns = [])
    {
        $sql = self::getBySql($conditions, $columns);
        return self::query($sql, $conditions)->first();
    }

    public static function deleteById(int $id)
    {
        $tableName = self::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id; ";
        $queryValues = ['id'=>$id];
        return self::execute($sql, $queryValues);
    }

    public static function deleteBy(array $conditions)
    {
        $tableName = self::getTableName();
        $sql = "DELETE FROM {$tableName} ";
        $sql .= " WHERE " . self::getNamedPlaceholderStatement($conditions, "and") . " ;";
        return self::execute($sql, $conditions);
    }

    public static function updateById(int $id, array $values)
    {
        $tableName = self::getTableName();
        $values['updated_at'] = DateTimeUtility::getCurrentDateTime();
        $sql = "UPDATE {$tableName} ";
        $sql .= " SET " . self::getNamedPlaceholderStatement($values, ' , ');
        $sql .= " WHERE id=:id ;";
        $queryValues = ['id'=>$id];
        $queryValues = array_merge($queryValues, $values);
        return self::execute($sql, $queryValues);
    }


    public static function updateBy(array $conditions, array $values)
    {
        $tableName = self::getTableName();
        $values['updated_at'] = DateTimeUtility::getCurrentDateTime();
        $sql = "UPDATE {$tableName} ";
        $sql .= " SET " .self::getNamedPlaceholderStatement($values, ",");
        $sql .= " WHERE " . self::getNamedPlaceholderStatement($conditions, "and") . " ; ";
        $param = array_merge($conditions, $values);
        return self::execute($sql, $param);
    }


    private static function getNamedPlaceholderStatement(array $values, string $seperator)
    {
        $arrayKeys = array_keys($values);
        $conditionArray = [];
        foreach ($arrayKeys as $key){
            $conditionArray[] = " {$key} = :{$key}";
        }
        return implode(" {$seperator} ", $conditionArray);
    }

    private static function getBySql(array $conditions,array $columns = [])
    {
        $tableName = self::getTableName();
        $columns = empty($columns) ? "*" : " ( " .  implode(",", $columns) . " ) ";
        $sql = "SELECT {$columns} FROM {$tableName} ";
        $sql .= " WHERE " . self::getNamedPlaceholderStatement($conditions, " and ");
        return $sql;
    }

    private static function getObjectFromArray(array $data)
    {
        $class = static::class;
        $instance = new $class();
        foreach ($data as $attr => $value){
            $instance->$attr = $value;
        }
        return $instance;
    }

    private static function getTableName()
    {
        $class = static::class;
        $obj = new $class();
        if(isset($obj->table)){
            return $obj->table;
        }

        $subClassHierarchy = explode('\\', $class);
        return strtolower($subClassHierarchy[sizeof($subClassHierarchy)-1]) . "s";
    }
}