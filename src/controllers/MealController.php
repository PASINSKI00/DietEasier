<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Meal.php';

class MealController extends AppController
{
    const MAX_FILE_SIZE = 2400*2400;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function addMeal() {

        if($this->isPost() && is_uploaded_file($_FILES['image']['tmp_name']) && $this->validate($_FILES['image'])) {
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['image']['name']
            );

            $meal = new Meal($_POST['name'], "unknown", $_POST['time'], $_POST['recipe'], $_POST['description'], $_FILES['image']['name']);

            return $this->render('meal', ['meal' => $meal]);
        }

        $this->render('addMeal', ['messages' => $this->messages]);
    }

    private function validate(array $image) : bool
    {
        if($image['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large!';
            return false;
        }

        if(!isset($image['type']) || !in_array($image['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported!';
            return false;
        }

        return true;
    }

}