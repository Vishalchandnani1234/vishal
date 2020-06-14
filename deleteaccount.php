<?php
	session_start();
	include 'projectconnection.php';
	$user=$_SESSION['customer_email'];
	$q="SELECT * from customers where customer_email='$user'";
	$res=mysqli_query($con,$q);
	$row=mysqli_fetch_array($res);
	$customer_email=$row['customer_email'];
	$delete="DELETE from customers where customer_email='$customer_email'";
	echo $delete;
	mysqli_query($con,$delete);
	header('location:myaccount.php?msg=Account Deleted Successfully');
?>