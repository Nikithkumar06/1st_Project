<?php
include 'config/db.php';

if(isset($_POST['createbtn'])){
	$User_ID = mysqli_real_escape_string($db, $_POST['userid']);
	$busno = mysqli_real_escape_string($db, $_POST['BusNo']);
	$start = mysqli_real_escape_string($db, $_POST['Start']);
	$end = mysqli_real_escape_string($db, $_POST['Stop']);
	$option = mysqli_real_escape_string($db, $_POST['option']);
	$price = mysqli_real_escape_string($db, $_POST['price']);
	if(!empty($busno) && !empty($start) && !empty($end) && !empty($option) && !empty($price)){
		function create_passid($length){
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
		$Pass_ID = create_passid(4);
		$startdate = date('Y-m-d H:i:s');
		$enddate = date('Y-m-d H:i:s');
		if($price=="300"){
			$enddate = date('Y-m-d H:i:s', strtotime($enddate."+1 months") ?? "");
		}elseif($price=="850"){
			$enddate = date('Y-m-d H:i:s', strtotime($enddate."+3 months") ?? "");
		}elseif($price=="1600"){
			$enddate = date('Y-m-d H:i:s', strtotime($enddate."+6 months") ?? "");
		}else{
			$enddate = date('Y-m-d H:i:s', strtotime($enddate."+12 months") ?? "");
		}
		$sql = "INSERT INTO offline_pass (User_ID, Pass_ID, busno, start, end, option, price, Date, Expiry) VALUES ('$User_ID', '$Pass_ID', '$busno', '$start', '$end', '$option', '$price', '$startdate', '$enddate')";
		if(mysqli_query($db, $sql)){
			echo "New Pass is created!";
			header("Location: createofflinepass.php");
		}else{
			echo "Not Pass is Generated!";
			header("Location: createofflinepass.php");
		}
		mysqli_close($db);
	}
}

if(isset($_POST['renewbtn'])){
	$User_ID = mysqli_real_escape_string($db, $_POST['userid']);
	$Pass_ID = mysqli_real_escape_string($db, $_POST['passid']);
	$busno = mysqli_real_escape_string($db, $_POST['BusNo']);
	$start = mysqli_real_escape_string($db, $_POST['Start']);
	$end = mysqli_real_escape_string($db, $_POST['Stop']);
	$option = mysqli_real_escape_string($db, $_POST['option']);
	$price = mysqli_real_escape_string($db, $_POST['price']);
	// $date = mysqli_real_escape_string($db, $_POST['date']);
	$enddate = mysqli_real_escape_string($db, $_POST['enddate']);
	$startdate = date('Y-m-d H:i:s');
	// $enddate = date('Y-m-d H:i:s');
	if($price=="300"){
		$enddate = date('Y-m-d H:i:s', strtotime($enddate."+1 months"));
	}elseif($price=="850"){
		$enddate = date('Y-m-d H:i:s', strtotime($enddate."+3 months"));
	}elseif($price=="1600"){
		$enddate = date('Y-m-d H:i:s', strtotime($enddate."+6 months"));
	}else{
		$enddate = date('Y-m-d H:i:s', strtotime($enddate."+1 year"));
	}
	$query = "UPDATE offline_pass SET User_ID = '$User_ID', Pass_ID = '$Pass_ID', busno = '$busno', start = '$start', end = '$end', option = '$option', price = '$price', Date = '$startdate', Expiry = '$enddate' WHERE Pass_ID = '$Pass_ID'";
	$query_run = mysqli_query($db, $query);
	if($query_run){
		echo "New Pass is created!";
		header("Location: createofflinepass.php");
	}else{
		echo "Not Pass is Generated!";
		header("Location: createofflinepass.php");
	}
	mysqli_close($db);
}

if(isset($_POST['deletebtn'])){
	$Pass_ID = $_POST['delete-id'];
	
	$query = "DELETE FROM offline_pass WHERE Pass_ID = '$Pass_ID'";
	$query_run = mysqli_query($db, $query);
	
	if($query_run){
		$_SESSION['success'] = "Your Data is DELETED";
		header('Location: createofflinepass.php');
	}else{
		$_SESSION['status'] = "Your Data is Not DELETED";
		header('Location: createofflinepass.php');
	}
}

?>