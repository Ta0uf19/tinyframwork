<?php

class Jeux extends Model
{

    private $table = "jeux";

    public function __construct()
    {
        parent::__construct();
    }


    public function recuperer($id)
    {

        $query = "SELECT * FROM jeux WHERE id = ?";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer avec filtre la liste des jeux
     */
    public function filter($params)
    {

        //var_dump($params);
        $conditions = [];
        $parameters = [];

        // build query
        $query = "SELECT jeux.id, jeux.nom, jeux.desc, jeux.age_from, jeux.age_to, jeux.player_from, jeux.player_to, jeux.images, categories.nom AS cat_nom FROM jeux JOIN categories ON JEUX.id=categories.id";
        if(!empty($params['category'])) {

            $conditions[] = 'categories.nom = ?';
            $parameters[] = $params['category'];
        }
        if(!empty($params['age'])) {

            $conditions[] = 'jeux.age_from >= ?';
            $parameters[] = $params['age'];
        }
        if(!empty($params['search'])) {

            $conditions[] = 'jeux.nom LIKE ?';
            $parameters[] = '%'.$params['search'].'%';
        }
        if ($conditions)
        {
            $query .= " WHERE ".implode(" AND ", $conditions);
        }

        $stmt = $this->connexion->prepare($query);
        $stmt->execute($parameters);

        /** debug  */
        //$stmt->debugDumpParams();

        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}