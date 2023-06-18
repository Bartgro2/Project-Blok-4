<?php
session_start();
include("database.php");

if (
    isset($_POST['email'])
    && isset($_POST['voornaam'])
    && isset($_POST['achternaam'])
    && isset($_POST['geslacht'])
    && isset($_POST['gebruikersnaam'])
    && isset($_POST['straat'])
    && isset($_POST['huisnummer'])
    && isset($_POST['postcode'])
    && isset($_POST['plaats'])
    && isset($_POST['land'])
    && isset($_POST['telefoonnummer'])
    && isset($_POST['mobielnummer'])
    && isset($_POST['wachtwoord'])
    && isset($_POST['check_wachtwoord'])
) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $firstname = validate($_POST['voornaam']);
    $lastname = validate($_POST['achternaam']);
    $preposition = validate($_POST['tussenvoegsels']);
    $gender = validate($_POST['geslacht']);
    $username = validate($_POST['gebruikersnaam']);
    $description = validate($_POST['omschrijving']);
    $street = validate($_POST['straat']);
    $houseNumber = validate($_POST['huisnummer']);
    $postalCode = validate($_POST['postcode']);
    $city = validate($_POST['plaats']);
    $country = validate($_POST['land']);
    $phonenumber = validate($_POST['telefoonnummer']);
    $mobilePhonenumber = validate($_POST['mobielnummer']);
    $note = validate($_POST['notitie']);
    $pass = validate($_POST['wachtwoord']);
    $check_pass = validate($_POST['check_wachtwoord']);

    $user_data =
        'email=' . $email .
        '&voornaam=' . $firstname .
        '&achternaam=' . $lastname .
        '&tussenvoegsels=' . $preposition .
        '&geslacht=' . $gender .
        '&gebruikersnaam=' . $username .
        '&omschrijving=' . $description .
        '&straat=' . $street .
        '&huisnummer=' . $houseNumber .
        '&postcode=' . $postalCode .
        '&plaats=' . $city .
        '&land=' . $country .
        '&telefoonnummer=' . $phonenumber .
        '&mobielnummer=' . $mobilePhonenumber .
        '&notitie=' . $note;

    if (empty($email)) {
        header("Location: signUp.php?error=Email-address is required&$user_data");
        exit();
    } else if (empty($firstname)) {
        header("Location: signUp.php?error=voornaam is required&$user_data");
        exit();
    } else if (empty($lastname)) {
        header("Location: signUp.php?error=achternaam is required&$user_data");
        exit();
    } else if (empty($gender)) {
        header("Location: signUp.php?error=geslacht is required&$user_data");
        exit();
    } else if (empty($username)) {
        header("Location: signUp.php?error=gebruikersnaam is required&$user_data");
        exit();
    } else if (empty($street)) {
        header("Location: signUp.php?error=straat is required&$user_data");
        exit();
    } else if (empty($houseNumber)) {
        header("Location: signUp.php?error=huisnummer is required&$user_data");
        exit();
    } else if (empty($postalCode)) {
        header("Location: signUp.php?error=postcode is required&$user_data");
        exit();
    } else if (empty($city)) {
        header("Location: signUp.php?error=plaats is required&$user_data");
        exit();
    } else if (empty($country)) {
        header("Location: signUp.php?error=land is required&$user_data");
        exit();
    } else if (empty($phonenumber)) {
        header("Location: signUp.php?error=telefoonnummer is required&$user_data");
        exit();
    } else if (empty($mobilePhonenumber)) {
        header("Location: signUp.php?error=mobielnummer is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: signUp.php?error=Password is required&$user_data");
        exit();
    } else if (empty($check_pass)) {
        header("Location: signUp.php?error=Check password is required$user_data");
        exit();
    } else if ($pass !== $check_pass) {
        header("Location: signUp.php?error=Password confirmation does not match");
        exit();
    } else {

        // password hashing
        // $hashed_pass = md5($pass);

        // of 

        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);


        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signUp.php?error=This email-address is already in use&$user_data");
            exit();
        } else {
            $timestamp = time();
            "Set timezone = " . date_default_timezone_set("Europe/Amsterdam");
            $dateStamp = date("d-m-Y H:i:s", $timestamp);

            // Insert data into the regular table
            $sql_regular = "INSERT INTO regular(startDatum) VALUES('$dateStamp')";
            $result_regular = mysqli_query($conn, $sql_regular);

            // Get the ID of the newly inserted user
            $regular_id = mysqli_insert_id($conn);

            // Insert data into the adres table
            $sql_adres = "INSERT INTO adres(omschrijving, straat, huisnummer, postcode, plaats, land, telefoonnummer, mobielnummer, toevoegdatum, notitie) VALUES('$description', '$street', '$houseNumber', '$postalCode', '$city', '$country', '$phonenumber', '$mobilePhonenumber', '$dateStamp', '$note')";
            $result_adres = mysqli_query($conn, $sql_adres);
            // echo("Error description: " . mysqli_error($conn));
            // die;

            // Get the ID of the newly inserted user
            $adres_id = mysqli_insert_id($conn);

            // Insert data into the users table
            $sql_users = "INSERT INTO users(email, voornaam, achternaam, tussenvoegsels, geslacht, gebruikersnaam, password, adresID, regularID) VALUES('$email', '$firstname', '$lastname', '$preposition', '$gender', '$username', '$hashed_pass', '$adres_id', '$regular_id')";
            $result_users = mysqli_query($conn, $sql_users);
            // echo("Error description: " . mysqli_error($conn));
            // // var_dump($result_users);
            // die;
            if ($result_users) {
                header("Location: signUp.php?success=Your account has been created succesfully");
                exit();
            } else {
                header("Location: signUp.php?error=Unknown error occurred&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: signUp.php?error");
    exit();
}
