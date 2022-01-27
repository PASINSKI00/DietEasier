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

    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/whatYouChose.css">
</head>

<template class="chosen-meal">
    <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
    <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
    <ul>
        <li>calories: 1789 kcal</li>
        <li>protein: 789 g</li>
        <li>carbs: 789 g</li>
        <li>fats: 789 g</li>
        <br>
        Multiplier
        <br>
        <input type="number" min="0" step="0.01">
    </ul>
</template>

<template id="meal-template">
    <section class="meal">
        <img src="" alt="meal picture">

        <div class="meal-title">title</div>

        <div class="meal-ingridients">
            <!--                        <span class="ingridents">ingredients</span>-->
        </div>

        <a class="meal-information" href="/meal">read more...</a>

        <button class="meal-add-button">
            <i class="fas fa-plus"></i>
        </button>
    </section>
</template>

<body>
    <div class="container">
        <?php
            require("shared/navbarTopYourAccount.php");
        ?>

        <section class="big-text">
            Check out what you chose and make changes if necessary!
        </section>

        <main id="days-container">
            <section class="day">
                <div class="chosen-meals">
                    <h3>Day 1</h3>
                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
                        <ul>
                            <li>calories: 1789 kcal</li>
                            <li>protein: 789 g</li>
                            <li>carbs: 789 g</li>
                            <li>fats: 789 g</li>
                            <br>
                            Multiplier
                            <br>
                            <input type="number" min="0" step="0.01">
                        </ul>
                    </div>

                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
                        <ul>
                            <li>calories: 1789 kcal</li>
                            <li>protein: 789 g</li>
                            <li>carbs: 789 g</li>
                            <li>fats: 789 g</li>
                        </ul>
                    </div>

                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
                        <ul>
                            <li>calories: 1789 kcal</li>
                            <li>protein: 789 g</li>
                            <li>carbs: 789 g</li>
                            <li>fats: 789 g</li>
                        </ul>
                    </div>

                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
                        <ul>
                            <li>calories: 1789 kcal</li>
                            <li>protein: 789 g</li>
                            <li>carbs: 789 g</li>
                            <li>fats: 789 g</li>
                        </ul>
                    </div>

                    <div class="day-summary">
                        <ul>
                            <li>calories: 1789 kcal</li>
                            <li>protein: 789 g</li>
                            <li>carbs: 789 g</li>
                            <li>fats: 789 g</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="day">
                <div class="chosen-meals">
                    <h3>Day 2</h3>
                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
                    </div>

                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
                    </div>
                </div>
            </section>

            <section class="day">
                <div class="chosen-meals">
                    <h3>Day 3</h3>
                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
                    </div>
                </div>
            </section>
        </main>

        <div class="bottom-nav">
            <a href="chooseMeals" class="return enlarge">Return</a>
            <a href="shoppingList" class="continue enlarge">Confirm</a>
        </div>
    </div>
</body>
</html>