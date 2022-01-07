<?php

require "Router.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('chooseMeals', 'MealController');
Router::get('favourites', 'SecurityController');
Router::get('information', 'SecurityController');
Router::get('meal', 'MealController');
Router::get('orderHistory', 'SecurityController');
Router::get('settings', 'SecurityController');
Router::get('shoppingList', 'DefaultController');
Router::get('whatYouChose', 'DefaultController');
Router::get('yourAccount', 'SecurityController');
Router::get('getAllCategories', 'MealController');
Router::get('getAllIngredients', 'MealController');
Router::get('getMealTitleAndImage', 'MealController');
Router::get('logout', 'SecurityController');
Router::get('getIngredientsOfAMeal', 'MealController');
Router::get('getInformation', 'SecurityController');

Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('isEmailTaken', 'SecurityController');
Router::post('addMeal', 'MealController');
Router::post('search', 'MealController');
Router::post('searchCategory', 'MealController');
Router::post('updateInformation', 'SecurityController');

Router::run($path);

