<?PHP
$DS = DIRECTORY_SEPARATOR;
$ROOT_FOLDER = __DIR__ . $DS . "..";


require 'lib/File.php';
require 'lib/Security.php';




require (File::build_path(array("controller","routeur.php")));

?>
