<?php

use App\Table\Article;
// use App\Table\Categorie;
use App\App;

$post = Article::find($_GET['id']);

if ($post === false)
{
    App::notFound();
}

App::setTitle($post->titre);

?>

<h1><?= $post->titre ?></h1>

<p><em><?= $post->categorie ?></em></p>

<p><?= $post->contenu ?></p>