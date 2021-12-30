<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Read some more about our great meals!</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/meal.css">
</head>

<body>
    <div class="container">
        <?php
        require("shared/navbarTopYourAccount.php");
        ?>

        <div id="secondary-container">
                <div class="meal">
                    <div class="meal-title"><?= $meal->getTitle() ?></div>

                    <img src="/public/uploads/<?= $meal->getImage() ?>" alt="picture of a meal">

                    <ul class="meal-ingridients-list">
                        <?php
                        foreach ($ingredients as $ingredient){
                            echo '<li class="meal-ingridients-list-item">'.$ingredient['name'].": ".($ingredient['weight']*100)."g".'</li>';
                        }
                        ?>
                    </ul> 

                    <ul class="meal-macros-list">
                        <?php
                        $array = array(
                            "calories" => 0.0,
                            "protein"  => 0.0,
                            "carbs" => 0.0,
                            "fats" => 0.0,
                            "fiber" => 0.0
                        );

                        foreach ($ingredients as $ingredient){
                            $array['calories'] += $ingredient['kcal']*$ingredient['weight'];
                            $array['protein'] += $ingredient['protein']*$ingredient['weight'];
                            $array['carbs'] += $ingredient['carbohydrates']*$ingredient['weight'];
                            $array['fats'] += $ingredient['fats']*$ingredient['weight'];
                            $array['fiber'] += $ingredient['fiber']*$ingredient['weight'];
                        }

                        foreach ($array as $key => $value){
                            echo '<li class="meal-ingridients-list-item">'.$key.": ".$value.'</li>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="recipe">
                    <div class="recipe-title">Recipe</div>
                    <div class="recipe-content"><?= $meal->getRecipe() ?></div>
                </div>
            
            
                <div class="additional-information">
                    <div class="additional-information-title">Additional Information</div>
                    <div class="additional-information-content">
                        <h3>Author:</h3><p> <?= $authorsName; ?></p>
                        <h3>Time to prepare:</h3><p><?= $meal->getTime() ?> min</p>
                        <h3>Description:</h3><p><?= $meal->getDescription() ?></p>
                    </div>
                </div>
                
                <div class="reviews">
                    <div class="reviews-title">Reviews</div>
                    
                    <div class="review">
                        <div class="review-author">
                            <img src="/public/img/acoount-profile-picture.jpg" alt="pancakes">
                            <p class="review-author-name">Jack</p>
                        </div>

                        <div class="review-content">
                            Love them, bla bla bla bla bla bla
                        </div>
                    </div>

                    <div class="review">
                        <div class="review-author">
                            <img src="/public/img/acoount-profile-picture.jpg" alt="pancakes">
                            <p class="review-author-name">Jack</p>
                        </div>

                        <div class="review-content">
                            Love them, bla bla bla bla bla bla
                        </div>
                    </div>

                    <a href="#">read more...</a>
                </div>
        </div>

        <a href="/chooseMeals" class="return enlarge">Return</a>
    </div>
</body>
</html>