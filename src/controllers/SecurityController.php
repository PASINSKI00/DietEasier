<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login() {
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

        $email = strtolower($email);

        $user = $this->userRepository->getUser($email);

        if ($user == null) {
            header('Content-type: application/json');
            http_response_code(401);
            die();
        }

        if ($user->getEmail() !== $email || !password_verify($password, $user->getPassword())) {
            header('Content-type: application/json');
            http_response_code(401);
            die();
        }

        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['userID'] = $user->getID();

        header('Content-type: application/json');
        http_response_code(200);
    }

    public function register(){
        http_response_code(401);
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
        }

        if (!isset($decoded)){
            die();
        }

        $name = $decoded["name"];
        $email = $decoded["email"];
        $password = $decoded["password"];

        $email = strtolower($email);
        $password = password_hash($password,PASSWORD_BCRYPT);

        $user = new User($email,$password,$name,-1);
        header('Content-type: application/json');

        if($this->userRepository->addUser($user)){
            $user = $this->userRepository->getUser($email);
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['userID'] = $user->getID();
            http_response_code(200);
            die();
        }

        die();
    }

    public function logout(){

// Initialize the session.
// If you are using session_name("something"), don't forget it now!
        if(!isset($_SESSION))
            session_start();

// Unset all of the session variables.
        $_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

// Finally, destroy the session.
        session_destroy();

        $this->render('home',['messages' => "You have been successfully logged out!"]);
    }

    public function isEmailTaken(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
        }

        http_response_code(200);
        if($this->userRepository->IsEmailTaken($decoded['email'])){
            http_response_code(401);
            die();
        }
    }
}