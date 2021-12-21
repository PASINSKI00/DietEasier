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
        <?php
        require("shared/navbarTopYourAccount.php");
        ?>

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