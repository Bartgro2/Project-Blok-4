<?php
session_start();
if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    require 'database.php';

    $sql = "SELECT * FROM adres";

    $result = mysqli_query($conn, $sql);

    $adresses = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Adressen</title>
    </head>

    <body>
        <?php
        include('header.php');
        ?>
        <section id="content" class="page_height">
            <section class="container_img">
                <div class="container">
                    <div class="container_width">
                        <section class="container_scroll">
                            <section class="table__header">
                                <form action="adresses.php" method="POST">
                                    <label for="sort">Sort By:</label>
                                    <select name="sort" id="sort">
                                        <option value="alfabetisch_a-z">Alfabetisch plaats a-z</option>
                                        <option value="alfabetisch_z-a">Alfabetisch plaats z-a</option>
                                        <option value="toevoegdatum_laag-hoog">Toevoegdatum laag-hoog</option>
                                        <option value="toevoegdatum_hoog-laag">Toevoegdatum hoog-laag</option>
                                    </select>
                                    <input id="submit-sort" type="submit" name="submit-sort" value="Sort">
                                </form>
                                <form action="adresses.php" method="POST">
                                    <div class="input-group">
                                        <label for="search">Zoek:</label>
                                        <input id="search" name="search" type="search" placeholder="Type here">
                                        <input id="submit-search" type="submit" name="submit-search" value="Search">
                                    </div>
                                </form>
                            </section>
                            <section class="table__body">
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
                                        <?php if (isset($_POST['submit-sort'])) {
                                            // $search = $_POST['search'];
                                            $sortOption = $_POST['sort'];
                                            $sqlSort = "SELECT * FROM adres";
                                            if ($sortOption == 'alfabetisch_a-z') {
                                                $sqlSort .= " ORDER BY plaats ASC";
                                            } elseif ($sortOption == 'alfabetisch_z-a') {
                                                $sqlSort .= " ORDER BY plaats DESC";
                                            } elseif ($sortOption == 'toevoegdatum_laag-hoog') {
                                                $sqlSort .= " ORDER BY toevoegdatum ASC";
                                            } elseif ($sortOption == 'toevoegdatum_hoog-laag') {
                                                $sqlSort .= " ORDER BY toevoegdatum DESC";
                                            }
                                            // Execute the query
                                            $resultSort = mysqli_query($conn, $sqlSort);

                                            if ($resultSort) {
                                                // Fetch results
                                                $adresses = mysqli_fetch_all($resultSort, MYSQLI_ASSOC);
                                            } else {
                                                // Display the error message
                                                echo "Error executing the query: " . mysqli_error($conn);
                                            } ?>
                                            <?php foreach ($adresses as $searchadres) : ?>
                                                <tr>
                                                    <td><?php echo $searchadres['omschrijving'] ?></td>
                                                    <td><?php echo $searchadres['straat'] ?></td>
                                                    <td><?php echo $searchadres['huisnummer'] ?></td>
                                                    <td><?php echo $searchadres['postcode'] ?></td>
                                                    <td><?php echo $searchadres['plaats'] ?></td>
                                                    <td><?php echo $searchadres['land'] ?></td>
                                                    <td><?php echo $searchadres['telefoonnummer'] ?></td>
                                                    <td><?php echo $searchadres['mobielnummer'] ?></td>
                                                    <td><?php echo $searchadres['toevoegdatum'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php } ?>
                                        <?php if (isset($_POST['submit-search'])) {
                                            $search = $_POST['search'];
                                            $sqlsearch = "SELECT * FROM adres WHERE straat LIKE '%$search%' OR huisnummer LIKE '%$search%' OR postcode LIKE '%$search%' OR land LIKE '%$search%' OR plaats LIKE '%$search%' OR omschrijving LIKE '%$search%' OR telefoonnummer LIKE '%$search%' OR mobielnummer LIKE '%$search%' OR toevoegdatum LIKE '%$search%'";

                                            // Execute the query
                                            $resultSearch = mysqli_query($conn, $sqlsearch);

                                            if ($resultSearch) {
                                                // Fetch results
                                                $adresses = mysqli_fetch_all($resultSearch, MYSQLI_ASSOC);
                                            } else {
                                                // Display the error message
                                                echo "Error executing the query: " . mysqli_error($conn);
                                            } ?>
                                            <?php foreach ($adresses as $searchadres) : ?>
                                                <tr>
                                                    <td><?php echo $searchadres['omschrijving'] ?></td>
                                                    <td><?php echo $searchadres['straat'] ?></td>
                                                    <td><?php echo $searchadres['huisnummer'] ?></td>
                                                    <td><?php echo $searchadres['postcode'] ?></td>
                                                    <td><?php echo $searchadres['plaats'] ?></td>
                                                    <td><?php echo $searchadres['land'] ?></td>
                                                    <td><?php echo $searchadres['telefoonnummer'] ?></td>
                                                    <td><?php echo $searchadres['mobielnummer'] ?></td>
                                                    <td><?php echo $searchadres['toevoegdatum'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php } ?>
                                        <?php
                                        if (empty($_POST['submit-sort']) && empty($_POST['submit-search'])) {
                                        ?>

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
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </section>
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