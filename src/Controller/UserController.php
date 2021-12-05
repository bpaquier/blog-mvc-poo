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

    public function removeUser(){
        return $this->render('Remove User', 'remove-user', []);
    }

    public function api()
        {
            // Method : GET
            if ($this->HTTPRequest->method() == 'GET') {
                $data = null;
                // Get data
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $manager = new UserManager();
                    $user = $manager->getSingleUser($id);
                    $data = $user;
                } else {
                    $manager = new UserManager();
                    $users = $manager->getAllUsers();
                    $data = $users;
                }

                // Return data
                if ($data) {
                    return $this->renderJSON(JSONResponse::ok($data));
                } else {
                    return $this->renderJSON(JSONResponse::notFound());
                }
                // Method: POST
            } else if ($this->HTTPRequest->method() == 'POST') {
                $data = null;
                // Create data
                $json = file_get_contents('php://input');
                $params = json_decode($json, true);
                if (isset($params['password']) && isset($params['email']) && isset($params['first_name']) && isset($params['last_name']) && isset($params['role'])) {
                    $manager = new UserManager();
                    $user = $manager->add($params);
                    if ($user) {
                        return $this->renderJSON(JSONResponse::created($user));
                    } else {
                        return $this->renderJSON(JSONResponse::badRequest());
                    }
                } else {
                    return $this->renderJSON(JSONResponse::missingParameters());
                }

                // Method: DELETE
            } else if ($this->HTTPRequest->method() == 'DELETE') {
                // Delete data
                $data = null;
                $json = file_get_contents('php://input');
                $params = json_decode($json, true);
                if (isset($params['id'])) {
                    $manager = new UserManager();
                    $data = $manager->delete($params['id']);
                    if (!$data) return $this->renderJSON(JSONResponse::notFound());
                } else {
                    return $this->renderJSON(JSONResponse::missingParameters());
                }

            }


            // Send data
            if ($data) {
                JSONResponse::ok($data);
            } else {
                JSONResponse::internalServerError();
            }

        }

}