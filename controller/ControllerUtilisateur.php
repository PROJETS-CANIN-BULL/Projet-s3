<?php
require_once(File::build_path(array("model", "ModelChien.php")));
require_once(File::build_path(array("model", "ModelFacture.php")));
require_once(File::build_path(array("model", "ModelFamille.php")));
require_once(File::build_path(array("model", "ModelFamilleAccueil.php")));
require_once(File::build_path(array("model", "ModelUtilisateur.php")));
require_once(File::build_path(array("model", "ModelVeto.php")));
require_once(File::build_path(array("lib", "ContactLib.php")));
require_once(File::build_path(array("lib", "AccueilPDF.php")));
require_once(File::build_path(array("lib", "AdoptionPDF.php")));
require_once(File::build_path(array("model", "ModelAdoption.php")));
require_once(File::build_path(array("model", "ModelAccueil.php")));


class ControllerUtilisateur
{
    public static function generateAccueilPDF()
    {
        $infoFamille = array(
            'civilite' => $_POST['civilite'],
            'nomFamilleAccueil' => $_POST['nomFamilleAccueil'],
            'prenomFamilleAccueil' => $_POST['prenomFamilleAccueil'],
            'mail' => $_POST['mail'],
            'telephoneMobile' => $_POST['telephoneMobile'],
            'telephoneFixe' => $_POST['telephoneFixe'],
            'adresseFamilleAccueil' => $_POST['adresseFamilleAccueil'],
            'codePostalFamilleAccueil' => $_POST['codePostalFamilleAccueil'],
            'villeFamilleAccueil' => $_POST['villeFamilleAccueil'],
            'paysFamilleAccueil' => $_POST['paysFamilleAccueil']
        );


        ModelFamilleAccueil::ajouterFamilleAccueil($infoFamille);
        $famille = ModelFamilleAccueil::getFamilleAccueilByNom($_POST['nomFamilleAccueil']);

        $data = array(
            'numPuce' => $_POST['numPuce'],
            'idFamille' => $famille->getIdFamilleAccueil()
        );
        ModelAccueil::ajouterAccueil($data);

        AccueilPDF::generateAccueilPDF();
        require_once(File::build_path(array("lib", "AccueilPDF.php")));
    }

    public static function generateAdoptionPDF()
    {
        $infoFamille = array(
            'civilite' => $_POST['civilite'],
            'nomFamille' => $_POST['nomFamilleAccueil'],
            'prenomFamille' => $_POST['prenomFamilleAccueil'],
            'mail' => $_POST['mail'],
            'numTelephone' => $_POST['telephone'],
            'adresse' => $_POST['adresseFamilleAccueil'],
            'codePostal' => $_POST['codePostalFamilleAccueil'],
            'ville' => $_POST['villeFamilleAccueil'],
            'pays' => $_POST['paysFamilleAccueil']
        );
        ModelFamille::ajouterFamille($infoFamille);

        $data = array(
            'numPuce' => $_POST['numPuce'],
            'idFamille' => ModelFamille::getFamilleByNom($infoFamille)->getIdFamille()
        );

        ModelAdoption::ajouterAdoption($data);

        AdoptionPDF::generateAdoptionPDF();
        require_once(File::build_path(array("lib", "AdoptionPDF.php")));
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
            $_SESSION['login'] = $data['id'];
            if (ModelUtilisateur::getTypeID($_SESSION['login']) == 1) {
                $_SESSION['isAdmin'] = 1;
            } else {
                $_SESSION['isAdmin'] = 0;
            }
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

        if ($_POST['password'] == $_POST['verifMdp']) {

            if (ModelUtilisateur::verifierUtilisateur($data) != NULL) {
                $_SESSION['login'] = $data['id'];
                if (ModelUtilisateur::getTypeID($_SESSION['login']) == 1) {
                    $_SESSION['isAdmin'] = 1;
                }
                $view = 'accueil';
                $pagetitle = 'Page Accueil';
                require(File::build_path(array("view", "view.php")));


            } else {
                $_SESSION['login'] = $data['id'];
                $_SESSION['isAdmin'] = 0;

                ModelUtilisateur::creerUtilisateur($data);
                $view = 'accueil';
                $pagetitle = 'Page Accueil';
                require(File::build_path(array("view", "view.php")));
            }
        } else {
            $error = "Mot de passe non identique";
            require(File::build_path(array("view", "account_creation.php")));


        }
    }

    public static function compte()
    {
        $u = ModelUtilisateur::getUtilisateurByPseudo($_SESSION['login']);
        $view = 'Compte';
        $controller = 'utilisateur';
        $pagetitle = 'Compte';
        require(File::build_path(array("view", "view.php")));
    }

    public static function modificationCompte()
    {
        $u = ModelUtilisateur::getUtilisateurByPseudo($_SESSION['login']);
        $view = 'modificationCompte';
        $controller = 'utilisateur';
        $pagetitle = 'Modifier Compte';
        require(File::build_path(array("view", "view.php")));
    }

    public static function modifierCompte()
    {
        $data = array(
            'pseudo' => $_POST['pseudo'],
            'mail' => $_POST['mail'],
        );
        if ($_POST['motDePasse'] != $_POST['motDePasse1']) {
            $view = 'modificationUtilisateurNonReussi';
            $controller = 'utilisateur';
            $pagetitle = 'Compte';
            require(File::build_path(array("view", "view.php")));
        } else {
            $passwordHache = Security::hacher($_POST['motDePasse']);
            $data['motDePasse'] = $passwordHache;
            ModelUtilisateur::modifierUtilisateur($data);
            $view = 'modificationUtilisateurReussi';
            $controller = 'utilisateur';
            $pagetitle = 'Compte';
            require(File::build_path(array("view", "view.php")));
        }
    }

    public static function sendEmail()
    {
        $alert = ContactLib::sendEmail();
        $view = 'Contact';
        $pagetitle = 'Contact';
        require(File::build_path(array("view", "view.php")));
    }


    public static function accueil()
    {
        $view = 'accueil';
        $pagetitle = 'Accueil';
        require(File::build_path(array("view", "view.php")));
    }


    public static function Contact()
    {
        $view = 'Contact';
        $pagetitle = 'Contact';
        $alert = "";
        require(File::build_path(array("view", "view.php")));
    }

    public static function FAQ()
    {
        $view = 'FAQ';
        $pagetitle = 'FAQ';
        require(File::build_path(array("view", "view.php")));
    }

    public static function ouvrirPDF()
    {
        $file = File::build_path(array("pdf", $_POST['name']));

        header("Content-type: application/pdf");

        header("Content-Length: " . filesize($file));

        readfile($file);
    }

    public static function deconnexion()
    {
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
        setcookie(session_name(), '', time() - 1);
        require(File::build_path(array("view", "Connexion.php")));
    }

}

?>
