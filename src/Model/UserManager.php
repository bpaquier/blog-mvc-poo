<?php

namespace App\Model;

use App\Model\BaseManager;

class UserManager extends BaseManager
{
    public function getAllUsers() {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');

        return $query->fetchAll();
    }

    public function getSingleUser(int $id) {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');

        return $query->fetch();
    }
}