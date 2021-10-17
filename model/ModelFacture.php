<?php
require_once (File::build_path(array("model","Model.php")));
require_once (File::build_path(array("model","ModelVeto.php")));
require_once (File::build_path(array("model","ModelChien.php")));




class ModelFacture {
    private $numFacture;
    private $numPuce;
    private $type;
    private $motif;
    private $cout;
    private $dateFacture;
    private $crediteur;
    private $numVeto;
    private $nomchien;




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
		$sql = "INSERT INTO `Frais`(`numFacture`, `numPuce`, `type`, `motif`, `cout`, `dateFacture`, `crediteur`) VALUES (:tag,:tag2,:tag3,:tag4,:tag5,:tag6,:tag7)";
		$req_prep = Model::getPDO()->prepare($sql);

   		$values = array(
       		"tag" => $data["numFacture"],
        	"tag2" => $data["numPuce"],
        	"tag3" => $data["type"],
        	"tag4" => $data["motif"],
        	"tag5" => $data["cout"],
        	"tag6" => $data["dateFacture"],
        	"tag7" => $data["crediteur"],
    );
    	$req_prep->execute($values);
	}

  public static function getAllFacture(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }

	public static function modifierCout($data) {
	}

	public static function modifierDate($data) {
	}

  //Methode pour trier les factures selon numero, numero de puce, type, motif, cout, date, getCrediteur
  // dans l'ordre croissant et Decroissants
  public static function getAllFacturesNums(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY numFacture" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesNumsDecroissants(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY numFacture DESC" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }

  public static function getAllFacturesNumPuces(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY numPuce" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesNumPucesDecroissants(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY numPuce DESC" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesTypes(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY type" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesTypesDecroisants(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY type DESC" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesMotifs(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY motif" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesMotifsDecroissants(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY motif DESC" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesCouts(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY cout" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }

  public static function getAllFacturesCoutsDecroissants(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY cout DESC" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesDateFactures(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY dateFacture" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesDateFacturesDecroissants(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY dateFacture DESC" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesCrediteurs(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY crediteur" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }
  public static function getAllFacturesCrediteursDecroisants(){
    try{
        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM Frais ORDER BY crediteur DESC" );
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFacture");
        $frais = $rep->fetchAll();
        return $frais;

    } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
  }




  //Getter
    public function getNumpuce(){
      return $this->numPuce;
    }

    public function getNumFacture(){
      return $this->numFacture;
    }

    public function getType(){
      return $this->type;
    }

    public function getMotif(){
      return $this->motif;
    }

    public function getCout(){
      return $this->cout;
    }

    public function getDateFacture(){
      return $this->dateFacture;
    }

    public function getCrediteur(){
      return $this->crediteur;
    }
    public function getNumVeto(){
      return $this->numVeto;
    }

    public function getNomchien(){
      return $this->nomchien;
    }



}

?>
