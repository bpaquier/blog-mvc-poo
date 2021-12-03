<?php

namespace App\Entity;

use App\Vendors\Flash;

class User {

    private $first_name;
    private $last_name;
    private $email;
    private $role;
    private $password;

    public function setUser($data) {
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setFirstName($data['first_name']);
        $this->setLastName($data['last_name']);
        $this->setRole($data['role']);
    }

    public function setEmail(string $email) {
        if(strlen($email) > 0) {
            $checkMail = htmlspecialchars($email);
            if(filter_var($checkMail, FILTER_VALIDATE_EMAIL)) {
                $this->email = $checkMail;
            } else {
                Flash::setFlash('invalid mail', 'alert');
            }
        } else {
            $this->email = NULL;
        }

    }

    public function setPassword(string $password) {
        if(strlen($password) > 0) {
            $this->password = password_hash((htmlspecialchars($password)), PASSWORD_BCRYPT);
        } else {
            $this->password = NULL;
        }

    }

    public function setFirstName(string $firstName) {
        if(strlen($firstName) > 0){
            $this->first_name = htmlspecialchars($firstName);
        } else {
            $this->first_name = NULL;
        }

    }

    public function setLastName(string $lastName) {
        if(strlen($lastName) > 0) {
            $this->last_name = htmlspecialchars($lastName);
        } else {
            $this->last_name = NULL;
        }
    }

    public function setRole(string $role) {
        if(strlen($role) > 0) {
            $this->role = htmlspecialchars($role);
        } else {
            $this->first_name = NULL;
        }
    }


    public function getUser() {
        $user['first_name'] = $this->first_name;
        $user['last_name'] = $this->last_name;
        $user['email'] = $this->email;
        $user['role'] = $this->role;
        $user['password'] = $this->password;

        return $user;
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
