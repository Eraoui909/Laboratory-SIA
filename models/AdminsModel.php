<?php


namespace app\models;




use PDO;

class AdminsModel extends AbstractModel
{

    //public $id;
    public $username;
    public $password;
    public $email;


    public static $tableName    ='admins';
    public static $pk           ='id';
    public static $tableSchema  =array(

        'username'  => PDO::PARAM_STR,
        'email'     => PDO::PARAM_STR,
        'password'  => PDO::PARAM_STR,
    );


    public function setUsername($username): void
    {
        $this->username = $username;
    }


    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getId()
    {
        //return $this->id;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email): void
    {
        $this->email = $email;
    }

}