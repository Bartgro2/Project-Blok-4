<?php
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

    if (empty($email)) {
        header("Location: login.php?error=Email-address is required");
        exit();
    } else if (empty($_POST['wachtwoord'])) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email'"; // check de single-qoutes naast email

        //dan voeren we de query uit:
        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($result);

        if (!is_array($user)) {
            header("location: inloggen.php");
            exit;
        }

        if (password_verify($_POST['wachtwoord'], $user['password'])) {
            session_start();
            $_SESSION['email'] = $user['email'];
            $_SESSION['voornaam'] = $user['voornaam'];
            $_SESSION['userID'] = $user['userID'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php?error=Incorect Email-address or Password");
            exit();
        }
    }
} else {
    header("Location: login.php?error");
    exit();
}
