<?php

namespace Entity;

class Comment {
    private $id;
    private $post_id;
    private $author_id;
    private $date;
    private $content;

    public function getId() {
        return $this->id;
    }

    public function getPostId() {
        return $this->post_id;
    }

    public function getAuthorId() {
        return $this->author_id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getContent() {
        return $this->content;
    }
}