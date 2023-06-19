<?php require 'database.php';
session_start();

if (!isset($_SESSION['regularid'])) {
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
    <p id="greeting">
     <p><?php echo $_SESSION['username']; ?></p>
    
    </p>
    
    <script src="Javascript/script.js">  </script>
    
</body>

</html>