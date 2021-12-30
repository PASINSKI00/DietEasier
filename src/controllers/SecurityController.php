<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login() {
        $userRepository = new UserRepository();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
        }

        if (!isset($decoded)){
            http_response_code(401);
            die();
        }

        $email = $decoded["email"];
        $password = $decoded["password"];

        $user = $userRepository->getUser($email);

        if ($user == null) {
            header('Content-type: application/json');
            http_response_code(401);
            die();
        }

        else if ($user->getEmail() !== $email || $user->getPassword() !== $password) {
            header('Content-type: application/json');
            http_response_code(401);
            die();
        }

        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['userID'] = $user->getID();

//        echo json_encode($_SESSION);

        header('Content-type: application/json');
        http_response_code(200);
    }

    public function register(){
        $userRepository = new UserRepository();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
        }

        if (!isset($decoded)){
            http_response_code(401);
            die();
        }

        $name = $decoded["name"];
        $email = $decoded["email"];
        $password = $decoded["password"];

        $user = new User($email,$password,$name);
        header('Content-type: application/json');

        if($userRepository->addUser($user)){
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['userID'] = $user->getID();
            http_response_code(200);
            die();
        }
        else {
            http_response_code(401);
            die();
        }

    }
}