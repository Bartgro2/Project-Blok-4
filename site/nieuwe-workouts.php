<?php
require 'database.php';




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
    <div class="account-pagina">
        <main>

            <form action="verwerk-nieuwe-workouts.php" method="post">

                <div class="input-groep">
                    <label class="input-label" for="omschrijving">omschrijving</label>
                    <input type="omschrijving" name="omschrijving" id="omschrijving">
                </div>

                <div class="input-groep">
                    <label class="input-label" for="duur">duur</label>
                    <input type="duur" name="duur" id="duur">
                </div>
                <div class="input-groep">
                    <label class="input-label" for="notitie">notitie</label>
                    <input type="duur" name="notitie" id="notitie">
                </div>

                <div class="button-container">
                    <button type="submit" class="input-button"> Aanmaken</button>
                </div>
    </div>
    </main>
</body>

</html>