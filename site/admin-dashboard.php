<?php
session_start();
if (isset($_SESSION['userID']) && isset($_SESSION['email']) && isset($_SESSION['adminID'])) {
    require 'database.php';

    $sql = "SELECT * FROM users";

    $result = mysqli_query($conn, $sql);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sqlCount = "SELECT COUNT(userID) AS userCount, COUNT(administratorID) AS adminCount, COUNT(managerID) AS managerCount, COUNT(regularID) AS regularCount FROM users";

    $resultCount = mysqli_query($conn, $sqlCount);

    $userCountsql = mysqli_fetch_assoc($resultCount);
?>

    <head>
        <title>Admin-dashboard</title>
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
                                    <form action="admin-dashboard.php" method="POST">
                                        <label for="sort"></label>
                                        <select name="sort" id="sort">
                                            <option value="alfabetisch_voornaam_a-z">Alfabetisch voornaam a-z</option>
                                            <option value="alfabetisch_voornaam_z-a">Alfabetisch voornaam z-a</option>
                                            <option value="alfabetisch_achternaam_a-z">Alfabetisch achternaam a-z</option>
                                            <option value="alfabetisch_achternaam_z-a">Alfabetisch achternaam z-a</option>
                                        </select>
                                        <input id="submit-sort" type="submit" name="submit-sort" value="Sort">
                                    </form>
                                </div>
                                <div class="input-group">
                                    <form action="admin-dashboard.php" method="POST">
                                        <label for="search"></label>
                                        <input id="search" name="search" type="search" placeholder="Type hier">
                                        <input id="submit-search" type="submit" name="submit-search" value="Zoek">
                                    </form>
                                </div>
                                <div class="display-group">
                                    <div class="display-group-child">
                                        <p>aantal gebruikers: <?php echo $userCountsql['userCount'] ?></p>
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
                                            <th>id</th>
                                            <th>email</th>
                                            <th>voornaam</th>
                                            <th>achternaam</th>
                                            <th>gebruikersnaam</th>
                                            <th>geslacht</th>
                                            <th>role</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($_POST['submit-sort'])) {
                                            // $search = $_POST['search'];
                                            $sortOption = $_POST['sort'];
                                            $sqlSort = "SELECT * FROM users";
                                            if ($sortOption == 'alfabetisch_voornaam_a-z') {
                                                $sqlSort .= " ORDER BY voornaam ASC";
                                            } elseif ($sortOption == 'alfabetisch_voornaam_z-a') {
                                                $sqlSort .= " ORDER BY voornaam DESC";
                                            } elseif ($sortOption == 'alfabetisch_achternaam_a-z') {
                                                $sqlSort .= " ORDER BY achternaam ASC";
                                            } elseif ($sortOption == 'alfabetisch_achternaam_z-a') {
                                                $sqlSort .= " ORDER BY achternaam DESC";
                                            }

                                            // Execute the query
                                            $resultSort = mysqli_query($conn, $sqlSort);

                                            if ($resultSort) {
                                                // Fetch results
                                                $usersSort = mysqli_fetch_all($resultSort, MYSQLI_ASSOC);
                                            } else {
                                                // Display the error message
                                                echo "Error executing the query: " . mysqli_error($conn);
                                            } ?>


                                            <?php foreach ($usersSort as $userSort) : ?>
                                                <tr>
                                                    <td><?php echo $userSort['userID'] ?></td>
                                                    <td><?php echo $userSort['email'] ?></td>
                                                    <td><?php echo $userSort['voornaam'] ?></td>
                                                    <td><?php echo $userSort['achternaam'] ?></td>
                                                    <td><?php echo $userSort['gebruikersnaam'] ?></td>
                                                    <td><?php echo $userSort['geslacht'] ?></td>
                                                    <?php if (isset($userSort['administratorID'])) { ?>
                                                        <td>admin</td>
                                                    <?php } ?>
                                                    <?php if (isset($userSort['managerID'])) { ?>
                                                        <td>manager</td>
                                                    <?php } ?>
                                                    <?php if (isset($userSort['regularID'])) { ?>
                                                        <td>regular</td>
                                                    <?php } ?>
                                                    <td>
                                                        <a href="deleteUser.php?id=<?php echo $userSort['userID'] ?>" class="btn-delete">delete</a>
                                                    </td>
                                                    <td><a href="admin-userUpdate.php?id=<?php echo $userSort['userID'] ?>" class="btn-update">update</a></td>
                                                </tr>
                                            <?php endforeach; ?>


                                        <?php } ?>
                                        <?php if (isset($_POST['submit-search'])) {
                                            $search = $_POST['search'];
                                            $sqlsearch = "SELECT * FROM users WHERE email LIKE '%$search%' OR voornaam LIKE '%$search%' OR achternaam LIKE '%$search%' OR gebruikersnaam LIKE '%$search%' OR geslacht LIKE '%$search%'";

                                            // Execute the query
                                            $resultSearch = mysqli_query($conn, $sqlsearch);

                                            if ($resultSearch) {
                                                // Fetch results
                                                $usersSearch = mysqli_fetch_all($resultSearch, MYSQLI_ASSOC);
                                            } else {
                                                // Display the error message
                                                echo "Error executing the query: " . mysqli_error($conn);
                                            } ?>


                                            <?php foreach ($usersSearch as $userSearch) : ?>
                                                <tr>
                                                    <td><?php echo $userSearch['userID'] ?></td>
                                                    <td><?php echo $userSearch['email'] ?></td>
                                                    <td><?php echo $userSearch['voornaam'] ?></td>
                                                    <td><?php echo $userSearch['achternaam'] ?></td>
                                                    <td><?php echo $userSearch['gebruikersnaam'] ?></td>
                                                    <td><?php echo $userSearch['geslacht'] ?></td>
                                                    <?php if (isset($userSearch['administratorID'])) { ?>
                                                        <td>admin</td>
                                                    <?php } ?>
                                                    <?php if (isset($userSearch['managerID'])) { ?>
                                                        <td>manager</td>
                                                    <?php } ?>
                                                    <?php if (isset($userSearch['regularID'])) { ?>
                                                        <td>regular</td>
                                                    <?php } ?>
                                                    <td>
                                                        <a href="deleteUser.php?id=<?php echo $userSearch['userID'] ?>" class="btn-delete">delete</a>
                                                    </td>
                                                    <td><a href="admin-userUpdate.php?id=<?php echo $userSearch['userID'] ?>" class="btn-update">update</a></td>
                                                </tr>
                                            <?php endforeach; ?>


                                        <?php } ?>

                                        <?php
                                        if (empty($_POST['submit-sort']) && empty($_POST['submit-search'])) {
                                        ?>
                                            <?php foreach ($users as $user) : ?>
                                                <tr>
                                                    <td><?php echo $user['userID'] ?></td>
                                                    <td><?php echo $user['email'] ?></td>
                                                    <td><?php echo $user['voornaam'] ?></td>
                                                    <td><?php echo $user['achternaam'] ?></td>
                                                    <td><?php echo $user['gebruikersnaam'] ?></td>
                                                    <td><?php echo $user['geslacht'] ?></td>
                                                    <?php if (isset($user['administratorID'])) { ?>
                                                        <td>admin</td>
                                                    <?php } ?>
                                                    <?php if (isset($user['managerID'])) { ?>
                                                        <td>manager</td>
                                                    <?php } ?>
                                                    <?php if (isset($user['regularID'])) { ?>
                                                        <td>regular</td>
                                                    <?php } ?>
                                                    <td>
                                                        <a href="deleteUser.php?id=<?php echo $user['userID'] ?>" class="btn-delete">delete</a>
                                                    </td>
                                                    <td><a href="admin-userUpdate.php?id=<?php echo $user['userID'] ?>" class="btn-update">update</a></td>
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