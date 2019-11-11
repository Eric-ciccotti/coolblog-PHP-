<?php
require '../app/Autoloader.php'; // inclut le contenu d'un autre fichier appelé, et provoque une erreur bloquante s'il est indisponible


App\Autoloader::register();

$app = App\App::getInstance();

$posts = $app->getTable('Posts');
$posts = $app->getTable('Categories');

?>

