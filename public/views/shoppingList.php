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
    <link rel="stylesheet" type="text/css" href="public/css/shoppingList.css">
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

                    <form>
                        <input name="email" type="text" placeholder="E-mail">
                        <input name="password" type="password" placeholder="Password">
                        <button class="login-button enlarge">Login</button>
                    </form>

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

                    <div class="texts">
                        Already have an account?
                        <span class="login-href-links" onclick="hideLogins(), openLogin()">Log in now</span>
                        <br>
                    </div>
                </div>
            </div>
        </nav>

        <main id="secondary-container">
            <div class="ingridient">
                <div class="ingridient-name">Flour: Mąka pszenna typ 500</div>

                <div class="ingridient-button enlarge"><i class="fas fa-exchange-alt"></i></div>
                <div class="ingridient-button enlarge"><i class="fas fa-trash"></i></div>

                <div class="ingridient-amount">
                    <div class="amount-number">1</div>
                    <div class="amount-quantity">
                        <i class="fas fa-plus enlarge"></i>
                        <i class="fas fa-minus enlarge"></i>
                    </div>
                </div>
            </div>
            
            <div class="ingridient">
                <div class="ingridient-name">Flour: Mąka pszenna typ 500</div>

                <div class="ingridient-button enlarge"><i class="fas fa-exchange-alt"></i></div>
                <div class="ingridient-button enlarge"><i class="fas fa-trash"></i></div>

                <div class="ingridient-amount">
                    <div class="amount-number">1</div>
                    <div class="amount-quantity">
                        <i class="fas fa-plus enlarge"></i>
                        <i class="fas fa-minus enlarge"></i>
                    </div>
                </div>
            </div>

            <div class="ingridient">
                <div class="ingridient-name">Flour: Mąka pszenna typ 500</div>

                <div class="ingridient-button enlarge"><i class="fas fa-exchange-alt"></i></div>
                <div class="ingridient-button enlarge"><i class="fas fa-trash"></i></div>

                <div class="ingridient-amount">
                    <div class="amount-number">1</div>
                    <div class="amount-quantity">
                        <i class="fas fa-plus enlarge"></i>
                        <i class="fas fa-minus enlarge"></i>
                    </div>
                </div>
            </div>

            <div class="ingridient">
                <div class="ingridient-name">Flour: Mąka pszenna typ 500</div>

                <div class="ingridient-button enlarge"><i class="fas fa-exchange-alt"></i></div>
                <div class="ingridient-button enlarge"><i class="fas fa-trash"></i></div>

                <div class="ingridient-amount">
                    <div class="amount-number">1</div>
                    <div class="amount-quantity">
                        <i class="fas fa-plus enlarge"></i>
                        <i class="fas fa-minus enlarge"></i>
                    </div>
                </div>
            </div>
        </main>

        <div class="bottom-nav">
            <a href="whatYouChose" class="return enlarge">Return</a>
            <a href="https://glovoapp.com/pl/pl/krakow/" class="continue enlarge">Continue</a>
        </div>
    </div>

    <script src="public/js/script.js"></script>
</body>
</html>