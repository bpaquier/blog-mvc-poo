<?php

namespace App\Entity;

class User {
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $role;
    private $password;

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