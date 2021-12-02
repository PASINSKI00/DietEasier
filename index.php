<?php

require "Router.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('chooseMeals', 'DefaultController');
Router::get('favourites', 'DefaultController');
Router::get('information', 'DefaultController');
Router::get('meal', 'DefaultController');
Router::get('orderHistory', 'DefaultController');
Router::get('settings', 'DefaultController');
Router::get('shoppingList', 'DefaultController');
Router::get('whatYouChose', 'DefaultController');
Router::get('yourAccount', 'DefaultController');

Router::post('loginHome', 'SecurityController');
Router::post('loginChooseMeals', 'SecurityController');
Router::post('addMeal', 'MealController');


Router::run($path);

