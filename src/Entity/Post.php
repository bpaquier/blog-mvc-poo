<?php

namespace App\Entity;

class Post extends Entity {
    private $id;
    private $title;
    private $image = "";
    private $date;
    private $author_id;
    private $content;


    public function __construct(array $data)
    {
        $this->setTitle($data['post_title']);
        if($data['post_image']) {
            $this->setImage($data['post_image']);
        }
        $this->setAuthorId($data['author_id']);
        $this->setContent($data['post_content']);
    }

    public function setTitle(string $title) {
        if(strlen($title) > 0) {
            $this->title = htmlspecialchars($title);
        } else {
            $this->title = NULL;
        }

    }

    public function setImage(string $image) {
        $this->image = htmlspecialchars($image);
    }

    public function setAuthorId(string $author_id) {
        $this->author_id = intval($author_id);
    }

    public function setContent(string $content) {
        if(strlen($content) > 0) {
            $this->content = htmlspecialchars($content);
        } else {
            $this->content = NULL;
        }

    }

    public function getPost() {
        $post['post_title'] = $this->title;
        $post['post_image'] = $this->image;
        $post['author_id'] = $this->author_id;
        $post['post_content'] = $this->content;

        return $post;
    }


    public function getId () {
        return $this->id;
    }

    public function getTitle () {
        return $this->title;
    }

    public function getImage () {
        return $this->image;
    }

    public function getDate () {
        return $this->date;
    }

    public function getAuthorId () {
        return $this->author_id;
    }

    public function getContent () {
        return $this->content;
    }
}