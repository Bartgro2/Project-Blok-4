    <nav>
        <ul>
            <li>
                <div class="icon">
                    <a href="index.php"><i class="fa fa-home"></i>Home</a>
                    <a href="">Diensten</a>
                    <a href="">Over ons</a>
                    <button data-modal-target="#modal" class="modal-button">Over dit project</button>
                    <div class="modal" id="modal">
                        <div class="modal-header">
                            <div class="title">Project blok 4</div>
                            <button data-close-button class="close-button">&times;</button>
                        </div>
                        <div class="modal-body">
                            Het project bestaat uit 2 projectweken.
                            Er wordt iedere dag aan het project gewerkt, tot het gewenste resultaat behaald is.
                        </div>
                    </div>
                    <div id="overlay"></div>
                </div>
            </li>
        </ul>
        <?php
        if (isset($_SESSION['email'])) {
        ?>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"><?php echo $_SESSION['voornaam']; ?></button>
                <div id="myDropdown" class="dropdown-content">
                    <?php
                    if (isset($_SESSION['adminID'])) { ?>
                        <a href="admin-dashboard.php">dashboard</a>
                    <?php
                    } else if (isset($_SESSION['managerID'])) { ?>
                        <a href="manager-dashboard.php">dashboard</a>
                    <?php
                    }
                    ?>
                    <a href="adresses.php">adressen</a>
                    <a href="user-settings.php">instellingen</a>
                    <a href="session_logout.php">Logout</a>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="icon">
                <a href="login.php"><i class="fa fa-user"></i>Login</a>
            </div>
        <?php
        }
        ?>

    </nav>