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
    <link rel="stylesheet" type="text/css" href="public/css/addMeal.css">
</head>

<body>
    <div class="container">
        <nav class="navbar-top">
            <a href="home">
                <img class="navbar-logo" src="public/img/side_logo_transparent.png" alt="company's logo">
            </a>


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
        </nav>

        <div id="secondary-container">
                <main class="addMeal">
                    <form action="addMeal" method="POST" ENCTYPE="multipart/form-data">
                        <div class="messages">
                            <?php
                            if(isset($messages)){
                                foreach ($messages as $message){
                                    echo $message;
                                }
                            }
                            ?>
                        </div>
                        <input name="name" type="text" placeholder="Meal name">
                        <input name="time" type="text" placeholder="Time to prepare">
                        <textarea name="recipe" rows="10" placeholder="Recipe"></textarea>
                        <textarea name="description" rows="4" placeholder="Description"></textarea>
                        <input type="file" name="image">
                        <button type="submit">Send</button>
                    </form>
                </main>
        </div>
    </div>

    <script src="public/js/script.js"></script>
</body>
</html>