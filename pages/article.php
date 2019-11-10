<?php

use App\Table\Article;
use App\Table\Categorie;
use App\App;

$post = Article::find($_GET['id']);

if ($post === false)
{
    App::notFound();
}

$categorie = Categorie::find($post->categorie_id);

var_dump($post);

?>


<h1><?= $post->titre ?></h1>

<p><em><?= $categorie->titre ?></em></p>

<p><?= $post->contenu ?></p>