<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\Model\JSONResponse;
use App\Model\UserManager;
use App\Vendors\ErrorHandler;

class UserController extends BaseController
{
    public function showUsers() {
        $manager = new UserManager();
        $users = $manager->getAllUsers();
    
        return $this->render('users', 'users', $users);
    }

    public function showLogin() {
        return $this->render('Login', 'login', []);
    }

    public function logout() {
        return $this->render('Logout', 'logout', []);
    }

    public function showRegister() {
        return $this->render('Register', 'register', []);
    }

    public function showAccount() {
        ErrorHandler::redirectIfNoLogin();
        $manager = new UserManager();
        $connectedUser = intval($_SESSION['user']['id']);
        $user = $manager->getSingleUser($connectedUser);
        return $this->render('Account', 'account', $user);
    }

    public function showUpdateAccount() {
        ErrorHandler::redirectIfNoLogin();
        $manager = new UserManager();
        $connectedUser = intval($_SESSION['user']['id']);
        $user = $manager->getSingleUser($connectedUser);
        return $this->render('Update Account', 'update-account', $user);
    }

    public function api(){
        // Method : GET
        if($this->HTTPRequest->method() == 'GET'){
            $data = null;
            // Get data
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $manager = new UserManager();
                $user = $manager->getAllUsers($id);
                $data = $user;
            } else {
                $manager = new UserManager();
                $users = $manager->getAllUsers();
                $data = $users;
            }

            // Return data
            if($data){
                JSONResponse::ok($data);
            } else {
                JSONResponse::notFound();
            }
        // Method: POST
        } else if ($this->HTTPRequest->method() == 'POST'){
            $data = null;
            // Create data
            $json = file_get_contents('php://input');
            $params = json_decode($json, true);
            if(isset($params['username']) && isset($params['password'])){
                
                $manager = new UserManager();
                $user = $manager->add($_POST);
                if($user){
                    JSONResponse::created($user);
                } else {
                    JSONResponse::badRequest();
                }
            } else {
                JSONResponse::missingParameters();
            }

        // Method: DELETE
        } else if ($this->HTTPRequest->method() == 'DELETE'){
            // Delete data
            $data = null;
            $json = file_get_contents('php://input');
            $params = json_decode($json, true);
            if(isset($params['id'])){
                $manager = new UserManager();
                $data = $manager->delete($params['id']);
                if(!$data) JSONResponse::notFound();
            } else {
                JSONResponse::missingParameters();
            }

        }



        // Send data
        if($data){
            JSONResponse::ok($data);
        } else {
            JSONResponse::internalServerError();
        }

    }
}