<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include 'inloggen.php';
    exit;
}

$gebruikersnaam = $_POST['gebruikersnaam'];
$password = $_POST['wachtwoord'];

require 'database.php';

$sql = "SELECT * FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";

$result = mysqli_query($conn, $sql);

$gebruiker = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM gebruiker inner join administrator on administrator.gebruiker_id = gebruiker.id where gebruikersnaam = '$gebruikersnaam'";

$result = mysqli_query($conn, $sql);

$administrator = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM gebruiker inner join regular on regular.gebruiker_id = gebruiker.id where gebruikersnaam = '$gebruikersnaam'";

$result = mysqli_query($conn, $sql);

$regular = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM gebruiker inner join manager on manager.gebruiker_id = gebruiker.id where gebruikersnaam = '$gebruikersnaam'";

$result = mysqli_query($conn, $sql);

$manager = mysqli_fetch_assoc($result);


if (!is_array($gebruiker)) {
    header("location: inloggen.php");
    exit();
}

if (password_verify($password, $gebruiker['wachtwoord'])) {

    session_start();

    $_SESSION['username']     = $gebruiker['gebruikersnaam'];
    $_SESSION['userid']       = $gebruiker['id'];


    if (!is_null($administrator)) {
        $_SESSION['adminid'] = $administrator['gebruiker_id'];
            header("location: admin-dashboard.php");
            exit;
    }
    if (!is_null($manager)) {
        $_SESSION['managerid']    = $manager['gebruiker_id'];
        header("location: manager-dashboard.php");
        exit;
    }

    if (!is_null($regular)) {
        $_SESSION['regularid']    = $regular['gebruiker_id'];
        header("location: regular-dashboard.php");
        exit;
    }
}


header("location: inloggen.php");
exit;
