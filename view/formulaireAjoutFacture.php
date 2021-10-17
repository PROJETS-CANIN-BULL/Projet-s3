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
      <h2> Ajouter une Facture </h2>

    </div>
      <div class="container-fluid blue">
        <div class="row">
          <article class="col-2">

          <div>
            <p>Cliquez sur le bouton ci-dessous pour ajouter une Facture : </p>
            <button class="btn" type="button"  onclick="location.href ='index.php?action=formulaireFacture';">Ajouter une Facture</button>
          </div>
          </article>
          <article class="col-10">
          <form method="get" action="index.php">
              <fieldset>

                  <p>
                      <label for="numFacture">Numero de Facture</label> :
                      <input type="text" name="numFacture" id="numFacture" required/>
                  </p>
                  <p>
                      <label for="numPuce">Numero de Puce de l'animal Concerné</label> :
                      <input type="text" name="numPuce" id="numPuce" required>
                  </p>
                  <p> Type de Facture :

                      <input type="radio" name="type" id="veterinaire" value="veterinaire">
                      <label for="veterinaire">Vétérinaire</label>
                      <input type="radio" name="type" id="nourriture" value="nourriture" >
                      <label for="nourriture">Nourriture</label>
                      <input type="radio" name="type" id="kilometrique" value="kilometrique" >
                      <label for="kilometrique">Kilométrique</label>
                      <input type="radio" name="type" id="autre" value="autre" checked>
                      <label for="autre">Autres</label>
                  </p>
                  <p>
                      <label for="motif">Motif</label>
                      <input type="text" name="motif" id="motif" required>
                  </p>

                  <p>
                      <label for="cout">Cout</label>
                      <input type="text"placeholder="00,00" name="cout" id="cout" required>
                  </p>

                  <p>
                      <label for="dateFacture">Date Facture : (Sous la forme AAAA-MM-JJ)</label>
                      <input type="text"placeholder="AAAA-MM-JJ" name="dateFacture" id="dateFacture" required>
                  </p>
                  <p>
                      <label for="crediteur">Nom du Créditeur</label> :
                      <input type="text" name="crediteur" id="crediteur">
                  </p>
                  <p>
                      <label for="description">Ajouter un pdf</label> :
                      <input type="text"placeholder="description" name="description" id="description" required>
                  </p>

                  <p>
                      <input type="submit" value="Envoyer" >
                      <input type='hidden' name='action' value='ajouterFacture'>

                  </p>
              </fieldset>
          </form>


          </article>

        </div>
      </div>
    </div>

    </main>
    <footer>
    </footer>

</body>
</html>
