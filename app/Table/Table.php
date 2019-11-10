<?php

namespace App\Table;

use App\App;

class Table 
{
    protected static $table;

    public static function find($id)
    {
        return self::query('SELECT * FROM ' . static::getTable() . ' WHERE id = ? ',[$id], true);
    }

    public static function query($statement, $attributes = null, $one = false)
    {
        if ($attributes)
        {
            return App::getDatabase()->prepare($statement, $attributes, get_called_class(), $one);
        }
        else
        {
            return App::getDatabase()->query($statement, get_called_class(), $one);
        }

    }

    private static function getTable()
    {
        if (static::$table === null)
        {   
            // $class = get_called_class(); --> "App\Table\Categorie"
            $class_name = explode('\\', get_called_class()); // ["App","Table","Categorie"] , le '\\' -> \ + \' ( pour la guillemet)
            static::$table = strtolower(end($class_name)) . 's'; //dernier element du tableau + minuscule + 's' = "categories" par exemple 
           
        }
        return static::$table;
        
    }

    public static function getAll()
    {
        return App::getDatabase()->query('SELECT * FROM ' . static::getTable() . '',get_called_class());
    }

    /**
     * Si il rencontre une variable qu'il ne connait pas il va utiliser cette fonction
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




}
