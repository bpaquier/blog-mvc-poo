<?php

namespace App\Model;

use App\Entity\Comment;
use App\Model\BaseManager;

class CommentManager extends BaseManager
{
    private $table = "comments";

    public function getAllByPost($postId) {
        $query = $this->db->prepare("SELECT * FROM $this->table WHERE post_id = :id");
        $query->bindValue(':id', $postId, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Comment');
        return $query->fetchAll();
    }
    
    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM $this->table");
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Comment');
        return $query->fetchAll();
    }

    public function createOne($params){
        $entity = new Comment();
        $entity->setData($params);

        $postId = $entity->getPostId();
        $content = $entity->getContent();
        $author = $entity->getAuthorName();

        if($postId && $content && $author){
            $query = $this->db->prepare("INSERT INTO $this->table (post_id, author_name, content, date) VALUES (:post_id, :author_name, :content, NOW())");
            $query->bindValue(':post_id', $postId, \PDO::PARAM_INT);
            $query->bindValue(':author_name', $author, \PDO::PARAM_STR);
            $query->bindValue(':content', $content, \PDO::PARAM_STR);
            $query->execute();
            return $this->db->lastInsertId();

        } else {
            return JSONResponse::missingParameters();
        }
        
    }

    public function removeComments(int $comment_id) {
        try
        {
            $pdo = $this->db;
            $query = $pdo->prepare("DELETE FROM $this->table WHERE comment_id = :comment_id");
            $query->execute([
                'comment_id' => $comment_id
            ]);
        } catch(\PDOException $e) {
            var_dump($e->getmessage());
        }
    }

    public function removeCommentsByPostId(int $post_id) {
        try
        {
            $pdo = $this->db;
            $query = $pdo->prepare("DELETE FROM $this->table WHERE post_id = :post_id");
            $query->execute([
                'post_id' => $post_id
            ]);
        } catch(\PDOException $e) {
            var_dump($e->getmessage());
        }
    }
}