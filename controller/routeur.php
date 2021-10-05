
<?php
//https://webinfo.iutmontp.univ-montp2.fr/~petitjeanf/PHP/td-php/TD4/controller/routeur.php?action=readAll

require_once 'ControllerUtilisateur.php';
// On recupère l'action passée dans l'URL
$action = $_GET['action'];
// Appel de la méthode statique $action de ControllerVoiture
ControllerUtilisateur::$action(); 
?>
