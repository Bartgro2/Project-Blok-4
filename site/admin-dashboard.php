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
        <p class="groet"> <span class="admin"><?php echo $_SESSION['username']; ?></span></p>
        <p><?php echo "in dienst sinds: " . $admin_gegevens['in dienst']; ?></p>

        <div class="dashboard-details">

            <h3>Persoonlijke gegevens</h3>
            <p><?php echo "Voornaam: " . $admin_gegevens['voornaam']; ?></p>
            <p><?php echo "Tussenvoegsels: " . $admin_gegevens['tussenvoegsels']; ?></p>
            <p><?php echo "Achternaam: " . $admin_gegevens['achternaam']; ?></p>
            <p><?php echo "Geslacht: " . $admin_gegevens['geslacht']; ?></p>
            <p><?php echo "Email: " . $admin_gegevens['email']; ?></p>
            <p><?php echo "Wachtwoord: " . $admin_gegevens['wachtwoord']; ?></p>

            <h3>Adresgegevens</h3>
            <p><?php echo "Straat: " . $admin_gegevens['straat']; ?></p>
            <p><?php echo "Huisnummer: " . $admin_gegevens['huisnummer']; ?></p>
            <p><?php echo "Postcode: " . $admin_gegevens['postcode']; ?></p>
            <p><?php echo "Plaats: " . $admin_gegevens['plaats']; ?></p>

            <h3>Contactgegevens</h3>
            <p><?php echo "Telefoonnummer: " . $admin_gegevens['telefoonnummer']; ?></p>
            <p><?php echo "Mobielnummer: " . $admin_gegevens['mobielnummer']; ?></p>

        </div>
        <div class="empty-space"></div>
    </div>
    
    <?php include 'footer.php' ?>
    <script src="Javascript/script.js"> </script>
</body>

</html>