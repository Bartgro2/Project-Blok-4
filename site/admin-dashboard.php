<?php
session_start();
if (isset($_SESSION['userID']) && isset($_SESSION['email']) && isset($_SESSION['adminID'])) {
    require 'database.php';

    $sql = "SELECT * FROM users";

    $result = mysqli_query($conn, $sql);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                            <table>
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>email</th>
                                        <th>voornaam</th>
                                        <th>achternaam</th>
                                        <th>address</th>
                                        <th>geslacht</th>
                                        <th>role</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
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