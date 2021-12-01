<?php

namespace App\Controller;

use App\Model\PostManager;

class PostController extends BaseController
{
    public function showPosts() {
        $manager = new PostManager();
        $posts = $manager->getAllPosts();
        return $this->render('Posts', 'posts', $posts);
    }

    public function showSinglePost() {
        $manager = new PostManager();
        $post = $manager->getPostById($this->params['id']);

        if($post) {
            return $this->render('Post', 'post', $post);
        } else {
            header('Location: ?p=home');
        }
    }
}