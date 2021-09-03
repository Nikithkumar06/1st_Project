<?php
include 'config/db.php';

if(isset($_POST['registerbtn'])){
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

	$query = "INSERT INTO offline_register (User_ID, First_Name, Last_Name, Email_ID, Phone_Number, gender, birthday, Address, Address2, State, City, Zipcode, profileImage, AddressProof) VALUE ('$User_ID', '$First_Name', '$Last_Name', '$Email_ID', '$Phone_Number', '$gender', '$birthday', '$Address', '$Address2', '$State', '$City', '$Zipcode', '$profileImage', '$AddressProof')";
	$query_run = mysqli_query($db, $query);
	
	if($query_run){
		// echo "Account Created Successfully";
		$_SESSION['success'] = "Admin Profile Added";
		header('Location: adminregister.php');
	}else{
		$_SESSION['status'] = "Admin Profile Not Added";
		header('Location: adminregister.php');
		// echo "Not Saved";
	}
}

if(isset($_POST['updatebtn'])){
	$User_ID = mysqli_real_escape_string($db, $_POST['edit_ID']);
	$First_Name = mysqli_real_escape_string($db, $_POST['editFirst_Name']);
	$Last_Name = mysqli_real_escape_string($db, $_POST['editLast_Name']);
	$Email_ID = mysqli_real_escape_string($db, $_POST['editEmail_ID']);
	$Phone_Number = mysqli_real_escape_string($db, $_POST['editPhone_Number']);
	$gender = mysqli_real_escape_string($db, $_POST['editgender']);
	$birthday = mysqli_real_escape_string($db, date('Y-m-d', strtotime($_POST['editbirthday'])));
	$Address = mysqli_real_escape_string($db, $_POST['editAddress']);
	$Address2 = mysqli_real_escape_string($db, $_POST['editAddress2']);
	$State = mysqli_real_escape_string($db, $_POST['editState']);
	$City = mysqli_real_escape_string($db, $_POST['editCity']);
	$Zipcode = mysqli_real_escape_string($db, $_POST['editZipcode']);
	$query = "UPDATE offline_register SET First_Name = '".$First_Name."', Last_Name = '".$Last_Name."', Email_ID = '".$Email_ID."', Phone_Number = '".$Phone_Number."', gender = '".$gender."', birthday = '".$birthday."', Address = '".$Address."', Address2 = '".$Address2."', State = '".$State."', City = '".$City."', Zipcode = '".$Zipcode."' WHERE User_ID = '$User_ID'";
	
	$query_run = mysqli_query($db, $query);
	
	if($query_run){
		$_SESSION['success'] = "Your Data is Updated";
		header('Location: adminregister.php');
	}else{
		$_SESSION['status'] = "Your Data is Not uploaded";
		header('Location: adminregister.php');
	}
	
}

if(isset($_POST['deletebtn'])){
	$User_ID = $_POST['delete-id'];
	
	$query = "DELETE FROM offline_register WHERE User_ID = '$User_ID'";
	$query_run = mysqli_query($db, $query);
	
	if($query_run){
		$_SESSION['success'] = "Your Data is DELETED";
		header('Location: adminregister.php');
	}else{
		$_SESSION['status'] = "Your Data is Not DELETED";
		header('Location: adminregister.php');
	}
}

?>