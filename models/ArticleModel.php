<?php


namespace app\models;


class ArticleModel extends AbstractModel
{
    protected $id;
    protected $title;
    protected $abstract;
    protected $journal;
    protected $author;
    protected $date;
    protected $doi;
    protected $researchers;


    public static $tableName    ='article';
    public static $pk           ='articleID';
    public static $tableSchema  =array(

        'title'         => \PDO::PARAM_STR,
        'abstract'      => \PDO::PARAM_STR,
        'author'        => \PDO::PARAM_INT,
        'journal'       => \PDO::PARAM_STR,
        'researchers'   => \PDO::PARAM_STR,
        'doi'           => \PDO::PARAM_STR,
    );

    public static function getByPk($pk)
    {
        global $connect;
        $sql = "SELECT title, description, journal, date, nom, prenom FROM article, enseignant WHERE author = id && articleID = :pk";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':pk', $pk);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC); //\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema)
        if(isset($results) && !empty($results)){
            return $results;
        }else{
            return false;
        }

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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
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
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * @param mixed $journal
     */
    public function setJournal($journal): void
    {
        $this->journal = $journal;
    }

    /**
     * @return mixed
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * @param mixed $abstract
     */
    public function setAbstract($abstract): void
    {
        $this->abstract = $abstract;
    }

    /**
     * @return mixed
     */
    public function getDoi()
    {
        return $this->doi;
    }

    /**
     * @param mixed $doi
     */
    public function setDoi($doi): void
    {
        $this->doi = $doi;
    }

    /**
     * @return mixed
     */
    public function getResearchers()
    {
        return $this->researchers;
    }

    /**
     * @param mixed $researchers
     */
    public function setResearchers($researchers): void
    {
        $this->researchers = $researchers;
    }
}