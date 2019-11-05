<?php foreach ($db->query('SELECT * FROM articles', 'App\Table\Article') as $post): ?>

        <a href="<?= $post->url ?>"><?= $post->titre; ?></a>
        <p><?= $post->extrait; ?></p>

<?php endforeach; ?>





<!-- 
$count = $pdo->exec('INSERT INTO articles SET titre="Mon Titrea", date="' . date('Y-m-d H:i:s') . '"');
var_dump($count); -->
