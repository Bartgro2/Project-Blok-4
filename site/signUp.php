<!DOCTYPE html>
<html lang="en">

<head>
    <title>signUp page</title>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <section id="content" class="page_height">
        <div class="container_img">
            <div class="container">
                <div class="container_width">
                    <section class="form_align">
                        <form action="session_signUp.php" method="post">
                            <h1 class="form_head">Maak een nieuwe gebruiker aan</h1>
                            <div>
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            </div>
                            <div>
                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="email">E-mail</label>
                                <?php if (isset($_GET['email'])) { ?>
                                    <input type="email" name="email" id="email" value="<?php echo $_GET['email']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="email" id="email" placeholder="email">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <!-- for="" is voor het drukken op de naam / label, dan wordt de input automatisch aangetikt -->
                                <label for="voornaam">Voornaam</label>
                                <?php if (isset($_GET['voornaam'])) { ?>
                                    <input type="text" name="voornaam" id="voornaam" value="<?php echo $_GET['voornaam']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="voornaam" id="voornaam" placeholder="achternaam">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="achternaam">Achternaam</label>
                                <?php if (isset($_GET['achternaam'])) { ?>
                                    <input type="text" name="achternaam" id="achternaam" value="<?php echo $_GET['achternaam']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="achternaam" id="achternaam" placeholder="achternaam">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <!-- for="" is voor het drukken op de naam / label, dan wordt de input automatisch aangetikt -->
                                <label for="tussenvoegsels">tussenvoegsels</label>
                                <?php if (isset($_GET['tussenvoegsels'])) { ?>
                                    <input type="text" name="tussenvoegsels" id="tussenvoegsels" value="<?php echo $_GET['tussenvoegsels']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="tussenvoegsels" id="tussenvoegsels" placeholder="tussenvoegsels">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="geslacht">geslacht</label>
                                <?php if (isset($_GET['geslacht'])) { ?>
                                    <input type="text" name="geslacht" id="geslacht" value="<?php echo $_GET['geslacht']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="geslacht" id="geslacht" placeholder="geslacht">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <!-- for="" is voor het drukken op de naam / label, dan wordt de input automatisch aangetikt -->
                                <label for="gebruikersnaam">gebruikersnaam</label>
                                <?php if (isset($_GET['gebruikersnaam'])) { ?>
                                    <input type="text" name="gebruikersnaam" id="gebruikersnaam" value="<?php echo $_GET['gebruikersnaam']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="gebruikersnaam" id="gebruikersnaam" placeholder="gebruikersnaam">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="omschrijving">omschrijving</label>
                                <?php if (isset($_GET['omschrijving'])) { ?>
                                    <input type="text" name="omschrijving" id="omschrijving" value="<?php echo $_GET['omschrijving']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="omschrijving" id="omschrijving" placeholder="omschrijving">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="straat">straat</label>
                                <?php if (isset($_GET['straat'])) { ?>
                                    <input type="text" name="straat" id="straat" value="<?php echo $_GET['straat']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="straat" id="straat" placeholder="straat">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="huisnummer">huisnummer</label>
                                <?php if (isset($_GET['huisnummer'])) { ?>
                                    <input type="text" name="huisnummer" id="huisnummer" value="<?php echo $_GET['huisnummer']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="huisnummer" id="huisnummer" placeholder="huisnummer">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="postcode">postcode</label>
                                <?php if (isset($_GET['postcode'])) { ?>
                                    <input type="text" name="postcode" id="postcode" value="<?php echo $_GET['postcode']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="postcode" id="postcode" placeholder="postcode">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="plaats">plaats</label>
                                <?php if (isset($_GET['plaats'])) { ?>
                                    <input type="text" name="plaats" id="plaats" value="<?php echo $_GET['plaats']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="plaats" id="plaats" placeholder="plaats">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="land">land</label>
                                <?php if (isset($_GET['land'])) { ?>
                                    <input type="text" name="land" id="land" value="<?php echo $_GET['land']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="land" id="land" placeholder="land">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="telefoonnummer">telefoonnummer</label>
                                <?php if (isset($_GET['telefoonnummer'])) { ?>
                                    <input type="text" name="telefoonnummer" id="telefoonnummer" value="<?php echo $_GET['telefoonnummer']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="telefoonnummer" id="telefoonnummer" placeholder="telefoonnummer">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="mobielnummer">mobielnummer</label>
                                <?php if (isset($_GET['mobielnummer'])) { ?>
                                    <input type="text" name="mobielnummer" id="mobielnummer" value="<?php echo $_GET['mobielnummer']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="mobielnummer" id="mobielnummer" placeholder="mobielnummer">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="notitie">notitie</label>
                                <?php if (isset($_GET['notitie'])) { ?>
                                    <input type="text" name="notitie" id="notitie" value="<?php echo $_GET['notitie']; ?>">
                                <?php } else { ?>
                                    <input type="text" name="notitie" id="notitie" placeholder="notitie">
                                <?php } ?>
                            </div>
                            <div class="form_group">
                                <label for="wachtwoord">Wachtwoord</label>
                                <input type="password" name="wachtwoord" id="wachtwoord" placeholder="wachtwoord">
                            </div>
                            <div class="form_group">
                                <label for="check_wachtwoord">Herhaal wachtwoord</label>
                                <input type="password" name="check_wachtwoord" id="check_wachtwoord" placeholder="herhaal wachtwoord">
                            </div>
                            <div>
                                <a href="login.php" class="form_content_switch">Ik heb al een account</a>
                                <button class="button_submit" type="sumbit">Maak nieuwe gebruiker</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('footer.php');
    ?>
</body>

</html>