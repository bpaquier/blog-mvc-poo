<?php

namespace App\Model;

use App\Model\BaseManager;

class CommentManager extends BaseManager
{
    
    
    public function getAllByPost($postId) {
        $query = $this->db->prepare("SELECT * FROM $this->table WHERE post_id=?");
        $query->execute($postId);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');
        return $query->fetchAll();
    }
    
    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM $this->table");
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');
        return $query->fetchAll();
    }

    public function createOne($params){
        if(isset($params['post_id']) && isset($params['author_name']) && isset($params['content'])){
            $query = $this->db->prepare("INSERT INTO $this->table (post_id, author_name, content, date) VALUES (:post_id, :author_name, :content, NOW())");
            $query->execute($params);
            $last_id = $this->db->insert_id;
            
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        } else {
            JSONResponse::missingParameters();
        }
        
    }
}