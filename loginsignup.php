<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(!empty($_POST['Username']) && (!empty($_POST['Password'])))
	{
		$Username=$_POST['Username'];
		$Password=$_POST['Password'];
		include 'connection.php';
		$q="INSERT into login (Username,Password) values('".$Username."','".$Password."')";
		mysqli_query($con,$q) or exit('Error in Query');
		header("location:login.php?msg=Signup Succesfully now login");
	}
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
			<form method="post">
				<h1>Sign Up</h1><br><br> 
				<h3>Username</h3>
				<input type="text" name="Username" placeholder="Type Your Name" class="input">
				<h3>Password</h3>
				<input type="Password" name="Password" placeholder="Create Your Password" class="input"><br><br><br>
				<input type="submit" name="" class="btn btn-success input1"><br><br>
				<h5>If Already SignUp Click to</h5>
				<a href="login.php">Log In</a>
			</form>
		</div>	
	</div>
</body>