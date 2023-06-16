<?php
session_start();
if (isset($_SESSION['userID']) && isset($_SESSION['email']) && isset($_SESSION['managerID'])) {
    require 'database.php';

    $sql = "SELECT * FROM adres";

    $result = mysqli_query($conn, $sql);

    $adresses = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Gebruikers</title>
    </head>

    <body>
        <?php
        include('header.php');
        ?>
        <section id="content" class="page_height">
            <section class="container_img">
                <div class="container">
                    <div class="container_width">
                        <div>
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                        </div>

                        <div>
                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    Account is up-to-date
                                </div>
                            <?php } ?>
                        </div>
                        <section class="container_scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th>omschijving</th>
                                        <th>straat</th>
                                        <th>huisnummer</th>
                                        <th>postcode</th>
                                        <th>plaats</th>
                                        <th>land</th>
                                        <th>telefoonnummer</th>
                                        <th>mobielnummer</th>
                                        <th>toevoegdatum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($adresses as $adres) : ?>
                                        <tr>
                                            <td><?php echo $adres['omschrijving'] ?></td>
                                            <td><?php echo $adres['straat'] ?></td>
                                            <td><?php echo $adres['huisnummer'] ?></td>
                                            <td><?php echo $adres['postcode'] ?></td>
                                            <td><?php echo $adres['plaats'] ?></td>
                                            <td><?php echo $adres['land'] ?></td>
                                            <td><?php echo $adres['telefoonnummer'] ?></td>
                                            <td><?php echo $adres['mobielnummer'] ?></td>
                                            <td><?php echo $adres['toevoegdatum'] ?></td>
                                            <td>
                                                <a href="deleteUser.php?id=<?php echo $adres['adresID'] ?>" class="btn-delete">delete</a>
                                                <a href="userUpdate.php?id=<?php echo $adres['adresID'] ?>" class="btn-update">update</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </section>
        </section>
        <?php
        include('footer.php');
        ?>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>