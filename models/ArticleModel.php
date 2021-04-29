<?php


namespace app\models;


class ArticleModel extends AbstractModel
{
    private $id;
    private $title;
    private $description;
    private $content;
    private $teacher;
    private $date;

    private static $tableName    ='article';
    private static $pk           ='articleID';
    private static $tableSchema  =array(

        'title'       => \PDO::PARAM_STR,
        'description' => \PDO::PARAM_STR,
        'content'     => \PDO::PARAM_STR,
        'teacher'     => \PDO::PARAM_INT,
        'date'        => \PDO::PARAM_STR
    );

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


}