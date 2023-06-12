<nav>
    <div class="container">
        <ul>


            <?php if (empty($_SESSION['userid'])) { ?>
                <li> <a href="index.php">Home</a></li>
            <?php } ?>

            <?php if (isset($_SESSION['userid'])) { ?>
                <?php if ($_SESSION['userid'] == $_SESSION['adminid']) { ?>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="nieuwe-workout.php">adressen</a></li>
                    <li> <a href="workouts.php">adressen bekijken</a></li>
                    <li> <a href="gebruikers.php">gebruikers</a></li>          
                    <li> <a href="#">statistieken</a></li>
                    <li> <a href="logout.php">outloggen</a></li>
                <?php } else if ($_SESSION['userid'] == $_SESSION['managerid']) { ?>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="nieuwe-workout.php">workout-a</a></li>
                    <li> <a href="workouts.php">workout</a></li>
                    <li> <a href="#">statistieken</a></li>
                    <li> <a href="logout.php">outloggen</a></li>
                <?php } else if ($_SESSION['userid'] == $_SESSION['regularid']) { ?>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="workouts.php">workouts</a></li>
                    <li> <a href="logout.php">outloggen</a></li>
            <?php } 
            } ?>



        </ul>
    </div>
</nav>