<?php 
extract($_POST);
include 'config/db.php';

if(isset($_POST['signup-btn']))
{
$First_Name = mysqli_real_escape_string($db, $_POST['First_Name']);
$Last_Name = mysqli_real_escape_string($db, $_POST['Last_Name']);
$Email_ID = mysqli_real_escape_string($db, $_POST['Email_ID']);
$Password = mysqli_real_escape_string($db, $_POST['Password']);
$RePassword = mysqli_real_escape_string($db, $_POST['RePassword']);
$verify_token = md5(rand());

$email_query = "SELECT * FROM registerusers WHERE Email_ID = '$Email_ID' LIMIT 1";
$sql=mysqli_query($db, $email_query);
if(mysqli_num_rows($sql)>0)
{
	echo "Email Id Already Exists";
	exit();
}else
{
	if(!empty($First_Name) && !empty($Email_ID) && !empty($Password) && !empty($RePassword))
	{
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
		$query = "INSERT INTO registerusers (User_ID, First_Name, Last_Name, Email_ID, Password, RePassword, verify_token, status) values ('$User_ID', '$First_Name', '$Last_Name', '$Email_ID', '$Password', '$RePassword', '$verify_token', 'inactive')";
		$query_run = mysqli_query($db, $query);
		
		if($query_run){
			$_SESSION['status'] = "Registration Successful.! Please verify your Email Address.";
			header("Location: loginpage.php");
		}
		else{
			$_SESSION['status'] = "Registration Failed!";
			header("Location: loginpage.php");
		}	
	}else {
		echo "Error.Please try again";
	}
}
}
if(isset($_POST['adminbtn']))
{
$Name = mysqli_real_escape_string($db, $_POST['Name']);
$Email_ID = mysqli_real_escape_string($db, $_POST['Email_ID']);
$Password = mysqli_real_escape_string($db, $_POST['Password']);

$email_query = "SELECT * FROM admin WHERE Email_ID = '$Email_ID' LIMIT 1";
$sql=mysqli_query($db, $email_query);
if(mysqli_num_rows($sql)>0)
{
	echo "Email Id Already Exists";
	exit();
}else
{
	if(!empty($Name) && !empty($Email_ID) && !empty($Password))
	{
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
		$Admin_ID = create_userid(6);
		$query = "INSERT INTO admin (Admin_ID, Name, Email_ID, Password) values ('$Admin_ID', '$Name', '$Email_ID', '$Password')";
		$query_run = mysqli_query($db, $query);
		
		if($query_run){
			$_SESSION['status'] = "Registration Successful.!";
			header("Location: loginpage.php");
		}
		else{
			$_SESSION['status'] = "Registration Failed!";
			header("Location: loginpage.php");
		}	
	}else {
		echo "Error.Please try again";
	}
}
}
?>