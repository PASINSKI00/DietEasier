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
    <link rel="stylesheet" type="text/css" href="public/css/hover.css">
</head>

<body>
    <div class="container">
        <nav class="navbar-top">
            <a href="home" class="navbar-logo">
                <img src="public/img/side_logo_transparent.png" alt="company's logo">
            </a>
            
            <a id="home-navbar-button" href="chooseMeals" class="raise">Start Composing Your Diet</a>

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

        <?php
            require("shared/footer.php");
        ?>
    </div>
</body>
</html>