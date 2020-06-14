<?php
if(isset($_GET['product_id']))
{
	$product_id=$_GET['product_id'];
	include 'projectconnection.php';
	$q="Select * from products where product_id='$product_id'";
	$v=mysqli_query($con,$q);
	while($vishal=mysqli_fetch_array($v))
	{
		$product_id=$vishal['product_id'];
		$Categories=$vishal['Categories'];
		$Brand=$vishal['Brand'];
		$Title=$vishal['Title'];
		$Price=$vishal['Price'];
		$Description=$vishal['Description'];
		$Image=$vishal['Image'];
		echo "
			<div>
				<h2>$Title</h2>
				<img src='$Image' height='400px' width='300'>
				<a href='project1.php'>Go To Home Page</a>
				<p><b>$Price</b></p>
				<div>$Description</div>
			</div>
		";
	}
}
?>