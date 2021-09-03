<?php
session_start();

include("config/db.php");
$First_Name = "";
$Email_ID = "";
$errors = array();

//Connect to the database
// $db = mysqli_connect('localhost', 'root', '', 'buspassproject');

//if user clicks on the signup button
if(isset($_POST['signup-btn'])) {
	$First_Name = mysqli_real_escape_string($db, $_POST['First_Name']);
	$Last_Name = mysqli_real_escape_string($db, $_POST['Last_Name']);
	$Email_ID = mysqli_real_escape_string($db, $_POST['Email_ID']);
	$Password = mysqli_real_escape_string($db, $_POST['Password']);
	$RePassword = mysqli_real_escape_string($db, $_POST['RePassword']);

	//Validation.
	if(empty($First_Name)){
		array_push($errors, "First Name is required");
	}
	if(empty($Last_Name)){
		array_push($errors, "Last Name is required");
	}
	if(filter_var($Email_ID, FILTER_VALIDATE_EMAIL)){
		array_push($errors, "EmailID Address is Invalid");
	}
	if(empty($Email_ID)){
		array_push($errors, "EmailID is required");
	}
	if(empty($Password)){
		array_push($errors, "Password is required");
	}
	if($Password != $RePassword){
		array_push($errors, "Two password should be same");
	}
	
	$emailQuery = "SELECT * FROM bususer WHERE Email_ID='$Email_ID' LIMIT 1";
	$result = mysqli_query($db, $emailQuery);
	$user = mysqli_fetch_assoc($result);
	
	if($user) {
		if($user['Email_ID'] === $Email_ID) {
			$errors['Email_ID'] = "Email Address already exists";
		}
	}
	
	if(count($errors) === 0) {
		function create_userid($length)
		{
			$text = "";
			if($length < 5)
			{
				$length = 5;
			}
			$len = rand(4, $length);
			for($i=0; $i < $len; $i++) {
				$text .= rand(0,9);
			}
			return $text;
		}
		$User_ID = create_userid(6);
		
		//$Password = Password_hash($Password, PASSWORD_DEFAULT);
		// $Password = md5($Password);
		$token = bin2hex(random_bytes(50));
		$Verified = false;
		
		
		$sql = "INSERT INTO bususer (User_ID, First_Name, Last_Name, Email_ID, Verified, token, Password, RePassword) values ('$User_ID', '$First_Name', '$Last_Name', '$Email_ID', '$Verified', '$token', '$Password', '$RePassword')";
		if(mysqli_query($db, $sql)) 
		{
			//login user
			// $_SESSION['Id'] = $Id;
			$_SESSION['User_ID'] = $User_ID;
			$_SESSION['First_Name'] = $First_Name;
			$_SESSION['Last_Name'] = $Last_Name;
			$_SESSION['Email_ID'] = $Email_ID;
			$_SESSION['Verified'] = $Verified;
			$_SESSION['token'] = $token;
			$_SESSION['Password'] = $Password;
			$_SESSION['RePassword'] = $RePassword;


			//set flash message 
			$_SESSION['success'] = "You are now Logged In!";
			header('location: index.php');
			exit();
		} else {
			$errors['db_error'] = "Database Error: Failed to register";
		}
	}
}

// if user clicks on the login button
if(isset($_POST['login-btn'])) {
	$Email_ID = mysqli_real_escape_string($db, $_POST['Email_ID']);
	$Password = mysqli_real_escape_string($db, $_POST['Password']);
	
	//Validation.
	if(empty($Email_ID)){
		array_push($errors, "EmailID is required");
	}
	if(empty($Password)){
		array_push($errors, "Password is required");
	}
	if(count($errors) == 0){
		$query = "SELECT * FROM users WHERE Email_ID = '$Email_ID' AND Password = '$Password'";
		$results = mysqli_query($db, $query);
		
		if(mysqli_num_rows($results) == 1){
		//login success
		//login user
		$_SESSION['User_ID'] = $user['User_ID'];
		$_SESSION['First_Name'] = $user['First_Name'];
		$_SESSION['Last_Name'] = $user['Last_Name'];
		$_SESSION['Email_ID'] = $user['Email_ID'];
		$_SESSION['Verified'] = $user['Verified'];
		$_SESSION['Password'] = $user['Password'];
		//set flash message 
		$_SESSION['success'] = "You are now Logged In!";
		// $_SESSION['alert-class'] = "alert-success";
		header('location: index.php');
		} else {
			array_push($errors, "Wrong Email/Password combination");
		}		
	}
	
}

if(isset($_POST["paybtn"])){ 
		$BusNo = $_POST["BusNo"];
		$Start = $_POST["Start"];
		$Stop = $_POST["Stop"];
		$option = $_POST["option"];
		$price = $_POST["price"];
		$User_ID = $_SESSION["User_ID"];


		// $sql = "SELECT * bususer WHERE User_ID = ? LIMIT 1";
		// $
//INSERT QUERY
    if(mysqli_query($conn,"INSERT INTO createpass (User_ID, busno, start, stop, option, price)
        VALUES ($User_ID, $BusNo, $Start, $Stop, $option, $price)")){
        echo "Record inserted successfully";
    }
}

//logout page
if(isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['First_Name']);
	unset($_SESSION['Last_Name']);
	unset($_SESSION['Email_ID']);
	unset($_SESSION['Verified']);
	header('location: loginpage.php');
	exit();
}

?>