<?php

 \App\Vendors\ErrorHandler::redirectIfNoAdmin();

 use App\Model\CommentManager;

 if(isset($_GET['id'])) {
     $manager = new CommentManager();
     $manager->removeComments(intval($_GET['id']));
     \App\Vendors\Flash::setFlash('Comment deleted', 'info');


 } else {
     header('Location: /');
 }
