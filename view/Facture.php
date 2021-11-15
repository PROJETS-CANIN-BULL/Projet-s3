<head>
    <link href="css/Facture.css" rel="stylesheet" type="text/css">
</head>

<main>

    <div class="container-fluid red">
        <div class="container text-center">
            <h2> Facture</h2>
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
                            <a class="navbar-brand" href="#">Trier par</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Facture&action=trierFacturesNums"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Numero de Facture</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesNums">Croissant</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesNumsDecroissants">Decroissant</a>
                                            </li>
                                            <div>Ou</div>
                                            <form method="post" name="" action="index.php">
                                                <fieldset>
                                                    <li><span class="inputItem">Numero Facture</span>
                                                        <input class="inputField" id="numFacture" name="numFacture"
                                                               type="text" required></li>
                                                </fieldset>
                                                <div class="input" id="send">
                                                    <input type="submit" value="Envoyer">
                                                    <input type='hidden' name='controller'
                                                           value='Facture'>
                                                    <input type='hidden' name='action' value='trouverFacture'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Facture&action=trierFacturesTypes"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Type Facture</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesTypes&type=nourriture">Nourriture</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesTypes&type=kilometrique">Kilométrique</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesTypes&type=veterinaire">Véténiraire</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesTypes&type=autre">Autres</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Facture&action=trierFacturesMotifs"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Motif</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesMotifs">A-Z</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesMotifsDecroissants">Z-A</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Facture&action=trierFacturesCouts"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Cout</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesCouts">Croissant</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesCoutsDecroissants">Decroissant</a>
                                            </li>
                                            <div>Ou</div>
                                            <form method="post" name="" action="index.php">
                                                <fieldset>
                                                    <li><span class="inputItem">Cout min</span>
                                                        <input class="inputField" id="min" name="min" type="text"
                                                               placeholder="00.00" required>
                                                    </li>
                                                    <li><span class="inputItem">Cout max</span>
                                                        <input class="inputField" id="max" name="max" type="text"
                                                               placeholder="00.00" required></li>
                                                </fieldset>
                                                <div class="input" id="send">
                                                    <input type="submit" value="Envoyer">
                                                    <input type='hidden' name='controller'
                                                           value='Facture'>
                                                    <input type='hidden' name='action' value='trouverFacturesCouts'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Facture&action=trierFacturesDateFactures"
                                           id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Date</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <form method="post" name="" action="index.php">
                                                <fieldset>
                                                    <li><span class="inputItem">Date min</span>
                                                        <input class="inputField" id="datemin" name="datemin"
                                                               type="text" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                                               placeholder="AAAA-MM-JJ" required>
                                                    </li>
                                                    <li><span class="inputItem">Date max</span>
                                                        <input class="inputField" id="datemax" name="datemax"
                                                               type="text" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                                                               placeholder="AAAA-MM-JJ" required></li>

                                                </fieldset>
                                                <div class="input" id="send">
                                                    <input type="submit" value="Envoyer">
                                                    <input type='hidden' name='controller'
                                                           value='Facture'>
                                                    <input type='hidden' name='action'
                                                           value='trierFacturesDateFactures'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Facture&action=trierFacturesCrediteurs"
                                           id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Crediteur</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesCrediteurs">A-Z</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesCrediteursDecroissants">Z-A</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Facture&action=trierFacturesNumPuces"
                                           id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Numero Puce</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesNumPuces">Croissant</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Facture&action=trierFacturesNumPucesDecroissants">Decroissant</a>
                                            </li>
                                            <div>Ou</div>
                                            <form method="post" name="" action="index.php">
                                                <fieldset>
                                                    <li><span class="inputItem">Numero Puce</span>
                                                        <input class="inputField" id="numPuce" name="numPuce"
                                                               type="text" required></li>
                                                </fieldset>
                                                <div class="input" id="send">
                                                    <input type="submit" value="Envoyer">
                                                    <input type='hidden' name='controller'
                                                           value='Facture'>
                                                    <input type='hidden' name='action' value='trouverFacturesNumPuces'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>


                    <?php
                    if ($frais == NULL) {
                        echo "<div>Aucune facture n'est disponible</div>";
                    } else {
                        foreach ($frais as $f) {
                            echo '<h3 class="container text-center">' . htmlspecialchars($f->getNumFacture()) . '</h3><div class="row description">';
                            echo '<li> Type : ' . htmlspecialchars($f->getType()) . '</li> ';
                            echo '<li> Motif : ' . htmlspecialchars($f->getMotif()) . '</li>';
                            echo '<li> Cout : ' . htmlspecialchars($f->getCout()) . ' euros </li>';
                            echo '<li> Date : ' . htmlspecialchars($f->getDateFacture()) . '</li>';
                            echo '<li> Crediteur : ' . htmlspecialchars($f->getCrediteur()) . '</li></ul>';
                            ?>
                            <form method="post" name="" action="index.php">
                                <div class="input" id="send">
                                    <input type="submit" value="Ouvrir">
                                    <?php echo '<input type="hidden" name="name" value="' . htmlspecialchars($f->getNumFacture()) . '-' . htmlspecialchars($f->getCrediteur()) . '.pdf">' ?>
                                    <input type='hidden' name='action' value='ouvrirPDF'>
                                </div>
                            </form>

                            <?php
                            echo '<p><a href="index.php?controller=Facture&action=modificationFormulaire&numFacture=' . rawurlencode($f->getNumFacture()) . '&crediteur=' . rawurlencode($f->getCrediteur()) . '"> Modifier la facture </a></p>';
                            echo '<p><a href="index.php?controller=Facture&action=supprimerFacture&numFacture=' . rawurlencode($f->getNumFacture()) . '&crediteur=' . rawurlencode($f->getCrediteur()) . '"> Supprimer la facture </a></p>';

                        }
                    }

                    ?>
                </article>

            </div>
        </div>
    </div>

</main>
