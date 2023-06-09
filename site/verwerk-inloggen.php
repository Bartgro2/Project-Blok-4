<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include 'index.php';
    exit;
}

$gebruikersnaam    = $_POST['gebruikersnaam'];
$wachtwoord        = $_POST['wachtwoord'];
$gebruiker_id      = $_POST['id'];
require 'database.php';

$sql = "SELECT gebruikersnaam , wachtwoord , gebruiker_id FROM manager inner join gebruiker on gebruiker.id = manager.gebruiker_id WHERE gebruikersnaam = '$gebruikersnaam' and '$gebruiker_id' = id";

$result = mysqli_query($conn, $sql);

$gebruiker = mysqli_fetch_assoc($result);

if (!is_array($gebruiker)) {
    header("location: inloggen.php");
    exit();
}

if (password_verify($wachtwoord, $gebruiker['wachtwoord'])) {
    session_start();

$_SESSION['username']    = $gebruiker['gebruikersnaam'];
$_SESSION['userid']      = $gebruiker['id'];
$_SESSION['roleid']      = $gebruiker['id'];

switch ($gebruiker['id']) {
    case 'administrator':
        header('location: $');
        exit();
        break;

    case 'manager':
        header('location: employee-dashboard.php');
        exit();
        break;

    case 'regular':
        header('location: dashboard.php');
        exit();
        break;
}

header("location: index.php");
exit();
}

header("location: inloggen.php");
exit();



