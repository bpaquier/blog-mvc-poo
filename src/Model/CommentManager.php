<?php

namespace App\Model;

use App\Model\BaseManager;

class CommentManager extends BaseManager
{
    // public function getAll() {
    //     $query = $this->db->prepare('SELECT * FROM users');
    //     $query->execute();
    //     $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');

    //     return $query->fetchAll();
    // }
    public function getOneById() {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');

        return $query->fetchAll();
    }
}