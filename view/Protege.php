<head>
    <link href="css/Protege.css" rel="stylesheet" type="text/css">
</head>
<main>
    <div class="container-fluid red">
        <div class="container text-center">
            <h2> Les protégés</h2>

        </div>
        <div class="container-fluid blue">
            <div class="row">
                <article class="col-2">
                    <div>
                        <p>Cliquez sur le bouton ci-dessous pour ajouter un Portégé: </p>
                        <button class="btn left" type="button"
                                onclick="location.href = 'index.php?action=formulaireChien';">Ajouter un Protégé
                        </button>
                    </div>
                    <div>
                        <p><br>Vous désirez être FAMILLE D'ACCUEIL ? cliquez ci-dessous</p>
                        <button class="btn left" type="button"
                                onclick=" location.href = 'index.php?action=formulaireFamilleAccueil'">Formulaire
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
                                        <a class="nav-link dropdown-toggle" href="index.php?action=trierNoms"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Nom</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="index.php?action=trierNoms">A-Z</a></li>
                                            <li><a class="dropdown-item" href="index.php?action=trierNomsDecroissants">Z-A</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="index.php?action=trierNumPuces"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Numero Puce</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?action=trierNumPuces">Croissant</a></li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?action=trierNumPucesDecroissants">Decroissant</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="index.php?action=trierRaces"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Race</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="index.php?action=trierRaces">A-Z</a></li>
                                            <li><a class="dropdown-item" href="index.php?action=trierRacesDecroissants">Z-A</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="index.php?action=trierDateNaissances"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Date Naissance</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="index.php?action=trierDateNaissances">Croissant</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?action=trierDateNaissancesDecroissants">Decroissant</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="index.php?action=trierSexes"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Sexe</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item"
                                                   href="index.php?action=trierSexes">Croissant</a></li>
                                            <li><a class="dropdown-item" href="index.php?action=trierSexesDecroissants">Decroissant</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="index.php?action=trierRobes"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Robe</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="index.php?action=trierRobes">A-Z</a></li>
                                            <li><a class="dropdown-item" href="index.php?action=trierRobesDecroissants">Z-A</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="index.php?action=trierSterilisations"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Sterelisation</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="index.php?action=trierSterilisations">Croissant</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?action=trierSterilisationDecroissants">Decroissant</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="index.php?action=trierDateAccueils"
                                           id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">Date Accueil</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="index.php?action=trierDateAccueils">Croissant</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?action=trierDateAccueilsDecroissants">Decroissant</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="index.php?action=trierNomAncienProprio" id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false">Nom Ancien
                                            Proprietaire</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="index.php?action=trierNomAncienProprio">A-Z</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="index.php?action=trierNomAncienProprioDecroissant">Z-A</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <?php
                    foreach ($chien as $c) {
                        echo '<h3 class="container text-center">' . htmlspecialchars($c->getNomchien()) . '</h3><div class="row">';
                        echo '<div class="col-4"><p> Race : ' . htmlspecialchars($c->getRace()) . '</p><p> Robe : ' . $c->getRobe() . '</p></div>';
                        echo '<div class="col-4"><p> Date de Naissance  : ' . htmlspecialchars($c->getDateNaissance()) . '</p><p> Date début accueil : ' . htmlspecialchars($c->getDateAccueil()) . '</p></div>';
                        echo '<div class="col-4"><p> Sexe  : ' . htmlspecialchars($c->getSexe()) . '</p><p> Sterelisation : ' . htmlspecialchars($c->getSterilisation()) . '</p></div>';
                        echo '<div><p>' . htmlspecialchars($c->getDescription()) . '</p></div></div>';
                    }
                    ?>

                </article>

            </div>
        </div>
    </div>

</main>
