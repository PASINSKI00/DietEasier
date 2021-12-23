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

        if($user->getEmail() == $email && $user->getPassword() == $password) {
            header('Content-type: application/json');
            http_response_code(200);
        }
    }
}