<?php

namespace App\Vendors;

class SuccessHandler
{
    public static function successLogin(string $role ){
        $_SESSION['user']['connected'] = true;
        $_SESSION['user']['role'] = $role;
    }
}