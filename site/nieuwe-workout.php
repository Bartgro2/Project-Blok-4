<?php
require 'database.php';

session_start();


     if (isset($_SESSION['regularid'])) { 
        header("location: inloggen.php");
        exit();

     } else if (empty($_SESSION)){ 
        header("location: inloggen.php");
        exit();
     }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <main>
        <div class="account-pagina">
            <div class="form-panel">
                <h1>workouts aanmaken</h1>
                <form action="verwerk-nieuwe-workouts.php" method="post">

                    <div class="input-groep">
                        <label for="omschrijving">omschrijving</label>
                        <input type="text" name="omschrijving" id="omschrijving">
                    </div>

                    <div class="input-groep">
                        <label for="duur">duur</label>
                        <input type="text" name="duur" id="duur">
                    </div>
                    <div class="input-groep">
                        <label for="notitie">notitie</label>
                        <input type="text" name="notitie" id="notitie">
                    </div>

                    <div class="button-container">
                        <button type="submit" class="input-button"> Aanmaken</button>
                    </div>
            </div>
        </div>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>