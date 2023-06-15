    <nav>
        <ul>
            <li>
                <div class="icon">
                    <a href="index.php"><i class="fa fa-home"></i>Home</a>
                    <a href="">Services</a>
                    <a href="">About us</a>
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
                        <a href="users.php">gebruikers</a>
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