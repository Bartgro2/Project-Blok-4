<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include 'index.php';
    exit;
}

$gebruikersnaam    = $_POST['gebruikersnaam'];
$wachtwoord        = $_POST['wachtwoord'];

require 'database.php';

$sql = "SELECT * FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";

$result = mysqli_query($conn, $sql);

$gebruiker = mysqli_fetch_assoc($result);

if (!is_array($gebruiker)) {
    header("location: inloggen.php");
    exit();
}

if (password_verify($wachtwoord, $gebruiker['wachtwoord'])) {
    session_start();

    $_SESSION['username'] = $gebruiker['gebruikersnaam'];
    
    header("location: dashboard.php");
    exit();
}