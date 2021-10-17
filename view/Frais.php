<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Bull's Friends Association </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/commun.css" rel="stylesheet" type="text/css">
    <link href="css/Frais.css" rel="stylesheet" type="text/css">
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
          <h2> Frais</h2>
        </div>

          <div class="container-fluid blue">
          <div class="row">
            <article class="col-2">

            <div>
              <p>Cliquez sur le bouton ci-dessous pour ajouter une Facture : </p>
              <button class="btn" type="button" onclick="location.href = 'index.php?action=formulaireFacture';">Ajouter une Facture</button>
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
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierFacturesNums" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Numero de Facture</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesNums">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesNumsDecroissants">Decroissant</a></li></ul></li>
                          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="index.php?action=trierFacturesTypes" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Type Facture</a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesTypes">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesTypesDecroissants">Decroissant</a></li>  </ul></li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierFacturesMotifs" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Motif</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesMotifs">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesMotifsDecroissants">Decroissant</a></li></ul>  </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierFacturesCouts" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cout</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesCouts">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesCoutsDecroissants">Decroissant</a></li></ul>  </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierFacturesDateFactures" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Date</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesDateFactures">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesDateFacturesDecroissants">Decroissant</a></li>  </ul>  </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierFacturesCrediteurs" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Crediteur</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesCrediteurs">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesCrediteursDecroissants">Decroissant</a></li></ul></li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierFacturesNumPuces" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Numero Puce</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesNumPuces">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierFacturesNumPucesDecroissants">Decroissant</a></li></ul></li>
                            </ul>
                          </div>
                        </div>
                      </nav>


              <?php
              foreach ($frais as $f){
                echo "<ul><li> NumFacture : ".$f->getNumFacture()." </li>";
                echo "<li> Type : ".$f->getType()." </li> ";
                echo "<li> Motif : ".$f->getMotif()."</li>";
                echo "<li> cout : ".$f->getCout()."</li>";
                echo "<li> Date : ".$f->getDateFacture()."</li>";
                echo "<li> Crediteur : ".$f->getCrediteur()."</li></ul>";
              }

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
