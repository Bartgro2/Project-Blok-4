<?php
require 'database.php';

$sql = "SELECT * FROM gebruiker";

$result = mysqli_query($conn, $sql);

$gebruikers_info = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>workout_id</th>
                <th>voornaam</th>
                <th>tussenvoegsels</th>
                <th>achternaam</th>
                <th>geslacht</th>
                <th>email</th>
                <th>gebruikersnaam</th>
                <th>wachtwoord</th>
                <th>straat</th>
                <th>huisnummer</th>
                <th>postcode</th>
                <th>plaats</th>
                <th>land</th>
                <th>telefoonnummer</th>
                <th>mobielnummer</th>
            </tr>
        </thead>
        <?php foreach ($gebruikers_info as $gebruiker_info) : ?>
            <tbody>

                <td><?php echo $gebruiker_info['id']?></td>
                <td><?php echo $gebruiker_info['workout_id']?></td>
                <td><?php echo $gebruiker_info['voornaam']?></td>
                <td><?php echo $gebruiker_info['tussenvoegsels']?></td>
                <td><?php echo $gebruiker_info['achternaam']?></td>
                <td><?php echo $gebruiker_info['geslacht']?></td>
                <td><?php echo $gebruiker_info['email']?></td>
                <td><?php echo $gebruiker_info['gebruikersnaam']?></td>
                <td><?php echo $gebruiker_info['wachtwoord']?></td>
                <td><?php echo $gebruiker_info['straat']?></td>
                <td><?php echo $gebruiker_info['huisnummer']?></td>
                <td><?php echo $gebruiker_info['postcode']?></td>
                <td><?php echo $gebruiker_info['plaats']?></td>
                <td><?php echo $gebruiker_info['land']?></td>
                <td><?php echo $gebruiker_info['telefoonnummer']?></td>
                <td><?php echo $gebruiker_info['mobielnummer']?></td>


            </tbody>
        <?php endforeach; ?>
    </table>
</body>

</html>