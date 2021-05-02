<?php


namespace app\models;


class ArticleModel extends AbstractModel
{
    protected $id;
    protected $title;
    protected $description;
    protected $content;
    protected $teacher;
    protected $picture;
    protected $date;

    public static $tableName    ='article';
    public static $pk           ='articleID';
    public static $tableSchema  =array(

        'title'       => \PDO::PARAM_STR,
        'description' => \PDO::PARAM_STR,
        'content'     => \PDO::PARAM_STR,
        'teacher'     => \PDO::PARAM_INT,
        'picture'     => \PDO::PARAM_STR,
    );

    public static function getByPk($pk)
    {
        global $connect;
        $sql = 'SELECT title, description, content, picture, date, nom, prenom FROM article, enseignant WHERE teacher = id && articleID = :pk';
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * @param mixed $teacher
     */
    public function setTeacher($teacher): void
    {
        $this->teacher = $teacher;
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


}