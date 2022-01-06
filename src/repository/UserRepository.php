<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email) : ?User {
        $stat = $this->database->connect()->prepare('
            Select * FROM "user" WHERE "email" = :email
        ');

        $stat->bindParam(':email', $email, PDO::PARAM_STR);
        $stat->execute();

        $user = $stat->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            //TODO try catch, returns exception error
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['image'],
            $user['id_user']
            );
    }

    public function getUserById(int $id) : ?User {
        $stat = $this->database->connect()->prepare('
            Select * FROM "user" WHERE id_user = :id
        ');

        $stat->bindParam(':id', $id, PDO::PARAM_INT);
        $stat->execute();

        $user = $stat->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            //TODO try catch, returns exception error
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['image'] ?: "",
            $user['id_user']
        );
    }

    public function addUser(User $user): bool{
        $stat = $this->database->connect()->prepare('
            INSERT INTO "user" (email,password,name) VALUES (?,?,?)
        ');

        return $stat->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getName()
        ]);
    }

    public function isEmailTaken($email): bool
    {
        $stat = $this->database->connect()->prepare('
            SELECT email from "user" WHERE "email" = :email
        ');

         $stat->bindParam(':email', $email, PDO::PARAM_STR);
         $stat->execute();

         if($stat->rowCount() == 0)
             return false;

         return true;
    }
}