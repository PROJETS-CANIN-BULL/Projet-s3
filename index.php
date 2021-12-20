<?PHP

session_set_cookie_params(30*60);
session_start();


$DS = DIRECTORY_SEPARATOR;
$ROOT_FOLDER = __DIR__ . $DS . "..";


require 'lib/File.php';
require 'lib/Security.php';




require (File::build_path(array("controller","routeur.php")));

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > (session_get_cookie_params()))) {
    session_unset();    
    session_destroy();
    header ('location: '.index.php);  
    
} else {
    $_SESSION['LAST_ACTIVITY'] = time(); 
}

?>
