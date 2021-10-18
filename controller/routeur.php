
<?php
//https://webinfo.iutmontp.univ-montp2.fr/~petitjeanf/PHP/td-php/TD4/controller/routeur.php?action=readAll

require_once File::build_path(array("controller","ControllerUtilisateur.php"));
// On recupère l'action passée dans l'URL
$action = $_POST['action'];
// Appel de la méthode statique $action de ControllerVoiture
ControllerUtilisateur::$action();
?>
