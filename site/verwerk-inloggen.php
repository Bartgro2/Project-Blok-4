<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include 'inloggen.php';
    exit;
}

$email    = $_POST['email'];
$password          = $_POST['wachtwoord'];



require 'database.php';

$sql = "SELECT * FROM gebruiker WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

$gebruiker = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM gebruiker inner join administrator on administrator.gebruiker_id = gebruiker.id where email = '$email'";

$result = mysqli_query($conn, $sql);

$administrator = mysqli_fetch_assoc($result);

$sql3 = "SELECT * FROM gebruiker inner join regular on regular.gebruiker_id = gebruiker.id where email = '$email'";

$result = mysqli_query($conn, $sql);

$regular = mysqli_fetch_assoc($result);

$sql4 = "SELECT * FROM gebruiker inner join manager on manager.gebruiker_id = gebruiker.id where email = '$email'";

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
    
        $_SESSION['adminid']      = $administrator['gebruiker_id'];
        $_SESSION['managerid']    = $manager['gebruiker_id'];
        $_SESSION['regularid']    = $regular['gebruiker_id'];

        if ($_SESSION['userid'] == $_SESSION['adminid']) {
            header("location: admin-dashboard.php");
            exit;
        } else if ($_SESSION['userid'] == $_SESSION['managerid']) {
            header("location: manager-dashboard.php");
            exit;
        } else if ($_SESSION['userid'] == $_SESSION['regularid']) {
            header("location: regular-dashboard.php");
            exit;
        }
    }


header("location: inloggen.php");
exit;
