<?php
require_once(File::build_path(array("model", "ModelFamilleAccueil.php")));
require_once(File::build_path(array("model", "ModelChien.php")));


class ControllerFamilleAccueil
{
    /* public static function formulaireFamilleAccueil()
     {
         $chien = ModelChien::getChiensNonAdoptes();
         $view = 'formulaireAjoutFamilleAccueil';
         $pagetitle = 'formulaire Famille';
         $controller='famille';
         require(File::build_path(array("view", "view.php")));
     }*/
    public static function formulaireFamilleAccueil()
    {
        if (isset($_GET['numPuce'])) {
            $c = ModelChien::getChienByNumPuce($_GET['numPuce']);
        } else {
            $c = ModelChien::getAllChiens();
        }
        $f = ModelFamilleAccueil::getAllFamilleAccueil();

        $view = 'formulaireAjoutFamilleAccueil';
        $pagetitle = 'formulaire Famille';
        $controller = 'famille';
        require(File::build_path(array("view", "view.php")));
    }

    public static function ajouterFamilleAccueil()
    {
        $data = array(
            'civilite' => $_POST['civilite'],
            'nomFamilleAccueil' => $_POST['nomFamilleAccueil'],
            'prenomFamilleAccueil' => $_POST['prenomFamilleAccueil'],
            'mail' => $_POST['mail'],
            'numTelephone' => $_POST['numTelephone'],
            'adresseFamilleAccueil' => $_POST['adresseFamilleAccueil'],
            'codePostalFamilleAccueil' => $_POST['codePostalFamilleAccueil'],
            'villeFamilleAccueil' => $_POST['villeFamilleAccueil'],
            'paysFamilleAccueil' => $_POST['paysFamilleAccueil'],
        );

        ModelFamilleAccueil::ajouterFamilleAccueil($data);
        if (ModelFamilleAccueil::ajouterFamilleAccueil($data) == false) {

            $view = 'AjoutFamilleAccueilNonReussi';
            $pagetitle = 'Famille non ajoutée';
            $controller = 'famille';
            require(File::build_path(array("view", "view.php")));
        }
    }


}