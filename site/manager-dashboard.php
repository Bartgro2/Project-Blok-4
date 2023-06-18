<?php
session_start();
if (isset($_SESSION['userID']) && isset($_SESSION['email']) && isset($_SESSION['managerID'])) {
    require 'database.php';

    $sql = "SELECT * FROM adres";

    $result = mysqli_query($conn, $sql);

    $adresses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sqlCount = "SELECT COUNT(adresID) AS adresCount FROM adres";

    $resultCount = mysqli_query($conn, $sqlCount);

    $adresCountsql = mysqli_fetch_assoc($resultCount);

    $sqlCount = "SELECT COUNT(userID) AS userCount, COUNT(administratorID) AS adminCount, COUNT(managerID) AS managerCount, COUNT(regularID) AS regularCount FROM users";

    $resultCount = mysqli_query($conn, $sqlCount);

    $userCountsql = mysqli_fetch_assoc($resultCount);
?>

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
                            <section class="table__header">
                                <div class="input-group">
                                    <form action="manager-dashboard.php" method="POST">
                                        <label for="sort"></label>
                                        <select name="sort" id="sort">
                                            <option value="alfabetisch_a-z">Alfabetisch plaats a-z</option>
                                            <option value="alfabetisch_z-a">Alfabetisch plaats z-a</option>
                                            <option value="toevoegdatum_laag-hoog">Toevoegdatum laag-hoog</option>
                                            <option value="toevoegdatum_hoog-laag">Toevoegdatum hoog-laag</option>
                                        </select>
                                        <input id="submit-sort" type="submit" name="submit-sort" value="Sort">
                                    </form>
                                </div>
                                <div class="input-group">
                                    <form action="manager-dashboard.php" method="POST">
                                        <label for="search"></label>
                                        <input id="search" name="search" type="search" placeholder="Type hier">
                                        <input id="submit-search" type="submit" name="submit-search" value="Zoek">
                                    </form>
                                </div>
                                <div class="display-group">
                                    <div class="display-group-child">
                                        <p>aantal adressen: <?php echo $adresCountsql['adresCount'] ?></p>
                                        <p>aantal administrators: <?php echo $userCountsql['adminCount'] ?></p>
                                    </div>
                                    <div class="display-group-child">
                                        <p>aantal managers: <?php echo $userCountsql['managerCount'] ?></p>
                                        <p>aantal regulars: <?php echo $userCountsql['regularCount'] ?></p>
                                    </div>
                                </div>
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
                                            <th></th>
                                            <th></th>
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
                                                    <td>
                                                        <a href="deleteUser.php?id=<?php echo $searchadres['adresID'] ?>" class="btn-delete">delete</a>
                                                    </td>
                                                    <td>
                                                        <a href="userUpdate.php?id=<?php echo $searchadres['adresID'] ?>" class="btn-update">update</a>
                                                    </td>
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
                                                    <td>
                                                        <a href="deleteUser.php?id=<?php echo $searchadres['adresID'] ?>" class="btn-delete">delete</a>
                                                    </td>
                                                    <td>
                                                        <a href="userUpdate.php?id=<?php echo $searchadres['adresID'] ?>" class="btn-update">update</a>
                                                    </td>
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
                                                    <td>
                                                        <a href="deleteUser.php?id=<?php echo $adres['adresID'] ?>" class="btn-delete">delete</a>
                                                    </td>
                                                    <td>
                                                        <a href="userUpdate.php?id=<?php echo $adres['adresID'] ?>" class="btn-update">update</a>
                                                    </td>
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