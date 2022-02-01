<?php

use JetBrains\PhpStorm\Pure;

require_once __DIR__.'/../../Database.php';

class Repository
{
    protected Database $database;

    public function __construct() {
        $this->database = new Database();
    }

    protected function logAction(String $action){
        $statement = $this->database->connect()->prepare('
            Insert into logs(id_user,action,host) VALUES (?,?,?)
        ');

        $statement->execute([
            $_SESSION['userID']?:0,
            $action,
            $_SERVER['REMOTE_ADDR']
        ]);
    }
}