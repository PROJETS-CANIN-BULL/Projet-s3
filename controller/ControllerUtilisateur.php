<?php
require_once (File::build_path(array("model","ModelChien.php")));
require_once (File::build_path(array("model","ModelFacture.php")));
require_once (File::build_path(array("model","ModelFamille.php")));
require_once (File::build_path(array("model","ModelFamilleAccueil.php")));
require_once (File::build_path(array("model","ModelUtilisateur.php")));
require_once (File::build_path(array("model","ModelVeto.php")));


class ControllerUtilisateur {
    public static function seConnecter(){
      require(File::build_path(array("view","Connexion.php")));
    }

    public static function connexion() {
        $data = array(
            'id' => $_GET['id'],
            'password' => $_GET['password']
        );
        if(ModelUtilisateur::verfierUtilisateur($data)==NULL){
            require (File::build_path(array("view","error.php")));

        }else{
            require (File::build_path(array("view","accueil.php")));
        }
    }

    public static function lienCreationCompte(){
      require (File::build_path(array("view","account_creation.php")));
    }
    public static function creationCompte(){
         $data = array(
            'id' => $_GET['id'],
            'password' => $_GET['password'],
            'mail'=> $_GET['mail']
        );
        if(ModelUtilisateur::verfierUtilisateur($data)!=NULL){
            require (File::build_path(array("view","accueil.php")));


        }else{
            ModelUtilisateur::creerUtilisateur($data);
            require (File::build_path(array("view","accueil.php")));
        }
    }

    public static function ajouterChien(){
      $data = array(
         'numPuce' => $_GET['numPuce'],
         'nomChien' => $_GET['nomChien'],
         'race'=> $_GET['race'],
         'dateNaissance' => $_GET['dateNaissance'],
         'sexe' => $_GET['sexe'],
         'robe'=> $_GET['robe'],
         'sterilisation' => $_GET['sterilisation'],
         'dateAccueil'=> $_GET['dateAccueil'],
         'description' => $_GET['description'],
     );
     if($_GET['nomAncienProp']!=null){
       $data['nomAncienProprio'] =$_GET['nomAncienProp'];
     }
     else{
       $data['nomAncienProprio'] ='null';
     }
     ModelChien::ajouterChien($data);
     require(File::build_path(array("view","AjoutChienReussi.php")));

    }

    public static function ajouterFacture(){
      $data = array(
         'numPuce' => $_GET['numPuce'],
         'numFacture' => $_GET['numFacture'],
         'type'=> $_GET['type'],
         'motif' => $_GET['motif'],
         'cout' => $_GET['cout'],
         'dateFacture' => $_GET['dateFacture'],
         'crediteur'=> $_GET['crediteur'],
     );
     ModelFacture::ajouterFacture($data);
     require(File::build_path(array("view","AjoutFactureReussi.php")));
    }

    public static function envoiMail(){
        ModelContact::envoiMail();
        require (File::build_path(array("view","Contact.php")));
    }

    public static function formulaireChien(){
      require(File::build_path(array("view","formulaireAjoutChien.php")));
    }
    public static function formulaireFacture(){
      require(File::build_path(array("view","formulaireAjoutFacture.php")));
    }
    public static function accueil(){
      require(File::build_path(array("view","accueil.php")));
    }
    public static function Protege(){
      $chien = ModelChien::getAllChiens();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function Frais(){
      $frais=ModelFacture::getAllFacture();
      require(File::build_path(array("view","Frais.php")));

    }
    public static function Contact(){
      require(File::build_path(array("view","Contact.php")));
    }
    public static function FAQ(){
      require(File::build_path(array("view","FAQ.php")));
    }
    public static function Adopter(){
      $chien = ModelChien::getChiensNonAdoptes();
      require(File::build_path(array("view","Adopter.php")));
    }

// Trier les chiens par les critères nom, numero puce, nom ancien proprio, race, robe, sexe, sterilisation, date dateNaissance, date dateAccueil
// par ordre croissant et decroissant
    public static function trierNoms(){
      $chien = ModelChien::getAllChiensNoms();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierNomsDecroissants(){
      $chien = ModelChien::getAllChiensNomsDecroissants();
      require(File::build_path(array("view","Protege.php")));
    }

    public static function trierNumPuces(){
      $chien = ModelChien::getAllChiensNumPuces();
      require(File::build_path(array("view","Protege.php")));
    }

    public static function trierNumPucesDecroissants(){
      $chien = ModelChien::getAllChiensNumPucesDecroissants();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierRaces(){
      $chien = ModelChien::getAllChiensRaces();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierRacesDecroissants(){
      $chien = ModelChien::getAllChiensRacesDecroissants();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierDateNaissances(){
      $chien = ModelChien::getAllChiensDateNaissances();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierDateNaissancesDecroissants(){
      $chien = ModelChien::getAllChiensDateNaissancesDecroissants();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierSexes(){
      $chien = ModelChien::getAllChiensSexes();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierSexesDecroissants(){
      $chien = ModelChien::getAllChiensSexesDecroissants();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierRobes(){
      $chien = ModelChien::getAllChiensRobes();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierRobesDecroissants(){
      $chien = ModelChien::getAllChiensRobesDecroissants();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierSterilisations(){
      $chien = ModelChien::getAllChiensSterilisations();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierSterilisationDecroissants(){
      $chien = ModelChien::getAllChiensSterilisationsDecroissants();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierDateAccueils(){
      $chien = ModelChien::getAllChiensDateAccueils();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierDateAccueilsDecroissants(){
      $chien = ModelChien::getAllChiensDateAccueilsDecroissants();
      require(File::build_path(array("view","Protege.php")));
    }
    public static function trierNomAncienProprio(){
      $chien = ModelChien::getAllChiensNomAncienProprio();
      require(File::build_path(array("view","Protege.php")));
    }

    public static function trierNomAncienProprioDecroissant(){
      $chien = ModelChien::getAllChiensNomAncienProprioDecroissant();
      require(File::build_path(array("view","Protege.php")));
    }

    // Trier les chiens par les critères nom, numero puce, nom ancien proprio, race, robe, sexe, sterilisation, date dateNaissance, date dateAccueil
    // par ordre croissant et decroissant
        public static function trierNonAdoptesNoms(){
          $chien = ModelChien::getAllChiensNonAdoptesNoms();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesNomsDecroissants(){
          $chien = ModelChien::getAllChiensNonAdoptesNomsDecroissants();
          require(File::build_path(array("view","Adopter.php")));
        }

        public static function trierNonAdoptesNumPuces(){
          $chien = ModelChien::getAllChiensNonAdoptesNumPuces();
          require(File::build_path(array("view","Adopter.php")));
        }

        public static function trierNonAdoptesNumPucesDecroissants(){
          $chien = ModelChien::getAllChiensNonAdoptesNumPucesDecroissants();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesRaces(){
          $chien = ModelChien::getAllChiensNonAdoptesRaces();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesRacesDecroissants(){
          $chien = ModelChien::getAllChiensNonAdoptesRacesDecroissants();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesDateNaissances(){
          $chien = ModelChien::getAllChiensNonAdoptesDateNaissances();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesDateNaissancesDecroissants(){
          $chien = ModelChien::getAllChiensNonAdoptesDateNaissancesDecroissants();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesSexes(){
          $chien = ModelChien::getAllChiensNonAdoptesSexes();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesSexesDecroissants(){
          $chien = ModelChien::getAllChiensNonAdoptesSexesDecroissants();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesRobes(){
          $chien = ModelChien::getAllChiensNonAdoptesRobes();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesRobesDecroissants(){
          $chien = ModelChien::getAllChiensNonAdoptesRobesDecroissants();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesSterilisations(){
          $chien = ModelChien::getAllChiensNonAdoptesSterilisations();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesSterilisationDecroissants(){
          $chien = ModelChien::getAllChiensNonAdoptesSterilisationsDecroissants();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesDateAccueils(){
          $chien = ModelChien::getAllChiensNonAdoptesDateAccueils();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesDateAccueilsDecroissants(){
          $chien = ModelChien::getAllChiensNonAdoptesDateAccueilsDecroissants();
          require(File::build_path(array("view","Adopter.php")));
        }
        public static function trierNonAdoptesNomAncienProprio(){
          $chien = ModelChien::getAllChiensNonAdoptesNomAncienProprio();
          require(File::build_path(array("view","Adopter.php")));
        }

        public static function trierNonAdoptesNomAncienProprioDecroissant(){
          $chien = ModelChien::getAllChiensNonAdoptesNomAncienProprioDecroissant();
          require(File::build_path(array("view","Adopter.php")));
        }


        //Methode pour trier les factures selon numero, numero de puce, type, motif, cout, date, getCrediteur
        // dans l'ordre croissant et Decroissants
        public static function trierFacturesNums(){
          $frais = ModelFacture::getAllFacturesNums();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesNumsDecroissants(){
          $frais = ModelFacture::getAllFacturesNumsDecroissants();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesNumPuces(){
          $frais = ModelFacture::getAllFacturesNumPuces();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesNumPucesDecroissants(){
          $frais = ModelFacture::getAllFacturesNumPucesDecroissants();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesTypes(){
          $frais = ModelFacture::getAllFacturesTypes();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesTypesDecroissants(){
          $frais = ModelFacture::getAllFacturesTypesDecroisants();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesMotifs(){
          $frais = ModelFacture::getAllFacturesMotifs();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesMotifsDecroissants(){
          $frais = ModelFacture::getAllFacturesMotifsDecroissants();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesCouts(){
          $frais = ModelFacture::getAllFacturesCouts();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesCoutsDecroissants(){
          $frais = ModelFacture::getAllFacturesCoutsDecroissants();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesDateFactures(){
          $frais = ModelFacture::getAllFacturesDateFactures();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesDateFacturesDecroissants(){
          $frais = ModelFacture::getAllFacturesDateFacturesDecroissants();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesCrediteurs(){
          $frais = ModelFacture::getAllFacturesCrediteurs();
          require(File::build_path(array("view","Frais.php")));
        }
        public static function trierFacturesCrediteursDecroissants(){
           $frais = ModelFacture::getAllFacturesCrediteursDecroisants();
          require(File::build_path(array("view","Frais.php")));
        }



}
?>
