<head>
    <link href="css/Adopter.css" rel="stylesheet" type="text/css">
</head>

<main>
    <div class="container-fluid red">
        <div class="container text-center">
            <h2> A ADOPTER</h2>
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
                                           href="index.php?controller=Chien&action=trierNonAdoptesNoms"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Nom</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesNoms">A-Z</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesNomsDecroissants">Z-A</a>
                                            </li>
                                            <div>Ou</div>
                                            <form method="post" name="" action="index.php">
                                                <fieldset>
                                                    <li><span class="inputItem">Nom</span>
                                                        <input class="inputField" id="nomChien" name="nomChien"
                                                               type="text" required></li>
                                                </fieldset>
                                                <div class="input" id="send">
                                                    <input type="submit" value="Trier">
                                                    <input type='hidden' name='controller'
                                                           value='Chien'>
                                                    <input type='hidden' name='action'
                                                           value='trouverChiensNonAdoptesNoms'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Chien&action=trierNonAdoptesNumPuces"
                                           id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Numero Puce</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesNumPuces">Croissant</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesNumPucesDecroissants">Decroissant</a>
                                            </li>
                                            <div>Ou</div>
                                            <form method="post" name="" action="index.php">
                                                <fieldset>
                                                    <li><span class="inputItem">Numero Puce</span>
                                                        <input class="inputField" id="numPuce" name="numPuce"
                                                               type="text" required></li>
                                                </fieldset>
                                                <div class="input" id="send">
                                                    <input type="submit" value="Trier">
                                                    <input type='hidden' name='controller'
                                                           value='Chien'>
                                                    <input type='hidden' name='action'
                                                           value='trouverChiensNonAdoptesNumPuces'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Chien&action=trierNonAdoptesRaces"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Race</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesRaces">A-Z</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesRacesDecroissants">Z-A</a>
                                            </li>
                                            <div>Ou</div>
                                            <form method="post" name="" action="index.php">
                                                <fieldset>
                                                    <li><span class="inputItem">Race</span>
                                                        <input class="inputField" id="race" name="race" type="text"
                                                               required></li>
                                                </fieldset>
                                                <div class="input" id="send">
                                                    <input type="submit" value="Trier">
                                                    <input type='hidden' name='controller'
                                                           value='Chien'>
                                                    <input type='hidden' name='action'
                                                           value='trouverChiensNonAdoptesRaces'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Chien&action=trierNonAdoptesDateNaissances"
                                           id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Date
                                            Naissance</a>
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
                                                    <input type="submit" value="Trier">
                                                    <input type='hidden' name='controller'
                                                           value='Chien'>
                                                    <input type='hidden' name='action'
                                                           value='trierNonAdoptesDateNaissances'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Chien&action=trierNonAdoptesSexes"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Sexe</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesSexes&sexe=femelle">Femelle</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesSexes&sexe=male">Male</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Chien&action=trierNonAdoptesRobes"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Robe</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesRobes">A-Z</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesRobesDecroissants">Z-A</a>
                                            </li>
                                            <div>Ou</div>
                                            <form method="post" name="" action="index.php">
                                                <fieldset>
                                                    <li><span class="inputItem">Robe</span>
                                                        <input class="inputField" id="robe" name="robe" type="text"
                                                               required></li>
                                                </fieldset>
                                                <div class="input" id="send">
                                                    <input type="submit" value="Trier">
                                                    <input type='hidden' name='controller'
                                                           value='Chien'>
                                                    <input type='hidden' name='action'
                                                           value='trouverChiensNonAdoptesRobes'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Chien&action=trierNonAdoptesSterilisations"
                                           id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Sterelisation</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesSterilisations&avis=oui">Oui</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesSterilisations&avis=non">Non</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Chien&action=trierNonAdoptesDateAccueils"
                                           id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Date
                                            Accueil</a>
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
                                                    <input type="submit" value="Trier">
                                                    <input type='hidden' name='controller'
                                                           value='Chien'>
                                                    <input type='hidden' name='action'
                                                           value='trierNonAdoptesDateAccueils'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?controller=Chien&action=trierNonAdoptesNomAncienProprio"
                                           id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Nom Ancien
                                            Proprietaire</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesNomAncienProprio">A-Z</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?controller=Chien&action=trierNonAdoptesNomAncienProprioDecroissant">Z-A</a>
                                            </li>
                                            <div>Ou</div>
                                            <form method="post" name="" action="index.php">
                                                <fieldset>
                                                    <li><span class="inputItem">Nom </span>
                                                        <input class="inputField" id="nomAncienProp"
                                                               name="nomAncienProp" type="text" required></li>
                                                </fieldset>
                                                <div class="input" id="send">
                                                    <input type="submit" value="Trier">
                                                    <input type='hidden' name='controller'
                                                           value='Chien'>
                                                    <input type='hidden' name='action'
                                                           value='trouverChiensNonAdoptesAncienProprios'>
                                                </div>
                                            </form>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div>

                        <?php
                        if ($chien == NULL) {
                            echo "<div>Aucun protégé n'existe</div>";
                        } else {
                            foreach ($chien as $c) {


                                echo '<div class="row justify-content-center"><h3 class="text-center">' . htmlspecialchars($c->getNomchien()) . ' : ' . htmlspecialchars($c->getNumPuce()) . '</h3>';
                                echo '<div class="col-4"><img class="photoChien" src="image/chien/' . htmlspecialchars($c->getNomPhoto()) . '" alt="' . htmlspecialchars($c->getNomPhoto()) . '"></div>';
                                echo '<div  class="row justify-content-start"> <div class="col-4"><p> Race : ' . $c->getRace() . '</p><p> Robe : ' . $c->getRobe() . '</p></div>';
                                echo '<div class="col-4"><p> Date de Naissance  : ' . $c->getDateNaissance() . '</p><p> Date début accueil : ' . $c->getDateAccueil() . '</p></div>';
                                echo '<div class="col-4"><p> Sexe  : ' . $c->getSexe() . '</p><p> Sterelisation : ' . $c->getSterilisation() . '</p></div>';
                                echo '<div><p>' . $c->getDescription() . '</p></div></div>';
                                ?>
                                <form action="index.php" method="post">
                                    <div class="input" id="send">
                                        <input type="submit" name="submit" value="Adoption">
                                        <input type="hidden" name="action" value="formulaireAdoptionChien">
                                        <input type="hidden" name="controller" value="chien">
                                        <input type="hidden" name="numPuce"
                                               value="<?php echo htmlspecialchars($c->getNumPuce()) ?>">
                                    </div>
                                </form>

                                <?php
                                echo '<p><a href="index.php?controller=FamilleAccueil&action=formulaireFamilleAccueil&numPuce=' . rawurlencode($c->getNumPuce()) . '"> Accueillir le chien </a></p>';

                            }
                        }

                        ?>

                    </div>
                </article>

            </div>
        </div>
    </div>
</main>
