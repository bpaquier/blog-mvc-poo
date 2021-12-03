<?php

namespace App\Vendors;

class SuccessHandler
{
    public static function successLogin(string $role, string $firstName, int $id, string $redirectionTarget){
        unset($_SESSION['user']);
        $_SESSION['user']['role'] = $role;
        $_SESSION['user']['name'] = $firstName;
        $_SESSION['user']['id'] = $id;

        if(strlen($redirectionTarget) > 0) {
            header('Location: ' . $redirectionTarget);
        }
    }
}