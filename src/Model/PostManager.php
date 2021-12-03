<?php

namespace App\Model;

class PostManager extends BaseManager
{
    public function addPost(string $title, int $author_id, string $content) {

        try 
        {
            $pdo = $this->db;
            $query = $pdo->prepare('INSERT INTO posts (post_title, post_image, post_date, author_id, post_content) VALUES (:post_titre, :post_image, NOW(), :author_id, :post_content)');
            $query->execute([
                'post_titre' => $title,
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