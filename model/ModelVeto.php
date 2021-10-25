<?php
require_once(File::build_path(array("model", "Model.php")));

class ModelVeto
{
    private $nomVeto;
    private $numTelephoneVeto;
    private $adresseVeto;
    private $codePostalVeto;
    private $villeVeto;
    private $paysVeto;


    public function __construct($nomVeto = NULL, $numTelephoneVeto = NULL, $adresseVeto = NULL, $codePostalVeto = NULL, $villeVeto = NULL, $paysVeto = NULL)
    {
        if (!is_null($nomVeto) && !is_null($numTelephoneVeto) && !is_null($adresseVeto) && !is_null($codePostalVeto) && !is_null($villeVeto) && !is_null($paysVeto)) {
            $this->nomVeto = $nomVeto;
            $this->numTelephoneVeto = $numTelephoneVeto;
            $this->adresseVeto = $adresseVeto;
            $this->codePostalVeto = $codePostalVeto;
            $this->villeVeto = $villeVeto;
            $this->paysVeto = $paysVeto;

        }
    }

    public static function ajouterVeto($data)
    {
        $sql = "INSERT INTO `Veterinaire`(`idVeto`, `nomVeto`, `numTelephoneVeto`,`adresseVeto`, `codePostalVeto`, `villeVeto`, `paysVeto`) VALUES (:tag,:tag2,:tag3,:tag4,:tag5,:tag6)";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "tag" => $data["nomVeto"],
            "tag2" => $data["numTelephoneVeto"],
            "tag6" => $data["adresseVeto"],
            "tag7" => $data["codePostalVeto"],
            "tag8" => $data["villeVeto"],
            "tag9" => $data["paysVeto"],
        );
        $req_prep->execute($values);


    }

    public static function modofierNom($data)
    {
    }


    public static function modifierNumTelephone($data)
    {
    }

    public function getNomVeto()
    {
        return $this->nomVeto;
    }

    public function getNumTelephoneVeto()
    {
        return $this->numTelephoneVeto;
    }

    public function getAdresseVeto()
    {
        return $this->adresseVeto;
    }

    public function getCodePostalVeto()
    {
        return $this->codePostalVeto;
    }

    public function getVilleVeto()
    {
        return $this->villeVeto;
    }

    public function getPaysVeto()
    {
        return $this->paysVeto;
    }


}

?>
