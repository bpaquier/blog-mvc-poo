<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\Model\UserManager;

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
}