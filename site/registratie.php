<?php
require 'database.php';
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

<body class="bc">
    <main>
        <div class="account-pagina">
            <div class="form-panel">
                <h1> Aanmelden</h1>


                <form action="verwerk-registratie.php" method="post">
                    <div class="input-groep">
                        <label class="input-label" for="gebruikersnaam">gebruikersnaam</label>
                        <input type="text" name="gebruikersnaam" id="gebruikersnaam">

                        <label class="input-label" for="wachtwoord">wachtwoord</label>
                        <input type="password" name="wachtwoord" id="wachtwoord">

                        <label class="input-label" for="wachtwoord"> Controleer wachtwoord</label>
                        <input type="password" name="controleer-wachtwoord" id="wachtwoord">
                    </div>

                    <div class="input-groep">
                        <hr>
                        <div class="radio-buttons">
                            <h2>Aanhef:</h2>
                            <label for="radio">Man</label>
                            <input type="radio" name="geslacht" id="Man">
                            <label for="radio">Vrouw</label>
                            <input type="radio" name="geslacht" id="Vrouw">
                        </div>
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="voornaam">voornaam</label>
                        <input type="text" name="voornaam" id="voornaam">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="tussenvoegsels">tussenvoegsels</label>
                        <input type="text" name="tussenvoegsels" id="tussenvoegsels">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="achternaam">achternaam</label>
                        <input type="text" name="achternaam" id="achternaam">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="email">email</label>
                        <input type="email" name="email" id="email">
                    </div>

                    <div class="input-groep">
                        <label class="input-label" for="telefoonnummer">telefoonnummer</label>
                        <input type="tel" name="telefoonnummer" id="telefoonnummer">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="mobielnummer">mobielnummer</label>
                        <input type="tel" name="mobielnummer" id="mobielnummer">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="straat">straat</label>
                        <input type="text" name="straat" id="straat">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="huisnummer">huisnnummer</label>
                        <input type="text" name="huisnummer" id="huisnummer">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="plaats">plaats</label>
                        <input type="text" name="plaats" id="plaats">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="plaats">postcode</label>
                        <input type="text" name="postcode" id="postcode">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="land">land</label>
                        <input type="text" name="land" id="land">
                    </div>
                    <div class="input-groep">
                        <label class="input-label" for="rol">rol</label>
                        <select name="rol" id="rol">
                            <option value="administrator">administrator</option>
                            <option value="manager">manager</option>
                            <option value="regular">regular</option>
                        </select>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="input-button"> Registeren </button>
                    </div>
                </form>
            </div>
    </main>
</body>

</html>