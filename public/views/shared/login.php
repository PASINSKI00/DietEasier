<html>
<head>
    <link rel="stylesheet" text/css" href="/public/css/icons.css">

    <script src="public/js/login.js" defer></script>
    <script src="public/js/register.js" defer></script>
</head>

<body>
<button class="text-button enlarge" onclick="openSignUp()">Sign up</button>

<button class="text-button enlarge" onclick="openLogin()">Log in</button>

<div class="overlay" id="overlay" onclick="hideLogins()"></div>

<div id="log-in" class="login">
    <i class="fas fa-times" onclick="hideLogins()"></i>

    <h1>Log in to Your account</h1>

    <form id="login-form">
        <input name="email" type="text" placeholder="Email">
        <input name="password" type="password" placeholder="Password">
        <button class="login-button enlarge">Login</button>
    </form>
    <div class="messages">

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

    <form id="register-form">
        <input name="name" type="text" placeholder="Name">
        <input name="email" type="text" placeholder="E-mail">
        <input name="password" type="password" placeholder="Password">
        <input name="confirmedPassword" type="password" placeholder="Repeat password">
        <button class="login-button register-button enlarge">Register</button>
    </form>
    <div class="messages">git
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
</body>
</html>

