<?php

function check_login($con)
{

	if (isset($_SESSION['user_id'])) {

		$id = $_SESSION['user_id'];
		$query = "select * from user where user_id = '$id' limit 1";

		$result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0) {

			$user_data = mysqli_fetch_assoc($result);
			header("Location: userHome.php");
		}
	}
	header("Location: login.php");
	die;
}


function check_admin_login($con)
{

	if (isset($_SESSION['user_id'])) {

		$id = $_SESSION['user_id'];
		$query = "select * from admin where user_id = '$id' limit 1";

		$result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0) {

			$user_data = mysqli_fetch_assoc($result);
			header("Location: adminHome.php");
			//return $user_data;
		}
	}
	header("Location: adminLogin.php");
	die;
}

function random_num($length)
{
	$text = "";
	if ($length < 5) {
		$length = 5;
	}
	$len = rand(4, $length);
	for ($i = 0; $i < $len; $i++) {
		$text .= rand(0, 9);
	}
	return $text;
}


function queryCenter($con, $name)
{

	if (isset($_SESSION['user_id'])) {

		$id = $_SESSION['user_id'];
		$query = "select * from centers where center_location like '%$name%' ";

		$result = mysqli_query($con, $query);
		return $result;
	}
}


function createDosage($con, $center_id)
{
	$date=date('Y-m-d');
	if (isset($_SESSION['user_id'])) {

		$id = $_SESSION['user_id'];
		$query = "INSERT INTO dosage (dosage_id, user_id, center_id,date) VALUES ('','$id','$center_id','$date') ";
		$result = mysqli_query($con, $query);
		return $result;
	}
}

function deleteCenter($con,$center_id)
{
	$query="delete from centers where center_id= $center_id";
	$result=mysqli_query($con,$query);
		return $result;
}

function addCenter($con,$name,$loc,$phone)
{
	$query="INSERT INTO centers (center_id, center_name, center_location, phone) VALUES ('','$name','$loc','$phone')";
	$result=mysqli_query($con,$query);
	return $result;
}

function check($con)
{
	$date=date('Y-m-d');
	$query="select * from dosage where date='$date'";
	$res=mysqli_query($con,$query);
	return $res;

}




function getDosageDetails($con)
{
	$query ="select * from dosage order by center_id";
	$result=mysqli_query($con,$query);
	return $result;
}