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

    <script src="/public/js/information.js" defer></script>
</head>

<body>
    <div class="container">
        <?php
        if(!isset($_SESSION)){
            session_start();
        }
        require("shared/navbarTopYourAccount.php");
        ?>

        <?php
        $activeInformation = "active";
        require("shared/sideNavbarYourAccounts.php");
        ?>

        <main class="main-informations">
            <div class="information-goal">
                <span class="goal-text">I want to</span>

<!--                <form id="goals">-->
<!--                    <input type="radio" name="goal" id="goal1" checked>-->
<!--                    <label for="goal1">lose</label>-->
<!---->
<!--                    <input type="radio"  name="goal" id="goal2">-->
<!--                    <label for="goal2">maintain</label>-->
<!---->
<!--                    <input type="radio"  name="goal" id="goal3">-->
<!--                    <label for="goal3">gain</label>-->
<!--                </form>-->

                <div id="goals">
                    <button class="goals-button goal1" onclick="goalButtonsActive(1)">lose</button>
                    <button class="goals-button goal3" onclick="goalButtonsActive(3)">maintain</button>
                    <button class="goals-button goal2" onclick="goalButtonsActive(2)">gain</button>
                </div>

                <span class="goal-text">weight</span>
            </div>
            
            <div class="informations">
                <div class="information">
                    <span class="info-text">Weight [kg]</span>
                    <input type="text" id="weight">
                </div>
                
                <div class="information">
                    <span class="info-text">Gender</span>
                    <input list="genders" name="genders" id="gender">
                        <datalist id="genders">
                            <option value="male"></option>
                            <option value="female"></option>
                        </datalist>
                </div>
                
                <div class="information">
                    <span class="info-text">Age</span>
                    <input type="text" id="age">
                </div>
                
                <div class="information">
                    <span class="info-text">Work activity level</span>
                    <input type="text" id="activity-work">
                </div>
                
                <div class="information">
                    <span class="info-text">Post-work activity level</span>
                    <input type="text" id="activity-post-work">
                </div>

                <div class="information">
                    <span class="info-text">Additional calories [+/-]</span>
                    <input type="text" id="additional-calories">
                </div>

                <button id="update-button">Submit changes</button>
            </div>
            
            <div class="calculations">
                <div class="calculation">
                    <span class="info-text">Calories</span>
                    <span class="calc-number calories"></span>
                </div>
                
                <div class="calculation">
                    <span class="info-text">Protein</span>
                    <span class="calc-number protein"></span>
                </div>

                <div class="calculation">
                    <span class="info-text">Carbs</span>
                    <span class="calc-number carbs"></span>
                </div>

                <div class="calculation">
                    <span class="info-text">Fats</span>
                    <span class="calc-number fats"></span>
                </div>

                <div class="calculation">
                    <span class="info-text">Fiber</span>
                    <span class="calc-number fiber"></span>
                </div>
            </div>
        </main>

    </div>
</body>
</html>