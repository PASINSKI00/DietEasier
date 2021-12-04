<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function loginHome() {
        $userRepository = new UserRepository();

        if (!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('home', ['messages' => ["User doesn't exist!"]]);
        }

        if ($user->getEmail() !== $email || $user->getPassword() !== $password) {
            return $this->render('home', ['messages' => ["Wrong e-mail or password"]]);
        }

//        return $this->render('yourAccount');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/home");
    }

    public function loginChooseMeals() {
        $user = new User('jon.snow@gmail.com', 'admin', 'John', 'Snow');

        if (!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($user->getEmail() !== $email || $user->getPassword() !== $password) {
            return $this->render('chooseMeals', ['messages' => ["Wrong e-mail or password"]]);
        }

//        return $this->render('yourAccount');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/meal");
    }
}