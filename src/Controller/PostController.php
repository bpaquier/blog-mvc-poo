<?php

namespace App\Controller;

use App\Model\PostManager;
use App\Model\CommentManager;
use App\Model\JSONResponse;
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

        $id = intval($this->params['id']);

        $post = $postManager->getPostById($id);
        $comments = $commentManager->getAllByPost($id);


        if($post) {
            $data['post'] = $post;
            $data['comments'] = $comments;
            return $this->render('Post', 'post', $data);
        } else {
            ErrorHandler::homeRedirect('Post not found');
        }

    }

    public function postApi(){
        // Method : 'GET'
        if($this->HTTPRequest->method() == 'GET') {
            $data = null;
            if(isset($_GET['id'])) {
                // Get a single post
                $id = intval($_GET['id']);
                $postManager = new PostManager();
                $post = $postManager->getPostById($id);
                if($post) {
                    $data = $post;
                    JSONResponse::ok($data);
                    
                } else {
                    JSONResponse::notFound();
                }
            } else {
                // Get a all posts
                $postManager = new PostManager();
                $posts = $postManager->getAllPosts();
                $data = $posts;
                JSONResponse::ok($data);
            }

        } else if ($this->HTTPRequest->method() == 'POST') {
            $postManager = new PostManager();
            $commentManager = new CommentManager();

            $id = intval($this->params['id']);

            $post = $postManager->getPostById($id);
            $comments = $commentManager->getAllByPost($id);

            if($post) {
                $data['post'] = $post;
                $data['comments'] = $comments;
                return $this->render('Post', 'post', $data);
            } else {
                ErrorHandler::homeRedirect("Post not found");
            }
        } else if ($this->HTTPRequest->method() == 'PUT') {
        // Method : 'PUT'
        } else if ($this->HTTPRequest->method() == 'DELETE') {
        // Method : 'DELETE'
        }
    }
}