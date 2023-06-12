<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include 'nav.php'; ?>
    <main>
        <div class="account-pagina">
            <div class="form-panel">
                <div class="panel-body">
                    <div class="stripe-outer">
                        <div class="form-outer">
                            <h1> Aanmelden</h1>
                        </div>

                        <form action="verwerk-inloggen.php" method="post">

                            <div class="input-groep">
                                <label class="input-label" for="email">email</label>
                                <input type="email" name="email" id="email">
                            </div>

                            <div class="input-groep">
                                <label class="input-label" for="wachtwoord">Wachtwoord</label>
                                <input type="password" name="wachtwoord" id="wachtwoord">
                            </div>
                            <div class="input-groep">
                                <p> Nieuw bij onze website </p>
                                <p> <a href="registratie.php"> Geen account klik hier</a></p>
                            </div>

                            <div class="button-container">
                                <button type="submit" class="input-button"> Aanmelden</button>
                            </div>
    </main>
</body>

</html>