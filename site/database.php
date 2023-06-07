// Database configuratie
<?php
$host  = "mariadb";
$dbuser = "root";
$dbpass = "password";
$dbname = "";

// Maak een  database connectie
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);// Database configuratie
$host  = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "GFG";

// Maak een  database connectie
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);