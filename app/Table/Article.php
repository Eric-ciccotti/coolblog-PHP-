<?php

namespace App\Table;

class Article extends Table  
{
    // protected static $table = 'articles';

    public static function find($id)
    {
        return self::query('
        SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie 
        FROM articles 
        LEFT JOIN categories ON categorie_id = categories.id
        WHERE articles.id = ?',[$id], true);
    }

    public static function lastByCategory($categorie_id)
    {
        return self::query('
        SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie 
        FROM articles 
        LEFT JOIN categories ON categorie_id = categories.id 
        WHERE categorie_id = ?
        ORDER BY articles.date DESC'
        ,[$categorie_id]);
    }
    public static function getLast()
    {
        return self::query('
        SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie 
        FROM articles 
        LEFT JOIN categories ON categorie_id = categories.id 
        ORDER BY articles.date DESC');
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