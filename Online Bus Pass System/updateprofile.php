<?php
session_start();
extract($_POST);
include_once 'config/db.php';

//if user clicks on the update button
if(isset($_POST['update-btn']))
{
	if(count($_POST)>0){
		$User_ID = mysqli_real_escape_string($db, $_POST['User_ID']);
		$First_Name = mysqli_real_escape_string($db, $_POST['First_Name']);
		$Last_Name = mysqli_real_escape_string($db, $_POST['Last_Name']);
		$Email_ID = mysqli_real_escape_string($db, $_POST['Email_ID']);
		$Phone_Number = mysqli_real_escape_string($db, $_POST['Phone_Number']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$birthday = mysqli_real_escape_string($db, date('Y-m-d', strtotime($_POST['birthday'])));
		$Address = mysqli_real_escape_string($db, $_POST['Address']);
		$Address2 = mysqli_real_escape_string($db, $_POST['Address2']);
		$State = mysqli_real_escape_string($db, $_POST['State']);
		$City = mysqli_real_escape_string($db, $_POST['City']);
		$Zipcode = mysqli_real_escape_string($db, $_POST['Zipcode']);
		$user = "SELECT * FROM updateprofile";
		$result = mysqli_query($db, $user);
		$row = mysqli_fetch_array($result);
		$userid = $_SESSION['User_ID'];
	if($User_ID === $userid){
		#Insert profile
		if(!empty($profileImage)){
			$profileImage = $_FILES['profileImage']['name'];
			$fileTmpName = $_FILES['profileImage']['tmp_name'];
			$fileSize = $_FILES['profileImage']['size'];
			$fileError = $_FILES['profileImage']['error'];
			$fileType = $_FILES['profileImage']['type'];

			$fileExt = explode('.', $profileImage);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg', 'jpeg', 'png', 'pdf');
			if(in_array($fileActualExt, $allowed)){
				if($fileError===0){
					if($fileSize < 1000000){
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = 'uploads/profile'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
					}else{
						echo " Your file is too big!";
					}
				}else{
					echo "There was an error uploading your file!";
				}
			}else{
				echo "You cannot upload files of this type";
			}
		}
		#Insert Address Profile
		if(!empty($AddressProof)){
			$AddressProof = $_FILES['AddressProof']['name'];
			$fileTmpName = $_FILES['AddressProof']['tmp_name'];
			$fileSize = $_FILES['AddressProof']['size'];
			$fileError = $_FILES['AddressProof']['error'];
			$fileType = $_FILES['AddressProof']['type'];

			$fileExt = explode('.', $AddressProof);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg', 'jpeg', 'png', 'pdf');
			if(in_array($fileActualExt, $allowed)){
				if($fileError===0){
					if($fileSize < 1000000){
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = 'uploads/AddressProof'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
					}else{
						echo " Your file is too big!";
					}
				}else{
					echo "There was an error uploading your file!";
				}
			}else{
				echo "You cannot upload files of this type";
			}
		}
		$profileImage = $_FILES['profileImage']['name'];
		$AddressProof = $_FILES['AddressProof']['name'];
		//login user			
		$query = "INSERT INTO updateprofile (User_ID, First_Name, Last_Name, Email_ID, Phone_Number, gender, birthday, Address, Address2, State, City, Zipcode, profileImage, AddressProof) VALUES ('$User_ID', '$First_Name', '$Last_Name', '$Email_ID', '$Phone_Number', '$gender', '$birthday', '$Address', '$Address2', '$State', '$City', '$Zipcode', '$profileImage', '$AddressProof')";
		if(mysqli_query($db, $query)){
			echo "Successfully Updated!";
		}else{
			echo "Error: ".$query."".mysqli_error($db);
		}
		mysqli_close($db);
	}else{
		#Upload profile
		if(!empty($profileImage)){
			$fileTmpName = $_FILES['profileImage']['tmp_name'];
			$fileSize = $_FILES['profileImage']['size'];
			$fileError = $_FILES['profileImage']['error'];
			$fileType = $_FILES['profileImage']['type'];

			$fileExt = explode('.', $profileImage);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg', 'jpeg', 'png', 'pdf');
			if(in_array($fileActualExt, $allowed)){
				if($fileError===0){
					if($fileSize < 1000000){
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = 'uploads/profile'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
					}else{
						echo " Your file is too big!";
					}
				}else{
					echo "There was an error uploading your file!";
				}
			}else{
				echo "You cannot upload files of this type";
			}
		}
		#Upload Address
		if(!empty($AddressProof)){
			$AddressProof = $_FILES['AddressProof']['name'];
			$fileTmpName = $_FILES['AddressProof']['tmp_name'];
			$fileSize = $_FILES['AddressProof']['size'];
			$fileError = $_FILES['AddressProof']['error'];
			$fileType = $_FILES['AddressProof']['type'];

			$fileExt = explode('.', $AddressProof);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg', 'jpeg', 'png', 'pdf');
			if(in_array($fileActualExt, $allowed)){
				if($fileError===0){
					if($fileSize < 1000000){
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = 'uploads/AddressProof'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
					}else{
						echo " Your file is too big!";
					}
				}else{
					echo "There was an error uploading your file!";
				}
			}else{
				echo "You cannot upload files of this type";
			}
		}
		$profileImage = $_FILES['profileImage']['name'];
		$AddressProof = $_FILES['AddressProof']['name'];
		//login user			
		$query = "UPDATE updateprofile SET First_Name = '".$First_Name."', Last_Name = '".$Last_Name."', Email_ID = '".$Email_ID."', Phone_Number = '".$Phone_Number."', gender = '".$gender."', birthday = '".$birthday."', Address = '".$Address."', Address2 = '".$Address2."', State = '".$State."', City = '".$City."', Zipcode = '".$Zipcode."', profileImage = '".$profileImage."', AddressProof = '".$AddressProof."' WHERE User_ID = '$User_ID'";
		if(mysqli_query($db, $query)){
			echo "Successfully Updated!";
		}else{
			echo "Error: ".$query."".mysqli_error($db);
		}
		mysqli_close($db);
	}
	}
}
?>
<?php
include 'config/db.php';
$result = mysqli_query($db,"SELECT * FROM registerusers");
$row  = mysqli_fetch_array($result);
?>
<html lang="en">
<head>
<style>
.form-class {
	width: 500px;
	height:950px;
    margin: 150px 0px 100px 490px;
}
form#userform{
    padding: 0px 0px 0px 25px;
}
#inputAddress{
  width: 79%;
  height: 50px;
  background-color: white;
  display: inline;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.address {
	width: 65%;
	height: 35px;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
    background-color: white;
}
#birthday {
	width: 54%;
	height: 35px;
	background-color: white;
	display: inline;
	border: 1px solid #ccc;
	border-radius: 4px;
	text-transform: UPPERCASE;
}
.form-group {
	margin: 20px 0px 20px 0px;
	font-size: larger;
	text-align: left;
}
input[type=file] {
    padding: 4px 0px 4px 3px;
	width: 79%;
    height: 30px;
	border: 1px solid beige;
	border-radius: 3px;
}
.formph {
  width: 67.5%;
  height: 35px;
  background-color: white;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
select#formph{
	height: 35px;
	background-color: white;
	display: inline;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}
#user-id{
	height: 34px;
	width: 58.5%;
}
input#First_Name {
    width: 58.5%;
    height: 35px;
}
#Last_Name{
	height: 34px;
	width: 58.5%;
}
#Email{
	height: 34px;
	width: 58.5%;
}
#sub-btn {
	width: 25%;
	height: 35px;
	margin: 30px 0px 0px 67px;
}
#can-btn {
	width: 25%;
	height: 35px;
	margin: 30px 67px 0px 0px;
}
.form-check{
	height: 150px;
}
button#update-btn{
	height: 25%;
    width: 25%;
    margin: 0px 0px 0px 64px;
}
</style>
</head>
<body>
<div>
<div class="row">
<div class="form-class col-md-6">
	<form action="updateprofile.php" id="userform" method="post" enctype="multipart/form-data">
		<h2 style="text-align:center;margin: 0px 95px 40px 0px;">UPDATE PROFILE FORM</h2>
		<div class="form-group">
		<div>		
			<label>User ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="number_format" id="user-id" name="User_ID" value="<?php echo $_SESSION['User_ID'];?>" required> 
		</div>
		</div>
		<div class="form-group">
		<div class="left">
			<label>First Name&nbsp;&nbsp;</label>
			<input type="text" id="First_Name" name="First_Name" value="<?php echo $_SESSION['First_Name'];?>" required> 
		</div>
		</div>
		<div class="form-group">
		<div class="left">
			<label>Last Name&nbsp;&nbsp;&nbsp;</label>
			<input type="text" id="Last_Name" name="Last_Name" value="<?php echo $_SESSION['Last_Name'];?>" required> 
		</div>
		</div>
		<div class="form-group">
		<div class="left">
			<label>Email ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" id="Email" name="Email_ID" value="<?php echo $_SESSION['Email_ID'];?>" readonly>
		</div>
		</div>
		<div class="form-group">
		<label>Phone Number</label>
			<div class="formpage">
				<select id="formph">
				<option>+91</option>
				</select>&nbsp;
				<input type="number_format" name="Phone_Number" class="formph">
			</div>
		</div>
		<div class="form-group">
		<div class="align">
			<label for="gender">Gender&nbsp;&nbsp;</label>
			<input type="radio" id="gender" name="gender" value="Male">Male
			<input type="radio" id="gender" name="gender" value="Female">Female
		</div>
		</div>		
		<div class="form-group">
		<div class="align">
			<label for="birthday">Date Of Birth&nbsp;&nbsp;</label>
			<input type="date" id="birthday" name="birthday" placeholder="">
		</div>
		</div>
		<div class="form-group">
			<div class="align">
				<label for="inputAddress">Address</label><br>
				<input type="text" class="form-control" id="inputAddress" name="Address" placeholder="1234 Main St">
			</div>
		</div>
		<div class="form-group">
			<div class="align">
				<label for="inputAddress2">Address 2</label><br>
				<input type="text" class="form-control" id="inputAddress" name="Address2" placeholder="Apartment, studio, or floor">
			</div>
		</div>
		<div class="form-row">
		<div class="form-group col-md-4">
		<div class="align">
			<label for="inputState">State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		    <select id="inputState" name="State" class="form-control address">
				<option selected>Choose...</option>
				<option>Andhra Pradesh</option>
				<option>Arunachal Pradesh</option>
				<option>Assam</option>
				<option>Andaman and Nicobar</option>
				<option>Bihar</option>
				<option>Chhattisgarh</option>
				<option>Chandigarh</option>
				<option>Dadra and Nagar Haveli</option>
				<option>Daman and Diu</option>
				<option>Delhi</option>
				<option>Goa</option>
				<option>Gujarat</option>
				<option>Haryana</option>
				<option>Himachal Pradesh</option>
				<option>Jammu and Kashmir</option>
				<option>Jharkhand</option>
				<option>Karnataka</option>
				<option>Kerala</option>
				<option>Lakshadweep</option>
				<option>Madhya Pradesh</option>
				<option>Maharashtra</option>
				<option>Manipur</option>
				<option>Meghalaya</option>
				<option>Mizoram</option>
				<option>Nagaland</option>
				<option>Orissa</option>
				<option>Pondicherry</option>
				<option>Punjab</option>
				<option>Rajasthan</option>
				<option>Sikkim</option>
				<option>Tamil Nadu</option>
				<option>Telangana</option>
				<option>Tripura</option>
				<option>Uttar Pradesh</option>
				<option>Uttarakhand</option>
				<option>West Bengal</option>
			</select>
		</div>
		</div>
			<div class="form-group col-md-6">
				<div class="align">
					<label for="inputCity">City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="City" class="form-control address" id="inputCity" placeholder="">
				</div>
			</div>
			<div class="form-group col-md-2">
				<div>
					<label for="inputZip">Zipcode</label>
					<input type="text" name="Zipcode" class="form-control address" id="inputZip" placeholder="">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="align">
				<label>Upload Profile &#129047;(for address proof)</label>
				<input type="file" name="profileImage" class="form-control">
			</div>
		</div>	
		<div class="form-group">
			<div class="align">
				<label>Upload Document &#129047;(for address proof)</label>
				<input type="file" name="AddressProof" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<div class="form-check">
				<button type="submit" name="cancel" class="form-control" id="can-btn">CANCEL</button>
				<button type="submit" name="update-btn" class="form-control" id="update-btn"> UPDATE </button>
			</div>
		</div>		
	</form>
</div>
</div>
</div>
</body>
</html>