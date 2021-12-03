<?php

namespace App\Controller;

use App\Controller\BaseController;
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
}