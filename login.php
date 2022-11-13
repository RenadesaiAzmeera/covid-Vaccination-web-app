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
		$query = "select * from user where username = '$user_name' limit 1";
		$result = mysqli_query($con, $query);

		if (!$result || mysqli_num_rows($result) == 0) {
			$err = "* Username doesn't exist";
		}
		if ($result) {

			if ($result && mysqli_num_rows($result) > 0) {

				$user_data = mysqli_fetch_assoc($result);

				if ($user_data['password'] === $password) {

					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: userHome.php");
					die;
				} else {
					$err = "* Username and password does not match";
				}
			}
		}
	}
}

?>

<!DOCTYPE HTML>
<html lang="en">
<html>

<head>
	<title>Login</title>
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
			<form method="post">
				<span style="color:red"> <?php echo "$err" ?></span>
				<h2> Login </h2>
				<input class="box" type="text" placeholder="&#xf007;  username" name="username" />
				<input class="box" type="password" id="password" placeholder="&#xf023;  password" name="password" />
				<input type="checkbox" id="showPassword" />
				<label for="showPassword">Show password</label>
				<br>
				<br>
				<button>LOGIN</button>
				<p class="message"></p>
			</form>


			<form class="login-form">
				<button type="button" onclick="window.location.href='signup.php'">SIGN UP</button>
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