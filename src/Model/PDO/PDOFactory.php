<?php

namespace App\Model\PDO;

use App\Model\JSONResponse;
use PDO;

class PDOFactory
{
    private $bdd;

    public function __construct()  {
        try {
            $this->bdd = new PDO('mysql:host=db;dbname=w3_blog', 'root', 'example');
        }
        catch (\PDOException $e) {
            echo(JSONResponse::internalServerError());
            die('Error :' . $e->getMessage());

        }
    }

    public function getBdd() {
        return $this->bdd;
    }
}