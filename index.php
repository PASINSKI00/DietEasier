<?php

require "Router.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('chooseMeals', 'MealController');
Router::get('favourites', 'DefaultController');
Router::get('information', 'DefaultController');
Router::get('meal', 'MealController');
Router::get('orderHistory', 'DefaultController');
Router::get('settings', 'DefaultController');
Router::get('shoppingList', 'DefaultController');
Router::get('whatYouChose', 'DefaultController');
Router::get('yourAccount', 'DefaultController');
Router::get('getAllCategories', 'MealController');
Router::get('getAllIngredients', 'MealController');
Router::get('getMealTitleAndImage', 'MealController');
Router::get('logout', 'SecurityController');
Router::get('getIngredientsOfAMeal', 'MealController');

Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('addMeal', 'MealController');
Router::post('search', 'MealController');


Router::run($path);

