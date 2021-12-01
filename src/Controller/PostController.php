<?php

namespace App\Controller;

class PostController extends BaseController
{
    public function showPosts() {
        return $this->render('Posts', 'posts', []);
    }
}