<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include 'tools-overzicht.php';
    exit;
}

$gebruikersnaam    = $_POST['gebruikersnaam'];
$password          = $_POST['wachtwoord'];

require 'database.php';

$sql = "SELECT * FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";

$result = mysqli_query($conn, $sql);

$gebruiker = mysqli_fetch_assoc($result);

if (!is_array($gebruiker)) {
    header("location: inloggen.php");
    exit();
}

if (password_verify($password, $gebruiker['wachtwoord'])) {

    session_start();

    $_SESSION['username']    = $gebruiker['gebruikersnaam'];
    $_SESSION['userid']      = $gebruiker['id'];
}

header("location: inloggen.php");
exit();



