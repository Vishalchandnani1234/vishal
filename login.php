<?php
if( (!empty($_POST['UserName'])) && (!empty($_POST['Password'])))
{
	include 'connection.php';
	$UserName=$_POST['UserName'];
	$Password=$_POST['Password'];
	$q="Select count(id) from login where UserName='$UserName' and password='$Password'";
	$res=mysqli_query($con,$q) or exit('Error in Query');
	$count=mysqli_fetch_array($res);
	if($count[0]<=0)
	{
		echo "UserName Or Password is incorrect";
	}
	else
	{
		session_start();
		$_SESSION['name']=$UserName;
		header('location:loginhome.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <script src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="css\all.css">
	<link rel="stylesheet" type="text/css" href="login1.css">
	<title></title>
</head>
<body>
<div class="container">
	<div class="text-center">
		<?php
			if(!empty($_GET['msg']))
			{
				echo "<h3>".$_GET['msg']."</h3>";
			}
		?>
		<form method="post">	
			<h1>Login Form</h1><br><br>
			<h3>Username</h3>
			<input type="text" name="UserName" placeholder="Type Your Username" class="input">
			<h3>Password</h3>
			<input type="password" name="Password" placeholder="Type Your Password" class="input"><br><br><br>
			<input type="submit" name="" value="login" class="btn btn-success input1"><br><br>
			<a href="loginsignup.php" type="submit" class="SignUp">SignUp</a>
		</form>
	</div>
</div>
</body>
</html>