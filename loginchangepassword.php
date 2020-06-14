<?php
if(!empty($_GET['Username']) && (!empty($_GET['Password'])))
{
	$Username=$_GET['Username'];
	$Password=$_GET['Password'];
	include 'connection.php';
	$q="UPDATE login set Password='".$Password."'WHERE Username='".$Username."'";
	mysqli_Query($con,$q) or exit('Error in Query');
	echo "Password Changed Successfully<br>";
	header("location:login.php?msg=Password Changed Successfully");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <script src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="css\all.css">
	<link rel="stylesheet" type="text/css" href="login1.css">
</head>
<body>
<div class="container">
	<div class="text-center">
		<form>	
			<h1>Change Password</h1><br><br>	
			<h3>Username</h3>
			<input type="text" name="Username" placeholder="Type Your Username" class="input">
			<h3>New Password</h3>
			<input type="Password" name="Password" placeholder="Type Your Password" class="input"><br><br><br>
			<input type="submit" name="" value="login" class="btn btn-success input1"><br><br>
		</form>
	</div>
</div>
</body>
</html>