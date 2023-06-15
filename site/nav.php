<script src="https://kit.fontawesome.com/69c0b06945.js" crossorigin="anonymous"></script>
<nav>
    <div class="container">
        <ul>
            <?php if (isset($_SESSION['adminid'])) { ?>
                <li> <a href="index.php">Home</a></li>
                <li> <a href="nieuwe-workout.php">adressen</a></li>
                <li> <a href="workouts.php">adressen bekijken</a></li>
                <li> <a href="gebruikers.php">gebruikers</a></li>
                <li class="dropdown">
                <i class="fa-solid fa-gear"></i>
                    <ul class="submenu">
                        <div class="submenu-ruimte">
                        <li>
                            <a href="outloggen.php">logout</a>               
                        </li> 
                    </div>
                    </ul>
               

            <?php } else if (isset($_SESSION['managerid'])) { ?>
                <li> <a href="index.php">Home</a></li>
                <li> <a href="nieuwe-workout.php">workout-a</a></li>
                <li> <a href="workouts.php">workout</a></li>


                <li> <a href="logout.php">outloggen</a></li>
            <?php } else if (isset($_SESSION['regularid'])) { ?>
                <li> <a href="index.php">Home</a></li>
                <li> <a href="workouts.php">workouts</a></li>
                <li> <a href="logout.php">outloggen</a></li>
        </ul>

    <?php } else { ?>
        <li> <a href="index.php">Home</a></li>
        <li> <a href="inloggen.php">inloggen</a></li>
    <?php    } ?>
    </ul>
    </div>
</nav>