<head>
    <link href="css/accueil.css" rel="stylesheet" type="text/css">
</head>

<div class="container-fluid red">
    <div class="container text-center">
        <h2> Bull's Association</h2>
    </div>
    <div class="container-fluid blue">
        <div class="row">
            <article class="col-2">
                <div>
                    <p>Cliquez sur le bouton ci-dessous pour ajouter un Portégé: </p>
                    <button class="btn left" type="button"
                            onclick=" location.href = 'index.php?controller=Chien&action=formulaireChien';">Ajouter un
                        Protégé
                    </button>
                </div>
                <?php

                if ($_SESSION['isAdmin'] == 1) {
                    ?>

                    <div>

                        <p>Cliquez sur le bouton ci-dessous pour ajouter une Facture : </p>
                        <button class="btn left" type="button"
                                onclick=" location.href = 'index.php?controller=Facture&action=formulaireFacture'">
                            Ajouter
                            une Facture
                        </button>
                    </div>
                <?php } ?>
               </article>
            <article class="col-10">
                <div class="accueil">
                    <h2> Compte </h2>
                    <p>Votre pseudo est : <?php echo htmlspecialchars($u->getId()) ?></p>
                    <p>Votre mail est : <?php echo htmlspecialchars($u->getMail()) ?></p>
                    <button class="btn left" type="button"
                            onclick=" location.href = 'index.php?controller=Utilisateur&action=modificationCompte'">
                        Formulaire
                    </button>

            </article>

        </div>
    </div>
</div>

</main>