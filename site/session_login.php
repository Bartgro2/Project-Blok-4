<?php
session_start();
include("database.php");

if (isset($_POST['email']) && isset($_POST['wachtwoord'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['wachtwoord']);

    if (empty($email)) {
        header("Location: login.php?error=Email-address is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email' and wachtwoord = '$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['wachtwoord'] === $pass && $row['role'] == 'employee') {
                $_SESSION['email'] = $row['email'];
                $_SESSION['voornaam'] = $row['voornaam'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['role'] = $row['role'];

                header("location: index.php");
                exit();

            }elseif($row['email'] === $email && $row['wachtwoord'] === $pass && $row['role'] == 'administrator'){
                $_SESSION['email'] = $row['email'];
                $_SESSION['voornaam'] = $row['voornaam'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['role'] = $row['role'];

                header("Location: index.php");
                exit();
            }elseif($row['email'] === $email && $row['wachtwoord'] === $pass && $row['role'] == 'customer'){
                $_SESSION['email'] = $row['email'];
                $_SESSION['voornaam'] = $row['voornaam'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['role'] = $row['role'];

                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=Incorect Email-address or Password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorect Email-address or Password");
            exit();
        }
    }
} else {
    header("Location: login.php?error");
    exit();
}
