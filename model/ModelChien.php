<?php
require_once "Model.php"; 


class ModelUtilisateur {
	private $numPuce;
    private $nomChien;
    private $race;
    private $dateNaissance;
    private $sexe;
    private $robe;
    private $sterilisation;
    private $dateAccueil;
    private $nomAncienProprio;
    private $idFamille;




    public function __construct($num = NULL, $nom = NULL, $race = NULL,$dateNaiss = NULL, $sexe = NULL, $robe = NULL,$sterilisation = NULL, $dateAccueil = NULL, $nomAncienProp = NULL, $id=NULL) {
  		if (!is_null($num) && !is_null($nom) && !is_null($race) &&!is_null($dateNaiss) && !is_null($sexe) && !is_null($robe) &&!is_null($sterilisation) && !is_null($dateAccueil) && !is_null($nomAncienProp) && !is_null($id)) {
   			$this->numPuce = $num;
    		$this->nomChien = $nom;
    		$this->race = $race;
    		$this->dateNaissance = $dateNaiss;
    		$this->sexe = $sexe;
    		$this->robe = $robe;
    		$this->sterilisation = $sterilisation;
    		$this->dateAccueil = $dateAccueil;
    		$this->nomAncienProprio = $nomAncienProp;
    		$this->idFamille= $id;

  		}
	}

	public static function ajouterChien($data) {
		$sql = "INSERT INTO `Chien`(`numPuce`, `nomChien`, `race`, `dateNaissance`, `sexe`, `robe`, `sterilisation`, `dateAccueil`, `nomAncienProprio`, `idFamille`) VALUES (:tag,:tag2, :tag3,:tag4,:tag5, :tag6,:tag7,:tag8,:tag9,:tag10)";
		$req_prep = Model::getPDO()->prepare($sql);

   		$values = array(
       		"tag" => $data["numPuce"],
        	"tag2" => $data["nomChien"],
        	"tag3" => $data["race"],
        	"tag4" => $data["dateNaissance"],
        	"tag5" => $data["sexe"],
        	"tag6" => $data["robe"],
        	"tag7" => $data["sterilisation"],
        	"tag8" => $data["dateAccueil"],
        	"tag9" => $data["nomAncienProprio"],
        	"tag10" => $data["idFamille"],
    );
    	$req_prep->execute($values);



	}

	public static function modifierSterilisation($data) {
	}

	public static function modifierIdFamille($data) {
	}

// Renvoie liste chiens non adoptes 
	public static function chiensNonAdoptes(){
		$sql = "SELECT * FROM Chien where idFamille=NULL";
		$req_prep = Model::getPDO()->prepare($sql);
    	$req_prep->execute($values);
    	$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Chien');
    	$chien = $req_prep->fetchAll();
    	if (empty($chien))
       		return false;
    	return $chien;
		
	}

//Savoir si un chien est adopte
	public static function adopterChien($data) {

	}

}

?>