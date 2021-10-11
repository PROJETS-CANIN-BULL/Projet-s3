<?php
require_once (File::build_path(array("Model.php")));


class ModelFamilleAccueil {
    private $civilite;
    private $nomFamilleAccueil;
    private $prenomFamilleAccuiel;
    private $mail;
    private $numTelephone;




    public function __construct($civilite = NULL, $nom = NULL,$prenom = NULL, $mail = NULL, $num = NULL) {
        if (!is_null($civilite) && !is_null($nom) &&!is_null($prenom) && !is_null($mail) && !is_null($num)) {
            $this->civilite = $civilite;
            $this->nomFamilleAccueil = $nom;
            $this->prenomFamilleAccuiel = $prenom;
            $this->mail = $mail;
            $this->numTelephone = $num;

        }
    }

    public static function ajouterFamilleAccueil($data) {
        $sql = "INSERT INTO `FamilleAccueil`(`civilite`, `nomFamilleAccueil`, `prenomFamilleAccueil`, `mail`, `numTelephone`) VALUES (:tag,:tag2,:tag3,:tag4,:tag5,:tag6)";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "tag" => $data["civilite"],
            "tag2" => $data["nomFamilleAccueil"],
            "tag3" => $data["prenomFamilleAccueil"],
            "tag4" => $data["mail"],
            "tag5" => $data["numTelephone"],
        );
        $req_prep->execute($values);



    }

    public static function modofierNomAccueil($data) {
    }

    public static function modifierPrenomAccueil($data) {
    }

    public static function modifierNumTelephone($data) {
    }

}

?>