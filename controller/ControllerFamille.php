<?php
require_once(File::build_path(array("model", "ModelFamille.php")));
require_once(File::build_path(array("model", "ModelChien.php")));


class ControllerFamille
{
    public static function ajouterFamille()
    {
        $data = array(
            'civilite' => $_POST['civilite'],
            'nomFamille' => $_POST['nomFamilleAccueil'],
            'prenomFamille' => $_POST['prenomFamilleAccueil'],
            'mail' => $_POST['mail'],
            'numTelephone' => $_POST['numTelephone'],
            'adresse' => $_POST['adresseFamilleAccueil'],
            'codePostal' => $_POST['codePostalFamilleAccueil'],
            'ville' => $_POST['villeFamilleAccueil'],
            'pays' => $_POST['paysFamilleAccueil'],
        );

        ModelFamille::ajouterFamille($data);
        if (ModelFamille::ajouterFamille($data) == false) {

            $view = 'AdoptionChienNonReussie';
            $pagetitle = 'Chien non adopté';
            $controller = 'famille';
            require(File::build_path(array("view", "view.php")));
        }

    }

}