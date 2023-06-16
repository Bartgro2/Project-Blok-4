<?php require 'database.php';

if (!is_array($gebruiker)) {
    header("location: inloggen.php");
    exit();
}

if (!empty($_POST['omschrijving'])) {



    $omschrijving     = $_POST['omschrijving'];
    $duur             = $_POST['duur'];
    $notitie          = $_POST['notitie'];
   
    $sql =  "INSERT INTO workout(omschrijving, duur, notitie) 
    VALUES ('$omschrijving','$duur','$notitie')";

    $conn->query($sql);
}