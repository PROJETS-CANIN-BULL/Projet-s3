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
            <ul id="menu">
              <li><a href="index.php?action=accueil"><img src="insérer l'emplacement de l'image ici" title="logo" alt="logo"></a></li>
              <li><a href="index.php?action=Adopter">A Adopter</a></li>
              <li><a href="index.php?action=Protege">Les protégés</a></li>
              <li><a href="index.php?action=Frais">Frais</a></li>
              <li><a href="index.php?action=FAQ">FAQ</a></li>
              <li><a href="index.php?action=Contact">Contact</a></li>
              <li><a href="">Rechercher</a></li>
            </ul>
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
