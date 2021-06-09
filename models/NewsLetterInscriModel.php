<?php


namespace app\models;

use PDO;

class NewsLetterInscriModel extends AbstractModel
{
    protected $id;
    protected $email;

    public static $tableName    ='newsletter_inscription';
    public static $pk           ='id';
    public static $tableSchema  =array(
        'email'         => \PDO::PARAM_STR
    );

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }


}