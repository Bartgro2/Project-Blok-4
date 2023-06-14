<?php
require 'database.php';

$sql = "SELECT * FROM workout";

$result = mysqli_query($conn, $sql);

$workouts_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <main>
        <div class="container-table">
        <table>
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
                    <td><?php echo $workout_info['id'] ?></td>
                    <td><?php echo $workout_info['omschrijving'] ?></td>
                    <td><?php echo $workout_info['duur'] ?></td>
                    <td><?php echo $workout_info['notitie'] ?></td>
                    <td><?php echo $workout_info['startdatum'] ?></td>
                </tbody>
            <?php endforeach; ?>
        </table>
    </main>
    </div>
</body>

</html>

