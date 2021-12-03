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

        $post = $postManager->getPostById(intval($this->params['id']));
        $comments = $commentManager->getAllByPost($this->params['id']);


        if($post) {
            $data['post'] = $post;
            $data['comments'] = $comments;
            return $this->render('Post', 'post', $data);
        } else {
            ErrorHandler::homeRedirect('Post not found');
        }

    }

    public function api(){
        // Method : 'GET'
        if($this->HTTPRequest->method() == 'GET') {
            $id = $_GET['id'];
            $postManager = new PostManager();
            $posts = null;


            if($id){
            // Get a specific post
            $posts = $postManager->getPostById(intval($id));
            } else {
            // Get all posts 
            $posts = $postManager->getAllPosts();
            }

            if(empty($posts)){
            // No posts found
            return $this->renderJSON(JSONResponse::notFound());
            } else {
            // Render response
            $this->HTTPResponse->setCacheHeader(300);
            return $this->renderJSON(JSONResponse::ok($posts));
            }
            
        } 
        // Method : 'POST'
        else if ($this->HTTPRequest->method() == 'POST') {
            $json = file_get_contents('php://input');
            $params = json_decode($json, true);
            if(isset($params) && isset($params['post_title']) && isset($params['author_id']) && isset($params['post_content'])) {
            
            $postManager = new PostManager();
            $post = $postManager->addPost(
                $params['post_title'],
                $params['author_id'],
                $params['post_content'],
            );

            if($post){
                return $this->renderJSON(JSONResponse::created($post));
            } else {
                return $this->renderJSON(JSONResponse::internalServerError());
            }
            } else {
            return $this->renderJSON(JSONResponse::missingParameters());
            }
        
        }

        // Method : 'DELETE'
        else if ($this->HTTPRequest->method() == 'DELETE') {
            $json = file_get_contents('php://input');
            $params = json_decode($json, true);
        }

        return $this->renderJSON(JSONResponse::badRequest());
        }
}