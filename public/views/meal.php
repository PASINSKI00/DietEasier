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
    <link rel="stylesheet" type="text/css" href="public/css/meal.css">
</head>

<body>
    <div class="container">
        <nav class="navbar-top">
            <a href="home">
                <img class="navbar-logo" src="public/img/side_logo_transparent.png" alt="company's logo">
            </a>

            <div class="login-buttons">
                <button class="text-button sign-up enlarge" onclick="openSignUp()">Sign up</button>
                
                <button class="text-button log-in enlarge" onclick="openLogin()">Log in</button>
                   
                <div class="overlay" id="overlay" onclick="hideLogins()"></div>
            
                <div class="login" id="log-in">
                    <i class="fas fa-times exit-icon" onclick="hideLogins()"></i>

                    <h1>Log in to Your account</h1>

                    <form action="loginMeal" method="POST">
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
        <div id="secondary-container">
                <div class="meal">
                    <div class="meal-title"><?= $meal->getTitle() ?></div>

                    <img src="public/uploads/<?= $meal->getImage() ?>" alt="picture of a meal">

                    <ul class="meal-ingridients-list">
                        <li class="meal-ingridients-list-item">Flour: 150g</li>
                        <li class="meal-ingridients-list-item">Blueberries: 200g</li>
                        <li class="meal-ingridients-list-item">Eggs: 200g</li>
                        <li class="meal-ingridients-list-item">Milk: 500ml</li>
                        <li class="meal-ingridients-list-item">Maple syroup: 50g</li>
                    </ul> 

                    <ul class="meal-macros-list">
                        <li class="meal-macros-list-item">Calories: 500kcal</li>
                        <li class="meal-macros-list-item">Carbohydrates: 80g</li>
                        <li class="meal-macros-list-item">Fat: 15g</li>
                        <li class="meal-macros-list-item">Protein: 20g</li>
                        <li class="meal-macros-list-item">Fiber: 5g</li>
                    </ul>
                </div>

                <div class="recipe">
                    <div class="recipe-title">Recipe</div>
                    <div class="recipe-content"><?= $meal->getRecipe() ?></div>
                </div>
            
            
                <div class="additional-information">
                    <div class="additional-information-title">Additional Information</div>
                    <div class="additional-information-content">
                        <h3>Author:</h3><p> <?= $meal->getAuthor() ?></p>
                        <h3>Time to prepare:</h3><p><?= $meal->getTime() ?> min</p>
                        <h3>Description:</h3><p><?= $meal->getDescription() ?></p>
                    </div>
                </div>
                
                <div class="reviews">
                    <div class="reviews-title">Reviews</div>
                    
                    <div class="review">
                        <div class="review-author">
                            <img src="public/img/acoount-profile-picture.jpg" alt="pancakes">
                            <p class="review-author-name">Jack</p>
                        </div>

                        <div class="review-content">
                            Love them, bla bla bla bla bla bla
                        </div>
                    </div>

                    <div class="review">
                        <div class="review-author">
                            <img src="public/img/acoount-profile-picture.jpg" alt="pancakes">
                            <p class="review-author-name">Jack</p>
                        </div>

                        <div class="review-content">
                            Love them, bla bla bla bla bla bla
                        </div>
                    </div>

                    <a href="#">read more...</a>
                </div>
        </div>

        <a href="chooseMeals" class="return enlarge">Return</a>
    </div>

    <script src="public/js/script.js"></script>
</body>
</html>