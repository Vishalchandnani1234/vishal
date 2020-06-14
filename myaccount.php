<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
h2::before
{
	content: "";
	display: block;
	background-color: red;
	height: 7px;
	width: 200px;
	margin-left: auto;
	margin-right: auto;
	transform: translateY(50px);
}
h2::after
{
	content: "";
	display: block;
	background-color: red;
	height: 14px;
	width: 70px;
	margin-left: auto;
	margin-right: auto;
	transform: translateY(7px);
}
	</style>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <script src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="css\all.css">
	<title></title>
</head>
<body>
<div class="container">
	<h2 class="text-center">My Account</h2>
</div>
<?php
if(!empty($_GET['msg']))
{
	echo "<h2 class='text-center' style='color:green'>".$_GET['msg']."</h2>";
}
include 'proj.php';
include 'projectconnection.php';
session_start();
if(isset($_SESSION['customer_email']))
{
	$user=$_SESSION['customer_email'];
	$q="SELECT * from customers where customer_email='$user'";
	$res=mysqli_query($con,$q);
	$row=mysqli_fetch_array($res);
	$name=$row['customer_name'];
	echo "<h3 class='text-center'>Welcome ! "."<span><h3 style='color:red'>".$name."</h3></span>"."</h3>";
}
else
{
	echo "<h3 class='text-center'>Welcome !</h3>";
	echo "<div>
			<a href='Projectlogin.php'><h3 class='text-center'><b>Login your Account</b></h3></a>
		</div>";
}
?>
<br>
<div class="container">
	<ul>
		<li><a href="myaccount.php?myorders">My Orders</a></li>
		<li><a href="myaccount.php?editaccount">Edit Account</a></li>
		<li><a href="myaccount.php?changepassword">Change Password</a></li>
		<li><a href="myaccount.php?deleteaccount">Delete Account</a></li>
	</ul>
</div>
<?php
if(isset($_GET['editaccount']))
{
	header('location:editaccount.php');
}
if(isset($_GET['changepassword']))
{
	header('location:changepassword.php');
}
if(isset($_GET['deleteaccount']))
{
	header('location:deleteaccount.php');
}
?>
</body>
</html>