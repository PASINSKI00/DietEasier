<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Meal.php';
require_once __DIR__.'/../repository/MealRepository.php';

class MealController extends AppController
{
    const MAX_FILE_SIZE = 2400*2400;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $mealRepository;

    public function __construct()
    {
        parent::__construct();
        $this->mealRepository = new MealRepository();
    }

    public function chooseMeals() {
        $meals = $this->mealRepository->getMeals();
        $this->render('chooseMeals', ['meals' => $meals]);
    }

    public function getMeal(int $id) {
        $mealRepository = new MealRepository();

        if (!$this->isPost()){
            return $this->render('chooseMeals');
        }

        $id = $_POST["id"];

        $meal = $mealRepository->getMeal($id);

        if (!$meal) {
            return $this->render('chooseMeals', ['messages' => ["Meal not found"]]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/meal");
    }

    public function addMeal() {

        if($this->isPost() && is_uploaded_file($_FILES['image']['tmp_name']) && $this->validate($_FILES['image'])) {
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['image']['name']
            );

            $meal = new Meal("1", $_POST['name'],  $_POST['time'], $_POST['recipe'], $_POST['description'], $_FILES['image']['name']);
            $this->mealRepository->addMeal($meal);

            return $this->render('meal', ['meal' => $meal]);
        }

        $this->render('addMeal', ['messages' => $this->messages]);
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->mealRepository->searchMealsByTitle($decoded['search']));
        }
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