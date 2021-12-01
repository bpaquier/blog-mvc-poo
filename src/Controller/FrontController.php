<?php

namespace App\Controller;

use App\Model\UserManager;

class FrontController
{
    public function showUsers() {
        $manager = new UserManager();
        $users = $manager->getAllUsers();

        return $users;
    }
}