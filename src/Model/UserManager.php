<?php

namespace App\Model;

use App\Entity\Entity;
use App\Entity\User;
use App\Model\BaseManager;
use App\Vendors\ErrorHandler;
use App\Vendors\SuccessHandler;

class UserManager extends BaseManager
{
    public function getAllUsers() {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');

        return $query->fetchAll();
    }

    public function getSingleUser(int $id) {
        $query = $this->db->prepare('SELECT * FROM users WHERE user_id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');

        return $query->fetch();
    }

    public function login(string $mail, string $password){
        $userEntity = new User();
        $userEntity->setEmail($mail);

        $formatedMail = $userEntity->getEmail();

        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindValue(':email', $formatedMail, \PDO::PARAM_STR);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\User');

        $user = $query->fetch();

        if($user === false) {
            ErrorHandler::wrongLogin();
        } else {
            if(password_verify($password, $user['password'])) {
                SuccessHandler::successLogin($user['role']);
            } else {
                ErrorHandler::wrongLogin();
            }
        }

        return $user;
    }

    public function logout() {
        unset($_SESSION['user']);
    }
}