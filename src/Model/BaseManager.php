<?php

namespace App\Model;

use App\Model\PDO\PDOFactory;

abstract class BaseManager
{
    protected  $db;

    public function __construct() {
        $pdo = new PDOFactory();
        $this->db = $pdo->getBdd();
    }
}