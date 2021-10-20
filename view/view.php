<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
        <title><?php echo $pagetitle; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="css/commun.css" rel="stylesheet" type="text/css">
        <link href="css/accueil.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.rtl.css" type="text/css">
        <script type="text/javascript" src="js/bootstrap.bundle.js"></script>


    </head>
    <body>
        <header>
          <div class ="row">
          <div class="container text-center">
            <h2>Bull's Friends</h2>
          </div>
          <div class="container">
        <nav>

          <!-- Example single danger button -->
        <a class="btn btn-primary" href="index.php?action=accueil" role="button">Accueil</a>
        <a class="btn btn-primary" href="index.php?action=Adopter" role="button">A Adopter</a>
        <a class="btn btn-primary" href="index.php?action=Protege" role="button">Les Protégés</a>
        <div class="btn-group">
          <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Frais
          </button>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?action=Frais">Frais</a></li>
              <li><a class="dropdown-item" href="index.php?action=totaliserFactures">Totalisateurs Factures</a></li>
            </ul>
          </div>
          <!-- Example single danger button -->
          <a class="btn btn-primary" href="index.php?action=FAQ" role="button">FAQ</a>
          <a class="btn btn-primary"  href="index.php?action=Contact" role="button">Contact</a>
        </nav>


       </header>
      <?php
      $filepath = File::build_path(array("view", "$view.php"));
      require $filepath;
      ?>
      <footer>
      </footer>

</body>
</html>
