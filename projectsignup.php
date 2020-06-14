<?php
session_start();
include 'proj.php';
include 'projectconnection.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if( (!empty($_POST['customer_name'])) && (!empty($_POST['customer_pass'])) && (!empty($_POST['customer_email'])) && (!empty($_POST['customer_country'])) &&(!empty($_POST['customer_city'])) && (!empty($_POST['customer_contact'])) && (!empty($_POST['customer_address'])) )
	{
		$IP=getip();
		$customer_name=$_POST['customer_name'];
		$customer_pass=$_POST['customer_pass'];
		$customer_email=$_POST['customer_email'];
		$customer_country=$_POST['customer_country'];
		$customer_city=$_POST['customer_city'];
		$customer_contact=$_POST['customer_contact'];
		$customer_address=$_POST['customer_address'];
		$q="INSERT into customers (customer_ip,customer_name,customer_pass,customer_email,customer_country,customer_city,customer_contact,customer_address) VALUES ('$IP','$customer_name','$customer_pass','$customer_email','$customer_country','$customer_city','$customer_contact','$customer_address')";
		mysqli_query($con,$q) or exit('Error in Query');
		$q_cart="SELECT * from cart where Ip_address='$IP'";
		$res_cart=mysqli_query($con,$q_cart);
		$check_cart=mysqli_num_rows($res_cart);
		if($check_cart==0)
		{
			$SESSION['customer_email']==$customer_email;
			header('location:project.php?msg=SignUp Successfully Now Login');
		}	
		else
		{
			$SESSION['customer_email']==$customer_email;
			header('location:checkout.php');
		}
	} 
	else
	{
		echo "<h3>Please Fill All Fields</h3>";
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
	 <link rel="stylesheet" type="text/css" href="Project2.css">
</head>
<body>
	<div class="container">
		<div class="text-center">
			<form method="post">
				<h1>Sign Up</h1><br><br> 
				<label>Email</label><br>
				<i class="fas fa-user"><input type="text" name="customer_name" placeholder="Type Your Name" style="font-size: 1.5vw"></i><br><br>
				<label>Password</label><br>
				<i class="fas fa-unlock"><input type="Password" name="customer_pass" placeholder="Create Your Password" style="font-size: 1.5vw"></i><br><br>
				<label>Email</label><br>
				<input type="Email" name="customer_email" style="font-size: 1.5vw" placeholder="Enter Email"><br><br>
				<label>Country</label><br>
				<select name="customer_country" style="font-size: 1.5vw">
					<option>United Kingdom</option>
					<option>India</option>
					<option>USA</option>
				</select><br><br>
				<label>City</label><br>
				<input type="text" name="customer_city" style="font-size: 1.5vw" placeholder="Enter City"><br><br>
				<label>Contact</label><br>
				<input type="text" name="customer_contact" style="font-size: 1.5vw" placeholder="Give Your Contact"><br><br>
				<label>Address</label><br>
				<input type="text" name="customer_address" style="font-size: 1.5vw" placeholder="Enter Address"><br><br>
				<input type="submit" name="register" class="btn btn-success" style="font-size: 1.5vw"><br><br><br><br>
				<h6>If Already SignUp Click to</h6>
				<a href="login.php">Log In</a>
			</form>
		</div>	
	</div>
</body>
</html>