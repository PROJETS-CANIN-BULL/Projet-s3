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
		private $description;




    public function __construct($num = NULL, $nom = NULL, $race = NULL,$dateNaiss = NULL, $sexe = NULL, $robe = NULL,$sterilisation = NULL, $dateAccueil = NULL, $nomAncienProp = NULL, $id=NULL, $description=NULL) {
  		if (!is_null($num) && !is_null($nom) && !is_null($race) &&!is_null($dateNaiss) && !is_null($sexe) && !is_null($robe) &&!is_null($sterilisation) && !is_null($dateAccueil) && !is_null($nomAncienProp) && !is_null($id) && !is_null($description)) {
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
				$this->description= $description;


  		}
	}

	public static function ajouterChien($data) {
		$sql = "INSERT INTO `Chien`(`numPuce`, `nomChien`, `race`, `dateNaissance`, `sexe`, `robe`, `sterilisation`, `dateAccueil`, `nomAncienProprio`,`description` ) VALUES (:tag,:tag2, :tag3,:tag4,:tag5, :tag6,:tag7,:tag8,:tag9,:tag10)";
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
					"tag10"=>$data["description"],
    );
    	$req_prep->execute($values);
	}

	public static function modifierSterilisation($data) {
	}

	public static function modifierIdFamille($data) {
	}

// Renvoie liste chiens non adoptes
	public static function getChiensNonAdoptes(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM Chien WHERE idFamille IS NULL" );
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

//Savoir si un chien est adopte
	public static function adopterChien($data) {

	}


		public static function getAllChiens(){
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
										echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
								}
								die();
						}
		}
		//trier par noms
		public static function getAllChiensNoms(){
			try{
					$PDO = Model::getPDO();
					$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY nomChien");
					$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
					$chien = $rep->fetchAll();
					return $chien;

			} catch(PDOException $e) {
							if (Conf::getDebug()) {
									echo $e->getMessage(); // affiche un message d'erreur
							} else {
									echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
							}
							die();
					}

		}
		// Trier les chiens par les critères nom, numero puce, nom ancien proprio, race, robe, sexe, sterilisation, date dateNaissance, date dateAccueil
		// par ordre croissant et decroissant
	public static function getAllChiensNomsDecroissants(){
			try{
					$PDO = Model::getPDO();
					$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY nomChien DESC");
					$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
					$chien = $rep->fetchAll();
					return $chien;

			} catch(PDOException $e) {
							if (Conf::getDebug()) {
									echo $e->getMessage(); // affiche un message d'erreur
							} else {
									echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
							}
							die();
					}

		}

		public static function getAllChiensNumPuces(){
			try{
					$PDO = Model::getPDO();
					$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY numPuce");
					$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
					$chien = $rep->fetchAll();
					return $chien;

			} catch(PDOException $e) {
							if (Conf::getDebug()) {
									echo $e->getMessage(); // affiche un message d'erreur
							} else {
									echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
							}
							die();
					}

		}

		public static function getAllChiensNumPucesDecroissants(){
			try{
					$PDO = Model::getPDO();
					$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY numPuce DESC");
					$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
					$chien = $rep->fetchAll();
					return $chien;

			} catch(PDOException $e) {
							if (Conf::getDebug()) {
									echo $e->getMessage(); // affiche un message d'erreur
							} else {
									echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
							}
							die();
					}

		}

		public static function getAllChiensRaces(){
			try{
					$PDO = Model::getPDO();
					$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY race");
					$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
					$chien = $rep->fetchAll();
					return $chien;

			} catch(PDOException $e) {
							if (Conf::getDebug()) {
									echo $e->getMessage(); // affiche un message d'erreur
							} else {
									echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
							}
							die();
					}

		}

		public static function getAllChiensRacesDecroissants(){
			try{
					$PDO = Model::getPDO();
					$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY race DESC");
					$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
					$chien = $rep->fetchAll();
					return $chien;

			} catch(PDOException $e) {
							if (Conf::getDebug()) {
									echo $e->getMessage(); // affiche un message d'erreur
							} else {
									echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
							}
							die();
					}

		}

		public static function getAllChiensDateNaissances(){
			try{
					$PDO = Model::getPDO();
					$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY dateNaissance");
					$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
					$chien = $rep->fetchAll();
					return $chien;

			} catch(PDOException $e) {
							if (Conf::getDebug()) {
									echo $e->getMessage(); // affiche un message d'erreur
							} else {
									echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
							}
							die();
					}

		}
		public static function getAllChiensDateNaissancesDecroissants(){
			try{
					$PDO = Model::getPDO();
					$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY dateNaissance DESC");
					$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
					$chien = $rep->fetchAll();
					return $chien;

			} catch(PDOException $e) {
							if (Conf::getDebug()) {
									echo $e->getMessage(); // affiche un message d'erreur
							} else {
									echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
							}
							die();
					}

		}


	public static function getAllChiensSexes(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY sexe");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}
	public static function getAllChiensSexesDecroissants(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY sexe DESC");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

	public static function getAllChiensRobes(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY robe");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

	public static function getAllChiensRobesDecroissants(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY robe DESC");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

	public static function getAllChiensSterilisations(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY sterilisation ");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}
	public static function getAllChiensSterilisationsDecroissants(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY sterilisation DESC ");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}
	public static function getAllChiensDateAccueils(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY dateAccueil ");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}
	}
	public static function getAllChiensDateAccueilsDecroissants(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY dateAccueil DESC ");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}
	public static function getAllChiensNomAncienProprio(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY nomAncienProprio  ");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}
	public static function getAllChiensNomAncienProprioDecroissant(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` ORDER BY nomAncienProprio DESC ");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

	// Trier les chiens non adopté par les critères nom, numero puce, nom ancien proprio, race, robe, sexe, sterilisation, date dateNaissance, date dateAccueil
	// par ordre croissant et decroissant
	public static function getAllChiensNonAdoptesNoms(){
			try{
					$PDO = Model::getPDO();
					$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY nomChien ");
					$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
					$chien = $rep->fetchAll();
					return $chien;

			} catch(PDOException $e) {
							if (Conf::getDebug()) {
									echo $e->getMessage(); // affiche un message d'erreur
							} else {
									echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
							}
							die();
					}

		}
public static function getAllChiensNonAdoptesNomsDecroissants(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY nomChien DESC");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

	public static function getAllChiensNonAdoptesNumPuces(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY numPuce");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

	public static function getAllChiensNonAdoptesNumPucesDecroissants(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY numPuce DESC");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

	public static function getAllChiensNonAdoptesRaces(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY race");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

	public static function getAllChiensNonAdoptesRacesDecroissants(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY race DESC");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}

	public static function getAllChiensNonAdoptesDateNaissances(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY dateNaissance");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}
	public static function getAllChiensNonAdoptesDateNaissancesDecroissants(){
		try{
				$PDO = Model::getPDO();
				$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY dateNaissance DESC");
				$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
				$chien = $rep->fetchAll();
				return $chien;

		} catch(PDOException $e) {
						if (Conf::getDebug()) {
								echo $e->getMessage(); // affiche un message d'erreur
						} else {
								echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
						}
						die();
				}

	}


public static function getAllChiensNonAdoptesSexes(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY sexe");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

	} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					} else {
							echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
					}
					die();
			}

}
public static function getAllChiensNonAdoptesSexesDecroissants(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY sexe DESC");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

	} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					} else {
							echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
					}
					die();
			}

}

public static function getAllChiensNonAdoptesRobes(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY robe");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

	} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					} else {
							echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
					}
					die();
			}

}

public static function getAllChiensNonAdoptesRobesDecroissants(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY robe DESC");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

	} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					} else {
							echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
					}
					die();
			}

}

public static function getAllChiensNonAdoptesSterilisations(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY sterilisation ");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

	} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					} else {
							echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
					}
					die();
			}

}
public static function getAllChiensNonAdoptesSterilisationsDecroissants(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY sterilisation DESC ");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

	} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					} else {
							echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
					}
					die();
			}

}
public static function getAllChiensNonAdoptesDateAccueils(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY dateAccueil ");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

	} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					} else {
							echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
					}
					die();
			}
}
public static function getAllChiensNonAdoptesDateAccueilsDecroissants(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY dateAccueil DESC ");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

	} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					} else {
							echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
					}
					die();
			}

}
public static function getAllChiensNonAdoptesNomAncienProprio(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY nomAncienProprio  ");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

	} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					} else {
							echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
					}
					die();
			}

}
public static function getAllChiensNonAdoptesNomAncienProprioDecroissant(){
	try{
			$PDO = Model::getPDO();
			$rep = $PDO->query("SELECT * FROM `Chien` WHERE idFamille IS NULL ORDER BY nomAncienProprio DESC ");
			$rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
			$chien = $rep->fetchAll();
			return $chien;

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
			public function getDescription(){
				return $this->description;
			}

}

?>
