<?php foreach (App\Table\Article::getLast() as $post): ?>

        <?php  var_dump($post) ?>

        <a href="<?= $post->url ?>"><?= $post->titre; ?></a>
        <p><em><?= $post->categorie ?></em></p>
        <p><?= $post->extrait; ?></p>

<?php endforeach; ?>





<!-- 
$count = $pdo->exec('INSERT INTO articles SET titre="Mon Titrea", date="' . date('Y-m-d H:i:s') . '"');
var_dump($count); -->
