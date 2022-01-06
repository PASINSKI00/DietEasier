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

    <script type="text/javascript" src="public/js/search.js" defer></script>
    <script type="text/javascript" src="public/js/chooseMeals.js" defer></script>
</head>

<body>
    <div class="container">
        <nav class="navbar-top">
            <a href="home"  class="navbar-logo">
                <img src="public/img/side_logo_transparent.png" alt="company's logo">
            </a>

            <input id="search-meal" class="enlarge" placeholder="Search..."></input>
            <?php
            if(!isset($_SESSION)){
                session_start();
            }
            if(isset($_SESSION['loggedIn'])){
                require("shared/loggedIn.php");
            }
            else{
                require("shared/login.php");
            }
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
                        <div class="list sort-by-list">
                            <button class="enlarge sort-button btn">Price</button>
                            <button class="enlarge sort-button btn">Price</button>
                        </div>
                    </li>
                    
                    <li class="side-navbar-item">
                        <a class="side-navbar-link">
                            <i class="fas fa-filter"></i>
                            <span class="side-navbar-link-text">Categories</span>
                        </a>
                        <div class="list categories-list">
                        </div>
                    </li>
                    
                    <li class="side-navbar-item">
                    </li>
                </ul>
            </nav>
        </aside>
        


        <div id="second-container">
            <main id="meals">
<!--                //TODO Change to fetch()-->
                <?php foreach ($meals as $meal): ?>
                    <section class="meal">
                        <img src="public/uploads/<?= $meal->getImage(); ?>" alt="meal picture">

                        <div class="meal-title"><?= $meal->getTitle(); ?></div>

                        <div class="meal-ingridients">
                            <?php
//                                var_dump($ingredients[$meal->getId()]);
                                foreach ($ingredients[$meal->getId()] as $key => $ingredient){
                                    if (!($key === array_key_first($ingredients[$meal->getId()]))) {
                                        echo ", ";
                                    }
                                    echo $ingredient["name"];
                                }
                            ?>
                        </div>

                        <a class="meal-information" href="meal/<?= $meal->getId() ?>">read more...</a>

                        <button class="meal-add-button" onclick="addMealToDay(<?= $meal->getId() ?>)">
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
<!--                        <span class="ingridents">ingredients</span>-->
                    </div>

                    <a class="meal-information" href="/meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </section>
            </template>

            <aside id="meal-assigner">
                <div class="meal-assigner-title">Choosing for day...</div>
                
                <div id="day-numbers">
                    <button class="day-btn" id="add-day">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                
                <div class="chosen-meals">
                    <div class="chosen-meal">
                        <div class="chosen-meal-img-or-i"><img src="public/img/pancakes.jpg" alt="pancakes"></div>
                        <div class="chosen-meal-content">Pancakes with maple syrup and blueberries</div>
                    </div>
                </div>

                <a href="whatYouChose" class="meal-assigner-continue enlarge">Continue</a>
            </aside>
        </div>
    </div>
</body>
</html>