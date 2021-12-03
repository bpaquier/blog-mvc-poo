<?php

namespace App\Vendors;

class ErrorHandler
{
    public static function homeRedirect (string $message) {
        Flash::setFlash($message, 'alert');
        header('Location: /');
    }

    public static function wrongLogin () {
        Flash::setFlash("wrong email and password", 'alert');
    }

    public static function redirectIfNoLogin() {
        if(!isset($_SESSION['user'])) {
            header('Location: /');
        }
    }

    public static function redirectIfNoAdmin() {
        if($_SESSION['user']['role'] !== "admin") {
            header('Location: /');
        }
    }

    public static function redirectIfLogin() {
        if(isset($_SESSION['user'])) {
            header('Location: /');
        }
    }


}