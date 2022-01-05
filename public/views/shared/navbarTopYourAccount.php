<head>
    <link rel="stylesheet" type="text/css" href="/public/css/hover.css">
</head>

<nav class="navbar-top">
    <a href="/home" class="navbar-logo">
        <img src="/public/img/side_logo_transparent.png" alt="company's logo">
    </a>

    <?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['loggedIn'])){
        require("loggedIn.php");
    }
    else{
        require("login.php");
    }
    ?>
</nav>
