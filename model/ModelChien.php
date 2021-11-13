<?php
require_once(File::build_path(array("model", "Model.php")));


class ModelChien
{
    private $numPuce;
    private $nomChien;
    private $race;
    private $dateNaissance;
    private $sexe;
    private $robe;
    private $sterilisation;
    private $dateAccueil;
    private $nomAncienProprio;
    private $description;
    private $nomPhoto;


    public function __construct($num = NULL, $nom = NULL, $race = NULL, $dateNaiss = NULL, $sexe = NULL, $robe = NULL, $sterilisation = NULL, $dateAccueil = NULL, $nomAncienProp = NULL, $description = NULL)
    {
        if (!is_null($num) && !is_null($nom) && !is_null($race) && !is_null($dateNaiss) && !is_null($sexe) && !is_null($robe) && !is_null($sterilisation) && !is_null($dateAccueil) && !is_null($nomAncienProp) && !is_null($description)) {
            $this->numPuce = $num;
            $this->nomChien = $nom;
            $this->race = $race;
            $this->dateNaissance = $dateNaiss;
            $this->sexe = $sexe;
            $this->robe = $robe;
            $this->sterilisation = $sterilisation;
            $this->dateAccueil = $dateAccueil;
            $this->nomAncienProprio = $nomAncienProp;
            $this->description = $description;


        }
    }

    public static function addChien($data)
    {
        try {
            $sql = "INSERT INTO `Chien`(`numPuce`, `nomChien`, `race`, `dateNaissance`, `sexe`, `robe`, `sterilisation`, `dateAccueil`, `nomAncienProprio`,`description`,`nomPhoto` ) VALUES (:tag,:tag2, :tag3,:tag4,:tag5, :tag6,:tag7,:tag8,:tag9,:tag10,:tag11)";
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
                "tag10" => $data["description"],
                "tag11" => $data["nomPhoto"],

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

    public static function modifierChien($infos){
        try {
            $sql = "UPDATE Chien SET nomChien=:tag2, race=:tag3, dateNaissance=:tag4, sexe=:tag5, robe=:tag6, sterilisation=:tag7, dateAccueil=:tag8, nomAncienProprio=:tag9,description=:tag10 WHERE numPuce=:tag";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "tag" => $infos["numPuce"],
                "tag2" => $infos["nomChien"],
                "tag3" => $infos["race"],
                "tag4" => $infos["dateNaissance"],
                "tag5" => $infos["sexe"],
                "tag6" => $infos["robe"],
                "tag7" => $infos["sterilisation"],
                "tag8" => $infos["dateAccueil"],
                "tag9" => $infos["nomAncienProprio"],
                "tag10" => $infos["description"],
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function supprimerChien($numPuce){
        try {
            $sql = "DELETE FROM Chien WHERE numPuce=:tag";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "tag" => $numPuce,
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getChienByNumPuce($numPuce)
    {
        $sql = "SELECT * FROM Chien WHERE numPuce=:nom_tag";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array(
            "nom_tag" => $numPuce
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS,'ModelChien');
        $tab_chien = $req_prep->fetchAll();
        if (empty($tab_chien))
            return false;
        return $tab_chien[0];
    }



// Renvoie liste chiens non adoptes
    public static function getChiensNonAdoptes()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce )");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }


    public static function getAllChiens()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    //trier par noms
    public static function getAllChiensNoms()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY nomChien");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
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
    public static function getAllChiensNomsDecroissants()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY nomChien DESC");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getChiensNoms($nom)
    {

        $sql = "SELECT * FROM Chien WHERE nomChien=:nom1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom1" => $nom,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }

    public static function getAllChiensNumPuces()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY numPuce");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getAllChiensNumPucesDecroissants()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY numPuce DESC");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getChiensNumPuces($numPuce)
    {

        $sql = "SELECT * FROM Chien WHERE numPuce=:num1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "num1" => $numPuce,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }

    public static function getAllChiensRaces()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY race");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getAllChiensRacesDecroissants()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY race DESC");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }


    public static function getChiensRaces($race)
    {

        $sql = "SELECT * FROM Chien WHERE race=:race1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "race1" => $race,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }

    public static function getAllChiensDateNaissances($data)
    {
        $sql = "SELECT * FROM Chien WHERE dateNaissance>=:datemin AND dateNaissance<=:datemax";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "datemin" => $data["min"],
            "datemax" => $data["max"]
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;


    }


    public static function getAllChiensSexes($sexe)
    {
        $sql = "SELECT * FROM Chien WHERE sexe=:sexe1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "sexe1" => $sexe,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;

    }


    public static function getAllChiensRobes()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY robe");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getAllChiensRobesDecroissants()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY robe DESC");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }


    public static function getChiensRobes($robe)
    {

        $sql = "SELECT * FROM Chien WHERE robe=:robe1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "robe1" => $robe,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }

    public static function getAllChiensSterilisations($avis)
    {

        $sql = "SELECT * FROM Chien WHERE sterilisation=:avis1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "avis1" => $avis,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;


    }


    public static function getAllChiensDateAccueils($data)
    {
        $sql = "SELECT * FROM Chien WHERE dateAccueil>=:datemin AND dateAccueil<=:datemax";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "datemin" => $data["min"],
            "datemax" => $data["max"]
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;

    }


    public static function getAllChiensNomAncienProprio()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY nomAncienProprio  ");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getAllChiensNomAncienProprioDecroissant()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM `Chien` ORDER BY nomAncienProprio DESC ");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getChiensAncienProprio($nomAncienProp)
    {

        $sql = "SELECT * FROM Chien WHERE nomAncienProprio=:nom1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom1" => $nomAncienProp,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }


    // Trier les chiens non adopté par les critères nom, numero puce, nom ancien proprio, race, robe, sexe, sterilisation, date dateNaissance, date dateAccueil
    // par ordre croissant et decroissant
    public static function getAllChiensNonAdoptesNoms()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) ORDER BY nomChien ");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getAllChiensNonAdoptesNomsDecroissants()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) ORDER BY nomChien DESC");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }


    public static function getChiensNonAdoptesNoms($nom)
    {

        $sql = "SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) AND nomChien=:nom1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom1" => $nom,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }


    public static function getAllChiensNonAdoptesNumPuces()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) ORDER BY numPuce");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getAllChiensNonAdoptesNumPucesDecroissants()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) ORDER BY numPuce DESC");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getChiensNonAdoptesNumPuces($numPuce)
    {

        $sql = "SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce )AND numPuce=:num1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "num1" => $numPuce,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }

    public static function getAllChiensNonAdoptesRaces()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) ORDER BY race");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getAllChiensNonAdoptesRacesDecroissants()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) ORDER BY race DESC");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getChiensNonAdoptesRaces($race)
    {

        $sql = "SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) AND race=:race1";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "race1" => $race,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }


    public static function getAllChiensNonAdoptesDateNaissances($data)
    {
        $sql = "SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) AND dateNaissance>=:datemin AND dateNaissance<=:datemax ";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "datemin" => $data["min"],
            "datemax" => $data["max"]
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;


    }

    public static function getAllChiensNonAdoptesSexes($sexe)
    {
        $sql = "SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) AND sexe=:sexe1 ";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "sexe1" => $sexe,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;

    }


    public static function getAllChiensNonAdoptesRobes()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) ORDER BY robe");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getAllChiensNonAdoptesRobesDecroissants()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) ORDER BY robe DESC");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getChiensNonAdoptesRobes($robe)
    {

        $sql = "SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) AND robe=:robe1 ";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "robe1" => $robe,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }

    public static function getAllChiensNonAdoptesSterilisations($avis)
    {

        $sql = "SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) AND sterilisation=:avis1 ";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "avis1" => $avis,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;


    }

    public static function getAllChiensNonAdoptesDateAccueils($data)
    {
        $sql = "SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) AND dateAccueil>=:datemin AND dateAccueil<=:datemax";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "datemin" => $data["min"],
            "datemax" => $data["max"]
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;

    }


    public static function getAllChiensNonAdoptesNomAncienProprio()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) ORDER BY nomAncienProprio  ");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }

    public static function getAllChiensNonAdoptesNomAncienProprioDecroissant()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce )ORDER BY nomAncienProprio DESC ");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelChien");
            $chien = $rep->fetchAll();
            return $chien;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }


    public static function getChiensNonAdoptesAncienProprio($nomAncienProp)
    {

        $sql = "SELECT * FROM Chien c WHERE NOT EXISTS ( SELECT * FROM Adoption WHERE Adoption.numPuce=c.numPuce ) AND nomAncienProprio=:nom1 ";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom1" => $nomAncienProp,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelChien');
        $chiens = $req_prep->fetchAll();
        if (empty($chiens)) {
            return false;
        }
        return $chiens;
    }


    //Getter
    public function getNumpuce()
    {
        return $this->numPuce;
    }

    public function getNomchien()
    {
        return $this->nomChien;
    }

    public function getRace()
    {
        return $this->race;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function getRobe()
    {
        return $this->robe;
    }

    public function getSterilisation()
    {
        return $this->sterilisation;
    }

    public function getDateAccueil()
    {
        return $this->dateAccueil;
    }

    public function getNomAncienProprio()
    {
        return $this->nomAncienProprio;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function getNomPhoto()
    {
        return $this->nomPhoto;
    }

}

?>
