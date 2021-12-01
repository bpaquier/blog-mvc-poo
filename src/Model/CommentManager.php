<?php

namespace App\Model;

use App\Model\BaseManager;

class CommentManager extends BaseManager
{
    
    public function getAllByPost() {
        // @todo fetch all comments for a given post
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');
        return $query->fetchAll();
    }
    
    public function getAll() {
        // @todo fetch all comments
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');
        return $query->fetchAll();
    }
}