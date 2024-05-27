<?php

namespace model;

use app\Database;
use helpers\utilities\DateTimeUtility;

class BaseModel
{
    protected string $table;
    public array $relations;
    public static array $extra;
    /*
     * method for store data into a table
     * table attribute name = $data key
     * value of the attributes = $data value
     */
    public static function insert(array $data)
    {
        global $container;

        $data['created_at'] = DateTimeUtility::getCurrentDateTime();
        $data['updated_at'] = DateTimeUtility::getCurrentDateTime();

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

    public static function getAllAvoidById(int $id, array $columns = [])
    {
        $tableName = self::getTableName();
        $columns = empty($columns) ? "*" : " ( " .  implode(",", $columns) . " ) ";
        $sql = "SELECT {$columns} FROM {$tableName} WHERE id <> :id ; ";
        $queryValues = ['id'=>$id];
        return self::query($sql, $queryValues)->get();
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
        $sql .= " WHERE " . self::getNamedPlaceholderStatement($conditions, " and ") . " ;";
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
        $sql .= " WHERE " . self::getNamedPlaceholderStatement($conditions, " and ") . " ; ";
        $param = array_merge($conditions, $values);
        return self::execute($sql, $param);
    }

    public static function existsBy(array $conditions)
    {
        $tableName = self::getTableName();
        $sql = "SELECT COUNT(*) AS result_count FROM {$tableName} WHERE ";
        $sql .= self::getNamedPlaceholderStatement($conditions, " and ");
        $sql .= " ;";
        $categoryCount = self::queryAsArray($sql, $conditions)->first();
        return (int)$categoryCount['result_count'] > 0;
    }

    public function save()
    {
        $currentProperties = array_keys(json_decode(json_encode($this), true));
        $obj = get_class($this);
        $reflection = new \ReflectionClass($obj);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);
        $insertValues = [];
        foreach ($properties as $property){
            $name = $property->name;
            if(in_array($property->name, ["table", "relations", "extra"])
                || str_contains($property->name, 'temp_')
                || !in_array($name, $currentProperties)
            ){
                continue;
            }

            $insertValues[$name] = $this->$name ?? null;
        }

        //if id set on the object update
        if(isset($this->id)){
            $this::updateById($this->id, $insertValues);
            return $this;
        }

        $newObj = $this::insert($insertValues);
        $this->id = $newObj->id;
        return $this;
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id;";
        $params = ['id'=>$this->id];
        return self::execute($sql, $params);
    }

    private function getChildAttributes() {
        $childAttributes = [];
        $reflection = new \ReflectionClass($this);

        foreach ($reflection->getProperties(\ReflectionProperty::IS_PROTECTED) as $property) {
            if ($property->class !== get_class($this)
                || in_array($property->name,  ['table'])
            ) {
                // Exclude properties defined in the parent class
               continue;
            }

            $childAttributes[] = $property->name;
        }

        return $childAttributes;
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