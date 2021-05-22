<?php


namespace app\models;


class TeamModel extends AbstractModel
{
    protected $equipeID;
    protected $thematic;

    public static $tableName    ='equipe';
    public static $pk           ='equipeID';
    public static $tableSchema  =array(
        'thematic'    => \PDO::PARAM_STR
    );

    public static function getTeachers($id)
    {
        global $connect;
        $sql = 'SELECT nom, prenom, id ,avatar FROM equipe_enseignant, enseignant WHERE id = enseignant AND equipe = :id';
        $stmt = $connect->prepare($sql);
        $stmt->bindvalue(':id', $id);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if(isset($results) && !empty($results)){
            return $results;
        }else{
            return [];
        }
    }

    public static function addTeacher($ens, $team)
    {
        global $connect;

        $sql = 'INSERT INTO equipe_enseignant values(:equipe, :enseignant)';
        $stmt = $connect->prepare($sql);
        $stmt->bindvalue(':equipe', $team);
        $stmt->bindvalue(':enseignant', $ens);

        return $stmt->execute();
    }

    public static function deleteTeacher($ens, $team)
    {
        global $connect;

        $sql = 'DELETE FROM equipe_enseignant WHERE equipe = :equipe AND enseignant = :enseignant';
        $stmt = $connect->prepare($sql);
        $stmt->bindvalue(':equipe', $team);
        $stmt->bindvalue(':enseignant', $ens);

        return $stmt->execute();
    }

    public static function getALLEquipeAndTechers(){
        global $connect;
        $sql = 'SELECT * FROM equipe';
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $teams = array();
        foreach ($results as $result)
        {
            $result['enseignant'] = self::getTeachers($result['equipeID']);
            $teams[] = $result;
        }
        if(isset($teams) && !empty($teams)){
            return $teams;
        }else{
            return [];
        }
    }


    /**
     * @return mixed
     */
    public function getEquipeID()
    {
        return $this->equipeID;
    }

    /**
     * @param mixed $equipeID
     */
    public function setEquipeID($equipeID): void
    {
        $this->equipeID = $equipeID;
    }

    /**
     * @return mixed
     */
    public function getThematic()
    {
        return $this->thematic;
    }

    /**
     * @param mixed $thematique
     */
    public function setThematic($thematic): void
    {
        $this->thematic = $thematic;
    }
}