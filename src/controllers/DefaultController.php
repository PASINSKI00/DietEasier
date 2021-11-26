<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function home() {
        //TODO display home.html
        $this->render('home');
    }

    public function chooseMeals() {
        //TODO display home.html
        $this->render('chooseMeals');
    }
}