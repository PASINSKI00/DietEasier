<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Check out your account</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/yourAccount.css">
    <link rel="stylesheet" type="text/css" href="public/css/styleYourAccounts.css">
    <link rel="stylesheet" type="text/css" href="public/css/hover.css">
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
        $activeYourAccount = "active";
        require("shared/sideNavbarYourAccounts.php");
        ?>

        <a href="/logout" class="log-out">Log out</a>

        <main class="main-your-account">
            <img class="profile-picture" src="/public/uploads/<?=$user->getImage()?>" alt="profile-picture">
            <div class="profile-content">
                <p><?=$user->getName()?></p>
                <p><?=$user->getEmail()?></p>
            </div>
        </main>
    </div>
</body>
</html>