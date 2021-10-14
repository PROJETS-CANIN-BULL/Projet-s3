<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Bull's Friends Association </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/commun.css" rel="stylesheet" type="text/css">
    <link href="css/Adopter.css" rel="stylesheet" type="text/css">
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
              <h2> A ADOPTER</h2>
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
