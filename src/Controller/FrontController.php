<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\Model\UserManager;

class FrontController extends BaseController
{
    public function showUsers() {
        $manager = new UserManager();
        $users = $manager->getAllUsers();

        return $users;
    }
}