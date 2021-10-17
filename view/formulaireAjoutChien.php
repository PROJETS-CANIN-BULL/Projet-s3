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
      <h2> Ajouter un chien </h2>

    </div>
      <div class="container-fluid blue">
        <div class="row">
          <article class="col-2">
            <div>
            <p>Cliquez sur le bouton ci-dessous pour ajouter un Portégé: </p>
            <button class="btn" type="button"  onclick="location.href = 'index.php?action=formulaireChien';">Ajouter un Protégé</button>
          </div>

          </article>
          <article class="col-10">
          <form method="get" action="index.php">
              <fieldset>

                  <p>
                      <label for="numPuce">Numero de Puce</label> :
                      <input type="text" name="numPuce" id="numPuce" required/>
                  </p>
                  <p>
                      <label for="nomChien">Nom du chien</label> :
                      <input type="text" name="nomChien" id="nomChien" required>
                  </p>
                  <p>
                      <label for="race">Race</label> :
                      <input type="text"  name="race" id="race" required>
                  </p>
                  <p>
                      <label for="dateNaissance">Date de Naissance : (Sous la forme AAAA-MM-JJ)</label>
                      <input type="text"placeholder="AAAA-MM-JJ" name="dateNaissance" id="dateNaissance" required>
                  </p>
                  <p> Sexe :

                      <input type="radio" name="sexe" id="feminin" value="feminin" checked>
                      <label for="feminin">Feminin</label>
                      <input type="radio" name="sexe" id="masculin" value="masculin" >
                      <label for="masculin">Masculin</label>

                  </p>
                  <p>
                      <label for="robe">Robe</label>
                      <input type="text" name="robe" id="robe" required>
                  </p>
                  <p> Sterelisation :
                      <input type="radio" name="sterilisation" id="oui" value="oui" checked>
                      <label for="oui">oui</label>
                      <input type="radio" name="sterilisation" id="non" value="non" >
                      <label for="non">non</label>
                  </p>
                  <p>
                      <label for="dateAccueil">Date d'accueil : (Sous la forme AAAA-MM-JJ)</label>
                      <input type="text"placeholder="AAAA-MM-JJ" name="dateAccueil" id="dateAccueil" required>
                  </p>
                  <p>
                      <label for="nomAncienProp">Nom de l'ancien Proprietaire</label> :
                      <input type="text"  name="nomAncienProp" id="nomAncienProp">
                  </p>
                  <p>
                      <label for="description">Description de l'animal</label> :
                      <input type="text"placeholder="description de 500 caractères" name="description" id="description" required>
                  </p>

                  <p>
                      <input type="submit" value="Envoyer" />
                      <input type='hidden' name='action' value='ajouterChien'>

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
