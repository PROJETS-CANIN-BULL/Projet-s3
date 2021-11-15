<?php
require_once(File::build_path(array("model", "ModelChien.php")));

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

        $erreur = 'null';
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

        if (strcmp($erreur, 'null') != 0) {
            $view = 'ErreurFacture';
            $pagetitle = 'Erreur Factures';
            require(File::build_path(array("view", "view.php")));
        }


        if (ModelFacture::ajouterFacture($data) == false || $resultat == false) {
            $erreur = "une des dates n'est pas dans le bon format";

            if (!$resultat) {
                $info = array(
                    "numFacture" => $_POST['numFacture'],
                    "crediteur" => $_POST['crediteur']
                );
                ModelFacture::supprimerFacture($info);
                $erreur = 'Le déplacement des fichiers a connu une erreur';
            }else{
                unlink($nom);
            }
            $view = 'AjoutFactureNonReussi';
            $pagetitle = 'Facture Non Ajoutée';
            require(File::build_path(array("view", "view.php")));
        } else {
            $message ='enregistrée';
            $titre = 'Ajouter Facture';
            $view = 'AjoutFactureReussi';
            $pagetitle = 'Facture Ajouté';
            require(File::build_path(array("view", "view.php")));
        }
    }

    public static function formulaireFacture()
    {
        $chiens = ModelChien::getAllChiens();
        $view = 'formulaireAjoutFacture';
        $pagetitle = 'formulaire Facture';
        require(File::build_path(array("view", "view.php")));
    }

    public static function modificationFormulaire()
    {
        $info = array(
            "numFacture" => $_GET['numFacture'],
            "crediteur" => $_GET['crediteur']
        );
        $facture = ModelFacture::getFactureByNumFacture($info);
        $chiens = ModelChien::getAllChiens();
        $view = 'modificationFacture';
        $pagetitle = 'Modification Facture';
        require(File::build_path(array("view", "view.php")));

    }

    public static function modifierFacture()
    {
        $infos = array(
            'numPuce' => $_POST['numPuce'],
            'numFacture' => $_POST['numFacture'],
            'type' => $_POST['type'],
            'motif' => $_POST['motif'],
            'cout' => $_POST['cout'],
            'dateFacture' => $_POST['dateFacture'],
            'crediteur' => $_POST['crediteur'],
        );
        ModelFacture::modifierFacture($infos);
        $message = 'modifiée';
        $titre = "Modifier Facture";
        $view = 'AjoutFactureReussi';
        $pagetitle = 'Modifier Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function supprimerFacture(){
        $info = array(
            "numFacture" => $_GET['numFacture'],
            "crediteur" => $_GET['crediteur']
        );
        ModelFacture::supprimerFacture($info);
        $nom =File::build_path(array("pdf", $info['numFacture'].'-'.$info['crediteur'].'.pdf'));
        unlink($nom);
        $message = 'supprimée';
        $titre = "Supprimer Facture";
        $view = 'AjoutFactureReussi';
        $pagetitle = 'Supprimer Facture';
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