<main>
    <div class="container-fluid red">
        <div class="container text-center">
            <h2> <?php echo $titre ?> </h2>

        </div>
        <div class="container-fluid blue">
            <div class="row">
                <article class="col-2">

                    <div>
                        <p>Cliquez sur le bouton ci-dessous pour ajouter un Portégé: </p>
                        <button class="btn left" type="button"
                                onclick="location.href = 'index.php?controller=Chien&action=formulaireChien';">Ajouter
                            un Protégé
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
                    <p>Le Chien a bien été  <?php echo $message ?></p>
                    <div>
                        <p> Pour retourner sur la page des Chiens A Adopter: <a
                                    href="index.php?controller=Chien&action=Adopter"> A
                                Adopter </a></p>
                    </div>
                    <div>
                        <p> Pour retourner sur la page de tous les Protégés: <a
                                    href="index.php?controller=Chien&action=Protege"> Les
                                Protégés </a></p>
                    </div>


                </article>

            </div>
        </div>
    </div>

</main>
