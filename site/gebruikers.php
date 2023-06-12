<?php
require 'database.php';
$sql = "SELECT user_id FROM  gebruiker";

$result = mysqli_query($conn, $sql);

$gebruiker = mysqli_fetch_all($result,MYSQLI_ASSOC);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>

        <form action="verwerk-inloggen.php" method="post">

            <div class="button-container">
                <button type="submit" class="input-button"> Aanmelden</button>
            </div>
            <table>
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>




                <tbody>
                    </tr>
                    <tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                </tbody>
            </table>
    </main>
</body>

</html>