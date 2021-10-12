<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Bull's Friends Association </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/commun.css" rel="stylesheet" type="text/css">
    <link href="css/Frais.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

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
              <p>Cliquez sur le bouton ci-dessous pour ajouter un Portégé: </p>
              <button class="btn" type="button">Ajouter un Protégé</button>
            </div>
            <div>
              <p>Cliquez sur le bouton ci-dessous pour ajouter une Facture : </p>
              <button class="btn" type="button">Ajouter une Facture</button>
            </div>
            </article>
            <article class="col-10">
              <?php
              foreach ($frais as $f){
                echo "<ul><li> NumFacture : ".$f->getNumFacture()." </li>";
                echo "<li> Type : ".$f->getType()." </li> ";
                echo "<li> Motif : ".$f->getMotif()."</li>";
                echo "<li> cout : ".$f->getCout()."</li>";
                echo "<li> Date : ".$f->getDateFacture()."</li>";
                echo "<li> Crediteur : ".$f->getCrediteur()."</li>";
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
