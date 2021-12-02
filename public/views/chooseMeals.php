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
</head>

<body>
    <div class="container">
        <nav class="navbar-top">
            <a href="home">
                <img class="navbar-logo" src="public/img/side_logo_transparent.png" alt="company's logo">
            </a>
            
            <input id="search-meal" class="enlarge" placeholder="Search..."></input>

            <div class="login-buttons">
                <button class="text-button sign-up enlarge" onclick="openSignUp()">Sign up</button>
                
                <button class="text-button log-in enlarge" onclick="openLogin()">Log in</button>
                   
                <div class="overlay" id="overlay" onclick="hideLogins()"></div>
            
                <div class="login" id="log-in">
                    <i class="fas fa-times exit-icon" onclick="hideLogins()"></i>

                    <h1>Log in to Your account</h1>

                    <form action="loginChooseMeals" method="POST">
                        <input name="email" type="text" placeholder="E-mail">
                        <input name="password" type="password" placeholder="Password">
                        <button class="login-button enlarge" type="submit">Login</button>
                    </form>
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <div class="texts">
                        Don't have an account yet?
                        <span class="login-href-links" onclick="hideLogins(), openSignUp()">Register now</span>
                        <br>
                        <span class="login-href-links">Can't log in?</span>
                    </div>
                </div>
                
                <div class="login signup" id="sign-up">
                    <i class="fas fa-times exit-icon" onclick="hideLogins()"></i>

                    <h1>Create a new account</h1>

                    <form>
                        <input name="name" type="text" placeholder="Name">
                        <input name="email" type="text" placeholder="E-mail">
                        <input name="password" type="password" placeholder="Password">
                        <input name="re-password" type="password" placeholder="Repeat password">
                        <button class="enlarge login-button register-button">Register</button>
                    </form>
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <div class="texts">
                        Already have an account?
                        <span class="login-href-links" onclick="hideLogins(), openLogin()">Log in now</span>
                        <br>
                    </div>
                </div>
            </div>
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
                            <input type="checkbox" name="cat" id="sort1" value="" class="enlarge"></input>
                            <label for="sort1">Hello</label><br>
                            <input type="checkbox" name="cat" id="sort2" value="" class="enlarge"></input>
                            <label for="sort2">Hello</label><br>
                            <input type="checkbox" name="cat" id="sort3" value="" class="enlarge"></input>
                            <label for="sort3">Hello</label><br>
                            <input type="checkbox" name="cat" id="sort4" value="" class="enlarge"></input>
                            <label for="sort4">Hello</label><br>
                        </div>
                    </li>
                    
                    <li class="side-navbar-item">
                        <a class="side-navbar-link">
                            <i class="fas fa-filter"></i>
                            <span class="side-navbar-link-text">Categories</span>
                        </a>
                        <div class="list">
                            <input type="checkbox" name="cat" id="cat1" value="" class="enlarge"></input>
                            <label for="cat1">Hello</label><br>
                            <input type="checkbox" name="cat" id="cat2" value="" class="enlarge"></input>
                            <label for="cat2">Hello</label><br>
                            <input type="checkbox" name="cat" id="cat3" value="" class="enlarge"></input>
                            <label for="cat3">Hello</label><br>
                            <input type="checkbox" name="cat" id="cat4" value="" class="enlarge"></input>
                            <label for="cat4">Hello</label><br>
                            <input type="checkbox" name="cat" id="cat5" value="" class="enlarge"></input>
                            <label for="cat5">Hello</label><br>
                            <input type="checkbox" name="cat" id="cat6" value="" class="enlarge"></input>
                            <label for="cat6">Hello</label><br>
                            <input type="checkbox" name="cat" id="cat7" value="" class="enlarge"></input>
                            <label for="cat7">Hello</label><br>
                            <input type="checkbox" name="cat" id="cat8" value="" class="enlarge"></input>
                            <label for="cat8">Hello</label><br>
                        </div>  
                    </li>
                    
                    <li class="side-navbar-item">
                    </li>
                </ul>
            </nav>
        </aside>
        

        <div id="second-container">
            <main id="meals">
                
                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="meal">
                    <img src="public/img/pancakes.jpg" alt="pancakes with maple syroup and blueberries">
                    
                    <div class="meal-title">Pancakes with maple syroup and blueberries</div>
                    
                    <div class="meal-ingridients">
                        <span class="ingridents">flour, milk, eggs</span>
                    </div>

                    <a class="meal-information" href="./meal">read more...</a>

                    <button class="meal-add-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </main>

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

    <script src="public/js/script.js"></script>
</body>
</html>