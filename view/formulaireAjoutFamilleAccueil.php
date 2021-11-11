<head>
    <link href="css/Contact.css" rel="stylesheet" type="text/css">
</head>
<main>
    <div class="container-fluid red">
        <div class="container text-center">
            <h2> Devenez Famille Accueil </h2>

        </div>
        <div class="container-fluid blue">
            <div class="row">
                <article class="col-2">

                    <div>
                        <p>Cliquez sur le bouton ci-dessous pour ajouter une Facture : </p>
                        <button class="btn left" type="button"
                                onclick="location.href ='index.php?controller=Facture&action=formulaireFacture';">
                            Ajouter une Facture
                        </button>
                    </div>
                    <div>
                        <p><br>Vous désirez être FAMILLE D'ACCUEIL ? cliquez ci-dessous</p>
                        <button class="btn left" type="button"
                                onclick=" location.href = 'index.php?controller=FamilleAccueil&action=formulaireFamilleAccueil'">
                            Formulaire
                        </button>
                    </div>
                </article>
                <article class="col-10">

                    <form class="centrer" action="index.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="input">
                                <span class="inputItem"> Civilite *</span>
                                <select class="inputField" id="civilite" name="civilite">
                                    <option value="monsieur">Mr</option>
                                    <option selected value="madame">Mme</option>
                                    <option value="autre">Autre</option>
                                </select>

                            </div>

                            <div class="input">
                                <span class="inputItem">Nom *</span>
                                <input class="inputField" id="nomFamilleAccueil" name="nomFamilleAccueil" required
                                       type="text">
                            </div>
                            <div class="input">
                                <span class="inputItem">Prénom *</span>
                                <input class="inputField" id="prenomFamilleAccueil" name="prenomFamilleAccueil" required
                                       type="text">
                            </div>
                            <div class="input">
                                <span class="inputItem">Mail *</span>
                                <input class="inputField" id="mail" name="mail" required type="email">
                            </div>
                            <div class="input">
                                <span class="inputItem">Téléphone Fixe </span>
                                <input class="inputField" id="telephoneFixe" name="telephoneFixe" type="text"
                                       pattern="[0-9]{10}">
                            </div>
                            <div class="input">
                                <span class="inputItem">Téléphone Mobile *</span>
                                <input class="inputField" id="telephoneMobile" name="telephoneMobile" type="text"
                                       pattern="[0-9]{10}" required>
                            </div>
                            <div class="input">
                                <span class="inputItem">Adresse Postale *</span>
                                <input class="inputField" id="adresseFamilleAccueil" name="adresseFamilleAccueil"
                                       required type="text">
                            </div>
                            <div class="input">
                                <span class="inputItem">Code Postal *</span>
                                <input class="inputField" id="codePostalFamilleAccueil" name="codePostalFamilleAccueil"
                                       type="text" pattern="[0-9]{4,5}" required>
                            </div>
                            <div class="input">
                                <span class="inputItem">Ville *</span>
                                <input class="inputField" id="villeFamilleAccueil" name="villeFamilleAccueil" required
                                       type="text">
                            </div>
                            <div class="input">
                                <span class="inputItem">Pays *</span>
                                <input class="inputField" id="paysFamilleAccueil" name="paysFamilleAccueil" required
                                       type="text">
                            </div>
                            <div class="input">
                                <span class="inputItem">Formulaire rempli à : *</span>
                                <input class="inputField" id="lieu" name="lieu" required
                                       type="text" placeholder="Ville">
                            </div>
                            <div class="input">
                                <span class="inputItem">Le : *</span>
                                <input class="inputField" id="dateForm" type="text" name="dateForm"
                                       placeholder="jj/mm/aaaa" pattern="\d{1,2}/\d{1,2}/\d{4}" required>
                            </div>

                            <div class="input">
                                <span class="inputItem"> Chien accueilli *</span>
                                <select class="inputField" id="chienAccueilli" name="chienAccueilli">
                                    <?php
                                    foreach ($chien as $c) {
                                        ?>
                                        <option value="<?php echo htmlspecialchars($c->getNumpuce()); ?>"><?php echo htmlspecialchars($c->getNumpuce()); ?> </option>
                                        <?php
                                    }
                                    ?>


                                </select>
                            </div>
                        </fieldset>
                        <div class="input" id="send">
                            <input type="submit" name="submit" value="Envoyer">
                            <input type='hidden' accept='pdf' name='action' value='ajouterFamilleAccueil'>
                            <input type='hidden' name='action' value='generatePDF'>
                        </div>
                    </form>
                </article>

            </div>
        </div>
    </div>

</main>

