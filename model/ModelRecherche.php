<?php
require_once (File::build_path(array("model","Model.php")));

class ModelRecherche
{


    public function __construct()
    {

    }

    public static function search()
    {
        $q = NULL;
        $PDO = Model::getPDO();
        $rep = $PDO->query('SELECT nomChien FROM Chien WHERE nomChien LIKE "%' . $q . '%" ORDER BY numPuce DESC');
        if (isset($_GET['q']) and !empty($_GET['q'])) {
            $q = htmlspecialchars($_GET['q']);
            $rep = $PDO->query('SELECT nomChien,description FROM Chien WHERE nomChien LIKE "%' . $q . '%" ORDER BY numPuce DESC');
            if ($rep->rowCount() == 0) {
                $rep = $PDO->query('SELECT nomChien FROM Chien WHERE CONCAT(nomChien, description) LIKE "%' . $q . '%" ORDER BY numPuce DESC');
            }
        }
        $args = array("0" =>$q, "1"=> $rep);
        return $args;
    }
}