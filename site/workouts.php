<?php
require 'database.php';

$sql = "SELECT *  FROM workout";

$result = mysqli_query($conn, $sql);

$workouts_info = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT COUNT(id) as workouts From workout";

$result = mysqli_query($conn, $sql);

$aantal_workouts = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT COUNT(gebruiker.workout_id) as admins FROM workout INNER JOIN gebruiker ON gebruiker.workout_id = workout.id INNER JOIN administrator on administrator.gebruiker_id = gebruiker.id";

$result = mysqli_query($conn, $sql);

$aantal_administrators = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT COUNT(gebruiker.workout_id) as managers FROM workout INNER JOIN gebruiker ON gebruiker.workout_id = workout.id INNER JOIN manager on manager.gebruiker_id = gebruiker.id";

$result = mysqli_query($conn, $sql);

$aantal_managers = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT COUNT(gebruiker.workout_id) as regulars FROM workout INNER JOIN gebruiker ON gebruiker.workout_id = workout.id INNER JOIN regular on regular.gebruiker_id = gebruiker.id";

$result = mysqli_query($conn, $sql);

$aantal_regulars = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require 'nav.php'; ?>
    <main>
        <div class="table-container">
            <div class="item">
                <table class="table-workouts">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>omschrijving</th>
                            <th>duur</th>
                            <th>notitie</th>
                            <th>startdatum</th>
                        </tr>
                    </thead>
                    <?php foreach ($workouts_info as $workout_info) : ?>
                        <tbody>
                            <tr>
                                <td><?php echo $workout_info['id'] ?></td>
                                <td><?php echo $workout_info['omschrijving'] ?></td>
                                <td><?php echo $workout_info['duur'] ?></td>
                                <td><?php echo $workout_info['notitie'] ?></td>
                                <td><?php echo $workout_info['startdatum'] ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="item">
                <table class="table-workouts">
                    <thead>
                        <tr>
                            <th>workouts</th>
                            <th>admins</th>
                            <th>managers</th>
                            <th>regulars</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($aantal_workouts as $workout) : ?>
                                <td><?php echo $workout['workouts'] ?></td>
                            <?php endforeach; ?>
                            <?php foreach ($aantal_administrators as $administrator) : ?>
                                <td><?php echo $administrator['admins'] ?> </td>
                            <?php endforeach; ?>
                            <?php foreach ($aantal_managers as $manager) : ?>
                                <td><?php echo $manager['managers'] ?></td>
                            <?php endforeach; ?>
                            <?php foreach ($aantal_regulars as $regulars) : ?>
                                <td><?php echo $regulars['regulars'] ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
    </main>
    </div>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>