<?php require 'database.php';



if (!empty($_POST['omschrijving'])) {



    $omschrijving     = $_POST['omschrijving'];
    $duur             = $_POST['duur'];
    $notitie          = $_POST['notitie'];
   
    $sql =  "INSERT INTO workout(omschrijving, duur, notitie) 
    VALUES ('$omschrijving','$duur','$notitie')";

    $conn->query($sql);
}