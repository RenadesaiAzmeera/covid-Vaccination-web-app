<?php


$message = "Congratulations !  Your appointment for covid vaccine has been booked";


?>

<!DOCTYPE HTML>
<html lang="en">
<html>

<head>
    <title>Congratulations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="body">

    <div class="topnav">
        <a href="logout.php">Logout</a>
    </div><br>
    <br>
    <br>
    <div class="msg">

        <h3><?php
            echo $message;
            ?><h3>
    </div>
</body>

</html>