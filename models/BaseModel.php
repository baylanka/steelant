<?php

namespace model;

use app\Database;

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
        $sql = "INSERT INTO {$tableName} ({$columns}) ({$valueClausePlaceHolders}) ;";
        $db = $container->resolve('DB');
        $lastInsertedId =  $db->insert($sql, $data);
        if(empty($lastInsertedId)){
            return null;
        }

        $data['id'] = $lastInsertedId;
        $data['exists'] = $lastInsertedId;
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



    private static function getObjectFromArray(array $data)
    {
        $class = static::class;
        $instance = new $class();
        foreach ($data as $attr => $value){
            $instance->$attr = $value;
        }
        return $class;
    }

    private static function getTableName()
    {
        $instance = static::class;
        if(isset($instance->table)){
            return $instance->table;
        }

        $subClass = get_class($instance);
        $subClassHierarchy = explode('\\', $subClass);
        return strtolower($subClassHierarchy[sizeof($subClassHierarchy)-1]) . "s";
    }
}