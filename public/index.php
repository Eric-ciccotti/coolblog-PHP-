<?php
require '../app/Autoloader.php';
// inclut le contenu d'un autre fichier appelé, et provoque une erreur bloquante s'il est indisponible

App\Autoloader::register();
$config = new App\Config();
var_dump($config);
?>

