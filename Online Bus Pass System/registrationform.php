<?php
include 'registerprocess.php';
?>
<!DOCTYPE html>
<html lang="En">
<head>
<meta charset="utf-8">
<meta name="viewport" content ="width = device-width, initial-scale  = 1">
<title> REGISTRATION FORM </title>
<style>
body {
  background-image: url('images/auto-2583230_1920.jpg');
  background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed;
  background-size: 1360px 663px;
}
h1 {
	text-align: center;
	padding: 20px;
}
.register {
	width: 600px;
	align-content: center;
	font-size: 20px;
	border-radius: 10px;
	text-transform: UPPERCASE;
	position: relative;
    right: -650px;
    top: -70px;
}
.head {
	padding-bottom: 40px;
	text-align: center;
	color: #c2d280;
	margin-top: 0px;
}
#register {
	margin-left: 100px;
	padding: 30px 10px 30px 25px;
	/* position: fixed; */
}
label{
	color: white;
	font-family: ;
	font-size: 18px;
	font-style: italic;
}
span {
	color: white;
}

input[type=text], input[type=password], input[type=email]{
  width: 300px;
  padding: 9px 15px 9px 15px;
  margin: 9px 0px 9px 0px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=phonenumber] {
  width: 236px;
  padding: 9px 15px 9px 15px;
  margin: 9px 0px 9px 0px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
#ph {
	width: 60px;
	padding: 8px 2px 8px 2px;
	margin: 9px 0px 9px 0px;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}

select {
	padding: 9px 15px 9px 15px;
	margin: 9px 0px 9px 0px;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}
input[type=submit] {
  width: 20%;
  background-color: white;
  color: white;
  padding: 8px 15px 8px 15px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
#sub {
	width: 20%;
	background-color: white;
	
	padding: 8px 15px 8px 15px;
	margin: 8px 0;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}
#sub:hover {
  background-color: #45a049;
}
.signin {
	font-size: medium;
	padding-top: 15px;
}
</style>
</head>

<body <!--/*background=url("C:\Users\Mr\OneDrive\Desktop\WEB\images\671500.jpg")-->
<div class="container">
<h1 class="head"> REGISTRATION FORM </h1>
<div class="register">
<form method="post" id="register" action="registrationform.php">		
	<div>
		<label id="firstname"> First Name :</label><br>
		<input type="text" name="First_Name" id="fname" placeholder="Enter your first name" required><br><br>
	</div>
	<div>
	   	<label> Last Name  :</label><br>
		<input type="text" name="Last_Name" id="lname" placeholder="Enter your last name" required><br><br>
	</div>
	<div>
		<label> Email ID :</label><br>
   		<input type="email" name="Email_ID" id="userEmail" value="" placeholder="Enter your Mail ID" required><br><br>
	</div>
	<div>
		<label> Password :</label><br>
		<input type="password" name="Password" id="userPassword" placeholder="Enter your password" required><br><br>
	</div>
	<div>
		<label> Re-enter Password :</label><br>
		<input type="password" name="RePassword" id="confirmPassword" placeholder="Re-Enter the Password" required><br><br>
	</div>
	<div>
		<button type="submit" name="signup-btn" onclick="" id="sub"> REGISTER </button>
	</div>
	<div class="signin">
		<p>Already an Member? <a href="loginpage.php">Sign In</a></p>
	</div>
</form>
</div>
</div>


</body>
</html>