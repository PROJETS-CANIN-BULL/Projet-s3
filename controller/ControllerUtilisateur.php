<?php
require_once(File::build_path(array("model", "ModelChien.php")));
require_once(File::build_path(array("model", "ModelFacture.php")));
require_once(File::build_path(array("model", "ModelFamille.php")));
require_once(File::build_path(array("model", "ModelFamilleAccueil.php")));
require_once(File::build_path(array("model", "ModelUtilisateur.php")));
require_once(File::build_path(array("model", "ModelVeto.php")));
require_once (File::build_path(array("lib","ContactLib.php")));
require_once(File::build_path(array("lib", "PDF.php")));

class ControllerUtilisateur
{
    public static $typeUtilisateur;
    public $id;

    public static function generatePDF()
    {
        PDF::generatePDF();
        require(File::build_path(array("lib", "PDF.php")));
    }
//  Test
    public static function test()
    {
        require(File::build_path(array("test.php")));
    }

    public static function seConnecter()
    {
        require(File::build_path(array("view", "Connexion.php")));
    }

    public static function connexion()
    {
        $data = array(
            'id' => $_POST['id'],
        );
        $passwordHache = Security::hacher($_POST['password']);
        $data['password'] = $passwordHache;

        $U = ModelUtilisateur::verifierUtilisateur($data);

        if ($U == NULL) {
            require(File::build_path(array("view", "error.php")));
        } else {
            $id = $data['id'];
            self::$typeUtilisateur = ModelUtilisateur::getTypeID($id);
            $view = 'accueil';
            $pagetitle = 'Page Accueil';
            require(File::build_path(array("view", "view.php")));
        }
    }

    public static function lienCreationCompte()
    {
        require(File::build_path(array("view", "account_creation.php")));
    }

    public static function creationCompte()
    {
        $data = array(
            'id' => $_POST['id'],
            'mail' => $_POST['mail']
        );
        $passwordHache = Security::hacher($_POST['password']);
        $data['password'] = $passwordHache;

        if (ModelUtilisateur::verifierUtilisateur($data) != NULL) {
            $view = 'accueil';
            $pagetitle = 'Page Accueil';
            require(File::build_path(array("view", "view.php")));


        } else {
            ModelUtilisateur::creerUtilisateur($data);
            $view = 'accueil';
            $pagetitle = 'Page Accueil';
            require(File::build_path(array("view", "view.php")));
        }
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
        $nom = File::build_path(array("image","chien", $_FILES['photo']['name']));
        $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $nom);

        if (strcmp($erreur, 'null') != 0) {
            $view = 'ErreurChien';
            $pagetitle = ' Erreur photo du Chien ';
            require(File::build_path(array("view", "view.php")));
        }

        $data['nomPhoto']=$_FILES['photo']['name'];

        if(ModelChien::addChien($data)==false || $resultat==false){
             $erreur = "une des dates n'est pas dans le bon format";

            if(!$resultat){
                $erreur = 'Le déplacement des fichiers a connu une erreur';
            }
            $view = 'AjoutChienNonReussi';
            $pagetitle = 'Chien Non Ajouté';
            require(File::build_path(array("view", "view.php")));
        }else{
             $view = 'AjoutChienReussi';
            $pagetitle = 'Chien Ajouté';
            require(File::build_path(array("view", "view.php")));
        }

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



    public static function sendEmail()
    {
        $alert=ContactLib::sendEmail();
        $view = 'Contact';
        $pagetitle = 'Contact';
        require(File::build_path(array("view", "view.php")));
    }

    public static function formulaireChien()
    {
        $view = 'formulaireAjoutChien';
        $pagetitle = 'formulaire Chien';
        require(File::build_path(array("view", "view.php")));
    }

    public static function formulaireFacture()
    {
        $view = 'formulaireAjoutFacture';
        $pagetitle = 'formulaire Facture';
        require(File::build_path(array("view", "view.php")));
    }

    public static function formulaireFamilleAccueil()
    {
        $chien = ModelChien::getChiensNonAdoptes();
        $view = 'formulaireAjoutFamilleAccueil';
        $pagetitle = 'formulaire Famille';
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
        $view = 'AjoutFamilleAccueilReussi';
        $pagetitle = 'Famille Ajoutée';

        require(File::build_path(array("view", "view.php")));
    }

    public static function accueil()
    {
        $view = 'accueil';
        $pagetitle = 'Accueil';
        require(File::build_path(array("view", "view.php")));
    }

    public static function Protege()
    {
        $chien = ModelChien::getAllChiens();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function Frais()
    {
        $frais = ModelFacture::getAllFacture();
        $view = 'Facture';
        $pagetitle = 'Factures';
        require(File::build_path(array("view", "view.php")));

    }

    public static function Contact()
    {
        $view = 'Contact';
        $pagetitle = 'Contact';
        $alert="";
        require(File::build_path(array("view", "view.php")));
    }

    public static function FAQ()
    {
        $view = 'FAQ';
        $pagetitle = 'FAQ';
        require(File::build_path(array("view", "view.php")));
    }

    public static function Adopter()
    {
        $chien = ModelChien::getChiensNonAdoptes();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function ouvrirPDF()
    {
        $file = File::build_path(array("pdf", $_POST['name']));

        header("Content-type: application/pdf");

        header("Content-Length: " . filesize($file));

        readfile($file);
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

?>
