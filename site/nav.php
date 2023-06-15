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
                    
                    <a href="adresses.php">adressen</a>
                    <a href="user_settings.php">instellingen</a>
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