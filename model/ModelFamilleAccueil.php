<?php
require_once(File::build_path(array("model", "Model.php")));


class ModelFamilleAccueil
{
    private $idFamilleAccueil;
    private $civilite;
    private $nomFamilleAccueil;
    private $prenomFamilleAccueil;
    private $mail;
    private $telephoneMobile;
    private $telephoneFixe;
    private $adresseFamilleAccueil;
    private $codePostalFamilleAccueil;
    private $villeFamilleAccueil;
    private $paysFamilleAccueil;


    public function __construct($idFamilleAccueil = NULL, $civilite = NULL, $nom = NULL, $prenom = NULL, $mail = NULL, $telephoneMobile = NULL, $telephoneFixe = NULL, $adresseFamilleAccueil = NULL, $codePostalFamilleAccueil = NULL, $villeFamilleAccueil = NULL, $paysFamilleAccueil = NULL)
    {
        if (!is_null($idFamilleAccueil) && !is_null($civilite) && !is_null($nom) && !is_null($prenom) && !is_null($mail) && !is_null($telephoneMobile) && !is_null($telephoneFixe) && !is_null($adresseFamilleAccueil) && !is_null($codePostalFamilleAccueil) && !is_null($villeFamilleAccueil) && !is_null($paysFamilleAccueil)) {
            $this->idFamilleAccueil = $idFamilleAccueil;
            $this->civilite = $civilite;
            $this->nomFamilleAccueil = $nom;
            $this->prenomFamilleAccueil = $prenom;
            $this->mail = $mail;
            $this->telephoneMobile = $telephoneMobile;
            $this->telephoneFixe = $telephoneFixe;
            $this->adresseFamilleAccueil = $adresseFamilleAccueil;
            $this->codePostalFamilleAccueil = $codePostalFamilleAccueil;
            $this->villeFamilleAccueil = $villeFamilleAccueil;
            $this->paysFamilleAccueil = $paysFamilleAccueil;


        }
    }

    public static function ajouterFamilleAccueil($data)
    {
        try {


            $sql = "INSERT INTO FamilleAccueil( `civilite`, `nomFamilleAccueil`, `prenomFamilleAccueil`, `mail`, `telephoneMobile`,`telephoneFixe`, `adresseFamilleAccueil`, `codePostalFamilleAccueil`, `villeFamilleAccueil`, `paysFamilleAccueil`) VALUES (:tag,:tag2,:tag3,:tag4,:tag5,:tag6,:tag7,:tag8,:tag9,:tag10)";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "tag" => $data["civilite"],
                "tag2" => $data["nomFamilleAccueil"],
                "tag3" => $data["prenomFamilleAccueil"],
                "tag4" => $data["mail"],
                "tag5" => $data["telephoneMobile"],
                "tag6" => $data["telephoneFixe"],
                "tag7" => $data["adresseFamilleAccueil"],
                "tag8" => $data["codePostalFamilleAccueil"],
                "tag9" => $data["villeFamilleAccueil"],
                "tag10" => $data["paysFamilleAccueil"]
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if ($e->getCode() == 22007) {
                return false;
            } else if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getFamilleAccueilByNom($info)
    {
        $sql = "SELECT * FROM FamilleAccueil WHERE nomFamilleAccueil=:tag";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array(
            "tag" => $info
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelFamilleAccueil');
        $tab_famille = $req_prep->fetchAll();
        if (empty($tab_famille))
            return false;
        return $tab_famille[0];
    }

    public static function getAllFamilleAccueil()
    {

        $PDO = Model::getPDO();
        $rep = $PDO->query("SELECT * FROM FamilleAccueil");
        $rep->setFetchMode(PDO::FETCH_CLASS, "ModelFamilleAccueil");
        $famille = $rep->fetchAll();

        if (empty($famille))
            return false;
        return $famille;

    }

    public static function modofierNomAccueil($data)
    {
    }

    public static function modifierPrenomAccueil($data)
    {
    }

    public static function modifierNumTelephone($data)
    {
    }


    //Getter
    public function getIdFamilleAccueil()
    {
        return $this->idFamilleAccueil;
    }

    public function getCivilite()
    {
        return $this->civilite;
    }

    public function getNomFamilleAccueil()
    {
        return $this->nomFamilleAccueil;
    }

    public function getPrenomFamilleAccueil()
    {
        return $this->prenomFamilleAccueil;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getTelephoneMobile()
    {
        return $this->telephoneMobile;
    }


    public function getTelephoneFixe()
    {
        return $this->telephoneFixe;
    }


    public function getAdresseFamilleAccueil()
    {
        return $this->adresseFamilleAccueil;
    }

    public function getCodePostalFamilleAccueil()
    {
        return $this->codePostalFamilleAccueil;
    }

    public function getVilleFamilleAccueil()
    {
        return $this->villeFamilleAccueil;
    }

    public function getPaysFamilleAccueil()
    {
        return $this->paysFamilleAccueil;
    }

}

?>
