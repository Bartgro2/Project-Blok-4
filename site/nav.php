<nav>
    <div class="container">
        <ul>
            <?php if (isset($_SESSION['rol'])) { ?>

                <?php if ($_SESSION['rol'] == 'administrator') { ?>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="#">vis</a></li>
                    <li> <a href="#">soep</a></li>
                <?php } else if ($_SESSION['rol'] == 'manager') { ?>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="#">drop</a></li>
                    <li> <a href="#">dop</a></li>
                <?php } else if ($_SESSION['rol'] == 'regular') { ?>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="#">drop</a></li>
                    <li> <a href="#">dop</a></li>
            <?php }
            } ?>
            <li> <a href="index.php">Home</a></li>
            <li> <a href="#">drop</a></li>
            <li> <a href="#">dop</a></li>


        </ul>
    </div>
</nav>