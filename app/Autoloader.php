<?php
/**
 * Permet le chargement dynamique des class
 */
namespace App;

class Autoloader
{
    /**
     * Class statique qui utilise la fonction spl_autoload etc..
     * qui prend en paramettre un array avec __CLASS__ qui réprésente
     * le nom de la classe du fichier, et *autoload*, le nom de la
     * fonction qui va chercher les requires
     *
     * @return void
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Fonction qui autoload les class requises
     *
     * @param string $class
     * @return void
     */
    static function autoload($class)
    {
        /**
         * si dans $class il y a le namespace a la position 0
         */
        if (strpos($class, __NAMESPACE__ . '\\' ) === 0)
        {    
            $class = str_replace(__NAMESPACE__ . '\\','', $class);
            require __DIR__ .'/'. $class . '.php';
        }
    }

}
