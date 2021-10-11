<?php
$DS = DIRECTORY_SEPARATOR;
$ROOT_FOLDER = __DIR__ . $DS . "..";

require_once "lib/File.php";

require_once (File::build_path(array("controller","routeur.php")));
?>