
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
                <button class="btn left" type="button" onclick="location.href = 'index.php?action=formulaireChien';">Ajouter un Protégé</button>
              </div>


              </article>
              <article class="col-10">

                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="#">Trier par</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierNonAdoptesNoms" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nom</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesNoms">A-Z</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesNomsDecroissants">Z-A</a></li></ul></li>
                          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="index.php?action=trierNonAdoptesNumPuces" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Numero Puce</a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesNumPuces">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesNumPucesDecroissants">Decroissant</a></li>  </ul></li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierNonAdoptesRaces" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Race</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesRaces">A-Z</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesRacesDecroissants">Z-A</a></li></ul>  </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierNonAdoptesDateNaissances" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Date Naissance</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesDateNaissances">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesDateNaissancesDecroissants">Decroissant</a></li></ul>  </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierNonAdoptesSexes" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sexe</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesSexes">A-Z</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesSexesDecroissants">Z-A</a></li>  </ul>  </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierNonAdoptesRobes" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Robe</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesRobes">A-Z</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesRobesDecroissants">Z-A</a></li></ul></li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierNonAdoptesSterilisations" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sterelisation</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesSterilisations">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesSterilisationDecroissants">Decroissant</a></li></ul></li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierNonAdoptesDateAccueils" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Date Accueil</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesDateAccueils">Croissant</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesDateAccueilsDecroissants">Decroissant</a></li></ul></li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=trierNonAdoptesNomAncienProprio" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nom Ancien Proprietaire</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesNomAncienProprio">A-Z</a></li>
                              <li><a class="dropdown-item" href="index.php?action=trierNonAdoptesNomAncienProprioDecroissant">Z-A</a></li>  </ul></li>
                            </ul>
                          </div>
                        </div>
                      </nav>

                <?php
                foreach ($chien as $c){
                  echo "<ul><li> Nom du chien : ".$c->getNomchien()." </li>";
                  echo "<li> Date de Naissance : ".$c->getDateNaissance()." </li> ";
                  echo "<li> Race : ".$c->getRace()."</li>";
                  echo "<li> Sexe : ".$c->getSexe()."</li>";
                  echo "<li> Robe : ".$c->getRobe()."</li>";
                  echo "<li> Sterelisation : ".$c->getSterilisation()."</li>";
                  echo "<li> Date début accueil : ".$c->getDateAccueil()."</li></ul>";}

                 ?>
              </article>

            </div>
          </div>
        </div>
    </main>
