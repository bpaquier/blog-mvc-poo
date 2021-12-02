<?php

namespace App\Vendors;

class Flash
{
    public static function setFlash(string $message, string $type) {
        $_SESSION['flash']['message'] = htmlspecialchars($message);
        $_SESSION['flash']['type'] = $type;
    }

    public static function hasFlash() {
        return isset($_SESSION['flash']['message']);
    }

    public static function getFlash() {
        if(isset($_SESSION['flash']['message'])) {
            $message = $_SESSION['flash']['message'];
            $type = $_SESSION['flash']['type'];
            unset($_SESSION['flash']);

            if($type === 'alert') {
                return "<div class='alert alert-danger' role='alert'>" . $message  . "</div>";
            } else {
                return "<div class='alert alert-success' role='alert'>" . $message . "</div>";
            }

        }
    }
}