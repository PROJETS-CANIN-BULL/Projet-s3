<?php
require_once(File::build_path(array("model", "Model.php")));


class ModelFamilleAccueil
{
    private $civilite;
    private $nomFamilleAccueil;
    private $prenomFamilleAccueil;
    private $mail;
    private $numTelephone;
    private $adresseFamilleAccueil;
    private $codePostalFamilleAccueil;
    private $villeFamilleAccueil;
    private $paysFamilleAccueil;


    public function __construct($civilite = NULL, $nom = NULL, $prenom = NULL, $mail = NULL, $num = NULL, $adresseFamilleAccueil = NULL, $codePostalFamilleAccueil = NULL, $villeFamilleAccueil = NULL, $paysFamilleAccueil = NULL)
    {
        if (!is_null($civilite) && !is_null($nom) && !is_null($prenom) && !is_null($mail) && !is_null($num) && !is_null($adresseFamilleAccueil) && !is_null($codePostalFamilleAccueil) && !is_null($villeFamilleAccueil) && !is_null($paysFamilleAccueil)) {
            $this->civilite = $civilite;
            $this->nomFamilleAccueil = $nom;
            $this->prenomFamilleAccueil = $prenom;
            $this->mail = $mail;
            $this->numTelephone = $num;
            $this->adresseFamilleAccueil = $adresseFamilleAccueil;
            $this->codePostalFamilleAccueil = $codePostalFamilleAccueil;
            $this->villeFamilleAccueil = $villeFamilleAccueil;
            $this->paysFamilleAccueil = $paysFamilleAccueil;


        }
    }

    public static function ajouterFamilleAccueil($data)
    {
        $sql = "INSERT INTO FamilleAccueil( `civilite`, `nomFamilleAccueil`, `prenomFamilleAccueil`, `mail`, `numTelephone`, `adresseFamilleAccueil`, `codePostalFamilleAccueil`, `villeFamilleAccueil`, `paysFamilleAccueil`) VALUES (:tag,:tag2,:tag3,:tag4,:tag5,:tag6,:tag7,:tag8,:tag9)";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "tag" => $data["civilite"],
            "tag2" => $data["nomFamilleAccueil"],
            "tag3" => $data["prenomFamilleAccueil"],
            "tag4" => $data["mail"],
            "tag5" => $data["numTelephone"],
            "tag6" => $data["adresseFamilleAccueil"],
            "tag7" => $data["codePostalFamilleAccueil"],
            "tag8" => $data["villeFamilleAccueil"],
            "tag9" => $data["paysFamilleAccueil"],
        );
        $req_prep->execute($values);


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
    public function getCivilite()
    {
        return $this->civilite;
    }

    public function getNomFamille()
    {
        return $this->nomFamille;
    }

    public function getPrenomFamille()
    {
        return $this->prenomFamille;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getNumTelephone()
    {
        return $this->numTelephone;
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
