<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/MealController.php';
require_once 'src/controllers/OrderController.php';

class Router {
    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public  static function run($url) {
        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        if(!array_key_exists($action, self::$routes)){
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;

        if($action == "") $action="home";

        //TODO Check if correct value
        $id = $urlParts[1] ?? '';
        $id = intval($id);

//        if($id == 1 && is_integer($id)){
//            die("id is 1 and int");
//        }

        $object->$action($id);
    }
}