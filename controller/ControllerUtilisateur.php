<?php
require_once(File::build_path(array("model", "ModelChien.php")));
require_once(File::build_path(array("model", "ModelFacture.php")));
require_once(File::build_path(array("model", "ModelFamille.php")));
require_once(File::build_path(array("model", "ModelFamilleAccueil.php")));
require_once(File::build_path(array("model", "ModelUtilisateur.php")));
require_once(File::build_path(array("model", "ModelVeto.php")));
require_once(File::build_path(array("lib", "ContactLib.php")));
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
            $_SESSION['login']=$data['id'];
            if( ModelUtilisateur::getTypeID($_SESSION['login'])==1){
                $_SESSION['isAdmin']=1;
            }else{
                $_SESSION['isAdmin']=0;
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

        if (ModelUtilisateur::verifierUtilisateur($data) != NULL) {
            $_SESSION['login']=$data['id'];
            if(ModelUtilisateur::getTypeID($_SESSION['login'])==1){
                $_SESSION['isAdmin']=1;
            }
            $view = 'accueil';
            $pagetitle = 'Page Accueil';
            require(File::build_path(array("view", "view.php")));


        } else {
            $_SESSION['login']=$data['id'];
            $_SESSION['isAdmin']=0;
            
            ModelUtilisateur::creerUtilisateur($data);
            $view = 'accueil';
            $pagetitle = 'Page Accueil';
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
      public static function deconnexion(){
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        setcookie(session_name(),'',time()-1);
        require(File::build_path(array("view", "Connexion.php")));

    }


}

?>
