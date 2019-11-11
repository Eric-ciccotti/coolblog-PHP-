<?php
namespace App;

class App
{

    public $webSite_title = 'Mon Super Site';
    private static $_instance;
    private $db_instance;

    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getTable($tableName)
    {
        $class_name = '\\App\\Table\\' . ucfirst($tableName) . 'Table';
        return new $class_name();
    }

    public function getDb()
    {
        $config = Config::getInstance();
        if (is_null($this->db_instance))
        {
            $this->db_instance = new Database($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }
}