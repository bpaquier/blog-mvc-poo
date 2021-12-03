<?php

namespace App\Controller;
use App\Model\CommentManager;
use App\Model\HTTPResponse;
use App\Model\HTTPResquest;
use App\Model\JSONResponse;

class CommentController extends BaseController
{
    public function commentApi() {
     
      // Method : 'GET'
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
      // Method : 'POST'
      else if ($this->HTTPRequest->method() == 'POST') {
       
        $json = file_get_contents('php://input');
        $params = json_decode($json, true);
        if(isset($params) && isset($params['content']) && isset($params['post_id']) && isset($params['author_name'])) {
        
          $commentManager = new CommentManager();
          $comment = $commentManager->createOne([
            'content' => $params['content'],
            'post_id' => $params['post_id'],
            'author_name' => $params['author_name']
          ]);
          if($comment){
            return $this->renderJSON(JSONResponse::created($comment));
          } else {
            var_dump($comment);
            return $this->renderJSON(JSONResponse::internalServerError());
          }
        } else {
          return $this->renderJSON(JSONResponse::missingParameters());
        }
      
      }
      return $this->renderJSON(JSONResponse::badRequest());
    }
      
}
  