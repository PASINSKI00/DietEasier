<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Meal.php';

class MealRepository extends Repository
{
    public function getMeal(int $id) : ?Meal {
        $stat = $this->database->connect()->prepare('
            Select * FROM public.meal WHERE id_meal= :id
        ');

        $stat->bindParam(':id', $id, PDO::PARAM_INT);
        $stat->execute();

        $meal = $stat->fetch(PDO::FETCH_ASSOC);

        if ($meal == false) {
            //TODO try catch, returns exception error
            return null;
        }

        return new Meal(
            $meal['id_author'],
            $meal['title'],
            $meal['time_to_prep'],
            $meal['recipe'],
            $meal['description'],
            $meal['image'],
            $meal['id_meal']
        );
    }

    public function addMeal(Meal $meal) : void{
        $date = new DateTime();
        $statement = $this->database->connect()->prepare('
            INSERT INTO meal (id_author, title, time_to_prep, recipe, description, image)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        //TODO get this from logged user
        $idAuthor = 1;
        $statement->execute([
            $idAuthor,
            $meal->getTitle(),
            $meal->getTime(),
            $meal->getRecipe(),
            $meal->getDescription(),
            $meal->getImage()]
        );
    }

    public function getMeals(): array {
        $result = [];

        $statement = $this->database->connect()->prepare('
            SELECT * FROM public.meal;
        ');

        $statement->execute();
        $meals = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($meals as $meal){
            $result[] = new Meal(
                $meal['id_author'],
                $meal['title'],
                $meal['time_to_prep'],
                $meal['recipe'],
                $meal['description'],
                $meal['image'],
                $meal['id_meal']
            );
        }

        return $result;
    }

    public function searchMealsByTitle(string $searchString) {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM meal WHERE LOWER(title) LIKE :search'
        );

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCategories() : array{
        $stmt = $this->database->connect()->prepare('
            SELECT name from categories
        ');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllIngredients() : array{
        $stmt = $this->database->connect()->prepare('
            SELECT name from ingredient
        ');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}