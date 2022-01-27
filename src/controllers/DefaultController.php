<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function home() {
        $this->render('home');
    }

    public function shoppingList() {
        $this->isAllowedToVisit();
        $this->render('shoppingList');
    }

    public function whatYouChose() {
        $this->isAllowedToVisit();
        $this->render('whatYouChose');
    }
}