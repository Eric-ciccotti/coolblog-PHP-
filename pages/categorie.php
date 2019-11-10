<?php

use \App\App;
use \App\Table\Categorie;
use \App\Table\Article;

$categorie = Categorie::find($_GET['id']);
$articles = Article::lastByCategory($_GET['id']);
$categories = Categorie::getAll();

if($categorie === false)
{
    App::notFound();
}

?>

<h1><?= $categorie->titre ?></h1>

<div class="row">
        <div class="col-sm-8">
                <?php foreach ($articles as $post) : ?>

                        <a href="<?= $post->url ?>"><?= $post->titre; ?></a>
                        <p><em><?= $post->categorie ?></em></p>
                        <p><?= $post->extrait; ?></p>

                <?php endforeach; ?>
        </div>
        <div class="col-sm-4">
                <ul>
                        <?php foreach ($categories as $categorie) : ?>
                                <li><a href="<?= $categorie->url ?>"><?= $categorie->titre ?></a></li>
                        <?php endforeach; ?>
                </ul>
        </div>
</div>