<head>
    <link href="css/Frais.css" rel="stylesheet" type="text/css">
</head>

    <main>

        <div class="container-fluid red">
          <div class="container text-center">
            <h3> Calculer le total des Factures</h3>

        </div>

          <div class="container-fluid blue">
          <div class="row">
            <article class="col-2">

            <div>
              <p>Cliquez sur le bouton ci-dessous pour ajouter une Facture : </p>
              <button class="btn left" type="button" onclick="location.href = 'index.php?action=formulaireFacture';">Ajouter une Facture</button>
            </div>
            </article>
            <article class="col-10">


              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand">En fonction de :</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?action=totaliserFactures">Total</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?action=totaliserFacturesNumPuces">Numero Puce</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?action=totaliserFacturesTypes">Types</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?action=totaliserFacturesMotifs">Motifs</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?action=totaliserFacturesCrediteurs">Crediteurs</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
              <div>
                  <p> Totalisateur des Factures : </p>

                  <?php
                  if($_GET['action']=='totaliserFactures'){
                    echo $couts;
                  }else{
                    foreach ($couts as $v) {
                      echo "<li> ".$v['bd']." :  ".$v['cout'].' euros</li>';
                    }
                    echo '</ul>';
                  }
                   ?>
                 </div>
