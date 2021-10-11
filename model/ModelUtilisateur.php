<?php
require_once (File::build_path(array("model","Model.php")));


class ModelUtilisateur {
		private $id;
    private $mail;
    private $password;

    public function __construct($i = NULL, $c = NULL, $p = NULL) {
  		if (!is_null($i) && !is_null($c) && !is_null($p)) {
   			$this->id = $i;
    		$this->mail = $c;
    		$this->password = $p;

  		}
	}

	public static function verfierUtilisateur($data) {
	$sql = "SELECT * from Utilisateur WHERE pseudo=:nom_tag AND motDePasse=:nom_tag2";
    // Préparation de la requête
    $req_prep = Model::getPDO()->prepare($sql);

    $values = array(
        "nom_tag" => $data["id"],
        "nom_tag2" => $data["password"]
    );

    $req_prep->execute($values);

    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
    $utilisateur = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($utilisateur))
        return false;
    return $utilisateur[0];
    }

    public static function creerUtilisateur($data)
    {
        $sql = "INSERT INTO `Utilisateur`(`pseudo`, `motDePasse`, `mail`) VALUES (:tag,:tag2,:tag3) ";
    $req_prep = Model::getPDO()->prepare($sql);

    $values = array(
        "tag" => $data["id"],
        "tag2" => $data["password"],
        "tag3"=> $data["mail"]
    );
    $req_prep->execute($values);

    }
		public function getId(){
			return $this->id;
		}

		public function getMail(){
			return $this->mail;
		}


}
?>
