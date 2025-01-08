<?php
session_start();
include("database.php");

if (
    isset($_POST['email']) && isset($_POST['voornaam'])
    && isset($_POST['achternaam']) && isset($_POST['wachtwoord'])
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
    $pass = validate($_POST['wachtwoord']);
    $check_pass = validate($_POST['check_wachtwoord']);

    $user_data = 'email=' . $email . '&voornaam=' . $firstname . '&achternaam=' . $lastname . '&address=';

    if (empty($email)) {
        header("Location: signUp.php?error=Email-address is required&$user_data");
        exit();
    } else if (empty($firstname)) {
        header("Location: signUp.php?error=Firstname is required&$user_data");
        exit();
    } else if (empty($lastname)) {
        header("Location: signUp.php?error=Lastname is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: signUp.php?error=Password is required&$user_data");
        exit();
    } else if (empty($check_pass)) {
        header("Location: signUp.php?error=Check password is required");
        exit();
    } else if ($pass !== $check_pass) {
        header("Location: signUp.php?error=Password confirmation does not math");
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
            $sql2 = "INSERT INTO users(email, voornaam, achternaam,password) VALUES('$email', '$firstname', '$lastname', '$hashed_pass')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
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




// probeer code 

$sqlcheck = "SELECT * FROM users WHERE  account = '" . $account . "'";
$result = $connect->query($sqlcheck);

// If data does not exist, insert it into the database
// Als de data niet overeenkomt of bestaat, wordt de nieuwe data ingevoegd
if ($result->num_rows == 0) {
    // Check if their is a value given
    // nagaan of er data is opgegeven
    $account = isset($customer["account"]) ? $customer["account"] : '';
    $name = isset($customer["name"]) ? $customer["name"] : '';
    $address = isset($customer["address"]) ? $customer["address"] : '';
    $email = isset($customer["email"]) ? $customer["email"] : '';
    $date_of_birth = isset($customer["date_of_birth"]) ? $customer["date_of_birth"] : '';
    $description = isset($customer["description"]) ? $customer["description"] : '';
    $interest = isset($customer["interest"]) ? $customer["interest"] : '';
    $checked = isset($customer["checked"]) ? intval($customer["checked"]) : 0;

    // Insert string with data and give values
    // String met informatie invoegen en waardes meegeven
    if ($connect->query(
        "INSERT INTO customers(account, customer_name, address, email, date_of_birth, description, interest, checked)
                VALUES ('$account','$name','$address','$email','$date_of_birth','$description','$interest',$checked)"
    ) === TRUE) {
        echo "New record created successfully </br>";
        if ($connect->query(
            "INSERT INTO credit_card(customer_account, type, number, name, expirationDate)
                         VALUES ('$account','$type', '$number', '$cc_name', '$expirationDate')"
        ) === TRUE) {
            echo "New nested record created successfully </br>";
        }
    }
} else {
    echo "The data in this file is already inserted </br>";
}


// ai code

// Insert data into the users table
$sql_users = "INSERT INTO users(email, voornaam, achternaam, password) VALUES('$email', '$firstname', '$lastname', '$hashed_pass')";
$result_users = mysqli_query($conn, $sql_users);

// Get the ID of the newly inserted user
$user_id = mysqli_insert_id($conn);

// Insert data into the adres table
$sql_adres = "INSERT INTO adres(user_id, straat, huisnummer, postcode, plaats, land) VALUES('$user_id', '$street', '$houseNumber', '$postalCode', '$city', '$country')";
$result_adres = mysqli_query($conn, $sql_adres);

// Insert data into the regular table
$sql_regular = "INSERT INTO regular(user_id, tussenvoegsels, geslacht, gebruikersnaam, omschrijving, telefoonnummer, mobielnummer, notitie) VALUES('$user_id', '$preposition', '$gender', '$username', '$description', '$phonenumber', '$mobilePhonenumber', '$note')";
$result_regular = mysqli_query($conn, $sql_regular);



// ai verbeterd

$dateStamp = date("Y-m-d H:i:s");

// Insert data into the regular table
$sql_regular = "INSERT INTO regular(startDatum) VALUES('$dateStamp')";
$result_regular = mysqli_query($conn, $sql_regular);

// Get the ID of the newly inserted user
$regular_id = mysqli_insert_id($conn);

// Insert data into the adres table
$sql_adres = "INSERT INTO adres(straat, huisnummer, postcode, plaats, land, telefoonnummer, mobielnummer, toevoegdatum, notitie) VALUES('$street', '$houseNumber', '$postalCode', '$city', '$country', '$phonenumber', '$mobilePhonenumber', '$dateStamp', '$note')";
$result_adres = mysqli_query($conn, $sql_adres);

// Get the ID of the newly inserted user
$adres_id = mysqli_insert_id($conn);

// Insert data into the users table
$sql_users = "INSERT INTO users(email, voornaam, achternaam, tussenvoegsels, geslacht, gebruikersnaam, password, adresID, regularID) VALUES('$email', '$firstname', '$lastname', '$preposition', '$gender', '$username', '$hashed_pass', '$adres_id', '$regular_id')";
$result_users = mysqli_query($conn, $sql_users);