<?php


namespace app\models;


class EventModel extends AbstractModel
{
    protected $eventID;
    protected $title;
    protected $description;
    protected $date;
    protected $lieu;
    protected $picture;



    public static $tableName    ='event';
    public static $pk           ='eventID';
    public static $tableSchema  =array(

        'title'                     => \PDO::PARAM_STR,
        'description'               => \PDO::PARAM_STR,
        'lieu'                      => \PDO::PARAM_STR,
        'picture'                   => \PDO::PARAM_STR,
    );

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu): void
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getEventID()
    {
        return $this->eventID;
    }

    /**
     * @param mixed $eventID
     */
    public function setEventID($eventID): void
    {
        $this->eventID = $eventID;
    }
}