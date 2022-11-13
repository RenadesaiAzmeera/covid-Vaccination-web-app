<?php
session_start();

include("connection.php");
include("functions.php");
$err = "";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$user_name = $_POST['username'];
	$password = $_POST['password'];

	if (empty($user_name)) {
		$err = "* Username cannot be empty";
	} elseif (empty($password)) {
		$err = "* Password cannot be empty";
	} elseif (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		$user_id = random_num(20);
		$query = "insert into user (user_id,username,password) values ('$user_id','$user_name','$password')";

		mysqli_query($con, $query);

		header("Location: login.php");
		die;
	}
}
?>


<!DOCTYPE HTML>
<html lang="en">
<html>

<head>
	<title>Signup</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="body">
	<div class="topnav">
		<a class="active" href="login.php">User</a>
		<a href="adminLogin.php">Admin</a>
	</div>
	<div class="login-page">
		<div class="form">
			<h1>Covid Vaccination</h1>
			<i class="fa fa-medkit" style="font-size: 50px;"></i> <br><br>
			<form method="POST">
				<span style="color:red"> <?php echo "$err" ?></span>
				<h2> Sign Up </h2>
				<input class="box" type="text" placeholder="&#xf007;  username" name="username" />
				<input class="box" type="password" id="password" placeholder="&#xf023;  password" name="password" />
				<input type="checkbox" id="showPassword" />
				<label for="showPassword">Show password</label>
				<br>
				<br>
				<button>Sign Up</button>
				<p class="message"></p>
			</form>

			<form class="login-form">
				<button type="button" onclick="window.location.href='login.php'">Back to login</button>
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