<main>
    <div class="container-fluid red">
        <div class="container text-center">
            <h2> <?php echo $titre; ?></h2>

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
                                onclick=" location.href = 'index.php?controller=Facture&action=formulaireFamilleAccueil'">
                            Formulaire
                        </button>
                    </div>
                </article>
                <article class="col-10">
                    <p>La Facture a bien été <?php echo $message ?></p>
                    <div>
                        <p> Pour retourner sur la page de Facture: <a
                                    href="index.php?controller=Facture&action=Facture"> Facture </a></p>
                    </div>
                    <p> Pour retourner sur la page d'accueil: <a href="index.php?action=accueil"> Accueil </a></p>


                </article>

            </div>
        </div>
    </div>

</main>
