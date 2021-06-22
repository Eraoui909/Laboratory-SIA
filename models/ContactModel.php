<?php


namespace app\models;


use PDO;

class ContactModel extends AbstractModel
{

    protected $contactID;
    protected $prenom;
    protected $nom;
    protected $email;
    protected $subject;
    protected $message;


    public static $tableName = 'contact';
    public static $pk = 'contactID';
    public static $tableSchema = array(
        'contactID'     => PDO::PARAM_INT,
        'prenom'        => PDO::PARAM_STR,
        'nom'           => PDO::PARAM_STR,
        'email'         => PDO::PARAM_STR,
        'subject'       => PDO::PARAM_STR,
        'message'       => PDO::PARAM_STR,
    );

    /**
     * @return mixed
     */
    public function getContactID()
    {
        return $this->contactID;
    }

    /**
     * @param mixed $contactID
     */
    public function setContactID($contactID): void
    {
        $this->contactID = $contactID;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
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

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public static function getTableName(): string
    {
        return self::$tableName;
    }

    /**
     * @param string $tableName
     */
    public static function setTableName(string $tableName): void
    {
        self::$tableName = $tableName;
    }

    /**
     * @return string
     */
    public static function getPk(): string
    {
        return self::$pk;
    }

    /**
     * @param string $pk
     */
    public static function setPk(string $pk): void
    {
        self::$pk = $pk;
    }

    /**
     * @return array
     */
    public static function getTableSchema(): array
    {
        return self::$tableSchema;
    }

    /**
     * @param array $tableSchema
     */
    public static function setTableSchema(array $tableSchema): void
    {
        self::$tableSchema = $tableSchema;
    }

}