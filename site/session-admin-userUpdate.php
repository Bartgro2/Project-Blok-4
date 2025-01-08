<?php
session_start();
if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    include("database.php");

    if (isset($_POST['id'])) {
        $userID = $_POST['id'];
        $email = $_POST['email'];
        $firstname = $_POST['voornaam'];
        $lastname = $_POST['achternaam'];
        $preposition = $_POST['tussenvoegsels'];
        $gender = $_POST['geslacht'];
        $username = $_POST['gebruikersnaam'];
        $role = $_POST['role'];
        // var_dump($role);
        // die;

        $sql_check_copy = "SELECT * FROM users WHERE email = '$email' AND userID != '$userID'";
        $result = mysqli_query($conn, $sql_check_copy);

        if (mysqli_num_rows($result) > 0) {
            header("Location: admin-userUpdate.php?error=This email-address is already in use");
            exit();
        } else {
            $sql_check_originalData = "SELECT * FROM users WHERE userID = '$userID'";
            $result_originalData = mysqli_query($conn, $sql_check_originalData);
            $user = mysqli_fetch_assoc($result_originalData);

            $original_admin_id = $user['administratorID'];
            $original_manager_id = $user['managerID'];
            $original_regular_id = $user['regularID'];

            $timestamp = time();
            "Set timezone = " . date_default_timezone_set("Europe/Amsterdam");
            $dateStamp = date("d-m-Y H:i:s", $timestamp);

            if (mysqli_num_rows($result_originalData) > 0) {
                if ($original_manager_id > 0 && $role == "administrator" || $original_regular_id > 0 && $role == "administrator") {
                    $sql_admin_insert = "INSERT INTO administrator(datumInDienst) VALUES('$dateStamp')";
                    $result_admin_insert = mysqli_query($conn, $sql_admin_insert);

                    // Get the ID of the newly inserted user
                    $admin = mysqli_insert_id($conn);
                    $manager = NULL;
                    $regular = NULL;
                    
                    $sql_change_to_admin = "UPDATE users SET administratorID={$admin},managerID=NULL,regularID=NULL WHERE userID={$userID}";
                    $update_check = mysqli_query($conn, $sql_change_to_admin);
                    // echo ("Error description: " . mysqli_error($conn));
                    // die;
                        $sql_delete_original_manager = "DELETE * from manager where managerID = '$original_manager_id'";
                        $result_delete_manager = mysqli_query($conn, $sql_delete_original_manager);

                        $sql_delete_original_regular = "DELETE * from regular where regularID = '$original_regular_id'";
                        $result_delete_regular = mysqli_query($conn, $sql_delete_original_regular);


                    if ($update_check) {
                        header("Location: admin-dashboard.php?success=Your account has been updated succesfully");
                        exit();
                    } else {
                        echo ("werkt een beetje");
                        exit();
                    }
                } else if ($original_admin_id > 0 && $role == "manager" || $original_regular_id > 0 && $role == "manager") {
                    $sql_admin_insert = "INSERT INTO manager(afdeling, aantalMensen) VALUES('afdeling', 6)";
                    $result_admin_insert = mysqli_query($conn, $sql_admin_insert);

                    // Get the ID of the newly inserted user
                    $admin = NULL;
                    $manager = mysqli_insert_id($conn);
                    $regular = NULL;

                    $sql_change_to_manager = "UPDATE users SET administratorID=NULL,managerID={$manager},regularID=NULL WHERE userID={$userID}";
                    $update_check = mysqli_query($conn, $sql_change_to_manager);
                    // echo ("Error description: " . mysqli_error($conn));
                    // die;
                        $sql_delete_original_administrator = "DELETE * from administrator where administratorID = '$original_admin_id'";
                        $result_delete_administrator = mysqli_query($conn, $sql_delete_original_administrator);

                        $sql_delete_original_regular = "DELETE * from regular where regularID = '$original_regular_id'";
                        $result_delete_regular = mysqli_query($conn, $sql_delete_original_regular);

                    if ($update_check) {
                        header("Location: admin-dashboard.php?success=Your account has been updated succesfully");
                        exit();
                    } else {
                        echo ("werkt een beetje");
                        exit();
                    }
                } else if ($original_admin_id > 0 && $role == "regular" || $original_manager_id > 0 && $role == "regular") {
                    $sql_admin_insert = "INSERT INTO regular(startDatum) VALUES('$dateStamp')";
                    $result_admin_insert = mysqli_query($conn, $sql_admin_insert);

                    // Get the ID of the newly inserted user
                    $admin = 0;
                    $manager = 0;
                    $regular = mysqli_insert_id($conn);

                    $sql_change_to_admin = "UPDATE users SET administratorID=NULL,managerID=NULL,regularID={$regular} WHERE userID={$userID}";
                    $update_check = mysqli_query($conn, $sql_change_to_admin);
                    // echo ("Error description: " . mysqli_error($conn));
                    // die;

                        $sql_delete_original_administrator = "DELETE * from administrator where administratorID = '$original_admin_id'";
                        $result_delete_administrator = mysqli_query($conn, $sql_delete_original_administrator);

                        $sql_delete_original_manager = "DELETE * from manager where managerID = '$original_manager_id'";
                        $result_delete_manager = mysqli_query($conn, $sql_delete_original_manager);

                    if ($update_check) {
                        header("Location: admin-dashboard.php?success=Your account has been updated succesfully");
                        exit();
                    } else {
                        echo ("werkt een beetje");
                        exit();
                    }
                } else {
                    header("Location: admin-dashboard.php?error");
                    exit();
                }
            } else {
                echo ("werkt niet");
                exit();
            }
        }
    } else {
        header("Location: admin-dashboard.php?error");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}



        // // Insert data into the regular table
        // $sql_regular = "INSERT INTO regular(startDatum) VALUES('$dateStamp')";
        // $result_regular = mysqli_query($conn, $sql_regular);

        // // Get the ID of the newly inserted user
        // $regular_id = mysqli_insert_id($conn);

        // // Insert data into the adres table
        // $sql_adres = "INSERT INTO adres(omschrijving, straat, huisnummer, postcode, plaats, land, telefoonnummer, mobielnummer, toevoegdatum, notitie) VALUES('$description', '$street', '$houseNumber', '$postalCode', '$city', '$country', '$phonenumber', '$mobilePhonenumber', '$dateStamp', '$note')";
        // $result_adres = mysqli_query($conn, $sql_adres);
        // // echo("Error description: " . mysqli_error($conn));
        // // die;

        // // Get the ID of the newly inserted user
        // $adres_id = mysqli_insert_id($conn);

        // // Insert data into the users table
        // $sql_users = "INSERT INTO users(email, voornaam, achternaam, tussenvoegsels, geslacht, gebruikersnaam, password, adresID, regularID) VALUES('$email', '$firstname', '$lastname', '$preposition', '$gender', '$username', '$hashed_pass', '$adres_id', '$regular_id')";
        // $result_users = mysqli_query($conn, $sql_users);
        // // echo("Error description: " . mysqli_error($conn));
        // // // var_dump($result_users);
        // // die;


        // "UPDATE users
        // SET regularID = NULL, adminID = $adminID
        // FROM users
        // WHERE userID = $userID
        // and regularID = '$original_regular_id'";