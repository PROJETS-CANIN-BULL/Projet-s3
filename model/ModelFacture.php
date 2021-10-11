<?php
require_once (File::build_path(array("Model.php")));


class ModelFacture {
    private $numFacture;
    private $numPuce;
    private $type;
    private $motif;
    private $cout;
    private $dateFacture;
    private $crediteur;
    private $numVeto;




    public function __construct($num = NULL, $numPuce = NULL, $type = NULL,$motif = NULL, $cout = NULL, $dateFacture = NULL,$crediteur = NULL, $numVeto = NULL) {
  		if (!is_null($num) && !is_null($numPuce) && !is_null($type) &&!is_null($motif) && !is_null($cout) && !is_null($dateFacture) &&!is_null($crediteur) && !is_null($numVeto)){
   			$this->numFacture = $num;
    		$this->numPuce = $numPuce;
    		$this->type = $type;
    		$this->motif = $motif;
    		$this->cout = $cout;
    		$this->dateFacture = $dateFacture;
    		$this->crediteur = $crediteur;
    		$this->numVeto = $numVeto;
  		}
	}

	public static function ajouterFacture($data) {
		$sql = "INSERT INTO `Frais`(`numFacture`, `numPuce`, `type`, `motif`, `cout`, `dateFacture`, `crediteur`, `numVeto`) VALUES (:tag,:tag2,:tag3,:tag4,:tag5,:tag6,:tag7,:tag8)";
		$req_prep = Model::getPDO()->prepare($sql);

   		$values = array(
       		"tag" => $data["numFacture"],
        	"tag2" => $data["numPuce"],
        	"tag3" => $data["type"],
        	"tag4" => $data["motif"],
        	"tag5" => $data["cout"],
        	"tag6" => $data["dateFacture"],
        	"tag7" => $data["crediteur"],
        	"tag8" => $data["numVeto"],
    );
    	$req_prep->execute($values);



	}

	public static function modifierCout($data) {
	}

	public static function modifierDate($data) {
	}

}

?>