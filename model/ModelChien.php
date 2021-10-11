<?php
require_once (File::build_path(array("model","Model.php")));


class ModelChien {
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
    	$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
    	$chien = $req_prep->fetchAll();
    	if (empty($chien))
       		return false;
    	return $chien;

	}

//Savoir si un chien est adopte
	public static function adopterChien($data) {

	}


		public static function getAllChiens(){
			/*$sql = "SELECT * FROM Chien";
			$req_prep = Model::getPDO()->prepare($sql);
	    	$req_prep->execute($values);
	    	$req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
	    	$chien = $req_prep->fetchAll();
	    	if (empty($chien))
	       		return false;
	    	return $chien;*/
				try{
						$PDO = Model::getPDO();
						$rep = $PDO->query("SELECT * FROM Chien");
						$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
						$chien = $rep->fetchAll();
						return $chien;

				} catch(PDOException $e) {
								if (Conf::getDebug()) {
										echo $e->getMessage(); // affiche un message d'erreur
								} else {
										echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
								}
								die();
						}
		}
		
		//Getter
			public function getNumpuce(){
				return $this->numPuce;
			}

			public function getNomchien(){
				return $this->nomChien;
			}

			public function getRace(){
				return $this->race;
			}

			public function getSexe(){
				return $this->sexe;
			}

			public function getDateNaissance(){
				return $this->dateNaissance;
			}

			public function getRobe(){
				return $this->robe;
			}

			public function getSterilisation(){
				return $this->sterilisation;
			}
			public function getDateAccueil(){
				return $this->dateAccueil;
			}

			public function getNomAncienProprio(){
				return $this->nomAncienProprio;
			}

			public function getIDFamille(){
				return $this->idFamille;
			}

}

?>
