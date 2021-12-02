<?php

namespace App\Entity;
use App\Entity\Entity;

class Comment extends Entity {
    private $table = 'comments';
    private int $id;
    private int $post_id;
    private string $author_name;
    private string $date;
    private string $content;



    public function getId() {
        return $this->id;
    }

    public function getPostId() {
        return $this->post_id;
    }

    public function getAuthorId() {
        return $this->author_name;
    }

    public function getDate() {
        return new \DateTime($this->date);
    }

    public function getContent() {
        return $this->content;
    }
}