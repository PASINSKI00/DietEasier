<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function home() {
        $this->render('home');
    }

    public function favourites() {
        $this->render('favourites');
    }

    public function information() {
        $this->render('information');
    }

    public function orderHistory() {
        $this->render('orderHistory');
    }

    public function settings() {
        $this->render('settings');
    }

    public function shoppingList() {
        $this->render('shoppingList');
    }

    public function whatYouChose() {
        $this->render('whatYouChose');
    }

    public function yourAccount() {
        $this->render('yourAccount');
    }
}