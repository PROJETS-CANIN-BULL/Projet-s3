<head>
    <link href="css/totalFactures.css" rel="stylesheet" type="text/css">
</head>

<main>

    <div class="container-fluid red">
        <div class="container text-center">
            <h3> Calculer le total des Factures</h3>

        </div>

        <div class="container-fluid blue">
            <div class="row">
                <article class="col-2">

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
                    <div>
                        <p><br>Vous désirez être FAMILLE D'ACCUEIL ? cliquez ci-dessous</p>
                        <button class="btn left" type="button"
                                onclick=" location.href = 'index.php?controller=FamilleAccueil&action=formulaireFamilleAccueil'">
                            Formulaire
                        </button>
                    </div>
                </article>
                <article class="col-10">


                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand">En fonction de :</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                           href="index.php?controller=Facture&action=totaliserFactures">Total</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="index.php?controller=Facture&action=totaliserFacturesNumPuces">Numero
                                            Puce</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="index.php?controller=Facture&action=totaliserFacturesRaces">Race</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="index.php?controller=Facture&action=totaliserFacturesTypes">Types</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="index.php?controller=Facture&action=totaliserFacturesMotifs">Motifs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="index.php?controller=Facture&action=totaliserFacturesCrediteurs">Crediteurs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="total">
                        <p> Totalisateur des Factures : </p>


                        <?php
                        if ($_GET['action'] == 'totaliserFactures') {
                            echo '<p>Le cout total de l\'ensemble des Factures est de : ' . $couts . ' euros </p>';
                        } else {
                            echo "<ul >";
                            foreach ($couts as $v) {
                                echo '<li> <p><span class="texte"> ' . htmlspecialchars($v['bd']) . '</span> :  ' . htmlspecialchars($v['cout']) . ' euros </p></li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </article>
