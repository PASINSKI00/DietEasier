<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Choose the meals that You want!</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/chooseMeals.css">
    <link rel="stylesheet" type="text/css" href="public/css/hover.css">
    <script type="text/javascript" src="public/js/script.js" defer></script>
    <script type="text/javascript" src="public/js/search.js" defer></script>
</head>

<body>
    <div class="container">
        <nav class="navbar-top">
            <a href="home"  class="navbar-logo">
                <img src="public/img/side_logo_transparent.png" alt="company's logo">
            </a>

            <input id="search-meal" class="enlarge" placeholder="Search..."></input>
            <?php
            require("shared/login.php");
            ?>
        </nav>

        <aside>
            <nav>
                <ul class="side-navbar">
                    <li class="side-navbar-item">
                        <a class="side-navbar-link">
                            <i class="fas fa-sort"></i>
                            <span class="side-navbar-link-text">Sort by</span>
                        </a>
                        <div class="list">
                            <form action="/chooseMeals/1" method="get">
                                <input type="checkbox" name="sortBy[0]" id="sort1" value="Price" class="enlarge"></input>
                                <label for="sort1">Price</label><br>
                                <input type="checkbox" name="sortBy[1]" id="sort2" value="Protein" class="enlarge"></input>
                                <label for="sort2">Protein</label><br>
                                <input type="checkbox" name="sortBy[2]" id="sort3" value="Carbs" class="enlarge"></input>
                                <label for="sort3">Carbs</label><br>
                                <input type="checkbox" name="sortBy[3]" id="sort4" value="Fats" class="enlarge"></input>
                                <label for="sort4">Fats</label><br>
                            </form>
                        </div>
                    </li>
                    
                    <li class="side-navbar-item">
                        <a class="side-navbar-link">
                            <i class="fas fa-filter"></i>
                            <span class="side-navbar-link-text">Categories</span>
                        </a>
                        <div class="list">
                            <form action="" method="get">
                                <input type="checkbox" name="category[0]" id="cat1" value="Breakfast" class="enlarge"></input>
                                <label for="cat1">Breakfast</label><br>
                                <input type="checkbox" name="category[1]" id="cat2" value="Lunch" class="enlarge"></input>
                                <label for="cat2">Lunch</label><br>
                                <input type="checkbox" name="category[2]" id="cat3" value="Supper" class="enlarge"></input>
                                <label for="cat3">Supper</label><br>
                            </form>
                        </div>  
                    </li>
                    
                    <li class="side-navbar-item">
                    </li>
                </ul>
            </nav>
        </aside>
        

        <div id="second-container">
            <main id="meals">
                <?php foreach ($meals as $meal): ?>
                    <section class="meal">
                        <img src="public/uploads/<?= $meal->getImage(); ?>" alt="meal picture">

                        <div class="meal-title"><?= $meal->getTitle(); ?></div>

                        <div class="meal-ingridients">
                            <span class="ingridents">flour, milk, eggs</span>
                        </div>

                        <a class="meal-information" href="./meal">read more...</a>

                        <button class="meal-add-button">
                            <i class="fas fa-plus"></i>
                        </button>
                    </section>
                <?php endforeach; ?>
            </main>

            <template id="meal-template">
                <section class="meal">
                    <img src="" alt="meal picture">

                    <div class="meal-title">title</div>

                    <div class="meal-ingridients">
                        <span class="ingridents">ingridients</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </section>
            </template>

            <aside id="meal-assigner">
                <div class="meal-assigner-title">Choosing for day...</div>
                
                <div id="day-numbers">
                    <input id="select1" name="day" type="radio" checked/>
                    <label for="select1">1</label>
                    <input id="select2" name="day" type="radio"/>
                    <label for="select2">2</label>
                    <input id="select3" name="day" type="radio"/>
                    <label for="select3">3</label>
                </div>
                
                <div class="chosen-meals">
                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
                    </div>

                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syroup and blueberries</div>
                    </div>

                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><i class="fas fa-utensils"></i></div>
                        <div class="chosen-meal-content">Choose your meal</div>
                    </div>

                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><i class="fas fa-utensils"></i></div>
                        <div class="chosen-meal-content">Choose your meal</div>
                    </div>

                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><i class="fas fa-utensils"></i></div>
                        <div class="chosen-meal-content">Choose your meal</div>
                    </div>

                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><i class="fas fa-utensils"></i></div>
                        <div class="chosen-meal-content">Choose your meal</div>
                    </div>


                </div>

                <a href="whatYouChose" class="meal-assigner-continue enlarge">Continue</a>
            </aside>
        </div>
    </div>
</body>
</html>