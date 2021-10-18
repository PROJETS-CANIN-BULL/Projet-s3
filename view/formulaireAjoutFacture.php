<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Bull's Friends Association </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/commun.css" rel="stylesheet" type="text/css">
    <link href="css/Contact.css" rel="stylesheet" type="text/css">
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

            <form action="index.php" method="get">
                <fieldset>
                    <legend>Ajouter une Facture</legend>
                    <div class="input">
                        <span class="inputItem">Numero de Facture *</span>
                        <input class="inputField" id="numFacture" name="numFacture" required type="text">
                    </div>
                    <div class="input">
                        <span class="inputItem">Numero de Puce de l'animal Concerné *</span>
                        <input class="inputField" id="numPuce" name="numPuce" required type="text">
                    </div>
                    <div class="input">
                      <span class="inputItem"> Type de Facture *</span>
                      <select class="inputField" id="type" name="type">
                          <option value="veterinaire">Vétérinaire</option>
                          <option selected value="nourriture">Nourriture</option>
                          <option value="kilometrique">Kilométrique</option>
                          <option  value="autre">Autres</option>
                      </select>

                    </div>
                    <div class="input">
                        <span class="inputItem">Motif *</span>
                        <input class="inputField" id="motif" name="motif" required type="text">
                    </div>
                    <div class="input">
                        <span class="inputItem">Cout *</span>
                        <input class="inputField" id="cout" name="cout" placeholder="00,00" required type="text">
                    </div>
                    <div class="input">
                        <span class="inputItem">Date Facture : (Sous la forme AAAA-MM-JJ) *</span>
                        <input class="inputField" id="dateFacture" name="dateFacture"  placeholder="AAAA-MM-JJ" required type="text">
                    </div>
                    <div class="input">
                        <span class="inputItem">Nom du Créditeur *</span>
                        <input class="inputField" id="crediteur" name="crediteur" required type="text">
                    </div>
                </fieldset>
                <fieldset>
                    <div class="input">
                        <span class="inputItem">Ajouter un pdf *</span>
                        <input class="inputField" id="description" name="description" required type="text">
                    </div>

                </fieldset>
                <div class="input" id="send">
                  <input type="submit" value="Envoyer" >
                  <input type='hidden' name='action' value='ajouterFacture'>
                </div>
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
