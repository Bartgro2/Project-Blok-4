<?php require 'database.php'; 
session_start();
if ($_SESSION['rol'] != 'administrator'){
    header("location: inloggen.php");
    exit();
}
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

    <?php include 'nav.php'; ?>
    
    <?php echo "Hallo! " . $_SESSION['username']; ?> 
    
    <div>
        <a href="logout.php">logout</a>
    </div>
</body>

</html>