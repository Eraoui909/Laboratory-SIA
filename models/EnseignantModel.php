<?php


namespace app\models;


use PDO;

class EnseignantModel extends AbstractModel
{
    protected $id;


    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $tel;
    protected $avatar;
    protected $thematique;
    protected $date_naissance;
    protected $etat_civil;
    protected $addresse;
    protected $situation_present;
    protected $nbr_annee_experience;
    protected $qualification_principale;
    protected $specialite;




    public static $tableName    ='enseignant';
    public static $pk           ='id';
    public static $tableSchema  =array(

        'nom'                           => PDO::PARAM_STR,
        'prenom'                        => PDO::PARAM_STR,
        'email'                         => PDO::PARAM_STR,
        'password'                      => PDO::PARAM_STR,
        'thematique'                    => PDO::PARAM_STR,
        'tel'                           => PDO::PARAM_STR,
        'avatar'                        => PDO::PARAM_STR,
        'date_naissance'                => PDO::PARAM_STR,
        'etat_civil'                    => PDO::PARAM_STR,
        'addresse'                      => PDO::PARAM_STR,
        'situation_present'             => PDO::PARAM_STR,
        'nbr_annee_experience'          => PDO::PARAM_INT,
        'qualification_principale'      => PDO::PARAM_STR,
        'specialite'                    => PDO::PARAM_STR,
    );

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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }


    public function getThematique()
    {
        return $this->thematique;
    }

    /**
     * @param mixed $thematique
     */
    public function setThematique($thematique): void
    {
        $this->thematique = $thematique;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance): void
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @return mixed
     */
    public function getEtatCivil()
    {
        return $this->etat_civil;
    }

    /**
     * @param mixed $etat_civil
     */
    public function setEtatCivil($etat_civil): void
    {
        $this->etat_civil = $etat_civil;
    }

    /**
     * @return mixed
     */
    public function getAddresse()
    {
        return $this->addresse;
    }

    /**
     * @param mixed $addresse
     */
    public function setAddresse($addresse): void
    {
        $this->addresse = $addresse;
    }

    /**
     * @return mixed
     */
    public function getSituationPresent()
    {
        return $this->situation_present;
    }

    /**
     * @param mixed $situation_present
     */
    public function setSituationPresent($situation_present): void
    {
        $this->situation_present = $situation_present;
    }

    /**
     * @return mixed
     */
    public function getNbrAnneeExperience()
    {
        return $this->nbr_annee_experience;
    }

    /**
     * @param mixed $nbr_annee_experience
     */
    public function setNbrAnneeExperience($nbr_annee_experience): void
    {
        $this->nbr_annee_experience = $nbr_annee_experience;
    }

    /**
     * @return mixed
     */
    public function getQualificationPrincipale()
    {
        return $this->qualification_principale;
    }

    /**
     * @param mixed $qualification_principale
     */
    public function setQualificationPrincipale($qualification_principale): void
    {
        $this->qualification_principale = $qualification_principale;
    }

    /**
     * @return mixed
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param mixed $specialite
     */
    public function setSpecialite($specialite): void
    {
        $this->specialite = $specialite;
    }



}