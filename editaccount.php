<?php
session_start();
include 'proj.php';
include 'projectconnection.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if( (!empty($_POST['customer_name'])) && (!empty($_POST['customer_pass'])) && (!empty($_POST['customer_email'])) && (!empty($_POST['customer_country'])) &&(!empty($_POST['customer_city'])) && (!empty($_POST['customer_contact'])) && (!empty($_POST['customer_address'])) )
	{
		$IP=getip();
		$customer_id=$_POST['customer_id'];
		$customer_name=$_POST['customer_name'];
		$customer_pass=$_POST['customer_pass'];
		$customer_email=$_POST['customer_email'];
		$customer_country=$_POST['customer_country'];
		$customer_city=$_POST['customer_city'];
		$customer_contact=$_POST['customer_contact'];
		$customer_address=$_POST['customer_address'];
		$q="UPDATE customers set customer_name='$customer_name', customer_pass='$customer_pass', customer_email='$customer_email', customer_country='$customer_country', customer_city='$customer_city', customer_contact='$customer_contact', customer_address='$customer_address' WHERE customer_id='$customer_id'";
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
			header('location:myaccount.php?msg=Account Updated Successfully');
		}
	}
else
{
	echo "<h3>Please Fill All Fields</h3>";
}	
}	
else  
{
	
	$user=$_SESSION['customer_email'];
	$q="SELECT * from customers where customer_email='$user'";
	$res=mysqli_query($con,$q);
	$row=mysqli_fetch_array($res);
	//$customer_name=$row['customer_name'];

	$IP=getip();
	$customer_id=$row['customer_id'];
	$customer_name=$row['customer_name'];
	$customer_pass=$row['customer_pass'];
	$customer_email=$row['customer_email'];
	$customer_country=$row['customer_country'];
	$customer_city=$row['customer_city'];
	$customer_contact=$row['customer_contact'];
	$customer_address=$row['customer_address'];
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
	 <link rel="stylesheet" type="text/css" href="Project.css">
</head>
<body>
	<div class="container">
		<div class="text-center">
			<form method="post">
				<h1>Edit Account</h1><br><br>
				<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"> 
				<label>Name</label><br>
				<i class="fas fa-user"><input type="text" name="customer_name" placeholder="Type Your Name" value="<?php echo $customer_name; ?>"></i><br><br>
				<label>Password</label><br>
				<i class="fas fa-unlock"><input type="Password" name="customer_pass" placeholder="Create Your Password" value="<?php echo $customer_pass; ?>"></i><br><br>
				<label>Email</label><br>
				<input type="Email" name="customer_email" value="<?php echo $customer_email; ?>"><br><br>
				<label>Country</label><br>
				<select name="customer_country">
					<option>United Kingdom</option>
					<option>India</option>
					<option>USA</option>
				</select><br><br>
				<label>City</label><br>
				<input type="text" name="customer_city" value="<?php echo $customer_city; ?>"><br><br>
				<label>Contact</label><br>
				<input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>"><br><br>
				<label>Address</label><br>
				<input type="text" name="customer_address" value="<?php echo $customer_address; ?>"><br><br>
				<input type="submit" name="register" class="btn btn-success"><br><br><br><br>
				<h6>If Already SignUp Click to</h6>
				<a href="login.php">Log In</a>
			</form>
		</div>	
	</div>
</body>
</html>