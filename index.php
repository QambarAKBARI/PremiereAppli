<?php //FRONT CONTROLLER
require "vendor/autoload.php";
require "config.php";//CONSTANTES DE l'APPLICATION


session_start();

use App\Service\Router;
use App\Service\Session;


$response = Router::handleRequest();
$page = $response !== false ? $response["view"] : Router::NOT_FOUND;

ob_start();
include($page);
$content = ob_get_contents();
ob_end_clean();

require(VIEW_PATH."layout.php");
