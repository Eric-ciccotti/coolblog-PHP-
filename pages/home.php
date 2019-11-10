<div class="row">
        <div class="col-sm-8">
                <?php foreach (App\Table\Article::getLast() as $post) : ?>

                        <h1><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h1>
                        <p><em><?= $post->categorie ?></em></p>
                        <p><?= $post->extrait; ?></p>

                <?php endforeach; ?>
        </div>
        <div class="col-sm-4">
                <ul>
                        <?php foreach (App\Table\Categorie::getAll() as $categorie) : ?>
                                <li><a href="<?= $categorie->url ?>"><?= $categorie->titre ?></a></li>
                        <?php endforeach; ?>
                </ul>
        </div>
</div>







<!-- 
$count = $pdo->exec('INSERT INTO articles SET titre="Mon Titrea", date="' . date('Y-m-d H:i:s') . '"');
var_dump($count); -->