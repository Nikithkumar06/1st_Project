<?php
include_once 'config/db.php';
?>
<?php
	$query = "SELECT * FROM offline_pass";
	$query_run = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html>
<head>
<style>
div.repopup-content{
	margin: 30px 100px 0px 135px;
}
div.repopup{
	width: 550px;
	height: 460px;
	left: 390px;
	top: 70px;
	position: absolute;
	padding-top: 35px;
	border: 1px solid #ccc;
	border-radius: 80px;
	box-shadow: 6px 7px 14px -2px;
}

.form-class {
	position: absolute;
	left: 550px;
	top: 200px;
	width: 290px;
}
.form-control{
  width: 65%;
  height: 30px;
  background-color: #ccc;
  display: inline;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.form-group {
	margin: 10px 0px 10px 0px;
	font-size: larger;
}
.form-check {
	margin: 5px 0px 10px 0px;
	position: absolute;
    left: 190px;
    top: 270px;
}
div.formbtn{
	left: 200px;
	bottom: -35px;
	position: relative;
}
.createbtn{
	width: 32.8%;
	height: 45px;
}
</style>
</head>
<body>
<div class="container">
<div class="repopup">
<h2 style="text-align: center;">RENEWAL AN PASS</h2>
<div class="repopup-content">
<?php	session_start();
		extract($_POST);
		include_once 'config/db.php';
		if(isset($_POST['edit_btn']))
		{
			$Pass_ID = mysqli_real_escape_string($db, $_POST['edit-id']);
			
			$query = "SELECT * FROM offline_pass WHERE Pass_ID = '$Pass_ID'";
			$query_run = mysqli_query($db, $query);
			$row  = mysqli_fetch_array($query_run);

			foreach($query_run as $row)
			{
				?>
	<form action="offlinepassprocess.php" method="POST" class="renewform">
	<div class="form-group">
		<label>User Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="userid" class="form-control" value="<?php echo $row['User_ID'];?>" readonly>
	</div>	
	<div class="form-group">
		<label>Pass Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="passid" class="form-control" value="<?php echo $row['Pass_ID'];?>" readonly>
	</div>
	<div class="form-group">
		<label>Bus No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="BusNo" class="form-control" value="<?php echo $row['busno'];?>" required>
	</div>
	<div class="form-group">
		<label>Start Stop&nbsp;&nbsp;</label>
			<input type="text" name="Start" class="form-control" value="<?php echo $row['start'];?>" required>
	</div>
	<div class="form-group">
		<label>End Stop&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="Stop" class="form-control" value="<?php echo $row['end'];?>" required>
	</div>
	<div class="form-group">
		<label for="option">Pass Type&nbsp;&nbsp;</label>
		<select id="select_option" name="option" class="form-control" value="<?php echo $row['option'];?>" required>
			<option selected>Choose..</option>
			<option value="300">One Month</option>
			<option value="850">Three Months</option>
			<option value="1600">Six Months</option>
			<option value="3150">Year</option>
		</select>
	</div>
	<div class="form-group">
		<label for="price">Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="price" class="form-control input_price" value="<?php echo $row['price'];?>" readonly>
	</div>
	<div class="formbtn">
		<div class="align">
			<input type="hidden" name="date" class="form-control input_price" value="<?php echo $row['Date'];?>" readonly>
			<input type="hidden" name="enddate" class="form-control input_price" value="<?php echo $row['Expiry'];?>" readonly>
			<button type="submit" name="renewbtn" class="createbtn" id="sub-btn">RENEW</button>
		</div>
	</div>
<?php
		}
	}
?>		
</form>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$('#select_option').on('change', function() {
	$('.input_price').val($(this).val());
});
</script>
</body>
</html>