<?php
require 'database.php';

$sql = "SELECT * FROM gebruiker";

$result = mysqli_query($conn, $sql);

$gebruikers_info = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT COUNT(id) as gebruikers From gebruiker";

$result = mysqli_query($conn, $sql);

$aantal_gebruikers = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT COUNT(administrator.gebruiker_id) as admins FROM gebruiker INNER JOIN administrator ON administrator.gebruiker_id";

$result = mysqli_query($conn, $sql);

$aantal_administrators = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT COUNT(manager.gebruiker_id) as managers FROM gebruiker INNER JOIN manager ON manager.gebruiker_id = gebruiker.id ";

$result = mysqli_query($conn, $sql);

$aantal_managers = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT COUNT(regular.gebruiker_id) as regulars FROM gebruiker INNER JOIN regular on regular.gebruiker_id = gebruiker.id";

$result = mysqli_query($conn, $sql);

$aantal_regulars = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <main>
        <div class="table-container2">
            <div class="item">
                <table class="table-gebruikers">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>workout_id</th>
                            <th>voornaam</th>
                            <th>tussenvoegsels</th>
                            <th>achternaam</th>
                            <th>geslacht</th>
                            <th>email</th>
                            <th>telefoonnummer</th>
                            <th>mobielnummer</th>
                            <th>gebruikersnaam</th>
                            <th>wachtwoord</th>
                            <th>straat</th>
                            <th>huisnummer</th>
                            <th>postcode</th>
                            <th>plaats</th>
                            <th>land</th>

                        </tr>
                    </thead>
                    <?php foreach ($gebruikers_info as $gebruiker_info) : ?>
                        <tbody>
                            <tr>
                                <td class="table-gebruikers-td"><?php echo $gebruiker_info['id'] ?></td>
                                <td><?php echo $gebruiker_info['workout_id'] ?></td>
                                <td><?php echo $gebruiker_info['voornaam'] ?></td>
                                <td><?php echo $gebruiker_info['tussenvoegsels'] ?></td>
                                <td><?php echo $gebruiker_info['achternaam'] ?></td>
                                <td><?php echo $gebruiker_info['geslacht'] ?></td>
                                <td><?php echo $gebruiker_info['email'] ?></td>
                                <td><?php echo $gebruiker_info['telefoonnummer'] ?></td>
                                <td><?php echo $gebruiker_info['mobielnummer'] ?></td>
                                <td><?php echo $gebruiker_info['gebruikersnaam'] ?></td>
                                <td><?php echo $gebruiker_info['wachtwoord'] ?></td>
                                <td><?php echo $gebruiker_info['straat'] ?></td>
                                <td><?php echo $gebruiker_info['huisnummer'] ?></td>
                                <td><?php echo $gebruiker_info['postcode'] ?></td>
                                <td><?php echo $gebruiker_info['plaats'] ?></td>
                                <td><?php echo $gebruiker_info['land'] ?></td>

                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="item">
                <table class="table-gebruikers">
                    <thead>
                        <tr>
                            <th>workouts</th>
                            <th>admins</th>
                            <th>managers</th>
                            <th>regulars</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($aantal_gebruikers as $gebruikers) : ?>
                                <td><?php echo $gebruikers['gebruikers'] ?></td>
                            <?php endforeach; ?>
                            <?php foreach ($aantal_administrators as $administrator) : ?>
                                <td><?php echo $administrator['admins'] ?> </td>
                            <?php endforeach; ?>
                            <?php foreach ($aantal_managers as $manager) : ?>
                                <td><?php echo $manager['managers'] ?></td>
                            <?php endforeach; ?>
                            <?php foreach ($aantal_regulars as $regulars) : ?>
                                <td><?php echo $regulars['regulars'] ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>

</html>