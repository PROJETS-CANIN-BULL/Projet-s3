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

            <form action="index.php" method="get">
                <fieldset>
                    <legend>Ajouter une Facture</legend>
                    <div class="input">
                        <span class="inputItem"> Numero de Puce*</span>
                        <input class="inputField" id="numPuce" name="numPuce" required type="text">
                    </div>
                    <div class="input">
                        <span class="inputItem">Nom du chien *</span>
                        <input class="inputField" id="nomChien" name="nomChien" required type="text">
                    </div>
                    <div class="input">
                        <span class="inputItem">Race *</span>
                        <input class="inputField" id="race" name="race" required type="text">
                    </div>
                    <div class="input">
                        <span class="inputItem">Date de Naissance : (Sous la forme AAAA-MM-JJ) *</span>
                        <input class="inputField" id="dateNaissance" name="dateNaissance" placeholder="AAAA-MM-JJ" required type="text">
                    </div>
                    <div class="input">
                      <span class="inputItem"> Sexe *</span>
                      <select class="inputField" id="sexe" name="sexe">
                          <option value="feminin">Feminin</option>
                          <option selected value="masculin">Masculin</option>
                      </select>

                    </div>
                    <div class="input">
                        <span class="inputItem">Robe *</span>
                        <input class="inputField" id="robe" name="robe" required type="text">
                    </div>
                    <div class="input">
                      <span class="inputItem"> Sterelisation *</span>
                      <select class="inputField" id="sterilisation" name="sterilisation">
                          <option value="oui">Oui</option>
                          <option selected value="non">Non</option>
                      </select>
                    </div>

                    <div class="input">
                        <span class="inputItem">Date d'accueil : (Sous la forme AAAA-MM-JJ) *</span>
                        <input class="inputField" id="dateAccueil" name="dateAccueil"  placeholder="AAAA-MM-JJ" required type="text">
                    </div>
                    <div class="input">
                        <span class="inputItem">Nom de l'ancien Proprietaire</span>
                        <input class="inputField" id="nomAncienProp" name="conomAncienProput"  type="text">
                    </div>
                    <div class="input">
                        <span class="inputItem">Description de l'animal *</span>
                        <input class="inputField" id="description"  placeholder="description de 500 caractères"  name="description" required type="text">
                    </div>
                </fieldset>
                <div class="input" id="send">
                  <input type="submit" value="Envoyer" />
                  <input type='hidden' name='action' value='ajouterChien'>
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
