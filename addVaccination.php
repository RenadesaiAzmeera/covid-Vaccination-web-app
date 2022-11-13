<?php

session_start();

include("connection.php");
include("functions.php");

$err = "";
if (isset($_POST['submit'])) {

        $res= addCenter($con,$_POST['cname'],$_POST['clocation'],$_POST['cphone']);
        if($res)
        {
            echo "
            <script>
                alert('successful');
            </script> ";
        }
        else{

                echo $res ;
                echo $_POST['cphone'] ;
        }
}

?>

<!DOCTYPE HTML>
<html lang="en">
<html>
<head>


    <title>Add Vaccination</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="body">
    <div class="topnav">
        <a href="adminLogin.php">Logout</a>
        <a href="addVaccination.php">Add Center</a>
        <a href="showDosage.php">Dosage Details</a>
        <a href="adminHome.php">Home</a>


    </div><br>
    <br>
    <br>

    <div class="login-page">
        <div class="form">
            <h1>Add Vaccination Center</h1>
            <form method="post">

                <input class="box" type="text" placeholder="Center Name" name="cname" />
                <input class="box" type="text" placeholder="Center Location" name="clocation" />
                <input class="box" type="number" placeholder="Center Phone" name="cphone" />
                <br>
                <br>
                <button name="submit">Save</button>
            </form>

        </div>
    </div>
    <script>
        document.getElementById('showPassword').onclick = function() {
            if (this.checked) {
                document.getElementById('password').type = "text";
            } else {
                document.getElementById('password').type = "password";
            }
        };
    </script>
</body>

</html>