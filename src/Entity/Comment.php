<?php

namespace App\Entity;
use App\Entity\Entity;

class Comment extends Entity {

    private $post_id;
    private $author_name;
    private $content;

    public function setData (array $data){
        $this->setPostId($data['post_id']);
        $this->setAuthorName($data['author_name']);
        $this->setContent($data['content']);
    }

    public function getPostId() {
        return $this->post_id;
    }

    public function getAuthorName() {
        return $this->author_name;
    }

    public function getContent() {
        return $this->content;
    }

    public function setPostId(int $id) {
        /**
         * TODO : handle error?
         */
        $this->post_id = $id;
    }

    public function setAuthorName(string $name) {
        $name ? $this->author_name = htmlspecialchars($name) : $this->author_name = NULL;
    }

    public function setContent(string $content) {
        $content ? $this->content = htmlspecialchars($content) : $this->content = NULL;
    }
}