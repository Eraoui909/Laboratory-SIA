<?php


namespace app\models;

use PDO;

class ExperienceProModel extends AbstractModel
{

    protected $id;

    protected $personne_id;
    protected $date_debut;
    protected $date_fin;
    protected $entreprise;
    protected $fonction;
    protected $description;

    public static $tableName    ='experience_pro';
    public static $pk           ='id';
    public static $tableSchema  =array(

        'personne_id'       => PDO::PARAM_STR,
        'date_debut'        => PDO::PARAM_STR,
        'date_fin'          => PDO::PARAM_STR,
        'entreprise'        => PDO::PARAM_STR,
        'fonction'          => PDO::PARAM_STR,
        'description'       => PDO::PARAM_STR,

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
    public function getPersonneId()
    {
        return $this->personne_id;
    }

    /**
     * @param mixed $personne_id
     */
    public function setPersonneId($personne_id): void
    {
        $this->personne_id = $personne_id;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @param mixed $entreprise
     */
    public function setEntreprise($entreprise): void
    {
        $this->entreprise = $entreprise;
    }

    /**
     * @return mixed
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * @param mixed $fonction
     */
    public function setFonction($fonction): void
    {
        $this->fonction = $fonction;
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
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @param mixed $date_debut
     */
    public function setDateDebut($date_debut): void
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param mixed $date_fin
     */
    public function setDateFin($date_fin): void
    {
        $this->date_fin = $date_fin;
    }


}