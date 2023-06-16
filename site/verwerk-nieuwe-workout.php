<?php require 'database.php';

session_start();

if (!isset($_SESSION['adminid'])) {
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