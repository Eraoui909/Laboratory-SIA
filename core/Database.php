<?php


namespace app\core;

use PDO;
use PDOException;

class Database
{
    public $db;

    public function __construct()
    {
        global $connect;
        $dsn = "mysql:host=localhost;dbname=labo_sia";
        $user = "root";
        $pass = "";
        $option = array(
            PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'UTF8'",
        );

        try {
            $connect = new PDO($dsn , $user , $pass ,$option);
            $connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            //echo "connected";
        }catch(PDOException $e){
            echo 'FAILEED TO connect '.$e->getMessage();
        }
    }
}