<?php

namespace App\Table;

use App\App;

class Article 
{
    public static function getLast()
    {
        return App::getDatabase()->query('
        SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie 
        FROM articles 
        LEFT JOIN categories ON categorie_id = categories.id '
        , __CLASS__);
    }
    /**
     * Si il rencontre une variable qu'il ne connait pas il va utiliser cette fonction
     *
     * @param [type] $get
     * @return void
     */
    public function __get($key)
    {
        // var_dump('Method magique __get called');
        $method = 'get' . ucfirst($key);
  
        $this->$key = $this->$method();
        // pour appelé la méthode une seule fois
        // php va se dire = "tu m'a déja appelé une fois, donc je connais"
        // si on fait direct return $this>method()
        // la methode va etre appelée plusieurs fois ->

        return $this->$key;
    }
    public function getUrl()
    {
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>'. substr($this->contenu,0, 100) . '...</p>';
        $html .= '<p><a href="'. $this->getUrl() .'">Voir la suite</a><p>';
        return $html;
    }

}
?>