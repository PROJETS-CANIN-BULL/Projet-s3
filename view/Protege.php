<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Bull's Friends Association </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/commun.css" rel="stylesheet" type="text/css">
    <link href="css/Protege.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.rtl.css" type="text/css">
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>


</head>
<body>
    <header>
      <div class ="row">
  <div class="container text-center">
    <h2>Bull's Friends</h2>
  </div>
  <div class="container">
    <nav>
        <ul id="menu">
          <li><a href="index.php?action=accueil"><img src="insérer l'emplacement de l'image ici" title="logo" alt="logo"></a></li>
          <li><a href="index.php?action=Adopter">A Adopter</a></li>
          <li><a href="index.php?action=Protege">Les protégés</a></li>
          <li><a href="index.php?action=Frais">Frais</a></li>
          <li><a href="index.php?action=FAQ">FAQ</a></li>
          <li><a href="index.php?action=Contact">Contact</a></li>
          <li><a href="">Rechercher</a></li>
        </ul>
    </nav>


    </header>
    <main>
      <div class="container-fluid red">
    <div class="container text-center">
      <h2> Les protégés</h2>

    </div>
      <div class="container-fluid blue">
        <div class="row">
          <article class="col-2">
            <div>
            <p>Cliquez sur le bouton ci-dessous pour ajouter un Portégé: </p>
            <button class="btn" type="button">Ajouter un Protégé</button>
          </div>
          <div>
            <p>Cliquez sur le bouton ci-dessous pour ajouter une Facture : </p>
            <button class="btn" type="button">Ajouter une Facture</button>
          </div>
          </article>
          <article class="col-10">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">Trier par</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="index.php?action=trierNoms" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nom</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?action=trierNoms">Croissant</a></li>
                        <li><a class="dropdown-item" href="index.php?action=trierNomsDecroissants">Decroissant</a></li></ul></li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php?action=trierNumPuces" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Numero Puce</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?action=trierNumPuces">Croissant</a></li>
                        <li><a class="dropdown-item" href="index.php?action=trierNumPucesDecroissants">Decroissant</a></li>  </ul></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="index.php?action=trierRaces" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Race</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?action=trierRaces">Croissant</a></li>
                        <li><a class="dropdown-item" href="index.php?action=trierRacesDecroissants">Decroissant</a></li></ul>  </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="index.php?action=trierDateNaissances" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Date Naissance</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?action=trierDateNaissances">Croissant</a></li>
                        <li><a class="dropdown-item" href="index.php?action=trierDateNaissancesDecroissants">Decroissant</a></li></ul>  </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="index.php?action=trierSexes" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sexe</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?action=trierSexes">Croissant</a></li>
                        <li><a class="dropdown-item" href="index.php?action=trierSexesDecroissants">Decroissant</a></li>  </ul>  </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="index.php?action=trierRobes" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Robe</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?action=trierRobes">Croissant</a></li>
                        <li><a class="dropdown-item" href="index.php?action=trierRobesDecroissants">Decroissant</a></li></ul></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="index.php?action=trierSterilisations" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sterelisation</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?action=trierSterilisations">Croissant</a></li>
                        <li><a class="dropdown-item" href="index.php?action=trierSterilisationDecroissants">Decroissant</a></li></ul></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="index.php?action=trierDateAccueils" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Date Accueil</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?action=trierDateAccueils">Croissant</a></li>
                        <li><a class="dropdown-item" href="index.php?action=trierDateAccueilsDecroissants">Decroissant</a></li></ul></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="index.php?action=trierNomAncienProprio" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nom Ancien Proprietaire</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?action=trierNomAncienProprio">Croissant</a></li>
                        <li><a class="dropdown-item" href="index.php?action=trierNomAncienProprioDecroissant">Decroissant</a></li>  </ul></li>
                      </ul>
                    </div>
                  </div>
                </nav>

              <?php
              foreach ($chien as $c){
                echo "<ul><li> Nom du chien : ".$c->getNomchien()." </li>";
                echo "<li> Date de Naissance : ".$c->getDateNaissance()." </li> ";
                echo "<li> Race : ".$c->getRace()."</li>";
                echo "<li> Sexe : ".$c->getSexe()."</li>";
                echo "<li> Robe : ".$c->getRobe()."</li>";
                echo "<li> Sterelisation : ".$c->getSterilisation()."</li>";
                echo "<li> Date début accueil : ".$c->getDateAccueil()."</li></ul>";}
               ?>

          </article>

        </div>
      </div>
    </div>

    </main>
    <footer>
    </footer>

</body>
</html>
