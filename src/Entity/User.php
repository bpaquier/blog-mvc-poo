<?php

namespace App\Entity;

use App\Vendors\Flash;

class User {
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $role;
    private $password;

    public function setEmail(string $email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            Flash::setFlash('invalid mail', 'alert');
        }
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function getId () {
        return $this->id;
    }

    public function getFirstname () {
        return $this->first_name;
    }

    public function getLastName () {
        return $this->last_name;
    }

    public function getEmail () {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function getPassword () {
        return $this->password;
    }
}