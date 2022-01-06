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

    public function searchMealsByCategory($arr)
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT distinct meal.* FROM meal JOIN meal_categories mc on meal.id_meal = mc.id_meal WHERE mc.id_categories IN (?,?,?,?,?,?,?,?,?)'
        );

        $stmt->execute([
            $arr[0],
            $arr[1],
            $arr[2],
            $arr[3],
            $arr[4],
            $arr[5],
            $arr[6],
            $arr[7],
            $arr[8],
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCategories() : array{
        $stmt = $this->database->connect()->prepare('
            SELECT name, id_category from categories
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

    public function getIngredientsOfMeal($id) : array{
        $stmt = $this->database->connect()->prepare('
            Select i.name, mi.weight, i.kcal, i.protein, i.carbohydrates, i.fats, i.fiber from meal m join meal_ingredient mi on m.id_meal = mi.id_meal join ingredient i on mi.id_ingredient = i.id_ingredient where m.id_meal=:id
        ');

        $id = strval($id);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAuthorsName(int $id): string{
        $stat = $this->database->connect()->prepare('
            Select name FROM "user" u join meal m on u.id_user=m.id_author WHERE m.id_meal = :id
        ');

        $stat->bindParam(':id', $id, PDO::PARAM_INT);
        $stat->execute();

        $userName = $stat->fetch(PDO::FETCH_ASSOC);

        return $userName['name'];
    }
}