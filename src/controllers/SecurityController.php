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

        $user = new User($email,$password,$name,"",-1);
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

    public function yourAccount() {
        session_start();
        if(isset($_SESSION['userID'])){
            $user = $this->userRepository->getUserById($_SESSION['userID']);
            $this->render('yourAccount', ['user' => $user]);
        }
    }

    public function favourites() {
        $this->render('favourites');
    }

    public function information() {
        $this->render('information');
    }

    public function getInformation(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['userID'])){

            echo json_encode($this->userRepository->getInformationOfUser($_SESSION['userID']) + $this->userRepository->getInformationOfUsersDiet($_SESSION['userID']));
        }
    }

    public function updateInformation(){
        if(!isset($_SESSION)){
            session_start();
        }

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if(isset($_SESSION['userID']) && $contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            $this->userRepository->updateInformationOfUser($_SESSION['userID'], $decoded);
            $this->userRepository->updateUsersRatios($_SESSION['userID'], $decoded);
            $this->updateUsersTdee($_SESSION['userID']);
        }
    }

    public function orderHistory() {
        $this->render('orderHistory');
    }

    public function settings() {
        $this->render('settings');
    }

    private function updateUsersTdee($id){
        $infoArr = $this->userRepository->getInformationOfUser($id);
        $gender = $infoArr['gender'];
        $age = $infoArr['age'];
        $weight = $infoArr['weight'];
        $activityWork = $infoArr['activity_work'];
        $activityPostWork = $infoArr['activity_post_work'];
        $dietType = $infoArr['diet_type'];
        $userCalorieChange = $infoArr['additional_calories'];

        if($gender == 'male'){
            if($age >= 10 && $age<=17){
                $bmr = 0.074*$weight+2.754;
            }
            elseif ($age>=18 && $age<=29){
                $bmr = 0.063*$weight+2.896;
            }
            elseif ($age>=30 && $age<=59){
                $bmr = 0.048*$weight+3.653;
            }
            elseif ($age>=60 && $age<=74){
                $bmr = 0.04999*$weight+2.930;
            }
            elseif($age>=75){
                $bmr = 0.0350*$weight+3.434;
            }
        }
        else{
            if($age >= 10 && $age<=17){
                $bmr = 0.056*$weight+2.898;
            }
            elseif ($age>=18 && $age<=29){
                $bmr = 0.062*$weight+2.036;
            }
            elseif ($age>=30 && $age<=59){
                $bmr = 0.034*$weight+3.538;
            }
            elseif ($age>=60 && $age<=74){
                $bmr = 0.0386*$weight+2.875;
            }
            elseif($age>=75){
                $bmr = 0.0410*$weight+2.610;
            }
        }
        if(!isset($bmr)){
            die("You've got to be older than 10 to use our applciation!");
        }
        $bmr *= 239;

        if($gender == 'male'){
            if($activityWork == 'lightly active'){
                if($activityPostWork == 'lightly active'){ $bmrMultiplier = 1.4;}
                elseif($activityPostWork == 'moderately active'){ $bmrMultiplier = 1.5;}
                elseif($activityPostWork == 'very active'){ $bmrMultiplier = 1.6;}
            }
            elseif($activityWork == 'moderately active'){
                if($activityPostWork == 'lightly active'){ $bmrMultiplier = 1.6;}
                elseif($activityPostWork == 'moderately active'){ $bmrMultiplier = 1.7;}
                elseif($activityPostWork == 'very active'){ $bmrMultiplier = 1.8;}
            }
            elseif($activityWork == 'very active'){
                if($activityPostWork == 'lightly active'){ $bmrMultiplier = 1.7;}
                elseif($activityPostWork == 'moderately active'){ $bmrMultiplier = 1.8;}
                elseif($activityPostWork == 'very active'){ $bmrMultiplier = 1.9;}
            }
        }
        else{
            if($activityWork == 'lightly active'){
                if($activityPostWork == 'lightly active'){ $bmrMultiplier = 1.4;}
                elseif($activityPostWork == 'moderately active'){ $bmrMultiplier = 1.5;}
                elseif($activityPostWork == 'very active'){ $bmrMultiplier = 1.6;}
            }
            elseif($activityWork == 'moderately active'){
                if($activityPostWork == 'lightly active'){ $bmrMultiplier = 1.5;}
                elseif($activityPostWork == 'moderately active'){ $bmrMultiplier = 1.6;}
                elseif($activityPostWork == 'very active'){ $bmrMultiplier = 1.7;}
            }
            elseif($activityWork == 'very active'){
                if($activityPostWork == 'lightly active'){ $bmrMultiplier = 1.5;}
                elseif($activityPostWork == 'moderately active'){ $bmrMultiplier = 1.6;}
                elseif($activityPostWork == 'very active'){ $bmrMultiplier = 1.7;}
            }
        }
        $tdee = $bmr*$bmrMultiplier;

        if($dietType == 'cut')
            $tdee -= 300;
        elseif($dietType == 'bulk')
            $tdee += 300;

        $tdee += $userCalorieChange;

        $this->userRepository->updateUsersTdee($id, intval($tdee));
    }

    private function updateUsersRatios(){
        if(!isset($_SESSION)){
            session_start();
        }
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if(isset($_SESSION['userID']) && $contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

//            echo "arr: ".var_dump($decoded)."\n";

            $this->userRepository->updateUsersRatios($_SESSION['userID'],$decoded);
            echo json_encode($this->userRepository->getInformationOfUser($_SESSION['userID']));
        }
    }
}