<?php

session_start();
include("connection.php");
include("functions.php");

$done = false;
$result = queryCenter($con, '');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if ($_GET) {
        $result = queryCenter($con, $_GET['search']);
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['apply'])) {

        $id = $_POST['center_id'];

        if (mysqli_num_rows(check($con)) <= 10) {
            $res = createDosage($con, $id);
            if ($res) {

                echo "
            <script>
                alert('successful');
            </script> ";
                header("Location: congrats.php");
            }
        } else {
            echo " <script>
                    alert('Today\'s limit reached please try again tomorrow');
                </script> ";
        }
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="userHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>



<body>
    <div class="topnav">
        <a href="logout.php">Logout</a>
    </div><br>
    <br>
    <br>
    <form method="GET">
        <div class="wrap">
            <div class="search">
                <input type="text" name="search" class="searchTerm" placeholder="Search for vaccination center ... ">
                <button class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form><br><br>
    <?php
    if ($done == false && $result && mysqli_num_rows($result) != 0) {
        while ($rows = $result->fetch_assoc()) {
    ?>

            <form method="POST">
                <div class="card col">
                    <div class="container">
                        <h4><b><?php
                                echo "Name : ";
                                echo  $rows['center_name'];  ?> </b></h4>
                        <p><?php
                            echo "Location : $done ";
                            echo  $rows['center_location'] ?></p>
                        <p><?php
                            echo "Phone : ";
                            echo  $rows['phone'] ?></p>
                        <input type="hidden" name="center_id" value="<?php echo $rows['center_id'] ?>">
                        <input type="submit" name="apply" value="Apply Now" />
            </form>
            </div>
            </div>
        <?php
        }
    } else if ($done == false) {
        ?>
        <br>
        <br><br>
        <center>
            <h3><?php echo "Sorry !! no center found in your area" ?><h3>
        </center>
    <?php
    }
    ?>
</body>

</html>