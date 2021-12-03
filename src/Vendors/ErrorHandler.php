<?php

namespace App\Vendors;

class ErrorHandler
{
    public static function homeRedirect (string $message) {
        Flash::setFlash($message, 'alert');
        header('Location: /home');
    }

    public static function wrongLogin () {
        Flash::setFlash("wrong email and password", 'alert');
    }
}