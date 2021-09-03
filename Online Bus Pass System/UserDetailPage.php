<?php 
session_start();
include 'config/db.php';

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!--<link rel="stylesheet" href="css/boostrapmin.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  background-image: url('images/bus-g358e5d812_640.jpg');
  background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed;
  background-size: 1367px 800px;
}
nav.nav-bar{
	background-color: #00001a;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  text-transform: UPPERCASE;
  font-size: 110%;
  display:inline;
}

li {
  float: left;
  width: 225px;

}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: gray;
}
.container{
 display: block;
	margin: 100px 0px 0px 0px;
}
div.none{
	display: none;
}
.inline:hover .none{
	display: block;
	background-color: black;
}
.active{
  background-color:#111;
  }
h1 {
  font-size: 600%;
  text-align: center;
  text-transform: UPPERCASE;
  padding-top: 100px;
}
.row {
    height: auto;    
	border-style:solid;
    border-width:1px;  
    border-color:gray;
    border-radius: 30px;
	height: 370px;
    margin: 100px 0px 10px 445px;
    max-width: 500px;
}
.form-class {
	text-align: center;
	position: absolute;
	left: 545px;
	top: 170px;
	
}
.form-control{
  width: 100%;
  height: 45px;
  background-color: white;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.form-group {
	margin: 20px 0px 30px 0px;
	font-size: larger;
	text-align: left;
}
input[type=file] {
    padding: 3.6px 0px 4px 3px;
}
select#formph{
	height: 30px;
	background-color: white;
	display: inline;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}
.formph {
  width: 75%;
  height: 30px;
  background-color: white;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
#birthday {
	width: 95%;
	height: 30px;
	background-color: white;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	text-transform: UPPERCASE;
}
.formpage{
	margin: 0px -9px;
}
div.Head{
	text-align: left;
	width: 100px;
	display: inline;
}
div.value{
	width: 100px;
	display: inline;
	text-align: left;
}
.left {
	align :left;
}
button{
	text-transform: UPPERCASE;
	padding: 0px;
}
.abtn{
	color: #ccc;
	background-color: gray;
	height: 100%;
}
</style>
</head>
<body style="height: 620px">
<nav class="nav-bar">
	<ul><li><a class="" href="index.php"><i class="fa fa-home" style="font-size:20px"></i>Home</a></li></ul>
	<ul><li><a href="UserDetailPage.php">My Details</a></li></ul>
	<ul><li><a href="BusDetails.php">Bus Details</a></li></ul>
	<ul><li><div class="inline"><a href="#">PASS DETAILS</a>
	<ul><div class="none"><a href="Createpass.php">Create An Pass</a>
	<a href="Repass.php">Re-New An Pass</a></div></div></li></ul></ul>
	<ul><li><a href="changepwd.php">Change Password</a></li></ul>
	<ul style="display: block;"><li><a href="logoutpage.php">Logout</a></li></ul>
</nav>

<div>
<div class="row">
<div class="form-class col-md-6">
	<form action="" id="userform" method="post" enctype="multipart/form-data" style="font-weight: 800;">
		<h2>MY PROFILE</h2>
		<?php
			$image="SELECT * FROM updateprofile";
			$res = mysqli_query($db, $image);
			$row = mysqli_fetch_array($res);
		?>
		<div class="form-group">
		<div class="left"><div class="Head"><label>User ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>
			<div class="value"><?php echo $_SESSION['User_ID'];?></div>
		</div></div>
		<div class="form-group">
		<div class="left">
			<div class="Head"><label>First Name&nbsp;&nbsp;&nbsp;</label></div>
			<span class="value"><tr><?php echo $_SESSION['First_Name'];?></span>
		</div></div>
		<div class="form-group">
		<div class="left">
			<div class="Head"><label>Last Name&nbsp;&nbsp;&nbsp;</label></div>
			<span class="value"><tr><?php echo $_SESSION['Last_Name'];?></span>
		</div></div>
		<div class="form-group">
		<div class="left">
			<div class="Head"><label>Email ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>
			<span class="value"><?php echo $_SESSION['Email_ID'];?></span>
		</div></div>
		<div class="form-check">
			<div class="button"><button type="submit" name="update-btn" class="form-control"><div class="abtn"><br><a href="updateprofile.php" style="text-decoration: none;">Add More Details/Update Details</a></div></button></div>
		</div>
	</form>
</div>
</div>
</div>







</body>
</html>