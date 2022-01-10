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
    <script src="public/js/addMeal.js" defer></script>
</head>

<body>
    <div class="container">
        <nav class="navbar-top">
            <a href="home"  class="navbar-logo">
                <img src="public/img/side_logo_transparent.png" alt="company's logo">
            </a>

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

        <div id="secondary-container">
                <main class="addMeal">
                    <div class="add-meal-container">
                        <div class="messages">
                        </div>

                        <input name="name" type="text" placeholder="Meal name">
                        <input name="time" type="number" min="0" placeholder="Time to prepare">

                        <datalist id="ingredients">
                        </datalist>

                        <div id="ingredients-form">
                            <h4>Add ingredients:</h4>
                        </div>
                        <i class="fas fa-plus" id="ingredients-form-add"></i>

                        <datalist id="categories">
                        </datalist>
                        <div id="categories-form">
                            <h4>Add categories:</h4>
                        </div>
                        <i class="fas fa-plus" id="categories-form-add"></i>

                        <textarea name="recipe" rows="10" placeholder="Recipe"></textarea>
                        <textarea name="description" rows="4" placeholder="Description"></textarea>
                        <input type="file" name="image">
                        <button id="submit-button">Send</button>
                    </div>
                </main>
        </div>
    </div>
</body>
</html>