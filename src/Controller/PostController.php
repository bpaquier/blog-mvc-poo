<?php

namespace App\Controller;

use App\Model\PostManager;
use App\Model\CommentManager;
use App\Vendors\ErrorHandler;

class PostController extends BaseController
{

    public function addPost() {
        return $this->render('New post', 'add-post', []);
    }

    public function removePost(){
        return $this->render('Remove post', 'remove-post', []);
    }
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
            ErrorHandler::homeRedirect('Post not found');
        }

    }
}