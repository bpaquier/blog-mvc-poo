<?php

namespace App\Model;

use App\Vendors\ErrorHandler;

class PostManager extends BaseManager
{

    private $selectKeys = "title, content, first_name AS author_firstName, last_name AS author_lastName, date, post_id, author_id";

    public function getAllPosts() {
        $query = $this->db->prepare('SELECT ' . $this->selectKeys . '  FROM posts INNER JOIN users WHERE posts.author_id = users.user_id');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Posts');

        return $query->fetchAll();
    }

    public function getPostById(int $id) {
        try {
            $query = $this->db->prepare('SELECT ' . $this->selectKeys . ' FROM posts INNER JOIN users where post_id = :id AND posts.author_id = users.user_id');
            $query->bindValue(':id', $id, \PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Posts');

            return $query->fetch();
        } catch (\PDOException $e) {
            echo 'catch <br>';
            ErrorHandler::homeRedirect($e->getMessage());
        }
    }
}