<?php
session_start();
include 'proj.php';
include 'projectconnection.php';
if( (!empty($_POST['customer_email'])) && (!empty($_POST['customer_pass'])) )
{
	$customer_email=$_POST['customer_email'];
	$customer_pass=$_POST['customer_pass'];
	$q="UPDATE customers set customer_pass='$customer_pass' where customer_email='$customer_email'";
	mysqli_query($con,$q);
	header('location:myaccount.php?msg=Password Changed Successfully'); 
}
else
{
	$user=$_SESSION['customer_email'];
	$q="SELECT * from customers where customer_email='$user'";
	$res=mysqli_query($con,$q);
	$row=mysqli_fetch_array($res);
	$IP=getip();
	$customer_pass=$row['customer_pass'];
	$customer_email=$row['customer_email'];
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
	 <link rel="stylesheet" type="text/css" href="project.css">
</head>
<body>
	<div class="container">
		<div class="text-center">
			<form method="post">
				<h2>Change Password</h2><br><br> 
				<label>Email</label><br>
				<input type="text" name="customer_email" placeholder="Type Your Name" value="<?php echo $customer_email; ?>"></i><br><br>
				<label>Password</label><br>
				<i class="fas fa-unlock"><input type="Password" name="customer_pass" placeholder="Change Your Password"></i><br><br>
				<input type="submit" name="register" class="btn btn-success"><br><br><br><br>
			</form>
		</div>	
	</div>
</body>
</html>	