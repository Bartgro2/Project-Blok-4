<nav>
    <div class="container">
        <ul>

            <?php if (empty($_SESSION['userid'])) { ?>
                <li> <a href="index.php">Home</a></li>
                <li> <a href="inloggen.php">inloggen</a></li>
            <?php } else { ?>
                <li> <a href="index.php">Home</a></li>
                <li> <a href="inloggen.php">inloggen</a></li>
            <?php } ?>
            
            <?php if (isset($_SESSION['userid'])) { ?>
                <?php if ($_SESSION['userid'] == $_SESSION['adminid']) { ?>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="#">adressen</a></li>
                    <li> <a href="#">gebruikers</a></li>
                    <li> <a href="#">adressen bekijken</a></li>
                    <li> <a href="#">statistieken</a></li>
                    <li> <a href="logout.php">outloggen</a></li>
                <?php } else if ($_SESSION['userid'] == $_SESSION['managerid']) { ?>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="#">adressen</a></li>
                    <li> <a href="#">adressen bekijken</a></li>
                    <li> <a href="#">statistieken</a></li>
                    <li> <a href="logout.php">outloggen</a></li>
                <?php } else if ($_SESSION['userid'] == $_SESSION['regularid']) { ?>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="#">adressen bekijken</a></li>
                    <li> <a href="logout.php">outloggen</a></li>
            <?php }
            } ?>


        </ul>
    </div>
</nav>