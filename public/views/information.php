<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update or check out the information used to calcualte your dietary needs!</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/information.css">
    <link rel="stylesheet" type="text/css" href="public/css/styleYourAccounts.css">
    <link rel="stylesheet" type="text/css" href="public/css/hover.css">
</head>

<body>
    <div class="container">
        <?php
        require("shared/navbarTopYourAccount.php");
        ?>

        <?php
        $activeInformation = "active";
        require("shared/sideNavbarYourAccounts.php");
        ?>

        <main class="main-informations">
            <div class="goal">
                <span class="goal-text">I want to</span>

                <form>
                    <input type="radio" name="goal" id="goal1" checked>
                    <label for="goal1">lose</label>

                    <input type="radio"  name="goal" id="goal2">
                    <label for="goal2">gain</label>
                </form>

                <span class="goal-text">weight</span>
            </div>
            
            <div class="informations">
                <div class="information">
                    <span class="info-text">Weight</span>
                    <input type="text" placeholder="kg">
                </div>
                
                <div class="information">
                    <span class="info-text">Height</span>
                    <input type="text" placeholder="cm">
                </div>
                
                <div class="information">
                    <span class="info-text">Body fat</span>
                    <input type="text" placeholder="%">
                </div>
                
                <div class="information">
                    <span class="info-text">Age</span>
                    <input type="text" placeholder="years">
                </div>
                
                <div class="information">
                    <span class="info-text">Working-out / week</span>
                    <input type="text" placeholder="hours">
                </div>
                
                <br>

                <div class="information">
                    <span class="info-text">Meals / day</span>
                    <input type="text" placeholder="">
                </div>

                <div class="information">
                    <span class="info-text">Shopping for</span>
                    <input type="text" placeholder="days">
                </div>
            </div>
            
            <div class="calculations">
                <div class="calculation">
                    <span class="info-text">Calories</span>
                    <span class="calc-number">1000g</span>
                </div>
                
                <div class="calculation">
                    <span class="info-text">Protein</span>
                    <span class="calc-number">1000g</span>
                </div>

                <div class="calculation">
                    <span class="info-text">Carbs</span>
                    <span class="calc-number">1000g</span>
                </div>

                <div class="calculation">
                    <span class="info-text">Fats</span>
                    <span class="calc-number">1000g</span>
                </div>

                <div class="calculation">
                    <span class="info-text">Fiber</span>
                    <span class="calc-number">1000g</span>
                </div>
            </div>
        </main>

    </div>
</body>
</html>