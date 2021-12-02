<?php

namespace App\Model;


class UserManager extends AbstractManager
{
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        $stmt = $this->executeQuery(
            "SELECT * FROM user"
        );
        return $stmt->fetchAll();
    }

    public function findByUsernameOrEmail($username, $email)
    {
        $stmt = $this->executeQuery(
            "SELECT * FROM user WHERE email = :email OR username = :username",
            [
                ":username" => $username,
                ":email"    => $email
            ]
        );
        return $stmt->fetch();
    }

    public function insertUser($username, $email, $hash)
    {
        return $this->executeQuery(
            "INSERT INTO user (username, email, password) VALUES (:u, :e, :p)",
            [
                ":u" => $username,
                ":e" => $email,
                ":p" => $hash
            ]
        );
    }
}