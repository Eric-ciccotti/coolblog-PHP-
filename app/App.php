<?php
namespace App;

class App
{

    public $webSite_title = 'Mon Super Site';
    private static $_instance;

    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    // public static function getDatabase()
    // {
    //     if (self::$database === null)
    //     {
    //         self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
    //     }
    //     return self::$database;
    // }

    // public static function notFound()
    // {
    //     header('HTTP/1.0 404 Not Found');
    //     header('Location:index.php?p=404');
    // }

    // public static function getTitle()
    // {
    //     return self::$webSite_title;
    // }

    // public static function setTitle($title)
    // {
    //     self::$webSite_title = $title. ' | ' . self::$webSite_title; 
    // }
}