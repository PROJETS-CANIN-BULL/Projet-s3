<?php
require_once(File::build_path(array("model", "ModelChien.php")));
require_once(File::build_path(array("model", "ModelFacture.php")));


class ControllerChien
{
    public static function Protege()
    {
        $chien = ModelChien::getAllChiens();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function Adopter()
    {
        $chien = ModelChien::getChiensNonAdoptes();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }
    public static function formulaireChien()
    {
        $view = 'formulaireAjoutChien';
        $pagetitle = 'formulaire Chien';
        require(File::build_path(array("view", "view.php")));
    }


    public static function ajouterChien()
    {
        $data = array(
            'numPuce' => $_POST['numPuce'],
            'nomChien' => $_POST['nomChien'],
            'race' => $_POST['race'],
            'dateNaissance' => $_POST['dateNaissance'],
            'sexe' => $_POST['sexe'],
            'robe' => $_POST['robe'],
            'sterilisation' => $_POST['sterilisation'],
            'dateAccueil' => $_POST['dateAccueil'],
            'description' => $_POST['description'],
            'nomAncienProprio' => $_POST['nomAncienProp']
        );

        $erreur = 'null';

        if (strcmp($_FILES['photo']['name'], $data['numPuce'] . '.png') != 0 && strcmp($_FILES['photo']['name'], $data['numPuce'] . '.jpeg') != 0 && strcmp($_FILES['photo']['name'], $data['numPuce'] . '.JPG') != 0) {
            $erreur = ' Le nom de la photo du chien est faux.';
        }
        if ($_FILES['photo']['error'] > 0) $erreur = "Erreur lors du transfert";
        if ($_FILES['photo']['size'] > 10000000000) $erreur = "Le fichier est trop gros";
        $extensions_valides = array('jpeg', 'jpg', 'png');
        $extension_upload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
        $nom = File::build_path(array("image", "chien", $_FILES['photo']['name']));
        $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $nom);

        if (strcmp($erreur, 'null') != 0) {
            $view = 'ErreurChien';
            $pagetitle = ' Erreur photo du Chien ';
            require(File::build_path(array("view", "view.php")));
        }

        $data['nomPhoto'] = $_FILES['photo']['name'];

        if (ModelChien::addChien($data) == false || $resultat == false) {
            $erreur = "une des dates n'est pas dans le bon format";

            if (!$resultat) {
                $erreur = 'Le déplacement des fichiers a connu une erreur';
            }
            $view = 'AjoutChienNonReussi';
            $pagetitle = 'Chien Non Ajouté';
            require(File::build_path(array("view", "view.php")));
        } else {
            $view = 'AjoutChienReussi';
            $pagetitle = 'Chien Ajouté';
            require(File::build_path(array("view", "view.php")));
        }

    }


// Trier les chiens par les critères nom, numero puce, nom ancien proprio, race, robe, sexe, sterilisation, date dateNaissance, date dateAccueil
// par ordre croissant et decroissant

    public static function trierNoms()
    {
        $chien = ModelChien::getAllChiensNoms();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNomsDecroissants()
    {
        $chien = ModelChien::getAllChiensNomsDecroissants();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trouverChiensNoms()
    {
        $nom = $_POST['nomChien'];
        $chien = ModelChien::getChiensNoms($nom);
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNumPuces()
    {
        $chien = ModelChien::getAllChiensNumPuces();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNumPucesDecroissants()
    {
        $chien = ModelChien::getAllChiensNumPucesDecroissants();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trouverChiensNumPuces()
    {
        $num = $_POST['numPuce'];
        $chien = ModelChien::getChiensNumPuces($num);
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierRaces()
    {
        $chien = ModelChien::getAllChiensRaces();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierRacesDecroissants()
    {
        $chien = ModelChien::getAllChiensRacesDecroissants();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trouverChiensRaces()
    {
        $race = $_POST['race'];
        $chien = ModelChien::getChiensRaces($race);
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierDateNaissances()
    {
        $data = array(
            'min' => $_POST['datemin'],
            'max' => $_POST['datemax']
        );
        $chien = ModelChien::getAllChiensDateNaissances($data);
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierSexes()
    {
        $chien = ModelChien::getAllChiensSexes($_GET['sexe']);
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierRobes()
    {
        $chien = ModelChien::getAllChiensRobes();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierRobesDecroissants()
    {
        $chien = ModelChien::getAllChiensRobesDecroissants();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trouverChiensRobes()
    {
        $robe = $_POST['robe'];
        $chien = ModelChien::getChiensRobes($robe);
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierSterilisations()
    {
        $avis = $_GET['avis'];
        $chien = ModelChien::getAllChiensSterilisations($avis);
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierDateAccueils()
    {
        $data = array(
            'min' => $_POST['datemin'],
            'max' => $_POST['datemax']
        );
        $chien = ModelChien::getAllChiensDateAccueils($data);
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierNomAncienProprio()
    {
        $chien = ModelChien::getAllChiensNomAncienProprio();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNomAncienProprioDecroissant()
    {
        $chien = ModelChien::getAllChiensNomAncienProprioDecroissant();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));

    }

    public static function trouverChiensAncienProprios()
    {
        $nomAncienProp = $_POST['nomAncienProp'];
        $chien = ModelChien::getChiensAncienProprio($nomAncienProp);
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }


    // Trier les chiens par les critères nom, numero puce, nom ancien proprio, race, robe, sexe, sterilisation, date dateNaissance, date dateAccueil
    // par ordre croissant et decroissant
    public static function trierNonAdoptesNoms()
    {
        $chien = ModelChien::getAllChiensNonAdoptesNoms();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesNomsDecroissants()
    {
        $chien = ModelChien::getAllChiensNonAdoptesNomsDecroissants();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trouverChiensNonAdoptesNoms()
    {
        $nom = $_POST['nomPuce'];
        $chien = ModelChien::getChiensNonAdoptesNoms($nom);
        $view = 'Adopter';
        $pagetitle = 'A Adopter';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierNonAdoptesNumPuces()
    {
        $chien = ModelChien::getAllChiensNonAdoptesNumPuces();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierNonAdoptesNumPucesDecroissants()
    {
        $chien = ModelChien::getAllChiensNonAdoptesNumPucesDecroissants();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trouverChiensNonAdoptesNumPuces()
    {
        $num = $_POST['numPuce'];
        $chien = ModelChien::getChiensNonAdoptesNumPuces($num);
        $view = 'Adopter';
        $pagetitle = 'A Adopter';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesRaces()
    {
        $chien = ModelChien::getAllChiensNonAdoptesRaces();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesRacesDecroissants()
    {
        $chien = ModelChien::getAllChiensNonAdoptesRacesDecroissants();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trouverChiensNonAdoptesRaces()
    {
        $race = $_POST['race'];
        $chien = ModelChien::getChiensNonAdoptesRaces($race);
        $view = 'Adopter';
        $pagetitle = 'A Adopter';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesDateNaissances()
    {
        $data = array(
            'min' => $_POST['datemin'],
            'max' => $_POST['datemax']
        );
        $chien = ModelChien::getAllChiensNonAdoptesDateNaissances($data);
        $view = 'Adopter';
        $pagetitle = 'A Adopter';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesSexes()
    {
        $sexe = $_GET['sexe'];
        $chien = ModelChien::getAllChiensNonAdoptesSexes($sexe);
        $view = 'Adopter';
        $pagetitle = 'A Adopter';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierNonAdoptesRobes()
    {
        $chien = ModelChien::getAllChiensNonAdoptesRobes();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesRobesDecroissants()
    {
        $chien = ModelChien::getAllChiensNonAdoptesRobesDecroissants();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("vieatement lisible (un objet PDOStatement).w", "view.php")));
    }

    public static function trouverChiensNonAdoptesRobes()
    {
        $robe = $_POST['robe'];
        $chien = ModelChien::getChiensNonAdoptesRobes($robe);
        $view = 'Adopter';
        $pagetitle = 'A Adopter';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierNonAdoptesSterilisations()
    {
        $avis = $_GET['avis'];
        $chien = ModelChien::getAllChiensNonAdoptesSterilisations($avis);
        $view = 'Adopter';
        $pagetitle = 'A Adopter';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesDateAccueils()
    {
        $data = array(
            'min' => $_POST['datemin'],
            'max' => $_POST['datemax']
        );
        $chien = ModelChien::getAllChiensNonAdoptesDateAccueils($data);
        $view = 'Adopter';
        $pagetitle = 'A Adopter';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierNonAdoptesNomAncienProprio()
    {
        $chien = ModelChien::getAllChiensNonAdoptesNomAncienProprio();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesNomAncienProprioDecroissant()
    {
        $chien = ModelChien::getAllChiensNonAdoptesNomAncienProprioDecroissant();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trouverChiensNonAdoptesAncienProprios()
    {
        $nomAncienProp = $_POST['nomAncienProp'];
        $chien = ModelChien::getChiensNonAdoptesAncienProprio($nomAncienProp);
        $view = 'Adopter';
        $pagetitle = 'A Adopter';
        require(File::build_path(array("view", "view.php")));
    }


}