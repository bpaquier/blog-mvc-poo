<?php

namespace App\Controller;

class PostController extends BaseController
{
    public function addPost() {
        return $this->render('New post', 'add-post', []);
    }

    public function removePost() {
        return $this->render('Remove post', 'remove-post', []);
    }
}