<?php

namespace App\Model;

use APP\Vendors\ErrorHandler;

class PostManager extends BaseManager
{
    private $selectKeys = "post_title, post_content, first_name AS author_firstName, last_name AS author_lastName, post_date, post_id, author_id";

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

    public function addPost(string $title, int $author_id, string $content) {

        try 
        {
            $pdo = $this->db;
            $query = $pdo->prepare('INSERT INTO posts (post_title, post_image, post_date, author_id, post_content) VALUES (:post_title, :post_image, NOW(), :author_id, :post_content)');
            $query->execute([
                'post_title' => $title,
                'post_image' => '',
                'author_id' => $author_id,
                'post_content' => $content
            ]);

            $lastInsertId = $pdo->lastInsertId();
            return $lastInsertId;

        } catch(\PDOException $e) {
            var_dump($e->getmessage());
        }      
    }

    public function removePost(int $post_id) {
        try
        {
            $pdo = $this->db;
            $query = $pdo->prepare('DELETE FROM posts WHERE post_id = :post_id');
            $query->execute([
                'post_id' => $post_id
            ]);
        } catch(\PDOException $e) {
            var_dump($e->getmessage());
        }    

    }
}