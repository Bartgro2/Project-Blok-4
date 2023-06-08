
<?php


if (!empty($_POST['gebruikersnaam'])){
    require 'database.php';


    $gebruikersnaam   = $_POST['gebruikersnaam'];
    $wachtwoord       = $_POST['wachtwoord'];
    //$wachtwoord_check = $_POST['controleer-wachtwoord'];
    $aanhef           = $_POST['aanhef'];
    $voornaam         = $_POST['voornaam'];
    $tussenvoegsels   = $_POST['tussenvoegsels'];
    $email            = $_POST['email'];
    $telefoonnummer   = $_POST['telefoonnummer'];
    $mobielnummer     = $_POST['mobielnummer'];
    $straat           = $_POST['straat'];
    $huisnummer       = $_POST['huisnummer'];
    $plaats           = $_POST['plaats'];
    $postcode         = $_POST['postcode'];
    $land             = $_POST['land'];
    $rol              = $_POST['rol'];

    // wachtwoord hashen
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql =  "INSERT INTO users(gebruikersnaam, wachtwoord, aanhef, voornaam, tussenvoegsels, email, telefoonnummer, mobielnummer, straat, huisnummer, plaats , postcode, land, rol) 
    VALUES ('$gebruikersnaam','$hashed_password','$aanhef','$voornaam','$tussenvoegsels','$email','$telefoonummer','$mobielnummer','$straat','$huisnummer','$plaats','$postcode','$land','$rol')";

    if (mysqli_query($conn, $sql)) {
        header("location: inloggen.php");
        exit;
    }
}

?>