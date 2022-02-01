<?php

use JetBrains\PhpStorm\Pure;

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserByEmail(string $email) : ?User {
        $stat = $this->database->connect()->prepare('
            Select * FROM "user" WHERE "email" = :email
        ');

        $stat->bindParam(':email', $email, PDO::PARAM_STR);
        $stat->execute();

        $user = $stat->fetch(PDO::FETCH_ASSOC);

        return $this->returnNewUser($user);
    }

    public function getUserById(int $id) : ?User {
        $stat = $this->database->connect()->prepare('
            Select * FROM "user" WHERE id_user = :id
        ');

        $stat->bindParam(':id', $id, PDO::PARAM_INT);
        $stat->execute();

        $user = $stat->fetch(PDO::FETCH_ASSOC);

        return $this->returnNewUser($user);
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
        $this->logAction("Insert on user");
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

    public function getInformationOfUser(int $id){
        $stat = $this->database->connect()->prepare('
            select * 
            from get_information_of_users
            where id_user=:id
        ');

        $stat->bindParam(':id', $id);
        $stat->execute();

        return $stat->fetch(PDO::FETCH_ASSOC);
    }

    public function getInformationOfUsersDiet(int $id){
        $stat = $this->database->connect()->prepare('
            SELECT tdee, protein_ratio, carbs_ratio, fat_ratio 
            from user_diet_info
            WHERE id_user=:id
        ');

        $stat->bindParam(':id', $id);
        $stat->execute();

        return $stat->fetch(PDO::FETCH_ASSOC);
    }

    public function updateInformationOfUser(int $id, $arr){
        $stat = $this->database->connect()->prepare('
            UPDATE information
            SET weight = ?,
                id_gender = ?,
                age = ?,
                id_activity_work = ?,
                id_activity_post_work = ?,
                id_diet_type = ?,
                additional_calories = ?
            WHERE id_user = ?;
        ');

        $stat->execute([
            intval($arr['weight']),
            intval($arr['id_gender']),
            intval($arr['age']),
            intval($arr['id_activity_work']),
            intval($arr['id_activity_post_work']),
            intval($arr['id_diet_type']),
            intval($arr['additional_calories']),
            $id
        ]);
        $this->logAction("Update on information");
    }

    public function updateUsersTdee(int $id, int $tdee){
        $stat = $this->database->connect()->prepare('
            UPDATE user_diet_info SET tdee = ? where id_user=?;
        ');

        $stat->execute([
            $tdee,
            $id
        ]);
        $this->logAction("Update on user_diet_info");
    }

    public function updateUsersRatios($id, $arr){
        $stat = $this->database->connect()->prepare('
            UPDATE user_diet_info SET 
                protein_ratio = ?,
                carbs_ratio = ?,
                fat_ratio = ?
            where 
                id_user=?;
        ');

        $stat->execute([
            intval($arr['protein_ratio']),
            intval($arr['carbs_ratio']),
            intval($arr['fat_ratio']),
            $id
        ]);
        $this->logAction("Update on user_diet_info");
    }

    private function returnNewUser($user): ?User{
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
}