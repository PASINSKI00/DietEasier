<?php

require "Router.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('home', 'DefaultController');
Router::get('chooseMeals', 'DefaultController');
Router::run($path);

?>