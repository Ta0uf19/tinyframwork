<?php
class JeuxController extends Controller
{
    /**
     * @var $model Jeux
     */
    private $model;
    public function _construct() {
        $this->model = new Jeux();
    }

    /**
     * Renvoyer les données en Format JSON
     * SELECT * FROM JEUX JOIN categories ON JEUX.id=categories.id WHERE categories.nom='Jeux de course' AND jeux.age_from=10
     *
     */

    public function get() {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            // model
            $this->model = new Jeux();
            $result = $this->model->filter($_GET);


            header('Content-Type: application/json');
            echo json_encode($result);

        }
        else {

            echo "Erreur";
        }

    }

    /**
     * Ajouter un jeu
     */

    public function add() {


    }


    /**
     * Details jeu
     */

    public function details() {

        // model
        $this->model = new Jeux();
        $result = $this->model->recuperer($_GET['id']);

        $array = ["jeu" => $result];

        $this->render("jeudetails", $array);

    }



}