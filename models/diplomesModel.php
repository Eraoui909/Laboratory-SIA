<?php


namespace app\models;

use PDO;

class diplomesModel extends AbstractModel
{

    protected $id;

    protected $personne_id;
    protected $institut;
    protected $ville;
    protected $date_debut;
    protected $date_fin;
    protected $diplome;
    protected $titre;
    protected $certificat;

    public static $tableName    ='diplomes';
    public static $pk           ='id';
    public static $tableSchema  =array(

        'personne_id'       => PDO::PARAM_INT,
        'institut'          => PDO::PARAM_STR,
        'ville'            => PDO::PARAM_STR,
        'date_debut'        => PDO::PARAM_STR,
        'date_fin'          => PDO::PARAM_STR,
        'diplome'           => PDO::PARAM_STR,
        'titre'             => PDO::PARAM_STR,
        'certificat'        => PDO::PARAM_STR,

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
    public function getInstitut()
    {
        return $this->institut;
    }

    /**
     * @param mixed $institut
     */
    public function setInstitut($institut): void
    {
        $this->institut = $institut;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
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

    /**
     * @return mixed
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * @param mixed $diplome
     */
    public function setDiplome($diplome): void
    {
        $this->diplome = $diplome;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getCertificat()
    {
        return $this->certificat;
    }

    /**
     * @param mixed $certificat
     */
    public function setCertificat($certificat): void
    {
        $this->certificat = $certificat;
    }


}