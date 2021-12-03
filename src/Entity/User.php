<?php

namespace App\Entity;

use App\Vendors\Flash;

class User {

    private $first_name;
    private $last_name;
    private $email;
    private $role;
    private $password;

    public function setUser(string $email, string $password, string $firstName, string $lastName, string $role) {
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setRole($role);
    }

    public function setEmail(string $email) {
        $checkMail = htmlspecialchars($email);
        if(filter_var($checkMail, FILTER_VALIDATE_EMAIL)) {
            $this->email = $checkMail;
        } else {
            Flash::setFlash('invalid mail', 'alert');
        }
    }

    public function setPassword(string $password) {
        $this->password = htmlspecialchars($password);
    }

    public function setFirstName(string $firstName) {
        $this->first_name = htmlspecialchars($firstName);
    }

    public function setLastName(string $lastName) {
        $this->last_name = htmlspecialchars($lastName);
    }

    public function setRole(string $role) {
        $this->role = htmlspecialchars($role);
    }


    public function getUser() {
        $user['$fist_name'] = $this->first_name;
        $user['$last_name'] = $this->last_name;
        $user['$email'] = $this->email;
        $user['$role'] = $this->role;
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