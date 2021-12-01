<?php

namespace App\Model\PDO;

use PDO;

class PDOFactory
{
    private $bdd;

    public function __construct()  {
        try {
           $this->bdd = new PDO('mysql:host=db;dbname=blog', 'root', 'example');
        }
        catch (\PDOException $e) {
            die('Erreur :' . $e->getMessage());
        }
    }

    public function getBdd() {
        return $this->bdd;
    }
}