<head>
    <link href="css/Contact.css" rel="stylesheet" type="text/css">
</head>
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
            <button class="btn left" type="button"  onclick="location.href ='index.php?action=formulaireFacture';">Ajouter une Facture</button>
          </div>
          </article>
          <article class="col-10">

            <form class="centrer" action="index.php" method="post" enctype="multipart/form-data">
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

                    <div class="input">
                        <span class="inputItem">Ajouter un pdf *</span>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                        <input type="file" class="inputField" id="description" name="description" required >
                    </div>

                </fieldset>
                <div class="input" id="send">
                  <input type="submit" value="Envoyer" >
                  <input type='hidden' accept='pdf' name='action' value='ajouterFacture'>
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
