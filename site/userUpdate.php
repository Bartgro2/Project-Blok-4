<?php
session_start();
if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    require 'database.php';
    $selectedUserID = $_GET['id'];


    $sql = "SELECT * FROM users WHERE userID = $selectedUserID";

    $result = mysqli_query($conn, $sql);

    $userData = mysqli_fetch_assoc($result);
?>

    <head>
        <title>Gebruiker</title>
    </head>

    <body>
        <?php
        include('header.php');
        ?>
        <section id="content" class="page_height">
            <section class="container_img">
                <div class="container">
                    <div class="container_width">
                        <section class="form_align">
                            <!-- action and method are atributes -->
                            <!-- action en method zijn atributen -->
                            <form action="session-userUpdate.php" method="post" class="form_userUpdate">
                                <div>
                                    <h2 class="form_head_user">Update gebruiker</h2>
                                </div>
                                <div>
                                    <?php if (isset($_GET['error'])) { ?>
                                        <p class="error"><?php echo $_GET['error']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form_group_user_align">
                                    <div class="form_group_user">
                                        <input type="hidden" name="id" value="<?php echo $userData["userID"]; ?>">
                                    </div>
                                    <div class="form_group_user">
                                        <label for="email"><?php echo $userData['email'] ?></label>
                                        <input type="email" id="email" name="email" placeholder="email-address">
                                    </div>
                                    <div class="form_group_user">
                                        <label for="voornaam"><?php echo $userData['voornaam'] ?></label>
                                        <input type="text" id="voornaam" name="voornaam" placeholder="voornaam">
                                    </div>
                                    <div class="form_group_user">
                                        <label for="achternaam"><?php echo $userData['achternaam'] ?></label>
                                        <input type="text" id="achternaam" name="achternaam" placeholder="achternaam">
                                    </div>
                                    <div class="form_group_user">
                                        <label for="tussenvoegsels"><?php echo $userData['tussenvoegsels'] ?></label>
                                        <input type="text" id="tussenvoegsels" name="tussenvoegsels" placeholder="tussenvoegsels ">
                                    </div>
                                    <div class="form_group_user">
                                        <label for="geslacht"><?php echo $userData['geslacht'] ?></label>
                                        <input type="text" id="geslacht" name="geslacht" placeholder="geslacht ">
                                    </div>
                                    <div class="form_group_user">
                                        <label for="gebruikersnaam"><?php echo $userData['gebruikersnaam'] ?></label>
                                        <input type="text" id="gebruikersnaam" name="gebruikersnaam" placeholder="gebruikersnaam ">
                                    </div>
                                </div>
                                <div>
                                    <a href="users.php" class="form_content_switch">Ga terug</a>
                                    <button class="button_submit" type="sumbit">log in</button>
                                </div>
                            </form>
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