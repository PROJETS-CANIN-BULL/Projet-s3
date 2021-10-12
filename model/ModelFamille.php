<?php
require_once (File::build_path(array("model","Model.php")));



class ModelFamille {
    private $civilite;
    private $nomFamille;
    private $prenomFamille;
    private $mail;
    private $numTelephone;
    private $adresse;
    private $codePostal;
    private $ville;
    private $pays;




    public function __construct($civilite = NULL, $nom = NULL,$prenom = NULL, $mail = NULL, $num = NULL,$adresse = NULL, $codePostal = NULL,$ville = NULL, $pays = NULL) {
  		if (!is_null($civilite) && !is_null($nom) &&!is_null($prenom) && !is_null($mail) && !is_null($num)&& !is_null($adresse) &&!is_null($codePostal) && !is_null($ville) && !is_null($pays)) {
    		$this->civilite = $civilite;
    		$this->nomFamille = $nom;
    		$this->prenomFamille = $prenom;
    		$this->mail = $mail;
    		$this->numTelephone = $num;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->pays = $pays;


  		}
	  }

	 public static function ajouterFamille($data) {
		  $sql = "INSERT INTO `Famille`(`civilite`, `nomFamille`, `prenomFamille`, `mail`, `numTelephone`, `adresse`, `codePostal`, `ville`, `pays`) VALUES (:tag,:tag2,:tag3,:tag4,:tag5,:tag6;:tag7;:tag8;:tag9)";
		  $req_prep = Model::getPDO()->prepare($sql);

   		$values = array(
       		"tag" => $data["civilite"],
        	"tag2" => $data["nomFamille"],
        	"tag3" => $data["prenomFamille"],
        	"tag4" => $data["mail"],
        	"tag5" => $data["numTelephone"],
          "tag6" => $data["adresse"],
          "tag7" => $data["codePostal"],
          "tag8" => $data["ville"],
          "tag9" => $data["pays"],
      );
    	$req_prep->execute($values);
	   }

	   public static function modofierNom($data) {
	    }

	   public static function modifierPrenom($data) {
	    }

	   public static function modifierNumTelephone($data) {
	    }

  //Getter
    public function getCivilite(){
      return $this->civilite;
    }

    public function getNomFamille(){
      return $this->nomFamille;
    }

    public function getPrenomFamille(){
      return $this->prenomFamille;
    }

    public function getMail(){
      return $this->mail;
    }

    public function getNumTelephone(){
      return $this->numTelephone;
    }
    public function getAdresse(){
        return $this->adresse;
      }
    public function getCodePostal(){
        return $this->codePostal;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getPays(){
        return $this->pays;
    }

}

?>
