<?php
require_once ('../model/ModelUtilisateur.php'); // chargement du modèle
class ControllerUtilisateur {
    public static function connexion() {
        $data = array(
            'id' => $_GET['id'],
            'password' => $_GET['password']
        )
        ModelUtilisateur::verfierUtilisateur($data);
    }
        
}
?>