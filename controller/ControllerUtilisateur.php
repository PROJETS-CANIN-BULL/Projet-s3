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
            'nomAncienProprio' => $_POST['nomAncienProp'],
        );

        ModelChien::ajouterChien($data);
        $view = 'AjoutChienReussi';
        $pagetitle = 'Chien Ajouté';
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
        if ($_FILES['description']['error'] > 0) $erreur = "Erreur lors du transfert";
        if ($_FILES['description']['size'] > 1000000) $erreur = "Le fichier est trop gros";
        $extensions_valides = array('pdf');
        $extension_upload = strtolower(substr(strrchr($_FILES['description']['name'], '.'), 1));
        if (in_array($extension_upload, $extensions_valides)) echo "Extension correcte";
        $nom = 'File::build_path(array("pdf","' . $data['numFacture'] . '-' . $data['crediteur'] . '"))';
        $resultat = move_uploaded_file($_FILES['description']['tmp_name'], $nom);
        if ($resultat) echo "Transfert réussi";

        ModelFacture::ajouterFacture($data);
        $view = 'AjoutFactureReussi';
        $pagetitle = 'Facture Ajoutée';

        require(File::build_path(array("view", "view.php")));
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
        $view = 'Frais';
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

    public static function trierDateNaissances()
    {
        $chien = ModelChien::getAllChiensDateNaissances();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierDateNaissancesDecroissants()
    {
        $chien = ModelChien::getAllChiensDateNaissancesDecroissants();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierSexes()
    {
        $chien = ModelChien::getAllChiensSexes();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierSexesDecroissants()
    {
        $chien = ModelChien::getAllChiensSexesDecroissants();
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

    public static function trierSterilisations()
    {
        $chien = ModelChien::getAllChiensSterilisations();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierSterilisationDecroissants()
    {
        $chien = ModelChien::getAllChiensSterilisationsDecroissants();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierDateAccueils()
    {
        $chien = ModelChien::getAllChiensDateAccueils();
        $view = 'Protege';
        $pagetitle = 'Les Protégés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierDateAccueilsDecroissants()
    {
        $chien = ModelChien::getAllChiensDateAccueilsDecroissants();
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

    public static function trierNonAdoptesDateNaissances()
    {
        $chien = ModelChien::getAllChiensNonAdoptesDateNaissances();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesDateNaissancesDecroissants()
    {
        $chien = ModelChien::getAllChiensNonAdoptesDateNaissancesDecroissants();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesSexes()
    {
        $chien = ModelChien::getAllChiensNonAdoptesSexes();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesSexesDecroissants()
    {
        $chien = ModelChien::getAllChiensNonAdoptesSexesDecroissants();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
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

    public static function trierNonAdoptesSterilisations()
    {
        $chien = ModelChien::getAllChiensNonAdoptesSterilisations();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesSterilisationDecroissants()
    {
        $chien = ModelChien::getAllChiensNonAdoptesSterilisationsDecroissants();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));

    }

    public static function trierNonAdoptesDateAccueils()
    {
        $chien = ModelChien::getAllChiensNonAdoptesDateAccueils();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierNonAdoptesDateAccueilsDecroissants()
    {
        $chien = ModelChien::getAllChiensNonAdoptesDateAccueilsDecroissants();
        $view = 'Adopter';
        $pagetitle = 'Les Adoptés';
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


    //Methode pour trier les factures selon numero, numero de puce, type, motif, cout, date, getCrediteur
    // dans l'ordre croissant et Decroissants
    public static function trierFacturesNums()
    {
        $frais = ModelFacture::getAllFacturesNums();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesNumsDecroissants()
    {
        $frais = ModelFacture::getAllFacturesNumsDecroissants();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesNumPuces()
    {
        $frais = ModelFacture::getAllFacturesNumPuces();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesNumPucesDecroissants()
    {
        $frais = ModelFacture::getAllFacturesNumPucesDecroissants();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesTypes()
    {
        $frais = ModelFacture::getAllFacturesTypes();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesTypesDecroissants()
    {
        $frais = ModelFacture::getAllFacturesTypesDecroisants();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesMotifs()
    {
        $frais = ModelFacture::getAllFacturesMotifs();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesMotifsDecroissants()
    {
        $frais = ModelFacture::getAllFacturesMotifsDecroissants();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesCouts()
    {
        $frais = ModelFacture::getAllFacturesCouts();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesCoutsDecroissants()
    {
        $frais = ModelFacture::getAllFacturesCoutsDecroissants();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesDateFactures()
    {
        $frais = ModelFacture::getAllFacturesDateFactures();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesDateFacturesDecroissants()
    {
        $frais = ModelFacture::getAllFacturesDateFacturesDecroissants();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesCrediteurs()
    {
        $frais = ModelFacture::getAllFacturesCrediteurs();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }

    public static function trierFacturesCrediteursDecroissants()
    {
        $frais = ModelFacture::getAllFacturesCrediteursDecroisants();
        $view = 'Frais';
        $pagetitle = 'Les Factures';
        require(File::build_path(array("view", "view.php")));
    }


}

?>
