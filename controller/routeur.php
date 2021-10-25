<?php
//https://webinfo.iutmontp.univ-montp2.fr/~petitjeanf/PHP/td-php/TD4/controller/routeur.php?action=readAll

require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
// On recupère l'action passée dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = "seConnecter";
}
if (in_array($action, get_class_methods("ControllerUtilisateur"), false)) {
    ControllerUtilisateur::$action();
}

?>
