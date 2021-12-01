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
      
    }
}