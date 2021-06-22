<?php


namespace app\models;
use app\core\Database;

class AbstractModel
{

    public static function PrepareValues()
    {
        $params = '';

        foreach (static::$tableSchema as $columnName => $type) {
            $params .= $columnName . ' = :' . $columnName . ', ';

        }
        $params = trim($params, ', ');
        return $params;
    }

    protected function BindValues(\PDOStatement &$stmt)
    {
        foreach (static::$tableSchema as $columnName => $type) {
            if ($type == 'float') {
                $sanitizedValue = filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":" . $columnName, $sanitizedValue);
            }else{
                $stmt->bindValue(":" . $columnName, $this->$columnName, $type);
            }
        }
    }

    public function register()
    {
        global $connect;
        $sql = 'INSERT INTO ' . static::$tableName . '(';

        foreach (static::$tableSchema as $columnName => $type) {
            $sql .= '' . $columnName . ', ';
        }

        $sql = trim($sql, ', ') . ')';

        $sql .= ' VALUES (';


        foreach (static::$tableSchema as $columnName => $type) {
            $sql .= '"' . $this->$columnName . '", ';
        }

        $sql = trim($sql, ', ') . ')';

        $stmt = $connect->prepare($sql);

        return $stmt->execute(array());
    }

    public function update()
    {
        global $connect;
        $sql = 'UPDATE ' . static::$tableName . ' SET ' . self::PrepareValues() . ' WHERE ' . static::$pk . ' = ' . $this->{static::$pk};

        $stmt = $connect->prepare($sql);

        self::BindValues($stmt);

        return $stmt->execute();
    }

    public static function delete($pk)
    {
        global $connect;
        $sql = "DELETE FROM " . static::$tableName . " WHERE " . static::$pk . " = " . $pk ;
        $stmt = $connect->prepare($sql);
        return $stmt->execute(array());
    }

    public function deleteAll()
    {
        global $connect;
        $sql = 'DELETE FROM ' . static::$tableName;
        $stmt = $connect->prepare($sql);
        return $stmt->execute(array());
    }

    public static function getAll($condition = "")
    {
        global $connect;
        $sql = 'SELECT * FROM ' . static::$tableName . ' '. $condition;
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC); //\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema)
        if(isset($results) && !empty($results)){
            return $results;
        }else{
            return false;
        }
    }

    public static function getByPk($pk)
    {
        global $connect;
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE ' . static::$pk . ' = ' . $pk;
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC); //\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema)
        if(isset($results) && !empty($results)){
            return $results;
        }else{
            return false;
        }

    }

    public static function deleteByPk($pk)
    {
        //global $handler;
        global $connect;
        $sql = 'DELETE FROM ' . static::$tableName . ' WHERE ' . static::$pk . ' = ' . $pk;
        $stmt = $connect->prepare($sql);
        return $stmt->execute();
    }

    public static function getByColumns(array $cols){

        global $connect;
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE ';

        foreach ($cols as $col => $val){
            $sql .= $col . ' = :' . $col . ' OR ';
        }

        $sql = trim($sql, 'OR ');

        $stmt = $connect->prepare($sql);

        foreach ($cols as $col=>$val){
            $stmt->bindValue(":$col", $val);
        }

        $stmt->execute();
        $result = $stmt->fetchAll();//\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema)
        return $stmt->rowCount() > 0 ? $result : false;
    }

    static public function getByAllColumns(array $cols){
        global $connect;
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE ';

        foreach ($cols as $col => $val){
            $sql .= $col . ' = :' . $col . ' and ';
        }

        $sql = trim($sql, "and ");
        $stmt = $connect->prepare($sql);

        foreach ($cols as $col => $val){
            $stmt->bindValue(":$col", $val);
        }

        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $stmt->rowCount() > 0 ? $result : false;
    }

    public static function getByQuery($sql)
    {
        global $connect;
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC); //\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema)
        if(isset($results) && !empty($results)){
            return $results;
        }else{
            return false;
        }
    }

    public static function executeQuery($sql)
    {
        global $connect;

        $stmt = $connect->prepare($sql);

        return $stmt->execute();
    }

    public static function UpdateColumns($pk, array $data)
    {
        global $connect;
        $sql = 'Update ' . static::$tableName . ' SET ';
        foreach ($data as $key => $value){
            $sql .= $key . ' = :' . $key . ', ';
        }

        $sql = trim($sql, ', ') . ' Where ' . static::$pk . ' = ' . $pk;
        $stmt = $connect->prepare($sql);

        foreach ($data as $key => $value){
            $stmt->bindValue(':' . $key, $value);
        }
        return $stmt->execute();
    }

    public static function getCountTable($condition = "")
    {
        global $connect;
        $sql = 'SELECT count(*) FROM ' . static::$tableName .' '.$condition;
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchColumn();
        if(isset($results) && !empty($results)){
            return $results;
        }else{
            return false;
        }
    }

    public static function login($email)
    {
        global $connect;
        $sql = "SELECT * FROM enseignant WHERE email = :email";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':email', $email);
        //print_r($stmt);
        //exit();
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC); //\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema)

        if(isset($results) && !empty($results)){
            return $results;
        }else{
            return false;
        }
    }
}