<?php
require '../app/Autoloader.php';
// inclut le contenu d'un autre fichier appelé, et provoque une erreur bloquante s'il est indisponible

App\Autoloader::register();

if(isset($_GET['p']))
{
    $p = $_GET['p'];
}
else
{
    $p = 'home';
}

//initalisation des objets

$db = new App\Database('coolblog');

ob_start();

if($p === 'home')
{
    require '../pages/home.php';
}
else if($p === 'article')
{
    require '../pages/article.php';
}
$content = ob_get_clean();
// Lit le contenu courant du tampon de sortie puis l'efface

require '../pages/templates/default.php';
?>