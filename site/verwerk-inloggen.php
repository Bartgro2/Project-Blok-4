<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include 'inloggen.php';
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

    if (($_SESSION['userid'])) {
        
        $sql = "SELECT * FROM gebruiker inner join administrator on administrator.gebruiker_id = gebruiker.id";

        $result = mysqli_query($conn, $sql);

        $administrator = mysqli_fetch_assoc($result);
        
        $_SESSION['admin_id'] = $administrator['id'];
       
        if( $_SESSION['gebruiker_id'] == $_SESSION['admin_id'])
        {
            
            header("location: admin-dashboard.php");
            exit;
        }
    }
}


