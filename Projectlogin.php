<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <script src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="css\all.css">
  <link rel="stylesheet" type="text/css" href="project2.css">

	<title></title>
</head>
<body>
<div class="container">
	<?php
	include 'proj.php';
if(!empty($_GET['msg']))
{
	echo "<h3 style='text-align:center'>".$_GET['msg']."</h3>";
}
?>
	<div class="text-center">
		<form method="post">
			<h1>Login</h1><br><br>
			<label>Email</label><br>
			<i class="fas fa-user"><input type="Email" name="customer_email" placeholder="Type Your Email" style="font-size: 1.5vw;"></i><br><br>
			<label>Password</label><br>
			<i class="fas fa-unlock"><input type="Password" name="customer_pass" placeholder="Enter Password" style="font-size: 1.5vw;"></i><br><br>
			<input type="submit" name="" class="btn btn-success" value="LOGIN"><br><br><br><br>
			<h6>Have not account yet?</h6>
			<a href="projectsignup.php">SIGN UP</a>
		</form>
	</div>
</div>
</body>
</html>
<?php
if( (!empty($_POST['customer_email'])) && (!empty($_POST['customer_pass'])) )
	{
		include 'projectconnection.php';
		$customer_email=$_POST['customer_email'];
		$customer_pass=$_POST['customer_pass'];
		$q="SELECT count(customer_id) from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
		$res=mysqli_query($con,$q) or exit('Error in Query');
		$count=mysqli_fetch_array($res);
		if($count[0]<=0)
		{
			echo "<h3 style='color:white;' class='text-center'>Email Or Password is incorrect</h3>";
		}
		else
		{
			$IP=getIp();
			$q_cart="SELECT * from cart where Ip_address='$IP'";
			$res_cart=mysqli_query($con,$q_cart);
			$check_cart=mysqli_num_rows($res_cart);
			if($check_cart>0)
			{
				$_SESSION['customer_email']=$customer_email;
				header('location:checkout.php?msg=logged in successfully');
			}
			else
			{
				$_SESSION['customer_email']=$customer_email;
				header('location:myaccount.php');
			}
		}
	}
?>