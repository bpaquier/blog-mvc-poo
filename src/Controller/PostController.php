<?php

namespace App\Controller;

use App\Model\PostManager;
use App\Model\CommentManager;

class PostController extends BaseController
{
    public function showPosts() {
        $manager = new PostManager();
        $posts = $manager->getAllPosts();
        return $this->render('Posts', 'posts', $posts);
    }

    public function showSinglePost() {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPostById($this->params['id']);
        $comments = $commentManager->getAllByPost($this->params['id']);

        if($post) {
            $data['post'] = $post;
            $data['comments'] = $comments;
            return $this->render('Post', 'post', $data);
        } else {
            header('Location: /home');
        }
    }
}