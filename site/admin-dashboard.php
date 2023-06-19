<?php require 'database.php';

session_start();

if (!isset($_SESSION['adminid'])) {
    header("location: inloggen.php");
    exit();
}

$sql = "SELECT * From gebruiker inner join administrator on administrator.gebruiker_id = gebruiker.id ";

$result = mysqli_query($conn, $sql);

$admin_gegevens = mysqli_fetch_assoc($result);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include 'nav.php'; ?>
    <div class="dashboard-container">


        <p id="greeting" class="groet"> </p>
        <p class="groet"><?php echo $_SESSION['username']; ?></p>


        <div class="admin-details">
            


            <p><?php echo $admin_gegevens['voornaam'] ?></p>
            <p><?php echo $admin_gegevens['tussenvoegsels'] ?></p>
            <p><?php echo $admin_gegevens['achternaam'] ?> </p>
            <p><?php echo $admin_gegevens['geslacht'] ?></p>
            <p><?php echo $admin_gegevens['email'] ?></p>
            <p><?php echo $admin_gegevens['wachtwoord'] ?></p>
            <p><?php echo $admin_gegevens['straat'] ?></p>
            <p><?php echo $admin_gegevens['huisnummer'] ?></p>
            <p><?php echo $admin_gegevens['postcode'] ?></p>
            <p><?php echo $admin_gegevens['plaats'] ?></p>
            <p><?php echo $admin_gegevens['land'] ?></p>
            <p><?php echo $admin_gegevens['telefoonnummer'] ?></p>
            <p><?php echo $admin_gegevens['mobielnummer'] ?></p>
        </div>
    </div>
    <script src="Javascript/script.js"> </script>
</body>

</html>