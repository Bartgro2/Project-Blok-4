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
                                <div class="radio-buttons">
                                    <h2>Aanhef:</h2>
                                    <label for="radio">Man</label>
                                    <input type="radio" name="Aanhef" id="Man"> <label for="radio">Vrouw</label>
                                    <input type="radio" name="Aanhef" id="Vrouw">
                                </div>
                                <div class="input-groep">
                                    <label class="input-label" for="gebruikersnaam">gebruikersnaam</label>
                                    <input type="text" name="gebruikersnaam" id="gebruikersnaam">
                                </div>

                                <div class="input-groep">
                                    <label class="input-label" for="wachtwoord">wachtwoord</label>
                                    <input class=input_wachtwoord_login type="password" name="wachtwoord" id="wachtwoord">
                                </div>
                                <div class="input-groep">
                                    <label class="input-label" for="wachtwoord"> Controleer wachtwoord</label>
                                    <input type="password" name="wachtwoord" id="wachtwoord">
                                </div>
                    </div>
                    </form>
                </div>
    </main>







</body>

</html>