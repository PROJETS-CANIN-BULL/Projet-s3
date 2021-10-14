<?php
require_once (File::build_path(array("model","ModelChien.php")));
require_once (File::build_path(array("model","ModelFacture.php")));
require_once (File::build_path(array("model","ModelFamille.php")));
require_once (File::build_path(array("model","ModelFamilleAccueil.php")));
require_once (File::build_path(array("model","ModelUtilisateur.php")));
require_once (File::build_path(array("model","ModelVeto.php")));


class ControllerUtilisateur {
    public static function seConnecter(){
      require(File::build_path(array("view","Connexion.php")));
    }

    public static function connexion() {
        $data = array(
            'id' => $_GET['id'],
            'password' => $_GET['password']
        );
        if(ModelUtilisateur::verfierUtilisateur($data)==NULL){
            require (File::build_path(array("view","error.php")));

        }else{
            require (File::build_path(array("view","accueil.php")));
        }
    }

    public static function lienCreationCompte(){
      require (File::build_path(array("view","account_creation.php")));
    }
    public static function creationCompte(){
         $data = array(
            'id' => $_GET['id'],
            'password' => $_GET['password'],
            'mail'=> $_GET['mail']
        );
        if(ModelUtilisateur::verfierUtilisateur($data)!=NULL){
            require (File::build_path(array("view","accueil.php")));


        }else{
            ModelUtilisateur::creerUtilisateur($data);
            require (File::build_path(array("view","accueil.php")));
        }
    }

    public static function accueil(){
      require(File::build_path(array("view","accueil.php")));
    }
    public static function Protege(){
      $chien = ModelChien::getAllChiens();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function Frais(){
      $frais=ModelFacture::getAllFacture();
      require(File::build_path(array("view","Frais.php")));

    }
    public static function Contact(){
      require(File::build_path(array("view","Contact.php")));
    }
    public static function FAQ(){
      require(File::build_path(array("view","FAQ.php")));
    }
    public static function Adopter(){
      $chien = ModelChien::getChiensNonAdoptes();
      require(File::build_path(array("view","Adopter.php")));
    }

    public static function trierNom(){
      $chien = ModelChien::getAllChiensNoms();
      require(File::build_path(array("view","Protege.php")));

    }

}
?>
