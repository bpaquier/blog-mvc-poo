<?php

namespace App\Vendors;

class SuccessHandler
{
    public static function successLogin(string $role, string $firstName, int $id){
        $_SESSION['user']['role'] = $role;
        $_SESSION['user']['name'] = $firstName;
        $_SESSION['user']['id'] = $id;
        header('Location: /');
    }
}