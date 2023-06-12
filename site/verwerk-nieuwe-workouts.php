<?php require 'database.php';




    $omschrijving     = $_POST['omschrijving'];
    $duur             = $_POST['duur'];
    $notitie          = $_POST['notitie'];
    $startdatum       = $_POST['startdatum'];
   
    $sql =  "INSERT INTO workout(omschrijving, duur, notitie, startdatum) 
    VALUES ('$omschrijving','$duur','$notitie','$startdatum')";
