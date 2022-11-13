<?php

session_start();

include("connection.php");
include("functions.php");
$result = getDosageDetails($con);
?>

<!DOCTYPE HTML>
<html lang="en">
<html>

<head>


    <title>Dosage Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="topnav">
        <a href="adminLogin.php">Logout</a>
        <a href="addVaccination.php">Add Center</a>
        <a href="showDosage.php">Dosage Details</a>
        <a href="adminHome.php">Home</a>


    </div><br>
    <br>
    <br>
    <?php
    $curr = "";
    if ($result && mysqli_num_rows($result) != 0) {
        while ($rows = $result->fetch_assoc()) {
    ?>


            <div>
                <h4><b><?php
                        if ($rows['center_id'] != $curr) {
                            echo "Center id : ";
                            echo  $rows['center_id'];
                            $curr = $rows['center_id'];
                            echo "<p>Dosage ID  ||  User ID  ||  Date</p>";
                        }
                        ?> </b></h4>
                <p><?php
                    echo "<p>";
                    echo $rows['dosage_id'];
                    echo "  ||  ";
                    echo  $rows['user_id'];
                    echo "  ||  ";
                    echo  $rows['date']?></p>

                <p><?php
                     ?></p>
            </div>

    <?php
        }
    }
    ?>

</body>

</html>