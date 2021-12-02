<?php

namespace App\Controller;
use App\Model\CommentManager;
use App\Model\HTTPResponse;
use App\Model\HTTPResquest;
use App\Model\JSONResponse;

class CommentController extends BaseController
{
    // Method : 'GET'
    public function get() {
      if($this->HTTPRequest->method() == 'GET') {
        $id = $_GET['id'];
        $commentManager = new CommentManager();
        $comments = null;


        if($id){
          // Get all comments on a specific post
          $comments = $commentManager->getAllByPost($id);
        } else {
          // Get all comments 
          $comments = $commentManager->getAll($id);
        }

        if(empty($comments)){
          // No comments found
          return $this->renderJSON(JSONResponse::notFound());
        } else {
          // Render response
          $this->HTTPResponse->setCacheHeader(300);
          return $this->renderJSON(JSONResponse::ok($comments));
        }
      } 

      $this->renderJSON(JSONResponse::badRequest('yo'));
      
    }


    // Method : 'POST'
    public function post(){
       $this->renderJSON(JSONResponse::badRequest('yo'));
      if($this->HTTPRequest->method() == 'POST') {
        // $commentManager = new CommentManager();
        $this->renderJSON(JSONResponse::badRequest('yo'));
        // $comment = $commentManager->createOne([
        //   'post_id' => $_POST['post_id'],
        //   'author_name' => $_POST['author_name'],
        //   'content' => $_POST['content']
        // ]);
      } else {
          $this->renderJSON(JSONResponse::ok('yo'));
      }
    }
}