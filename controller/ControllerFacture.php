<?php

class ControllerFacture
{
    public static function Facture()
    {
        $frais = ModelFacture::getAllFacture();
        $view = 'Facture';
        $pagetitle = 'Factures';
        require(File::build_path(array("view", "view.php")));

    }

    public static function ajouterFacture()
    {
        $data = array(
            'numPuce' => $_POST['numPuce'],
            'numFacture' => $_POST['numFacture'],
            'type' => $_POST['type'],
            'motif' => $_POST['motif'],
            'cout' => $_POST['cout'],
            'dateFacture' => $_POST['dateFacture'],
            'crediteur' => $_POST['crediteur'],
        );

        $name = $data['numFacture'] . "-" . $data["crediteur"] . '.pdf';
        if (strcmp($_FILES['description']['name'], $name) != 0) {
            $erreur = ' Le nom de la Facture est faux.';

        }
        if ($_FILES['description']['error'] > 0) $erreur = "Erreur lors du transfert";
        if ($_FILES['description']['size'] > 1000000) $erreur = "Le fichier est trop gros";
        $extensions_valides = array('pdf');
        $extension_upload = strtolower(substr(strrchr($_FILES['description']['name'], '.'), 1));
        $nom = File::build_path(array("pdf", $_FILES['description']['name']));
        $resultat = move_uploaded_file($_FILES['description']['tmp_name'], $nom);

        if ($erreur != null) {
            $view = 'ErreurFacture';
            $pagetitle = 'Erreur Factures';
            require(File::build_path(array("view", "view.php")));
        }


        if ($resultat) {
            ModelFacture::ajouterFacture($data);
            $view = 'AjoutFactureReussi';
            $pagetitle = 'Facture Ajoutée';
            require(File::build_path(array("view", "view.php")));
        } else {
            $view = 'AjoutFactureNonReussi';
            $pagetitle = 'Facture Non Ajoutée';
            require(File::build_path(array("view", "view.php")));

        }

    }

    public static function formulaireFacture()
    {
        $view = 'formulaireAjoutFacture';
        $pagetitle = 'formulaire Facture';
        require(File::build_path(array("view", "view.php")));
    }

    public static function totaliserFactures()
    {
        $couts = ModelFacture::totaliserFactures();
        $view = 'totalFactures';
        $pagetitle = 'Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function totaliserFacturesNumPuces()
    {
        $couts = ModelFacture::totaliserFacturesNumPuces();
        $view = 'totalFactures';
        $pagetitle = 'Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function totaliserFacturesTypes()
    {
        $couts = ModelFacture::totaliserFacturesTypes();
        $view = 'totalFactures';
        $pagetitle = 'Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function totaliserFacturesMotifs()
    {
        $couts = ModelFacture::totaliserFacturesMotifs();
        $view = 'totalFactures';
        $pagetitle = 'Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function totaliserFacturesCrediteurs()
    {
        $couts = ModelFacture::totaliserFacturesCrediteurs();
        $view = 'totalFactures';
        $pagetitle = 'Factures';
        require(File::build_path(array("view", "view.php")));
    }


    public static function total()
    {
        $couts = ModelFacture::totaliserFactures();
    }

    //Methode pour trier les factures selon numero, numero de puce, type, motif, cout, date, getCrediteur
    // dans l'ordre croissant et Decroissants
    public static function trierFacturesNums()
    {
        $frais = ModelFacture::getAllFacturesNums();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesNumsDecroissants()
    {
        $frais = ModelFacture::getAllFacturesNumsDecroissants();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trouverFacture()
    {

        $num = $_POST['numFacture'];
        $frais = ModelFacture::getFacture($num);
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));

    }

    public static function trierFacturesNumPuces()
    {
        $frais = ModelFacture::getAllFacturesNumPuces();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesNumPucesDecroissants()
    {
        $frais = ModelFacture::getAllFacturesNumPucesDecroissants();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trouverFacturesNumPuces()
    {
        $num = $_POST['numPuce'];
        $frais = ModelFacture::getFacturesNumPuces($num);
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));

    }

    public static function trierFacturesTypes()
    {
        $types = $_GET['type'];
        $frais = ModelFacture::getAllFacturesTypes($types);
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierFacturesMotifs()
    {
        $frais = ModelFacture::getAllFacturesMotifs();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesMotifsDecroissants()
    {
        $frais = ModelFacture::getAllFacturesMotifsDecroissants();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesCouts()
    {
        $frais = ModelFacture::getAllFacturesCouts();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesCoutsDecroissants()
    {
        $frais = ModelFacture::getAllFacturesCoutsDecroissants();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trouverFacturesCouts()
    {
        $couts = array(
            'min' => $_POST['min'],
            'max' => $_POST['max']
        );
        $frais = ModelFacture::getFacturesCouts($couts);
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesDateFactures()
    {
        $data = array(
            'min' => $_POST['datemin'],
            'max' => $_POST['datemax']
        );
        $frais = ModelFacture::getAllFacturesDateFactures($data);
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }


    public static function trierFacturesCrediteurs()
    {
        $frais = ModelFacture::getAllFacturesCrediteurs();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesCrediteursDecroissants()
    {
        $frais = ModelFacture::getAllFacturesCrediteursDecroisants();
        $view = 'Facture';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }


}