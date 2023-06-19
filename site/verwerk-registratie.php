<?php

require 'database.php';

session_start();
if (!isset($_SESSION['adminid'])) {
    header("location: inloggen.php");
    exit();
}

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
    






    // wachtwoord hashen

    $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);



    $sql =  "INSERT INTO gebruiker(gebruikersnaam, wachtwoord, geslacht, voornaam, tussenvoegsels, achternaam, email, telefoonnummer, mobielnummer, straat, huisnummer, plaats , postcode, land) 
    VALUES ('$gebruikersnaam','$hashed_password','$geslachten','$voornaam','$tussenvoegsels','$achternaam','$email','$telefoonnummer','$mobielnummer','$straat','$huisnummer','$plaats','$postcode','$land')";

   

    if ($conn->query($sql) === TRUE) {

        $last_id = $conn->insert_id; // check de nieuwste gemaakte id

        if ($rol == "administrator") { // checkt of de gebruiker een administrator
            $sql = "INSERT INTO administrator(gebruiker_id) VALUES('$last_id')"; // voeg de waarde van de laatst gemaakte id toe aan de foreign key in administrator
        } else if ($rol == "manager") {
            $sql = "INSERT INTO manager(gebruiker_id) VALUES('$last_id')";
        } else if ($rol == "regular") {
            $sql = "INSERT INTO regular(gebruiker_id) VALUES('$last_id')";
        }

        if (mysqli_query($conn, $sql)) {
            header("location: inloggen.php");
            exit;
        }
    }
}
