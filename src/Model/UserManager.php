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
                SuccessHandler::successLogin($user['role'], $user['first_name'], $user['user_id'], "/");
            } else {
                ErrorHandler::wrongLogin();
            }
        }

        return $user;
    }

    public function logout() {
        unset($_SESSION['user']);
    }

    public function add(array $data){
        try {

            $userEntity = new User();
            $userEntity->setUser($data);
            $user = $userEntity->getUser();
            $query = $this->db->prepare('INSERT INTO users (first_name, last_name, email, role, password) VALUES (:firstName, :lastName, :email, :role, :password)');
            $query->bindValue(':firstName', $user['first_name'], \PDO::PARAM_STR);
            $query->bindValue(':lastName', $user['last_name'], \PDO::PARAM_STR);
            $query->bindValue(':email', $user['email'], \PDO::PARAM_STR);
            $query->bindValue(':role', $user['role'], \PDO::PARAM_STR);
            $query->bindValue(':password', $user['password'], \PDO::PARAM_STR);
            $query->execute();
            return $this->db->lastInsertId();

        } catch (\PDOException $e) {
            ErrorHandler::homeRedirect($e->getMessage());
        }
    }

    public function update(array $data) {
        try {
            $userEntity = new User();
            $userEntity->setUser($data);
            $user = $userEntity->getUser();

            $filteredUsers = [];
            foreach ($user as $key => $item) {
                if($item !== NULL) {
                    $filteredUsers[$key] = $item;
                }
            }

           $keysString = "";

            foreach ($filteredUsers as $key => $value) {
                $keysString .= $key . " = :" . "$key" . ", ";
            }

            $filteredUsers['id'] = intval($_SESSION['user']['id']);

            $sql = 'UPDATE users SET '. substr($keysString, 0, -2) .' WHERE user_id = :id';

            $query = $this->db->prepare($sql);
            $query->execute($filteredUsers);
            return self::getSingleUser(intval($_SESSION['user']['id']));

        } catch (\PDOException $e) {
            echo $e->getMessage();
          ErrorHandler::homeRedirect($e->getMessage());
        }
    }
}