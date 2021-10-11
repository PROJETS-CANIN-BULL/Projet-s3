<?php
require_once (File::build_path(array("model","Model.php")));

class ModelVeto {
    private $nomVeto;
    private $numTelephoneVeto;




    public function __construct($nomVeto = NULL, $numTelephoneVeto = NULL) {
  		if (!is_null($nomVeto) && !is_null($numTelephoneVeto)) {
    		$this->nomVeto = $nomVeto;
    		$this->numTelephoneVeto = $numTelephoneVeto;

  		}
	}

	public static function ajouterVeto($data) {
		$sql = "INSERT INTO `Veterinaire`(`idVeto`, `nomVeto`, `numTelephoneVeto`) VALUES (:tag,:tag2)";
		$req_prep = Model::getPDO()->prepare($sql);

   		$values = array(
       		"tag" => $data["nomVeto"],
        	"tag2" => $data["numTelephoneVeto"]
    );
    	$req_prep->execute($values);



	}

	public static function modofierNom($data) {
	}


	public static function modifierNumTelephone($data) {
	}

  public function getNomVeto(){
      return $this->nomVeto;
    }

  public function getNumTelephoneVeto(){
      return $this->numTelephoneVeto;
    }

}

?>
