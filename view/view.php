<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?php echo $pagetitle; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/commun.css" rel="stylesheet" type="text/css">
    <link href="css/accueil.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.rtl.css" type="text/css">
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>


</head>
<body>
<header>
    <div class="containerHead">
        <img class="head" src='image/headerNew.jpg' class="rounded mx-auto d-block" alt="...">
    </div>
    <div class="row">

        <div class="container">
            <nav>

                <!-- Example single danger button -->
                <a class="btn btn-primary" href="index.php?action=accueil" role="button">Accueil</a>
                <a class="btn btn-primary" href="index.php?controller=Chien&action=Adopter" role="button">A Adopter</a>
                <a class="btn btn-primary" href="index.php?controller=Chien&action=Protege" role="button">Les
                    Protégés</a>
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Frais
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?controller=Facture&action=Facture">Frais</a></li>
                        <li><a class="dropdown-item" href="index.php?controller=Facture&action=totaliserFactures">Totalisateurs
                                Factures</a></li>
                    </ul>
                </div>
                <!-- Example single danger button -->
                <a class="btn btn-primary" href="index.php?action=FAQ" role="button">FAQ</a>
                <a class="btn btn-primary" href="index.php?action=Contact" role="button">Contact</a>
                <a class="btn btn-primary" href="index.php?action=compte" role="button">Compte</a>
                <a class="btn btn-primary" href="index.php?action=deconnexion" role="button">Deconnexion</a>
               


</header>
<?php
if (isset($controller)) $filepath = File::build_path(array("view", $controller, "$view.php"));
else $filepath = File::build_path(array("view", "$view.php"));

require $filepath;
?>


<footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
    <div class="container">
        <div class="row row-30">
            <div class="col-md-4">
                <h5>Contacts</h5>
                <dl class="contact-list">
                    <dt>Numéro de Téléphone (en cas d'urgence):</dt>
                    <dd>+33 6 49 48 21 00
                    </dd>
                </dl>
            </div>
            <div class="col-md-4 col-xl-3">
                <h5>Links</h5>
                <ul class="nav-list">
                    <li><a href="index.php?controller=Chien&action=Adopter">Adoption</a></li>
                    <li><a href="index.php?action=FAQ">Contacts</a></li>
                    <li><a href="index.php?action=Contact">FAQ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row no-gutters social-container">
        <div class="col"><a class="social-inner" href="https://m.facebook.com/Bullsfriendsassociation?fref=ts"><img
                        src="image/fb.png" ))></a></div>
    </div>
</footer>


</body>
</html>
