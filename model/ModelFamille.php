<?php
require_once "Model.php"; 


class ModelUtilisateur {
    private $civilite;
    private $nomFamille;
    private $prenomFamille;
    private $mail;
    private $numTelephone;




    public function __construct($civilite = NULL, $nom = NULL,$prenom = NULL, $mail = NULL, $num = NULL) {
  		if (!is_null($civilite) && !is_null($nom) &&!is_null($prenom) && !is_null($mail) && !is_null($num)) {
    		$this->civilite = $civilite;
    		$this->nomFamille = $nom;
    		$this->prenomFamille = $prenom;
    		$this->mail = $mail;
    		$this->numTelephone = $num;
    		
  		}
	}

	public static function ajouterFamille($data) {
		$sql = "INSERT INTO `Famille`(`civilite`, `nomFamille`, `prenomFamille`, `mail`, `numTelephone`) VALUES (:tag,:tag2,:tag3,:tag4,:tag5,:tag6)";
		$req_prep = Model::getPDO()->prepare($sql);

   		$values = array(
       		"tag" => $data["civilite"],
        	"tag2" => $data["nomFamille"],
        	"tag3" => $data["prenomFamille"],
        	"tag4" => $data["mail"],
        	"tag5" => $data["numTelephone"],
    );
    	$req_prep->execute($values);



	}

	public static function modofierNom($data) {
	}

	public static function modifierPrenom($data) {
	}

	public static function modifierNumTelephone($data) {
	}

}

?>