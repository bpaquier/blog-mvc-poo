<?php

namespace App\Model;

class PostManager extends BaseManager
{
    public function getAllPosts() {
        $query = $this->db->prepare('SELECT * FROM posts');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Posts');

        return $query->fetchAll();
    }

    public function getPostById(int $id) {
        $query = $this->db->prepare('SELECT * FROM posts where id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Posts');

        return $query->fetch();
    }
}