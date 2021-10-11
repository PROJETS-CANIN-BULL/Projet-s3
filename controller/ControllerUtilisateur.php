<?php
require_once (File::build_path(array("model","ModelChien.php")));
require_once (File::build_path(array("model","ModelFacture.php")));
require_once (File::build_path(array("model","ModelFamille.php")));
require_once (File::build_path(array("model","ModelFamilleAccueil.php")));
require_once (File::build_path(array("model","ModelUtilisateur.php")));
require_once (File::build_path(array("model","ModelVeto.php")));


class ControllerUtilisateur {
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
        
}
?>
