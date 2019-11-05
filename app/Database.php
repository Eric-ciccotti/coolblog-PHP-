<?php

namespace App;

use \PDO;

class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_pass = $db_pass;
        $this->db_user = $db_user;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        if ($this->pdo === null)
        {
            $dsn = 'mysql:dbname=coolblog;host=127.0.0.1';
            $user = 'root';
            $password = '';
    
            try 
            {
                $pdo = new PDO($dsn, $user, $password);
            } 
            catch (PDOException $e) 
            {
                echo 'Connexion échouée : ' . $e->getMessage();
            }
    
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            // var_dump('PDO initialized');
        }
        // var_dump('GETPDO called');
        return $this->pdo;
    }

    public function query($statement, $class_name)
    {
        $req = $this->getPDO()->query($statement);
        $data = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $data;
    }

    public function prepare($statement, $attributes, $class_name, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one)
        {
            $data = $req->fetch();
        }
        else 
        {
            $data = $req->fetchAll();
        }
        return $data;
    }

}