<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include 'index.php';
    exit;
}

$gebruikernaam    = $_POST['gebruikernaam'];
$wachtwoord = $_POST['wachtwoord'];

require 'database.php';

$sql = "SELECT * FROM gebruikers WHERE gebruikernaam = '$gebruikernaam'";

$result = mysqli_query($conn, $sql);

$gebruiker = mysqli_fetch_assoc($result);

if (!is_array($gebruiker)) {
    header("location: inloggen.php");
    exit();
}

if ($gebruiker['wachtwoord'] === $_POST['wachtwoord']) {
    session_start();

    $_SESSION['username'] = $gebruiker['gebruikernaam'];
    
    header("location: dashboard.php");
    exit();
}