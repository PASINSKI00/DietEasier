<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dieter helps you to control your weight and does the shopping for you! While giving you all the recipes. </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/home.css">
</head>

<body>
    <div class="container">
        <nav class="navbar-top">
            <a href="home">
                <img class="navbar-logo" src="public/img/side_logo_transparent.png" alt="company's logo">
            </a>
            
            <a id="home-navbar-button" href="chooseMeals" class="raise">Start Composing Your Diet</a>

            <div class="login-buttons">
                <button class="text-button enlarge" onclick="openSignUp()">Sign up</button>
                
                <button class="text-button enlarge" onclick="openLogin()">Log in</button>
                
                <div class="overlay" id="overlay" onclick="hideLogins()"></div>
                
                <div id="log-in" class="login">
                    <i class="fas fa-times" onclick="hideLogins()"></i>

                    <h1>Log in to Your account</h1>

                    <form action="loginHome" method="POST">
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
                        <span class="login-href-links" onclick="openSignUp()">Register now</span>
                        <br>
                        <a href="#" class="login-href-links">Can't log in?</a>
                    </div>
                </div>
                
                <div class="login signup" id="sign-up">
                    <i class="fas fa-times" onclick="hideLogins()"></i>

                    <h1>Create a new account</h1>

                    <form>
                        <input name="name" type="text" placeholder="Name">
                        <input name="email" type="text" placeholder="E-mail">
                        <input name="password" type="password" placeholder="Password">
                        <input name="re-password" type="password" placeholder="Repeat password">
                        <button class="login-button register-button enlarge">Register</button>
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
                        <span class="login-href-links">Log in now</span>
                        <br>
                    </div>
                </div>
            </div>
        </nav>
        
        <header> 
            <p>Make Your dream body come true!<br>
            With our app sticking to Your diet will become much easier.</p>
        </header>

        <section id="home-section">
            
            <article >
                <p>All it takes from You is to follow our suggestions and eat the meals that you chose!</p>
            </article>
            
            <img src="public/img/woman-main-photo.jpg" alt="happy woman eating breakfest">
           
            <img src="public/img/meal-main-photo.jpg" alt="man eating a meal">

            <article>
                <p>With the right tools and knowledge everything is possible.</p>
            </article>
            
            
        </section>

        <main id="home-main">
            <p>Wanna give it a try?</p>
            <a href="chooseMeals">
                <button id="home-main-button" class="raise enlarge">
                    Let's do it!
                </button>
            </a>
        </main>

        <div class="spacer layer1"></div>

        <footer>
            <ul>
                <p>Functionalities</p>
                <li class="bold enlarge"><a href="addMeal">Add your own meal</a></li>
                <li class="bold enlarge">2</li>
                <li class="bold enlarge">3</li>
                <li class="bold enlarge">4</li>
            </ul>
            <ul>
                <p>Contact</p>
                <li class="bold enlarge">1</li>
                <li class="bold enlarge">2</li>
                <li class="bold enlarge">3</li>
                <li class="bold enlarge">4</li>
            </ul>
            <ul>
                <p>Contact</p>
                <li class="bold enlarge">1</li>
                <li class="bold enlarge">2</li>
                <li class="bold enlarge">3</li>
                <li class="bold enlarge">4</li>
            </ul>
        </footer>
    </div>

    <script src="public/js/script.js"></script>
</body>
</html>