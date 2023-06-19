<?php


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
                <h1>Inloggen</h1>

                <form action="verwerk-inloggen.php" method="post">
                    <div class="input-groep">
                        <label  for="gebruikersnaam">Gebruikersnaam</label>
                        <input type="text" name="gebruikersnaam" id="gebruikersnaam">

                        <label  for="wachtwoord">Wachtwoord</label>
                        <input type="password" name="wachtwoord" id="wachtwoord">
                    </div>

                    <div class="input-groep">
                        <p>Nog geen account?</p>
                        <p><a href="registratie.php">Registeer hier</a></p>
                    </div>

                    <div class="button-container">
                        <button type="submit" class="input-button">Aanmelden</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include 'footer.php' ?>
</body>

</html>