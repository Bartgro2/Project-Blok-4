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

$_SESSION['username']    = $gebruiker['gebruikersnaam'];
$_SESSION['userid']      = $gebruiker['id'];
$_SESSION['role']        = $gebruiker['rol'];

switch ($gebruiker['rol']) {
    case 'administrator':
        header('location: admin-dashboard.php');
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



