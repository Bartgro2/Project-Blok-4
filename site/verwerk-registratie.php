<?php


if (!empty($_POST['gebruikersnaam'])) {



    $gebruikersnaam   = $_POST['gebruikersnaam'];
    $wachtwoord       = $_POST['wachtwoord'];
    //$wachtwoord_check = $_POST['controleer-wachtwoord'];
    $geslachten       = $_POST['geslacht'];
    $voornaam         = $_POST['voornaam'];
    $tussenvoegsels   = $_POST['tussenvoegsels'];
    $achternaam       = $_POST['achternaam'];
    $email            = $_POST['email'];
    $telefoonnummer   = $_POST['telefoonnummer'];
    $mobielnummer     = $_POST['mobielnummer'];
    $straat           = $_POST['straat'];
    $huisnummer       = $_POST['huisnummer'];
    $plaats           = $_POST['plaats'];
    $postcode         = $_POST['postcode'];
    $land             = $_POST['land'];
    $rol              = $_POST['rol'];

    require 'database.php';
    // wachtwoord hashen
    $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);

    $sql =  "INSERT INTO gebruiker(gebruikersnaam, wachtwoord, geslacht, voornaam, tussenvoegsels, achternaam, email, telefoonnummer, mobielnummer, straat, huisnummer, plaats , postcode, land, rol) 
    VALUES ('$gebruikersnaam','$hashed_password','$geslachten','$voornaam','$tussenvoegsels','$achternaam','$email','$telefoonnummer','$mobielnummer','$straat','$huisnummer','$plaats','$postcode','$land','$rol')";


    if (mysqli_query($conn, $sql)) {
        header("location: inloggen.php");
        exit;
    }
}

?>